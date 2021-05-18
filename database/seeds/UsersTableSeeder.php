<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'name' => 'admin',
            'email' => 'admin@dws.es',
            'password' => bcrypt('secret'),
            'role_id' => 1
        ]);

        $count = 100;
        factory(User::class, $count)->create();
    }
}