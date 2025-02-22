<?php

use Illuminate\Support\Str;

if (! function_exists('genrateSlug')) {
    function genrateSlug(array $names) {
        $fullname = implode('-', $names);
        $slug = (trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $fullname)));
        $slug = $slug . '-' . time();
        return strtolower($slug);
    }
}