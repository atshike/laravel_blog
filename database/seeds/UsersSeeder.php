<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'atshike',
            'email' => 'atshike@foxmail.com',
            //'password' => bcrypt('secret'),
            'password' => \Illuminate\Support\Facades\Crypt::encrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'atshike@foxmail.com',
            //'password' => bcrypt('secret'),
            'password' => \Illuminate\Support\Facades\Crypt::encrypt('1111'),
        ]);
    }
}
