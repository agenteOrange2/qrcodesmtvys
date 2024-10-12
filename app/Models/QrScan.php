<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrScan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'nombre', 
        'apellidos', 
        'puesto', 
        'empresa', 
        'telefono', 
        'rol', 
        'correo', 
        'campos_adicionales'
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');        
    }

    public function marcas() {
        return $this->belongsToMany(Marca::class, 'marca_qr_scan')->withPivot('comentarios'); // 'comentarios'
    }
}
