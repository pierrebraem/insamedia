<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id', 'contenu', 'vu', 'date', 'idcompter', 'idcompteo', 'idpublication'];

    public function originaire(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompteo');
    }

    public function receveur(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompter');
    }
}