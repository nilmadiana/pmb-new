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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('editor');
            $table->string('judul');
            $table->text('isi_berita');
            $table->string('gambar');
            $table->string('keterangan_gambar');
            $table->string('tanggal');
            $table->enum('Status',['Draft','Submit','Accept','Reject']);
            $table->string('tag')->nullable()->change();
            $table->string('comments')->nullable()->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
