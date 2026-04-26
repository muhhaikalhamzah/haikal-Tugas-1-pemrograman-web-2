<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nokk','nik','namapenerima','jeniskelamin','alamat','pekerjaan','keterangan'])]
class Databantuan extends Model
{
    /** @use HasFactory<\Database\Factories\DatabantuanFactory> */
    use HasFactory;
}
