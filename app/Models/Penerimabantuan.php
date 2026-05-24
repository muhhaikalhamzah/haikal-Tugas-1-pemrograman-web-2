<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['nokk', 'desa_id', 'nik', 'nama_penerima', 'jenis_kelamin', 'alamat'])]
class Penerimabantuan extends Model
{
    /** @use HasFactory<\Database\Factories\PenerimabantuanFactory> */
    use HasFactory;
    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class);
    }
}
