<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $user = new User();
    
            $user->name = "Pepito Bonito";
            $user->email = "pepito@mail.com";
            $user->password = "1234";
    
            $user->save();

            
    }
}
