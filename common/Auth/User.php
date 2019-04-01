<?php namespace Common\Auth;

use Common\Auth\Roles\Role;
use Common\Billing\Billable;
use Common\Billing\BillingPlan;
use Common\Files\FileEntry;
use Common\Files\UserFileEntry;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string|null $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $gender
 * @property array $permissions
 * @property string $email
 * @property string $password
 * @property integer|null $available_space
 * @property string|null $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string|null $last_four
 * @property int $confirmed
 * @property string|null $confirmation_code
 * @property string $avatar
 * @property-read string $display_name
 * @property-read bool $has_password
 * @property-read bool $is_admin
 * @property-read \Illuminate\Database\Eloquent\Collection|\Common\Auth\Roles\Role[] $roles
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, FormatsPermissions;

    protected $guarded = ['id'];
    protected $hidden = ['password', 'remember_token', 'pivot'];
    protected $casts = ['id' => 'integer', 'confirmed' => 'integer'];
    protected $appends = ['display_name', 'has_password'];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

    }

    /**
     * Roles this user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }


    /**
     * Get user avatar.
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        $value = $this->attributes['avatar'];

        // absolute link
        if ($value && str_contains($value, '//')) return $value;

        //relative link (for new and legacy urls)
        if ($value) {
            return str_contains($value, 'assets') ? url($value) : url("storage/$value");
        }

        // gravatar
        $hash = md5(trim(strtolower($this->email)));

        return "https://www.gravatar.com/avatar/$hash?s=65";
    }

    /**
     * Compile user display name from available attributes.
     *
     * @return string
     */
    public function getDisplayNameAttribute()
    {
        if ($this->first_name && $this->last_name) {
            return $this->first_name . ' ' . $this->last_name;
        } else if ($this->first_name) {
            return $this->first_name;
        } else if ($this->last_name) {
            return $this->last_name;
        } else {
            return explode('@', $this->email)[0];
        }
    }

    /**
     * Check if user has a password set.
     *
     * @return bool
     */
    public function getHasPasswordAttribute()
    {
        return isset($this->attributes['password']) && $this->attributes['password'];
    }

    /**
     * Check if user has a specified permission.
     *
     * @param string $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        $permissions = $this->permissions;

        return true;
    }

    public function setPermissionsAttribute($value)
    {
        $this->attributes['permissions'] = json_encode($value);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeCompact(Builder $query)
    {
        return $query->select('users.id', 'users.avatar', 'users.email', 'users.first_name', 'users.last_name', 'users.username');
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
