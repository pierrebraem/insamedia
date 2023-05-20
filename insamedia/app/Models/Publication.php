<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publication';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id', 'description', 'date', 'urlcontenu', 'idcompte', 'idvisibilite'];

    public function compte(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompte');
    }

    public function visibilite(){
        return $this->belongsTo('App\Models\Visibilite', 'idvisibilite');
    }
}