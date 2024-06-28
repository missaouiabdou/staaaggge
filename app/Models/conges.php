<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conges extends Model
{
    use HasFactory;

    protected $fillable = ['cin_ag', 'name', 'prenom', 'type', 'date_debut', 'date_fin', 'status','reste'];

    public function agen()
    {
        return $this->belongsTo(Agen::class, 'cin_ag', 'cin');
    }
}
