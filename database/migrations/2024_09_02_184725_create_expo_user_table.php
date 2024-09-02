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
        Schema::create('expo_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expo_id')->constrained('expos')->onDelete('cascade'); // Aquí se asegura que se haga referencia a la tabla correcta
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Hace referencia a la tabla 'users'            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expo_user');
    }
};
