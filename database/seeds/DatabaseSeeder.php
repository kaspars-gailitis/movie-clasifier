<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->insert([
            'group_name' => 'basic user',
        ]);
        DB::table('user_groups')->insert([
            'group_name' => 'administrator',
        ]);
        DB::table('user_groups')->insert([
            'group_name' => 'blocked user',
        ]);
    }
}
