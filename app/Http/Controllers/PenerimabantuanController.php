<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Penerimabantuan;
use Illuminate\Http\Request;

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
                    ->orWhere('nokk', 'like', '%' . $keyword . '%');
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
}
