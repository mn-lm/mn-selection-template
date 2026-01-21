<?php
namespace MN\Api\Rest\Controllers;

class PageController
{
    public static function createTestPage()
    {
        $existing = get_page_by_path('test');
        if ($existing) {
            return ['status' => 'exists', 'page_id' => $existing->ID];
        }
        $page_id = wp_insert_post([
            'post_title'   => 'test',
            'post_name'    => 'test',
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => 'Pagina di test generata via API.',
        ]);
        return ['status' => 'created', 'page_id' => $page_id];
    }
}
