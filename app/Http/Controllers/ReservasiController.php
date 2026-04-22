<?php

namespace App\Http\Controllers;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservasi = Reservasi::with(['user', 'kamar'])->get();
        return view('pages.reservasi.index', compact('reservasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.reservasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kamar_id' => 'required|exists:kamar,id',
            'tanggal_check_in' => 'required|date',
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
            'total_harga' => 'required|numeric',
        ],[
            'user_id.required' => 'User wajib dipilih.',
            'user_id.exists' => 'User tidak valid.',
            'kamar_id.required' => 'Kamar wajib dipilih.',
            'kamar_id.exists' => 'Kamar tidak valid.',
            'tanggal_check_in.required' => 'Tanggal check-in wajib diisi.',
            'tanggal_check_in.date' => 'Tanggal check-in tidak valid.',
            'tanggal_check_out.required' => 'Tanggal check-out wajib diisi.',
            'tanggal_check_out.date' => 'Tanggal check-out tidak valid.',
            'tanggal_check_out.after' => 'Tanggal check-out harus setelah tanggal check-in.',
            'total_harga.required' => 'Total harga wajib diisi.',
            'total_harga.numeric' => 'Total harga harus berupa angka.',
        ]);

        Reservasi::create($request->all());

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservasi = Reservasi::with(['user', 'kamar'])->findOrFail($id);
        return view('pages.reservasi.show', compact('reservasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('pages.reservasi.edit', compact('reservasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kamar_id' => 'required|exists:kamar,id',
            'tanggal_check_in' => 'required|date',
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
            'total_harga' => 'required|numeric',
        ],[
            'user_id.required' => 'User wajib dipilih.',
            'user_id.exists' => 'User tidak valid.',
            'kamar_id.required' => 'Kamar wajib dipilih.',
            'kamar_id.exists' => 'Kamar tidak valid.',
            'tanggal_check_in.required' => 'Tanggal check-in wajib diisi.',
            'tanggal_check_in.date' => 'Tanggal check-in tidak valid.',
            'tanggal_check_out.required' => 'Tanggal check-out wajib diisi.',
            'tanggal_check_out.date' => 'Tanggal check-out tidak valid.',
            'tanggal_check_out.after' => 'Tanggal check-out harus setelah tanggal check-in.',
            'total_harga.required' => 'Total harga wajib diisi.',
            'total_harga.numeric' => 'Total harga harus berupa angka.',
        ]);

        $reservasi = Reservasi::findOrFail($id);
        $reservasi->update($request->all());

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dihapus.');
    }
}
