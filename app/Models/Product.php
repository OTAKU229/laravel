<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Autoriser l'assignation de ces colonnes via create()
    protected $fillable = ['name', 'price'];
}
