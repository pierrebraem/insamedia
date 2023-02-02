<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amis extends Model
{
    protected $table = 'amis';
    protected $primaryKey = 'idcompted';
    public $timestamps = false;
    protected $fillable = ['idcompted', 'idcompter', 'attente'];

    public function demendeur(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompted');
    }

    public function receveur(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompter');
    }
}