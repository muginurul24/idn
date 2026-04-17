<?php

use Symfony\Component\Finder\SplFileInfo;

return [
    [
        // Define a source directory for the sets like a node_modules/ or vendor/ directory...
        'source' => __DIR__.'/../node_modules/heroicons/outline',

        // Define a destination directory for your icons. The below is a good default...
        'destination' => __DIR__.'/../resources/svg',

        // Strip an optional prefix from each source icon name...
        'input-prefix' => 'o-',

        // Set an optional prefix to applied to each destination icon name...
        'output-prefix' => 'o-',

        // Strip an optional suffix from each source icon name...
        'input-suffix' => '-o',

        // Set an optional suffix to applied to each destination icon name...
        'output-suffix' => '-o',

        // Enable "safe" mode which will prevent deletion of old icons...
        'safe' => true,

        // Call an optional callback to manipulate the icon with the pathname of the icon,
        // the settings from above and the original icon file instance...
        'after' => '',
    ],

    // More icon sets...
];
