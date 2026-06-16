<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('penerimabantuans', function (Blueprint $table) {
            $table->enum('status_penerima', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penerimabantuans', function (Blueprint $table) {
            $table->dropColumn('status_penerima');
            $table->dropSoftDeletes();
        });
    }
};
