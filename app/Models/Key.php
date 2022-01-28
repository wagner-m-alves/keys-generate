<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    # Traits
    use HasFactory;


    # Atributos
    protected $fillable = ['player_id', 'pri_key', 'pub_key'];


    # Relacionamentos
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
