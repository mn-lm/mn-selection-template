<?php
namespace MN\Api\Rest\Controllers;

class ArchiveController
{
    public static function downloadWpContent()
    {
        $wp_content = WP_CONTENT_DIR;
        $tmp = wp_tempnam('wp-content.zip');

        $zip = new \ZipArchive();
        if ($zip->open($tmp, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
            return new \WP_Error('zip_error', 'Unable to create archive');
        }

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($wp_content, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($files as $file) {
            $path = $file->getRealPath();
            $relative = substr($path, strlen($wp_content) + 1);
            if ($file->isDir()) {
                $zip->addEmptyDir($relative);
            } else {
                $zip->addFile($path, $relative);
            }
        }

        $zip->close();

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename=wp-content.zip');
        header('Content-Length: ' . filesize($tmp));
        readfile($tmp);
        unlink($tmp);
        exit;
    }
}
