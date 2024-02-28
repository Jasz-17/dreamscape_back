<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destination = new Destination();

        $destination->name = "París";
        $destination->location = "Francia";
        $destination->reason = "Me encantaría visitar París para disfrutar de su hermosa arquitectura y su romántico ambiente";
        $destination->image = "../../public/assets/img/paris.jpg";
        $destination->user_id = "1";

        $destination->save();

    }
}
