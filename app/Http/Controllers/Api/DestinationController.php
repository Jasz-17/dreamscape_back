<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Storage;

use App\Models\User;



class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $destinations = Destination::all();
            if ($destinations->isEmpty()) {
                return response()->json(['msg' => 'No hay destinos disponibles'], 404);
            }
            return response()->json($destinations, 200);
        } catch(\Exception $e) {
            return response()->json(['msg' => 'Error al recuperar destinos'], 500);
        }
    }

    public function getByPage()
    {
        $destinations = Destination::paginate(8);
    

    if (count($destinations) >= 1) {
        return response()->json($destinations, 200);
    }

    return response()->json(['msg' => 'No hay destinos']);
    }



    /**
     * Store a newly created resource in storage.
     */


     public function store(Request $request)
     {
         $request->validate([
            'name' => 'required',
            'reason' => 'required',
            'location' => 'required', 
            'image' => 'required',
         ]);
         $user = User::user();
 
         if ($user) {
             $destination = new Destination();
             $destination->name = $request->name;
             $destination->location = $request->location;
 
             $destination->description = $request->description;
 
  
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images');
                $destination->image_path = str_replace('public/', 'storage/', $imagePath);
            
             $user->destinations()->save($destination);
 
             return response()->json(['message' => 'Viaje se ha creado correctamente'], 201);
         } else {
             return response()->json(['message' => 'No autorizado'], 401);
         }
     }

    }

//     public function store(Request $request)
// {
//     $request->validate([
//         'name' => 'required',
//         'reason' => 'required',
//         'location' => 'required', 
//         'image' => 'required',
//         'user_id' => 'required|integer', // Validar user_id 
//     ]);


//     // $user_id = $request->input('user_id');
//     // $user_id = Auth::id();

//     // $imagePath = $request->file('image')->store('public/images');

//     $destination = Destination::create([
//         'name' => $request->input('name'),
//         'location' => $request->input('location'),
//         'reason' => $request->input('reason'),
//         'reason' => $request->input('image'),
//         // 'image' => Storage::url($imagePath),
//         // 'user_id' => $user_id,
//         'user_id' => $request->input('user_id'),
//     ]);

//     if ($destination) {
//         return response()->json(["message" => "Destino creado exitosamente"], 201);
//     } else {
//         return response()->json(["message" => "Error al crear el destino"], 500);
//     }
// }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $destination = Destination::find($id);

        if ($destination) {
            return response()->json($destination, 200);
        } else {
            return response()->json(['msg' => 'Destino no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'reason' => 'required',
            'location' => 'required', 
            'image' => 'required|url', 
            'user_id' => 'required|exists:users,id', 
        ]);

        $destination = Destination::findOrFail($id);

        if (!$destination) {
            return response()->json(["message" => "Destino no encontrado"],404);
        }

        $destination->name = $request->input('name');
        $destination->location = $request->input('location');
        $destination->reason = $request->input('reason');
        $destination->image = $request->input('image') ?? 'valor_por_defecto';
        $destination->user_id = $request->input('user_id');

        $destination->save();

        return response()->json($destination, 200);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    
        public function destroy(string $id)
        {
            $destination = Destination::find($id);
        
            if (!$destination) {
                return response()->json(["message" => "Destino no encontrado"], 404);
            }
        
            $destination->delete();
        
            return response()->json(["message" => "Destino eliminado exitosamente"], 200);
        }
        


    public function search(Request $request)
{
    $request->validate([
        'search' => 'required|string',
    ]);

    $searchTerm = $request->input('search');

    $destination = Destination::where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('location', 'like', '%' . $searchTerm . '%')
                    ->get();

                    if ($destination->isEmpty()) {
                        return response()->json(['message' => 'No se encontraron resultados'], 404);
                    }
                
                    return response()->json($destination);
}
}



