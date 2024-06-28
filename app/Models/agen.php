<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class agen extends Model
{
    use HasFactory;

    protected $primaryKey = 'cin';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'cin',
        'nom',
        'prenom',
        'email',
        'date_naissance',
        'lieux_naissance',
        'adresse',
        'phone',
        'type',
        'situation_familiale',
        'nombre_enfants',
        'photo',
        'date_embauche',
        'Observation'
    ];
    public function diploms(){
        return $this->hasMany(diplom::class,'id');
    }
    public function conges()
    {
        return $this->hasMany(Conges::class, 'cin_ag', 'cin');
    }
}
