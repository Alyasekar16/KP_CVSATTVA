<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyekTable extends Migration
{
    public function up(): void
    {
        Schema::create('proyek', function (Blueprint $table) {
            $table->id('proyek_id');
            $table->string('namaproyek', 100);
            $table->enum('kategoriproyek', ['Kontruksi', 'Desain Arsitektur']);
            $table->enum('jenisproyek', ['Rumah', 'Kantor', 'Kafe', 'Taman', 'Interior', 'Lainnya']);
            $table->string('lokasi', 150);
            $table->string('klien', 100);
            $table->date('tanggalmulai');
            $table->date('tanggalselesai');
            $table->enum('status', ['sedang berjalan', 'selesai', 'perencanaan']);
            $table->text('deskripsi')->nullable();
            $table->string('gambarproyek')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};
