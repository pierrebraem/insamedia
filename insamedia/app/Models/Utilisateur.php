<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'compte';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id', 'nom', 'prenom', 'email', 'datenaissance', 'pseudo', 'mdp', 'photo', 'description', 'idrole'];

    public function sonRole(){
        return $this->belongsTo('App\Models\Role', 'idrole');
    }
}
