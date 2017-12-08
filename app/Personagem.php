<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personagem extends Model
{
    protected $fillable = [
        'nome',
        'classe',
        'alinhamento_moral',
        'hp',
        'armor',
        'iniciativa',
        'raca',
        'forca',
        'agilidade',
        'inteligencia',
        'constituicao',
        'sabedoria',
        'carisma',
        'destreza',
        'user_id'
    ];
}
