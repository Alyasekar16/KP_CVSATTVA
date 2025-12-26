<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomenAdminTable extends Migration
{
    public function up(): void
    {
        Schema::create('komen_admin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('komen_id');

            $table->text('balasan');
            $table->string('nama');

            $table->timestamps();
            $table->foreign('komen_id')
                ->references('id')
                ->on('komen')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komen_admin');
    }
};
