<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $value = [
        	'username' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => '$2y$10$WzRUjCpb5HLOehC.lRZkAeLdcuSDNc6Ou8QnlkhxbVn0XjK/XjAA6'
        ];

        User::insert($value);
    }
}
