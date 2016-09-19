<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder {

	public function run()
    {
        $hasher = app()->make('hash');        
        $password = $hasher->make('pass123');
        $api_token = sha1(time());

        DB::table('users')->delete();
        DB::table('users')->insert([
            'username' => 'rizan',
            'email' => 'qrizan@gmail.com',
            'password'=>$password,
            'api_token'=>$api_token
        ]);
    }
}