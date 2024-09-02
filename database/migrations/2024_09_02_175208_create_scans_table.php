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
        Schema::create('scans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuario que realizó el escaneo
            $table->string('first_name');  // Nombre de la persona escaneada
            $table->string('last_name');   // Apellido de la persona escaneada
            $table->string('phone');       // Teléfono de la persona escaneada
            $table->string('email')->unique(); // Correo de la persona escaneada
            $table->string('company');     // Empresa de la persona escaneada
            $table->string('position');    // Puesto en la empresa
            $table->enum('expo_role', ['Expo Attendee', 'Exhibidor']); // Rol en la Expo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scans');
    }
};
