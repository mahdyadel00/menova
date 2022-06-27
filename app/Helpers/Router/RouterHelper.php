<?php

namespace App\Helpers\Router;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * Handling routes helpers functions.
 */
class RouterHelper
{
    /**
     * Include all routes files in folder.
     * Loop for each file in folder to require it.
     * 
     * @param string $folder
     * @return void
     */
    public static function includeRouteFiles(string $folder): void
    {
        $dirIterator = new RecursiveDirectoryIterator($folder);
        /** @var \RecursiveDirectoryIterator | \RecursiveIteratorIterator $it */
        $it = new RecursiveIteratorIterator($dirIterator);

        while ($it->valid()) {
            if (
                !$it->isDot() &&
                $it->isFile() &&
                $it->isReadable() &&
                $it->current()->getExtension() === 'php'
            ) {
                require $it->key();
            }
            $it->next();
        }
    }
}