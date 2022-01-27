<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    # Traits
    use HasFactory;


    # Atributos
    protected $fillable = ['user_id', 'pri_key', 'pub_key'];


    # Relacionamentos
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
