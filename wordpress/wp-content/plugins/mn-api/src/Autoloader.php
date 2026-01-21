<?php
namespace MN\Api;

final class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $prefix = 'MN\\Api\\';
            $baseDir = __DIR__ . '/';

            if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
                return;
            }

            $relative = substr($class, strlen($prefix));
            $file = $baseDir . str_replace('\\', '/', $relative) . '.php';

            if (file_exists($file)) {
                require_once $file;
            }
        });
    }
}
