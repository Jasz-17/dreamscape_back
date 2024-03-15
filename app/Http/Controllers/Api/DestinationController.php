<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Storage;

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
        'image' => 'required|image', 
        'user_id' => 'required|exists:users,id', 
    ]);

    $imagePath = $request->file('image')->store('public/images');

    $destination = Destination::create([
        'name' => $request->input('name'),
        'location' => $request->input('location'),
        'reason' => $request->input('reason'),
        'image' => Storage::url($imagePath),
        'user_id' => $request->input('user_id'),
    ]);

    if ($destination) {
        return response()->json($destination, 201); 
    }

    return response()->json(["message" => "Problemas de registro"], 500);
}


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



