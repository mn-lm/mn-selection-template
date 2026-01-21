<?php
namespace MN\Api\Services;

use MN\Api\Repositories\PluginRepository;

class PluginInfoService
{
    public static function get()
    {
        return (new PluginRepository())->all();
    }
}
