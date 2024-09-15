<?php return [
    'plugin' => [
        'name' => 'Konten Voices4Budget',
        'description' => '',
    ],
    'permissions' => [
        'countries' => [
            'read' => 'Lihat negara',
            'write' => 'Tambah, ubah dan hapus negara',
        ],
        'areatypes' => [
            'read' => 'Lihat tipe area',
            'write' => 'Tambah, ubah dan hapus tipe area',
        ],
        'categories' => [
            'read' => 'LLihat categories',
            'write' => 'Tambah, ubah dan hapus categories',
        ],
        'programs' => [
            'read' => 'Lihat program',
            'write' => 'Tambah, ubah dan hapus program',
        ],
        'subprograms' => [
            'read' => 'Lihat sub-kategori',
            'write' => 'Tambah, ubah dan hapus sub-kategori',
        ],
        'areas' => [
            'read' => 'Lihat area',
            'write' => 'Tambah, ubah dan hapus area',
        ],
        'votingsessions' => [
            'read' => 'Lihat sesi voting',
            'write' => 'Tambah, ubah dan hapus sesi voting',
        ],
        'comments' => [
            'read' => 'Lihat komentar',
            'write' => 'Tambah, ubah dan hapus komentar',
        ],
        'ideas' => [
            'read' => 'Lihat ide',
            'write' => 'Tambah, ubah dan hapus ide',
        ],
        'votes' => [
            'read' => 'Lihat vote',
            'write' => 'Tambah, ubah dan hapus vote',
        ],
        'voteresults' => [
            'read' => 'Lihat hasil pemungutan suara',
        ],
        'stakeholders' => [
            'read' => 'Lihat stakeholder',
            'write' => 'Tambah, ubah dan hapus stakeholder',
        ],
        'settings' => [
            'write' => 'Ubah pengaturan',
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
                'users_count' => 'Jumlah voter',
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
                'voting_period' => 'Tanggal pemungutan suara',
                'total_voters' => 'Jumlah voter',
            ],
            'messages' => [
                'no_data' => 'Pilih negara dan sesi voting terlebih dahulu',
                'choose_country' => 'Pilih negara',
                'choose_voting_session' => 'Pilih sesi voting',
                'voters_by' => [
                    'age' => 'Voter berdasarkan rentang usia',
                    'gender' => 'Voter berdasarkan jenis kelamin',
                    'area' => 'Voter berdasarkan dusun',
                ],
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
                    'unit' => 'tahun',
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
            'footer' => 'Footer',
        ],
        'sections' => [
        ],
        'attributes' => [
            'general' => [
                'title' => 'Judul',
                'slogan' => 'Slogan',
                'about' => 'Tentang Kami',
                'about_picture' => 'Gambar (Tentang Kami)'
            ],
            'misc' => [
                'google_client_id' => 'Google OAuth 2.0 Client ID',
            ],
            'footer' => [
                'socmed_accounts' => 'Akun sosial media',
                'socmed_accounts_attributes' => [
                    'platform' => 'Platform',
                    'name' => 'Nama Akun',
                ],
                'supporters' => 'Supporters',
                'supporters_attributes' => [
                    'logo' => 'Logo',
                ],
            ],
        ],
    ],
    'general' => [
        'internal_server_error' => 'Ups, terjadi kesalahan. Mohon untuk mencoba kembali beberapa saat lagi.',
    ],
    'vote' => [
        'messages' => [
            'validations' => [
                'select_programs_first' => 'Mohon pilih program yang ingin Anda vote terlebih dahulu.',
                'vote_not_started' => 'Mohon untuk menunggu dikarenakan voting belum dimulai.',
                'vote_ended' => 'Voting telah berakhir.',
            ],
        ],
    ],
];