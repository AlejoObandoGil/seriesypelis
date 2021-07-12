<?php

use App\User;
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
        User::truncate();

        $user = new User;
        $user->name = 'Alejo';
        $user->email = 'jonalejo0803@gmail.com';
        $user->password = bcrypt('1234');
        $user->save();
    }
}
