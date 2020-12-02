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
        App\Models\User::create([
            'name' => 'Ndinga-Melinho',
            'email' => 'ndingahermes@gmail.com',
            'password' => Hash::make('12345'),           
        ]);
    }
}
