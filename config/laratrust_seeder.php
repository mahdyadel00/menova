<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'roles'             => 'c,r,u,d',
            'admins'            => 'c,r,u,d',
            'users'             => 'c,r,u,d',
            'projects_types'    => 'c,r,u,d',
            'domains'           => 'c,r,u,d',
            'projects'          => 'c,r,u,d',
            'contacts'          => 'c,r,u,d',
            'blogs'             => 'c,r,u,d',
            'topics'            => 'c,r,u,d',
            'discuss'           => 'c,r,u,d',
            'settings'          => 'c,r,u,d',
        ],
        'admin' => [],
        'investor' => [],
        'founder' => [],
        'student' => [],
        'freelancer' => [],
        'it_company' => [],
        'advisor' => [],
        'service_provider' => [],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];