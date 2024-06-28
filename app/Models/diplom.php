<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diplom extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'niveau',
        'institution',
        'filliere',
        'date_obtenu',
        'mention','cin','ID_Dipolm','photo'
    ];
    public function agen(){
        return $this->belongsTo(agen::class,'cin');
}}
