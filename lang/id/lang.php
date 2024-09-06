<?php return [
    'plugin' => [
        'name' => 'Konten Voices4Budget',
        'description' => '',
    ],
    'permissions' => [
        'countries' => [
            'read' => 'Lihat negara',
            'write' => 'Manage negara',
        ],
        'areatypes' => [
            'read' => 'Lihat tipe area',
            'write' => 'Manage tipe area',
        ],
        'programs' => [
            'read' => 'Lihat program',
            'write' => 'Manage program',
        ],
        'subprograms' => [
            'read' => 'Lihat sub-kategori',
            'write' => 'Manage sub-kategori',
        ],
        'areas' => [
            'read' => 'Lihat area',
            'write' => 'Manage area',
        ],
        'votingsessions' => [
            'read' => 'Lihat sesi voting',
            'write' => 'Manage sesi voting',
        ],
        'comments' => [
            'read' => 'Lihat komentar',
            'write' => 'Manage komentar',
        ],
        'ideas' => [
            'read' => 'Lihat ide',
            'write' => 'Manage ide',
        ],
        'votes' => [
            'read' => 'Lihat vote',
            'write' => 'Manage vote',
        ],
        'voteresults' => [
            'read' => 'Lihat hasil pemungutan suara',
        ],
        'stakeholders' => [
            'read' => 'Lihat stakeholder',
            'write' => 'Manage stakeholder',
        ],
    ],
    'entity' => [
        'country' => [
            'plural' => 'Negara',
            'singular' => 'Negara',
            'attributes' => [
                'is_default' => 'Negara default',
            ],
            'comments' => [
                'is_default' => 'Voter akan dihubungan dengan negara ini jika voter mengakses website dari negara yang tidak terdaftar pada sistem.',
            ],
        ],
        'areatype' => [
            'plural' => 'Jenis Area',
            'attributes' => [
                'name' => 'Nama',
                'id' => 'ID',
                'description' => 'Deskripsi',
                'parent' => 'Induk',
            ],
            'singular' => 'Jenis Area',
        ],
        'administrativearea' => [
            'plural' => 'Area administratif',
        ],
        'category' => [
            'attributes' => [
                'title' => 'Judul',
                'slug' => 'Slug',
                'description' => 'Deskripsi',
                'parent' => 'Kategori Induk',
                'max_vote' => 'Vote maksimum',
            ],
            'plural' => 'Kategori',
            'singular' => 'Kategori',
        ],
        'program' => [
            'singular' => 'Program',
            'plural' => 'Program',
            'attributes' => [
                'title' => 'Judul',
                'slug' => 'Slug',
                'description' => 'Deskripsi',
                'goal' => 'Tujuan',
                'letter_index' => 'Indeks Huruf',
            ],
        ],
        'area' => [
            'attributes' => [
                'name' => 'Nama',
                'parent' => 'Area Induk',
            ],
            'plural' => 'Area',
            'singular' => 'Area',
        ],
        'votingsession' => [
            'attributes' => [
                'name' => 'Name',
                'description' => 'Deskripsi',
                'starts_at' => 'Dimulai pada',
                'ends_at' => 'Selesai pada',
                'is_active' => 'Sesi aktif',
            ],
            'plural' => 'Sesi voting',
            'singular' => 'Sesi voting',
            'comments' => [
                'is_active' => 'Mengaktifkan sesi ini berarti menonaktifkan sesi aktif saat ini',
            ],
        ],
        'comment' => [
            'attributes' => [
                'user' => 'Voter',
                'program' => 'Program',
                'comment' => 'Komentar',
                'created_at' => 'Ditambahkan pada',
                'updated_at' => 'Diubah pada',
            ],
            'plural' => 'Komentar',
            'messages' => [
                'deleted' => 'Komentar anda telah dihapus. Anda dapat menambahkan komentar baru.',
            ],
        ],
        'idea' => [
            'plural' => 'Ide',
            'attributes' => [
                'user' => 'Voter',
                'description' => 'Deskripsi',
                'created_at' => 'Ditambahkan pada',
                'updated_at' => 'Diubah pada',
            ],
            'messages' => [
                'validations' => [
                    'description.required' => 'Mohon isi ide Anda terlebih dahulu.',
                ],
            ],
        ],
        'vote' => [
            'plural' => 'Suara',
            'attributes' => [
                'user' => 'Voter',
                'created_at' => 'Dikirim pada',
            ],
            'messages' => [
                'validations' => [
                    'select_programs_first' => 'Mohon pilih program terlebih dahulu.',
                ],
            ],
        ],
        'stakeholder' => [
            'plural' => 'Stakeholder',
            'attributes' => [
                'name' => 'Nama',
                'role' => 'Jabatan/Peran',
                'added_at' => 'Ditambahkan pada',
                'updated_at' => 'Diubah pada',
            ],
            'singular' => 'Stakeholder',
            
        ],
        'voteresult' => [
            'plural' => 'Hasil vote',
            'attributes' => [
                'rank' => 'Urutan',
                'total_votes' => 'Total suara',
                'voting_period' => 'Tanggal pemungutan suara'
            ],
            'messages' => [
                'no_data' => 'Pilih negara dan sesi voting terlebih dahulu',
                'choose_country' => 'Pilih negara',
                'choose_voting_session' => 'Pilih sesi voting',
            ],
            'actions' => [
                'print' => 'Cetak',
            ],
        ],
        'user' => [
            'attributes' => [
                'gender' => [
                    'label' => 'Jenis Kelamin',
                    'male' => 'Laki-laki',
                    'female' => 'Perempuan',
                    'others' => 'Lainnya',
                ],
                'age' => [
                    'label' => 'Usia',
                    'others' => 'Lainnya',
                ],
            ],
        ],
    ],
    'menu' => [
        'voting' => 'Voting',
        'locations' => 'Lokasi',
        'vote_results' => 'Hasil Vote',
    ],
    'settings' => [
        'tab' => [
            'general' => 'Umum',
            'misc' => 'Lain-lain',
        ],
        'sections' => [
        ],
        'attributes' => [
            'general' => [
                'title' => 'Judul',
                'slogan' => 'Slogan',
            ],
            'misc' => [
                'google_client_id' => 'Google OAuth 2.0 Client ID',
            ],
        ],
    ],
];