<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('notelepon');
            $table->enum('kategori', ['Kontruksi', 'Desain Arsitektur']);
            $table->enum('jenis', ['Rumah', 'Kantor', 'Kafe', 'Taman', 'Interior', 'Lainnya']);
            $table->enum('status', ['pending', 'diproses', 'selesai'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
