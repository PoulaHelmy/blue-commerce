<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d,f,rs,rt',
            'roles' => 'c,r,u,d,f,rs,rt',
            'categories' => 'c,r,u,d,f,rs,rt',
            'brands' => 'c,r,u,d,f,rs,rt',
            'products' => 'c,r,u,d,f,rs,rt',
            'profile' => 'r,u',

        ],
        'administrator' => [
            'categories' => 'c,r,u,d,f,rs,rt',
            'brands' => 'c,r,u,d,f,rs,rt',
            'products' => 'c,r,u,d,f,rs,rt',
            'profile' => 'r,u',
        ],
        'user' => [
            'profile' => 'r,u',
        ],
        'client' => [
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'a' => 'accept',
        'p' => 'prints_exports',
        'f' => 'forcedelete',
        'rs' => 'restore',
        'rt' => 'readtrashed'
    ]
];
