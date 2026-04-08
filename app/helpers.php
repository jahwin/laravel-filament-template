<?php

use App\Models\Content;

if (!function_exists('get_content')) {
    function get_content($key, $default = '')
    {
        return Content::getValue($key, $default);
    }
}
