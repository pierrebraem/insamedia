<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bannissement extends Model
{
    protected $table = 'bannissement';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id', 'raison', 'finban', 'idcompte'];

    public function sonCompte(){
        return $this->belongsTo('App\Models\Banissement', 'idcompte');
    }
}