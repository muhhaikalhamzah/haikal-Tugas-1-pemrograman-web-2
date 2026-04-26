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
        Schema::create('databantuans', function (Blueprint $table) {
            $table->id();
            $table->string('nokk');
            $table->string('nik');
            $table->string('namapenerima');
            $table->string('jeniskelamin');
            $table->text('alamat');
            $table->string('pekerjaan');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databantuans');
    }
};
