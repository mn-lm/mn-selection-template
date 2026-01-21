<?php
/**
 * Plugin Name: MN API
 * Description: REST API per informazioni di sistema WordPress
 * Version: 1.1.0
 */
if (!defined('ABSPATH')) exit;

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/src/Autoloader.php';

\MN\Api\Autoloader::register();

add_action('plugins_loaded', function () {
    (new \MN\Api\Plugin())->boot();
});
