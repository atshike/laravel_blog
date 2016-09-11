<?php

use Illuminate\Database\Seeder;

class ColumnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('columns')->insert([
            'title' => 'Web前端',
            'type_id' => '0',
        ]);
        //2
        DB::table('columns')->insert([
            'title' => '程序开发',
            'type_id' => '0',
        ]);
        //3
        DB::table('columns')->insert([
            'title' => '数据库',
            'type_id' => '0',
        ]);
        //4
        DB::table('columns')->insert([
            'title' => 'Linux',
            'type_id' => '0',
        ]);
        //5
        DB::table('columns')->insert([
            'title' => 'CSS',
            'type_id' => '1',
        ]);
        //6
        DB::table('columns')->insert([
            'title' => 'Jquery',
            'type_id' => '1',
        ]);
        //7
        DB::table('columns')->insert([
            'title' => 'PHP',
            'type_id' => '2',
        ]);
        //8
        DB::table('columns')->insert([
            'title' => 'laravel',
            'type_id' => '2',
        ]);
        //9
        DB::table('columns')->insert([
            'title' => 'MySQL',
            'type_id' => '3',
        ]);
        //10
        DB::table('columns')->insert([
            'title' => 'CentOS',
            'type_id' => '4',
        ]);
    }
}
