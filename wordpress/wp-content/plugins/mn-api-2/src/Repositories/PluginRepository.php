<?php
namespace MN\Api\Repositories;

class PluginRepository
{
    public function all()
    {
        if (!function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        $plugins = get_plugins();
        $active  = get_option('active_plugins', []);
        $list = [];
        foreach ($plugins as $path => $plugin) {
            $list[] = [
                'name'    => $plugin['Name'],
                'version' => $plugin['Version'],
                'active'  => in_array($path, $active, true),
            ];
        }
        return $list;
    }
}
