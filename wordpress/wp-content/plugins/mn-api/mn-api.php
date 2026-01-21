<?php
/**
 * Plugin Name: MN API
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/src/Autoloader.php';

\MN\Api\Autoloader::register();

add_action('plugins_loaded', function () {
    if (!class_exists('\MN\Api\Plugin')) {
        error_log('MN API: Plugin class not found');
        return;
    }

    (new \MN\Api\Plugin())->boot();
});
