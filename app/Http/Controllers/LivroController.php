<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    private Livro $livros;
    /**
     * Display a listing of the resource.
     */
    public function index(Livro $livros)
    {
        $this->livros = $livros; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $livros = $this->livros->first();
        return response()->json($livros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Livro $livros)
    {
        $data = $request->validated();
        $livros->create($data);
        return response()->json($livros);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livros = $this->livros->findOrFail($id);
        return response()->json($livros);
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
        $livros = $this->livros->findOrFail($id);
        $data = $request->validated();
        $livros->update($data);
        return response()->json($livros);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livros = $this->livros->findOrFail($id);
        $livros->delete();
        return response()->json(['message' => 'Livro exclído com sucesso!!']);
    }
}
