<?php namespace Common\Settings;

use Cache;
use Exception;
use Illuminate\Support\Collection;

class Settings
{

    /**
     * Collection of all application settings.
     *
     * @var Collection
     */
    private $all;

    /**
     * Create a new settings service instance.
     */
    public function __construct()
    {
        $this->loadSettings();
    }

    /**
     * Get all application settings.
     *
     * @return array
     */
    public function all()
    {
        $all = $this->all;

        return $all->pluck('value', 'name')->toArray();
    }

    /**
     * Get a setting by key or return default.
     *
     * @param string $key
     * @param string|null $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $value = $default;

        if ($setting = $this->find($key)) {
            $value = $setting->value;
        }

        return is_string($value) ? trim($value) : $value;
    }

    /**
     * Get a json setting by key and decode it.
     *
     * @param string $key
     * @param array|null $default
     * @return array
     */
    public function getJson($key, $default = null)
    {
        $value = $this->get($key, $default);
        if (!is_string($value)) return $value;
        return json_decode($value);
    }

    /**
     * Get random setting value from fields that
     * have multiple values separated by newline.
     *
     * @param string $key
     * @param string|null $default
     * @return mixed
     */
    public function getRandom($key, $default = null)
    {
        $key = $this->get($key, $default);
        $parts = explode("\n", $key);
        return $parts[array_rand($parts)];
    }

    /**
     * Check is setting with specified key exists.
     *
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return !is_null($this->find($key));
    }

    /**
     * Set single setting. Does not persist in database.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function set($key, $value)
    {
        if ($setting = $this->find($key)) {
            $setting->value = $value;
        } else {
            $this->all->push(
                new Setting(['name' => $key, 'value' => $value])
            );
        }
    }

    /**
     * Persist specified settings in database.
     *
     * @param array $data
     */
    public function save($data)
    {
        foreach ($data as $key => $value) {
            $this->set($key, $value);

            $setting = Setting::firstOrNew(['name' => $key]);
            $setting->value = !is_null($value) ? $value : '';
            $setting->save();
        }

        Cache::forget('settings.public');
    }


    /**
     * Decode settings string from base64 and json.
     *
     * @param $string
     * @return array
     */
    public function decodeSettingsString($string)
    {
        return json_decode(urldecode(base64_decode($string)), true);
    }

    /**
     * Find setting matching specified name.
     *
     * @param string $key
     * @return Setting|null
     */
    private function find($key)
    {
        return $this->all->first(function (Setting $setting) use ($key) {
            return $setting->name === $key;
        });
    }

    /**
     * Load settings from database.
     */
    private function loadSettings()
    {
        $this->all = Cache::remember('settings.public', 1440, function () {
            try {
                return Setting::all();
            } catch (Exception $e) {
                return collect();
            }
        });
    }
}
