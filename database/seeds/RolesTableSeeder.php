<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Company',
            'slug' => 'company',
        ]);
        DB::table('roles')->insert([
            'name' => 'Supplier',
            'slug' => 'supplier',
        ]);
    }
}
