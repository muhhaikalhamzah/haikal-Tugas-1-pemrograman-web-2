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
    }

    Databantuan::create($validated);
    return to_route('databantuan.index')->withSuccess('data berhasil ditambahkan');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Databantuan $databantuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Databantuan $databantuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, databantuan $databantuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(databantuan $databantuan)
    {
        //
    }
}
