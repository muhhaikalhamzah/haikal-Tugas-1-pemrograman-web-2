<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Desa::query();

        $keyword = request('keyword');

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_desa', 'like', '%' . $keyword . '%')
                    ->orWhere('kecamatan', 'like', '%' . $keyword . '%')
                    ->orWhere('kabupaten', 'like', '%' . $keyword . '%');
            });
        }

        if (request('nama_desa')) {
            $query->where('nama_desa', request('nama_desa'));
        }

        $desas = $query->latest()->paginate(10);

        $filterDesas = Desa::select('nama_desa')
            ->distinct()
            ->orderBy('nama_desa')
            ->get();

        return view('desa.index', [
            'title' => 'Data Desa',
            'desas' => $desas,
            'filterDesas' => $filterDesas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('desa.create', [
            'title' => 'Tambah Data Desa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'kabupaten' => 'required|max:255',
        ]);

        Desa::create($validated);

        return redirect()
            ->route('desa.index')
            ->with('success', 'Data desa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Desa $desa)
    {
        return view('desa.show', [
            'title' => 'Detail Desa',
            'desa' => $desa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desa $desa)
    {
        return view('desa.edit', [
            'title' => 'Edit Desa',
            'desa' => $desa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Desa $desa)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'kabupaten' => 'required|max:255',
        ]);

        $desa->update($validated);

        return redirect()
            ->route('desa.index')
            ->with('success', 'Data desa berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desa $desa)
    {
        $desa->delete();

        return redirect()
            ->route('desa.index')
            ->with('success', 'Data desa berhasil dihapus.');
    }
}
