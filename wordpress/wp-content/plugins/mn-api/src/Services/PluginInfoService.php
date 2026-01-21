<?php
namespace MN\Api\Services;

use MN\Api\Repositories\PluginRepository;

final class PluginInfoService
{
    public static function get(): array
    {
        return (new PluginRepository())->all();
    }
}
