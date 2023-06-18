<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signalement extends Model
{
    protected $table = 'signalement';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id', 'raison', 'idcompte', 'idpublication'];

    public function sonCompte(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompte');
    }

    public function saPublication(){
        return $this->belongsTo('App\Models\Publication', 'idpublication');
    }
}