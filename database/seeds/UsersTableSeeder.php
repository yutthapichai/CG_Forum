<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
          'name' => 'admin',
          'email' => 'admin@gmail.com',
          'admin' => 1,
          'password' => bcrypt('123456'),
          'avatar' => asset('avatar/avatar/yut.jpg')
        ]);

        App\User::create([
          'name' => 'Boom',
          'email' => 'boom@gmail.com',
          'password' => bcrypt('123456'),
          'avatar' => asset('avatar/avatar/yut.jpg')
        ]);
    }
}
