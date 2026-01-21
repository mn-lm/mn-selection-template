<?php
namespace MN\Api\Services;

class WordPressInfoService
{
    public static function get()
    {
        return [
            'version' => get_bloginfo('version'),
            'siteurl' => get_site_url(),
            'homeurl' => get_home_url(),
        ];
    }
}
