<?php

return [

    'image' => [
        'default' => env('APP_URL') . '/admin-assets/images/no-image.jpg'
    ],
    /**
     * Customize Data
     */
    'cdata' => [
        'model' => false,
        'title' => false,
        'route-name-prefix' => false,
        'description' => false,
        'subContent' => false,
        'back' => false,
        'addNew' => false,
        'browse' => false,
        'store' => false,
        'edit' => false,
        'update' => false,
        'tableHeaders' => [],
        'si' => 1,
        'breadcrumb' => [
            [
                'name' => 'Dashboard',
                'link' => false,
            ]
        ]
    ]
];
