<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloquer extends Model
{
    protected $table = 'bloquer';
    protected $primaryKey = 'idcompted';
    public $timestamps = false;
    protected $fillable = ['idcompted', 'idcompter'];

    public function demendeur(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompted');
    }

    public function receveur(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompter');
    }
}