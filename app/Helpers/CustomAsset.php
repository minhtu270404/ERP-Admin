<?php

if (!function_exists('asset')) {
    function asset($path, $secure = null)
    {
        return url('public/' . trim($path, '/'), [], $secure);
    }
}
