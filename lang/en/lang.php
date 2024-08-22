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
        'comments' => [
            'read' => 'View comments',
            'write' => 'Manage comments',
        ],
        'ideas' => [
            'read' => 'View ideas',
            'write' => 'Manage ideas',
        ],
        'votes' => [
            'read' => 'View votes',
            'write' => 'Manage votes',
        ],
    ],
    'entity' => [
        'country' => [
            'plural' => 'Countries',
            'singular' => 'Country',
            'attributes' => [
                'is_default' => 'Default country',
            ],
            'comments' => [
                'is_default' => 'Voters will be assigned to this country if the country he is accessing the website from is not registered in this app',
            ],
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
                'parent' => 'Parent category',
                'max_vote' => 'Maximum vote',
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
                'is_active' => 'Active session',
            ],
            'plural' => 'Voting sessions',
            'singular' => 'Voting session',
            'comments' => [
                'is_active' => 'Making this session as active session means deactivating the current active session',
            ],
        ],
        'comment' => [
            'attributes' => [
                'user' => 'User',
                'program' => 'Program',
                'comment' => 'Comment',
                'created_at' => 'Added at',
                'updated_at' => 'Updated at',
            ],
            'plural' => 'Comments',
            'messages' => [
                'deleted' => 'Your comment has been removed. You can now add a new comment.'
            ],
        ],
        'idea' => [
            'plural' => 'Ideas',
            'attributes' => [
                'user' => 'User',
                'description' => 'Description',
                'created_at' => 'Added at',
                'updated_at' => 'Updated at',
            ],
            'messages' => [
                'validations' => [
                    'description.required' => 'Please fill in your idea first.',
                ],
            ],
        ],
        'vote' => [
            'plural' => 'Votes',
            'attributes' => [
                'user' => 'User',
                'created_at' => 'Voted at',
            ],
            'messages' => [
                'validations' => [
                    'select_programs_first' => 'Please vote the programs first.'
                ]
            ]
        ],
    ],
    'menu' => [
        'voting' => 'Voting',
        'locations' => 'Locations',
    ],
    'settings' => [
        'tab' => [
            'general' => 'General',
            'misc' => 'Miscellaneous',
        ],
        'sections' => [
        ],
        'attributes' => [
            'general' => [
                'title' => 'Title',
                'slogan' => 'Slogan',
            ],
            'misc' => [
                'google_client_id' => 'Google OAuth 2.0 Client ID',
            ],
        ],
    ],
];