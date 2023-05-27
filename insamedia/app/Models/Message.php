<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $primaryKey = 'idcompted';
    public $timestamps = false;
    protected $fillable = ['idcompted', 'idcompter', 'contenu', 'urlcontenu'];

    public function demendeur(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompted');
    }

    public function receveur(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompter');
    }
}