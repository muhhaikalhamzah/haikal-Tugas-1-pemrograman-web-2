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
        $desas = Desa::latest();
        $keyword = request('keyword');
        if ($keyword) {
            $desas->where('nama_desa', 'like', '%' . '$keyword' . '%');
        }
        return view('desa.index', [
            'title' => 'Desa',
            'desas' => $desas->paginate(5),
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
            'kecamatan' => 'required',
            'kabupaten' => 'required',
        ], [
            'nama_desa.required' => 'Nama Desa Wajib diisi',
            'nama_desa.max' => 'Nama Desa Maksimal 255 karakter',
            'kecamatan.required' => 'Kecamatan Wajib diisi',
            'kecamatan.max' => 'Kecamatan Maksimal 255 karakter',
            'kabupaten.required' => 'Kabupaten Wajib diisi',
            'kabupaten.max' => 'Kabupaten Maksimal 255 karakter',

        ]);
        Desa::create($validated);
        return to_route('desa.index')->withSuccess('Desa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desa $desa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Desa $desa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desa $desa)
    {
        //
    }
}
