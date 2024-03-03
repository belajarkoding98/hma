<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_id' => '1',
                'user_fullname' => 'muhammad zahid',
                'user_email' => 'zahid@gmail.com',
                'user_status' => 1,
                'password' => bcrypt('qweqweqwe'),
                'created_at' => now(),
            ],
            [
                'user_id' => '2',
                'user_fullname' => 'faradila',
                'user_email' => 'faradila@gmail.com',
                'user_status' => 0,
                'password' => bcrypt('qweqweqwe'),
                'created_at' => now(),
            ],
        ]);
    }
}
