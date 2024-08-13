<?php return [
    'plugin' => [
        'name' => 'Voices4Budget Contents',
        'description' => '',
    ],
    'permissions' => [
        'countries' => [
            'read' => 'View countries',
            'write' => 'Manage countries',
        ],
        'areatypes' => [
            'read' => 'View area types',
            'write' => 'Manage area types',
        ],
        'programs' => [
            'read' => 'View programs',
            'write' => 'Manage programs',
        ],
        'subprograms' => [
            'read' => 'View subprograms',
            'write' => 'Manage subprograms',
        ],
        'areas' => [
            'read' => 'View areas',
            'write' => 'Manage areas',
        ],
        'votingsessions' => [
            'read' => 'View voting sessions',
            'write' => 'Manage voting sessions',
        ],
    ],
    'entity' => [
        'country' => [
            'plural' => 'Countries',
            'singular' => 'Country',
        ],
        'areatype' => [
            'plural' => 'Area types',
            'attributes' => [
                'name' => 'Name',
                'id' => 'ID',
                'description' => 'Description',
                'parent' => 'Parent',
            ],
            'singular' => 'Area type',
        ],
        'administrativearea' => [
            'plural' => 'Administrative areas',
        ],
        'category' => [
            'attributes' => [
                'title' => 'Title',
                'slug' => 'Slug',
                'description' => 'Description',
                'parent' => 'Parent category'
            ],
            'plural' => 'Categories',
            'singular' => 'Category',
        ],
        'program' => [
            'singular' => 'Program',
            'plural' => 'Programs',
            'attributes' => [
                'title' => 'Title',
                'slug' => 'Slug',
                'description' => 'Description',
                'goal' => 'Goal',
                'letter_index' => 'Letter Index',
            ],
        ],
        'area' => [
            'attributes' => [
                'name' => 'Name',
                'parent' => 'Parent',
            ],
            'plural' => 'Areas',
        ],
        'votingsession' => [
            'attributes' => [
                'name' => 'Name',
                'description' => 'Description',
                'starts_at' => 'Starts at',
                'ends_at' => 'Ends at',
            ],
            'plural' => 'Voting sessions',
            'singular' => 'Voting session'
        ],
    ],
    'menu' => [
        'voting' => 'Voting',
        'locations' => 'Locations',
    ],
];