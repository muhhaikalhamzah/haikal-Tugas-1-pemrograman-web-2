<?php

namespace App\Http\Controllers;

use App\Models\Databantuan;
use Illuminate\Http\Request;

class DatabantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('databantuan.index', [
        'title' => 'APLIKASI BANSOS',
        'databantuans' => Databantuan::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('databantuan.create',[
        'title' => 'Tambah Data Bantuan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nokk' => 'required|digits:11|numeric',
            'nik' => 'required|digits:11|numeric',
            'jeniskelamin' => 'required|in:Laki-Laki',
            'namapenerima' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ], [
        'nokk.required' => 'NOKK tidak boleh kosong',
        'nokk.digits' => 'NOKK wajib :digits',
        'nokk.numeric' => 'NOKK Wajib angka',
        'nik.required' => 'NIK Wajib diisi',
        'nik.digits' => 'NIK Wajib :digits digit',
        'nik.numeric' => 'NIK Wajib Angka',
        'jeniskelamin' => 'Wajib Ada',
        'namapenerima.required' => 'Tidak boleh kosong',
        'namapenerima.max' => 'Tidak boleh lebi dari :max karakter',
        'alamat.required' => 'Alamat Wajib di isi',
        'alamat.max' => 'Tidak Boleh Lebih dari :max karakter',
        'pekerjaan.required' => 'Pekerjaan Wajib Diisi',
        'pekerjaan.max' => 'Tidak boleh lebih dari :max karakter',
        'keterangan.required' => 'Keterangan wajib diisi',
        'keterangan.max' => 'Tidak boleh lebih dari :max karakter',
        ]);
    

    Databantuan::create($validated);
    return to_route('databantuan.index')->withSuccess('data berhasil ditambahkan');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Databantuan $databantuan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Databantuan $databantuan)
    {
     return view('databantuan.edit', [
        'title' => 'edit data bantuan',
        'databantuan' => $databantuan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, databantuan $databantuan)
    {
        $validated = $request->validate([
            'nokk' => 'required|digits:11|numeric',
            'nik' => 'required|digits:11|numeric',
            'jeniskelamin' => 'required|in:Laki-Laki',
            'namapenerima' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ], [
        'nokk.required' => 'NOKK tidak boleh kosong',
        'nokk.digits' => 'NOKK wajib :digits',
        'nokk.numeric' => 'NOKK Wajib angka',
        'nik.required' => 'NIK Wajib diisi',
        'nik.digits' => 'NIK Wajib :digits digit',
        'nik.numeric' => 'NIK Wajib Angka',
        'jeniskelamin' => 'Wajib Ada',
        'namapenerima.required' => 'Tidak boleh kosong',
        'namapenerima.max' => 'Tidak boleh lebi dari :max karakter',
        'alamat.required' => 'Alamat Wajib di isi',
        'alamat.max' => 'Tidak Boleh Lebih dari :max karakter',
        'pekerjaan.required' => 'Pekerjaan Wajib Diisi',
        'pekerjaan.max' => 'Tidak boleh lebih dari :max karakter',
        'keterangan.required' => 'Keterangan wajib diisi',
        'keterangan.max' => 'Tidak boleh lebih dari :max karakter',
        ]);
    

    $databantuan->update($validated);
    return to_route('databantuan.index')->withSuccess('data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(databantuan $databantuan)
    {
        //
    }
}
