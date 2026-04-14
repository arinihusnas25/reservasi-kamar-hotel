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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tamu_id');
            $table->unsignedBigInteger('kamar_id');
            $table->date('tanggal_check_in');
            $table->date('tanggal_check_out');
            $table->decimal('total_harga', 10, 2);
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->foreign('tamu_id')->references('id')->on('tamu')->onDelete('cascade');
            $table->foreign('kamar_id')->references('id')->on('kamar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
