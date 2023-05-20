<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visibile extends Model
{
    protected $table = 'visibile';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id', 'libelle'];   
}