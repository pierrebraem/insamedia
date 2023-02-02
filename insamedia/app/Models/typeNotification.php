<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeNotification extends Model
{
    protected $table = "typenotification";
    public $timestamps = false;
    protected $fillable = ['id', 'libelle'];
}
