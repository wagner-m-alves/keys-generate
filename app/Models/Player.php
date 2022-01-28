<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    # Traits
    use HasFactory;


    # Atributos
    protected $fillable = ['name'];


    # Relacionamentos
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function keys()
    {
        return $this->hasOne(Key::class);
    }
}
