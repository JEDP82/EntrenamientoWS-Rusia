<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            "name"=> "Juan",
            "last_name"=>"Deossa",
            "username"=>"jedp",
            "photo"=>"",
            "url_linkedin"=>"",
            "email"=>"juan@gmail.com",
            "password"=>bcrypt("123"),
            "token"=>""
        ]);
    }
}
