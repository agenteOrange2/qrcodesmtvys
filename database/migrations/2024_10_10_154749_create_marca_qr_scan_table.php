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
        Schema::create('marca_qr_scan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_scan_id')->constrained()->onDelete('cascade'); // Relacionar con los escaneos
            $table->foreignId('marca_id')->constrained()->onDelete('cascade'); // Relacionar con las marcas
            $table->text('comentarios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marca_qr_scan');
    }
};
