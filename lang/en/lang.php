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
        'categories' => [
            'read' => 'View categories',
            'write' => 'Manage categories',
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
        'voteresults' => [
            'read' => 'View vote results',
        ],
        'stakeholders' => [
            'read' => 'View stakeholders',
            'write' => 'Manage stakeholders',
        ],
        'settings' => [
            'write' => 'Manage settings',
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
            'singular' => 'Area'
        ],
        'votingsession' => [
            'attributes' => [
                'name' => 'Name',
                'description' => 'Description',
                'starts_at' => 'Starts at',
                'ends_at' => 'Ends at',
                'is_active' => 'Active session',
                'users_count' => 'Total voters',
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
                'deleted' => 'Your comment has been removed. You can now add a new comment.',
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
                    'select_programs_first' => 'Please vote the programs first.',
                ],
            ],
        ],
        'stakeholder' => [
            'plural' => 'Stakeholders',
            'attributes' => [
                'name' => 'Name',
                'role' => 'Role',
                'added_at' => 'Added at',
                'updated_at' => 'Updated at',
            ],
            'singular' => 'Stakeholder',
        ],
        'voteresult' => [
            'plural' => 'Vote results',
            'attributes' => [
                'rank' => 'Rank',
                'total_votes' => 'Total votes',
                'voting_period' => 'Voting period',
                'total_voters' => 'Number of voters'
            ],
            'messages' => [
                'no_data' => 'Choose country and voting session first',
                'choose_country' => 'Choose country',
                'choose_voting_session' => 'Choose voting session',
                'voters_by' => [
                    'age' => 'Voter by age',
                    'gender' => 'Voter by gender',
                    'area' => 'Voters by village'
                ]
            ],
            'actions' => [
                'print' => 'Print',
            ],
        ],
        'user' => [
            'attributes' => [
                'gender' => [
                    'label' => 'Gender',
                    'male' => 'Male',
                    'female' => 'Female',
                    'others' => 'Others',
                ],
                'age' => [
                    'label' => 'Age',
                    'others' => 'Others',
                    'unit' => 'years old'
                ],
            ],
        ],
    ],
    'menu' => [
        'voting' => 'Voting',
        'locations' => 'Locations',
        'vote_results' => 'Vote Results',
    ],
    'settings' => [
        'tab' => [
            'general' => 'General',
            'misc' => 'Miscellaneous',
            'footer' => 'Footer'
        ],
        'sections' => [
        ],
        'attributes' => [
            'general' => [
                'title' => 'Title',
                'slogan' => 'Slogan',
                'about' => 'About Us',
                'about_picture' => 'Picture (About Us)'
            ],
            'misc' => [
                'google_client_id' => 'Google OAuth 2.0 Client ID',
            ],
            'footer' => [
                'socmed_accounts' => 'Social media accounts',
                'socmed_accounts_attributes' => [
                    'platform' => 'Platform',
                    'name' => 'Name'
                ],
                'supporters' => 'Supporters',
                'supporters_attributes' => [
                    'logo' => 'Logo'
                ],
            ]
        ],
    ],
    'general' => [
        'internal_server_error' => 'Oops, Something went wrong. Please try again later.',
    ],
    'vote' => [
        'messages' => [
            'validations' => [
                'select_programs_first' => 'Please select the program you want to vote first.',
                'vote_not_started' => 'Please wait as the voting has not started yet.',
                'vote_ended' => 'The voting has ended.'
            ]
        ]
    ]
];