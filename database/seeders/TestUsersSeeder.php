<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id'         => 2,
                'first_name' => 'Test1',
                'last_name'  => 'SSU',
                'username'   => 'test1.ssu',
                'is_active'  => true,
                'created_at' => '2026-07-01 04:42:49',
                'updated_at' => '2026-07-01 04:42:49',
                'password'   => '$2y$12$tROE9tGtRdcNZs86mgeew.KM3w59rp7qUU0j.J8/ZJbFGzVd48ig.',
            ],
            [
                'id'         => 3,
                'first_name' => 'Test2',
                'last_name'  => 'SSU',
                'username'   => 'test2.ssu',
                'is_active'  => true,
                'created_at' => '2026-07-01 04:42:49',
                'updated_at' => '2026-07-01 04:42:49',
                'password'   => '$2y$12$JCTGJi23wO1Et3lqr1RW2eQgBPFB5chbvD4SoHR10lAH9p2DUvRPu',
            ],
            [
                'id'         => 4,
                'first_name' => 'Test3',
                'last_name'  => 'SSU',
                'username'   => 'test3.ssu',
                'is_active'  => true,
                'created_at' => '2026-07-01 04:42:49',
                'updated_at' => '2026-07-01 04:42:49',
                'password'   => '$2y$12$cAFdpGyBfpkyEP2xYSjtyej6nlfr7iu1pWZwWmT6JagDA3uxNBM2u',
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(['id' => $user['id']], $user);
        }

        DB::statement("SELECT setval(pg_get_serial_sequence('users', 'id'), GREATEST((SELECT MAX(id) FROM users), 1))");
    }
}
