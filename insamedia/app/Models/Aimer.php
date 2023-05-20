<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aimer extends Model
{
    protected $table = 'aimer';
    protected $primaryKey = 'idpublication';
    public $timestamps = false;
    protected $fillable = ['idpublication', 'idcompte'];

    public function publication(){
        return $this->belongsTo('App\Models\Publication', 'idpublication');
    }

    public function compte(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompte');
    }
}