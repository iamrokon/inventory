<?php

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
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Company',
            'username' => 'company',
            'email' => 'company@gmail.com',
            'password' => bcrypt('company'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Supplier',
            'username' => 'supplier',
            'email' => 'supplier@gmail.com',
            'password' => bcrypt('supplier'),
        ]);
    }
}
