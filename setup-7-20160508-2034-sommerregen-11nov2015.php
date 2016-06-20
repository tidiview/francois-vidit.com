<?php 
use Grav\Common\Filesystem\Folder;

// Get relative path from Grav root.
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : Folder::getRelativePath($_SERVER['REQUEST_URI'], dirname($_SERVER['SCRIPT_NAME']));
$name = Folder::shift($path);
$folder = "sites/{$name}";
$prefix = "/{$name}";

if (!$name || !is_dir(USER_DIR . "/$folder")) {
    return [];
}

$container['pages']->base($prefix);

return [
    'environment' => $name,
    'streams' => [
        'schemes' => [
            'site' => [
                'type' => 'ReadOnlyStream',
                'prefixes' => [
                    '' => ["user/$folder"],
                ]
            ],
            'user' => [
               'type' => 'ReadOnlyStream',
               'prefixes' => [
                   '' => ['site://'],
               ]
            ],
            'config' => [
                'type' => 'ReadOnlyStream',
                'prefixes' => [
                    '' => ['site://config', 'system/config'],
                ]
            ]
        ]
    ]
];