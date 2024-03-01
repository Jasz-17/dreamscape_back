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


        $destination2 = new Destination();

        $destination2->name = "Islas Maldivas";
        $destination2->location = "Océano índico";
        $destination2->reason = "Me encantaría relajarme en las playas de arena blanca y bucear en las aguas cristalinas de las Islas Maldivas";
        $destination2->image = "../../public/assets/img/maldivas.jpg";
        $destination2->user_id = "2";

        $destination2->save();


        $destination2 = new Destination();

        $destination2->name = "Tokio";
        $destination2->location = "Japón";
        $destination2->reason = "Me gustaría visitar Tokio para experimentar su fascinante fusión de tradición y modernidad, probar su deliciosa gastronomía y explorar sus animados barrios";
        $destination2->image = "../../public/assets/img/japon.jpg";
        $destination2->user_id = "3";

        $destination2->save();


        $destination2 = new Destination();

        $destination2->name = "Santorini";
        $destination2->location = "Isla griega";
        $destination2->reason = "Sueño con visitar Santorini para perderme en sus pintoriscos pueblos blancos, disfrutar de las impresionantes vistas del mar Egeo y contemplar sus hermosas puestas de sol";
        $destination2->image = "../../public/assets/img/santorini.jpg";
        $destination2->user_id = "4";

        $destination2->save();


        $destination2 = new Destination();

        $destination2->name = "Sydney";
        $destination2->location = "Australia";
        $destination2->reason = "Me encantaría visitar Sydney para explorar sus famosas playas, descrubrir su vibrante escena cultural y disfrutar de la belleza natural de la bahía de Sydney.";
        $destination2->image = "../../public/assets/img/sidney.jpg";
        $destination2->user_id = "5";

        $destination2->save();


        $destination2 = new Destination();

        $destination2->name = "Roma";
        $destination2->location = "Italia";
        $destination2->reason = "Quiero visitar Roma para sumergirme en su rica historia, explorar sus antiguos monumentos y disfrutar de la deliciosa comida italiana";
        $destination2->image = "../../public/assets/img/roma.jpg";
        $destination2->user_id = "6";

        $destination2->save();


        $destination2 = new Destination();

        $destination2->name = "New York";
        $destination2->location = "New York";
        $destination2->reason = "Quiero visitar New York para experimentar su energía vibrante, explorar sus famosos lugares de interés y sumergirme en su diversidad cultural";
        $destination2->image = "../../public/assets/img/new york.jpg";
        $destination2->user_id = "7";

        $destination2->save();

    }
}
