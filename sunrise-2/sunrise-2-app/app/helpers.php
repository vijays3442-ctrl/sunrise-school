<?php

use App\Services\PageImageRegistry;

if (! function_exists('page_image')) {
    function page_image(string $key): string
    {
        return app(PageImageRegistry::class)->url($key);
    }
}

if (! function_exists('page_image_alt')) {
    function page_image_alt(string $key): string
    {
        return app(PageImageRegistry::class)->alt($key);
    }
}
