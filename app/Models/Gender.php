<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Leitura/Escrita/Atualização/Remoção (CRUD) com o Banco de Dados
class Gender extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    public function books() {
        return $this->hasMany(Book::class);
    }
}
