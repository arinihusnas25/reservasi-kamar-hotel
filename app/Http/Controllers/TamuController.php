<?php

namespace App\Http\Controllers;
use App\Models\Tamu;
use Illuminate\Http\Request;
class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tamu = Tamu::all();
        return view('pages.tamu.index', compact('tamu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tamu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:tamu,email',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        Tamu::create($request->all());

        return redirect()->route('tamu.index')->with('success', 'Tamu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('pages.tamu.show', compact('tamu'));
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
