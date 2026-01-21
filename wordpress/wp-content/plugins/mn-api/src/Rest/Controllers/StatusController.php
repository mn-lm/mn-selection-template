<?php
namespace MN\Api\Rest\Controllers;

use MN\Api\Services\{
    WordPressInfoService,
    PhpInfoService,
    PluginInfoService
};

final class StatusController
{
    public static function handle(): array
    {
        return [
            'wordpress' => WordPressInfoService::get(),
            'php'       => PhpInfoService::get(),
            'plugins'   => PluginInfoService::get(),
        ];
    }
}
