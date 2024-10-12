<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];


    public function qrScans() {
        return $this->belongsToMany(QrScan::class, 'marca_qr_scan')->withPivot('comentarios'); // 'comentarios'
    }
}
