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
        $destination->image = "http://localhost:8000/img/paris.jpg"; 
        $destination->user_id = "1";

        $destination->save();


        $destination1 = new Destination();

        $destination1->name = "Machu Picchu";
        $destination1->location = "Perú";
        $destination1->reason = "Siempre he soñado con explorar las ruínas del Machu Picchu y maravillarme con su belleza y misterio";
        $destination1->image = "http://localhost:8000/img/machupicchu.jpg";
        $destination1->user_id = "1";

        $destination1->save();


        $destination2 = new Destination();

        $destination2->name = "Islas Maldivas";
        $destination2->location = "Océano índico";
        $destination2->reason = "Me encantaría relajarme en las playas de arena blanca y bucear en las aguas cristalinas de las Islas Maldivas";
        $destination2->image = "http://localhost:8000/img/maldivas.jpg";
        $destination2->user_id = "2";

        $destination2->save();


        $destination3 = new Destination();

        $destination3->name = "Tokio";
        $destination3->location = "Japón";
        $destination3->reason = "Me gustaría visitar Tokio para experimentar su fascinante fusión de tradición y modernidad, probar su deliciosa gastronomía y explorar sus animados barrios";
        $destination3->image = "http://localhost:8000/img/japon.jpg";
        $destination3->user_id = "2";

        $destination3->save();


        $destination4 = new Destination();

        $destination4->name = "Santorini";
        $destination4->location = "Grecia";
        $destination4->reason = "Sueño con visitar Santorini para perderme en sus pintoriscos pueblos blancos, disfrutar de las impresionantes vistas del mar Egeo y contemplar sus hermosas puestas de sol";
        $destination4->image = "http://localhost:8000/img/santorini.jpg";
        $destination4->user_id = "2";

        $destination4->save();


        $destination5 = new Destination();

        $destination5->name = "Sydney";
        $destination5->location = "Australia";
        $destination5->reason = "Me encantaría visitar Sydney para explorar sus famosas playas, descrubrir su vibrante escena cultural y disfrutar de la belleza natural de la bahía de Sydney.";
        $destination5->image = "http://localhost:8000/img/sidney.jpg";
        $destination5->user_id = "3";

        $destination5->save();


        $destination6 = new Destination();

        $destination6->name = "Roma";
        $destination6->location = "Italia";
        $destination6->reason = "Quiero visitar Roma para sumergirme en su rica historia, explorar sus antiguos monumentos y disfrutar de la deliciosa comida italiana";
        $destination6->image = "http://localhost:8000/img/roma.jpg";
        $destination6->user_id = "3";

        $destination6->save();


        $destination7 = new Destination();

        $destination7->name = "New York";
        $destination7->location = "Estados Unidos";
        $destination7->reason = "Quiero visitar New York para experimentar su energía vibrante, explorar sus famosos lugares de interés y sumergirme en su diversidad cultural";
        $destination7->image = "http://localhost:8000/img/new_york.jpg";
        $destination7->user_id = "3";

        $destination7->save();
    }
}
