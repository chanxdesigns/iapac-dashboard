<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dashboard\User::create(
            [
                "username" => "chanx",
                "password" => Hash::make('nandapur'),
                "email" => "chppal50@gmail.com"
            ]
        );
    }
}
