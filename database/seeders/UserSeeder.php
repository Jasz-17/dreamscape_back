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
        $user->password = "123456";

        $user->save();

        $user1 = new User();
        $user1->name = "Juan Pérez";
        $user1->email = "juan.perez@mail.com";
        $user1->password = "123456";

        $user1->save();

        $user2 = new User();
        $user2->name = "María García";
        $user2->email = "maria.garcia@mail.com";
        $user2->password = "123456";

        $user2->save();

        $user3 = new User();
        $user3->name = "Laura Smith";
        $user3->email = "laura.smith@mail.com";
        $user3->password = "123456";

        $user3->save();

    }
}
