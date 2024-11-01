<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    // Defina o nome da tabela, se não for a convenção padrão
    protected $table = 'packages';

    // Campos permitidos para mass assignment
    protected $fillable = [
        'titulo',
        'descricao',
        'valor',
        'vagas',
        'imagem',
    ];
}


