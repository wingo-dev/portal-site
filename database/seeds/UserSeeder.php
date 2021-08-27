<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'first_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '123456',
                'is_admin' => 1,
            ],
            [
                'first_name' => 'User',
                'email' => 'user@gmail.com',
                'password' => '123456',
                'is_admin' => 0,
            ]
        ];
        foreach($users as $user)
        {
            User::create([
                'first_name' => $user['first_name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'is_admin' => $user['is_admin']
            ]);
        }
    }
}
