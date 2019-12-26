<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'username' => 'maher',
                'email' => 'maher@maher.com',
                'password' => '123456',
                'role_id' => '2'
            ],
            [
                'username' => 'cis',
                'email' => 'cis@uqu.com',
                'password' => '123456',
                'role_id' => '1'
            ],
            [
                'username' => 'arabic',
                'email' => 'arabic@uqu.com',
                'password' => '123456',
                'role_id' => '1'
            ],
            [
                'username' => 'osama',
                'email' => 'osama@osama.com',
                'password' => '123456',
                'role_id' => '2'
            ]
        ]);
    }
}
