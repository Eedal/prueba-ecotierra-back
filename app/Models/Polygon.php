<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polygon extends Model
{

    use HasFactory;

    protected $fillable = [];


    public function markerts()
    {
        return $this->hasMany('App\Models\Markert');
    }
}