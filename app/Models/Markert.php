<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Markert extends Model
{

    use HasFactory;

    protected $fillable = [
        'lat',
        'lng',
        'polygon_id',
    ];

    public function polygon()
    {
        return $this->belongsTo('App\Models\Polygon')->nullable();
    }
}