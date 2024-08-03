<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 0, 
            'role' => 1, 
            'fullname' => 
            'super-admin',
            'username' => 'admin'
            ]);
        // password : admin
    }
}
