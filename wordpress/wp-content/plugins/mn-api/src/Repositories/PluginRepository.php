<?php
namespace MN\Api\Repositories;

final class PluginRepository
{
    public function all(): array
    {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';

        $plugins = get_plugins();
        $active  = get_option('active_plugins', []);

        $result = [];

        foreach ($plugins as $path => $plugin) {
            $result[] = [
                'name'    => $plugin['Name'],
                'version' => $plugin['Version'],
                'active'  => in_array($path, $active, true),
            ];
        }

        return $result;
    }
}
