<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Penerimabantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerimabantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Penerimabantuan::with('desa');

        $keyword = request('keyword');
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_penerima', 'like', '%' . $keyword . '%')
                    ->orWhere('nokk', 'like', '%' . $keyword . '%')
                    ->orWhere('nik', 'like', '%' . $keyword . '%');
            });
        }

        if (request('alamat')) {
            $query->where('alamat', request('alamat'));
        }

        $penerimaBantuans = $query->latest()->paginate(10);

        $alamats = Penerimabantuan::select('alamat')
            ->distinct()
            ->orderBy('alamat')
            ->pluck('alamat');

        return view('penerimabantuan.index', [
            'title' => 'Data Penerima Bantuan',
            'penerimaBantuans' => $penerimaBantuans,
            'alamats' => $alamats,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::all();
        return view('penerimabantuan.create', [
            'title' => 'Tambah Data Penerima Bantuan',
            'desas' => $desas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'desa_id'         => 'required|exists:desas,id',
            'nokk'            => 'required|string|unique:penerimabantuans,nokk',
            'nik'             => 'required|string|unique:penerimabantuans,nik',
            'nama_penerima'   => 'required|string|max:255',
            'jenis_kelamin'   => 'required|in:Laki-Laki,Perempuan',
            'alamat'          => 'required|string|max:500',
            'status_penerima' => 'required|in:Aktif,Tidak Aktif',
        ], [
            'desa_id.required'         => 'Desa wajib dipilih',
            'nokk.required'            => 'NOKK tidak boleh kosong',
            'nokk.unique'              => 'NOKK sudah terdaftar',
            'nik.required'             => 'NIK tidak boleh kosong',
            'nik.unique'               => 'NIK sudah terdaftar',
            'nama_penerima.required'   => 'Nama penerima tidak boleh kosong',
            'jenis_kelamin.required'   => 'Jenis kelamin wajib dipilih',
            'alamat.required'          => 'Alamat wajib diisi',
            'status_penerima.required' => 'Status penerima wajib dipilih',
        ]);

        try {
            DB::beginTransaction();

            Penerimabantuan::create($validated);

            DB::commit();
            return redirect()
                ->route('penerimabantuan.index')
                ->with('success', 'Data penerima bantuan berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('penerimabantuan.create')
                ->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerimabantuan $penerimabantuan)
    {
        $desas = Desa::all();

        return view('penerimabantuan.edit', [
            'title' => 'Ubah Data Penerima Bantuan',
            'penerimabantuan' => $penerimabantuan,
            'desas' => $desas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerimabantuan $penerimabantuan)
    {
        $validated = $request->validate([
            'desa_id'         => 'required|exists:desas,id',
            'nokk'            => 'required|string|unique:penerimabantuans,nokk,' . $penerimabantuan->id,
            'nik'             => 'required|string|unique:penerimabantuans,nik,' . $penerimabantuan->id,
            'nama_penerima'   => 'required|string|max:255',
            'jenis_kelamin'   => 'required|in:Laki-Laki,Perempuan',
            'alamat'          => 'required|string|max:500',
            'status_penerima' => 'required|in:Aktif,Tidak Aktif',
        ], [
            'desa_id.required'         => 'Desa wajib dipilih',
            'nokk.unique'              => 'NOKK sudah terdaftar',
            'nik.unique'               => 'NIK sudah terdaftar',
            'nama_penerima.required'   => 'Nama penerima wajib diisi',
            'jenis_kelamin.required'   => 'Jenis kelamin wajib dipilih',
            'alamat.required'          => 'Alamat wajib diisi',
            'status_penerima.required' => 'Status penerima wajib dipilih',
        ]);

        try {
            DB::beginTransaction();

            $penerimabantuan->update($validated);

            DB::commit();
            return redirect()
                ->route('penerimabantuan.index')
                ->with('success', 'Data penerima bantuan berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('penerimabantuan.edit', $penerimabantuan)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerimabantuan $penerimabantuan)
    {
        $penerimabantuan->delete();
        return redirect()
            ->route('penerimabantuan.index')
            ->with('success', 'Data penerima bantuan berhasil dihapus.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerimabantuan $penerimabantuan)
    {
        return view('penerimabantuan.show', [
            'title' => 'Detail Penerima Bantuan',
            'penerimabantuan' => $penerimabantuan,
        ]);
    }

    /**
     * Display trashed resources.
     */
    public function trash()
    {
        return view('penerimabantuan.trash', [
            'title' => 'Trash Penerima Bantuan',
            'penerimaBantuans' => Penerimabantuan::onlyTrashed()->latest()->get()
        ]);
    }
}
