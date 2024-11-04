<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'cpf', 'nome', 'sobrenome', 'telefone',
        'data_nascimento', 'cep', 'logradouro', 'numero',
        'complemento', 'bairro', 'cidade', 'estado'
    ];
}
