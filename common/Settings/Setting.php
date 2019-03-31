<?php

namespace Common\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin \Eloquent
 */
class Setting extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    protected $fillable = ['name', 'value'];


    /**
     * Cast setting value to int, if it's a boolean number.
     *
     * @param string $value
     * @return int|string
     */
    public function getValueAttribute($value)
    {
        if ($value === '0' || $value === '1') {
            return (int)$value;
        }

        return $value;
    }
}
