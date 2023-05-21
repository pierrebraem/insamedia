<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visibilite extends Model
{
    protected $table = 'visibilite';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id', 'libelle'];   
}