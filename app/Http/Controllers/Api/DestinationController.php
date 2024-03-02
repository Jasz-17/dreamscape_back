<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::paginate(8);
        /* dd($destinations); */
       /*  Convertir el paginador a un array */
    $data = $destinations->toArray();
    $formattedResponse = [
        'current_page' => $data['current_page'],
        'data' => $data['data'],
    ];

    if (count($destinations) >= 1) {
        return response()->json($formattedResponse, 200);
    }

    return response()->json(['msg' => 'No hay destinos']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
