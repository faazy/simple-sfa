<?php

namespace Common\Helpers;

use Request;

/**
 * Common View Helper functions.
 *
 * @author shanuka
 */
class ViewHelper
{

    /**
     * Set active class for routes
     *
     * @param string|array $path path or path array
     * @param string $active active class name. default value is active.
     * @return string
     */
    public static function set_active($path, $active = 'active')
    {
        if (is_array($path)) {
            return in_array(Request::path(), $path) ? 'active' : '';
        }

        return (Request::is($path) && !Request::is($path . '/*')) ? $active : '';
    }

}
