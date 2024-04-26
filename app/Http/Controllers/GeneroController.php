<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    private Genero $generos;
    /**
     * Display a listing of the resource.
     */
    public function index(Genero $generos)
    {
        $generos->this = Genero::all();
        return view('posts.index',compact($generos)); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = $this->generos->first();
        return response()->json($generos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Genero $generos)
    {
        $data = $request->validated();
        $generos->create($data);
        return response()->json($generos);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $generos = $this->generos->findOrFail($id);
        return response()->json($generos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $generos = $this->generos->findOrFail($id);
        $data = $request->validated();
        $generos->update($data);
        return response()->json($generos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $generos = $this->generos->findOrFail($id);
        $generos->delete();
        return response()->json(['message' => 'Genero exclído com sucesso!!']);
    }
}
