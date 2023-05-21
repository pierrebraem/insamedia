<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaire';
    protected $primaryKey = 'idpublication';
    public $timestamps = false;
    protected $fillable = ['idpublication', 'idcompte', 'commentaire'];

    public function publication(){
        return $this->belongsTo('App\Models\Publication', 'idpublication');
    }

    public function compte(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompte');
    }
}