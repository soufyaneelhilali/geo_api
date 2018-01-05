<?php

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
        $user = new App\User();
        $user->firstname='MSAHAL';
        $user->lastname='Yasser';
        $user->email='yasserMsahal@gmail.com';
        $user->login='root';
        $user->type='SUPER_ADMIN';
        $user->password='password';
        $user->save();
        $user = new App\User();
        $user->firstname='Hilali';
        $user->lastname='Soufian';
        $user->email='soufian@gmail.com';
        $user->login='soufian';
        $user->type='ADMIN';
        $user->password='password';
        $user->save();
        $user = new App\User();
        $user->firstname='Elon';
        $user->lastname='Musk';
        $user->email='elon@gmail.com';
        $user->login='tesla';
        $user->type='USER';
        $user->password='password';
        $user->save();

    }
}
