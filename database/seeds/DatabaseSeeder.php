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
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::statement("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE");

        $this->call(PostsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
