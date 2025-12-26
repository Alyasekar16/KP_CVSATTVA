<?php

use App\Models\komen;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomenTable extends Migration
{
    public function up(): void
    {
        Schema::create('komen', function (Blueprint $table) {
            $table->id('komen_id');
            $table->unsignedBigInteger('proyek_id');

            $table->string('nama');
            $table->string('email');
            $table->tinyInteger('rating')->nullable();
            $table->text('isi');

            $table->timestamps();

            $table->foreign('proyek_id')
                ->references('proyek_id')
                ->on('proyek')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komen');
    }
};
