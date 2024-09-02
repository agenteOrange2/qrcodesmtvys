<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'start_date', 'end_date'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'expo_user');
    }
}
