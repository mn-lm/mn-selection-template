<?php
namespace MN\Api\Services;

final class WordPressInfoService
{
    public static function get(): array
    {
        return [
            'version' => get_bloginfo('version'),
            'siteurl' => get_site_url(),
            'homeurl' => get_home_url(),
        ];
    }
}
