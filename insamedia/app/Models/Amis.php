<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Amis extends Model
{
    protected $table = 'amis';
    protected $primaryKey = 'idcompted';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['idcompted', 'idcompter', 'attente'];

    public function demendeur(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompted');
    }

    public function receveur(){
        return $this->belongsTo('App\Models\Utilisateur', 'idcompter');
    }
}