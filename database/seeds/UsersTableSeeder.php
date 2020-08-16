<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table("users")->insert([
            "name" => "florian",
            "email" => "test@email.com",
            "password" => bcrypt('P@ssw0rd')
        ]);
    }
}
