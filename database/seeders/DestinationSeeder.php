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


        $destination2 = new Destination();

        $destination2->name = "Machu Picchu";
        $destination2->location = "Perú";
        $destination2->reason = "Siempre he soñado con explorar las ruínas del Machu Picchu y maravillarme con su belleza y misterio";
        $destination2->image = "../../public/assets/img/machupicchu.jpg";
        $destination2->user_id = "1";

        $destination2->save();

    }
}
