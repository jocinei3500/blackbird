<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaProduto extends Model
{
    use HasFactory;
    protected $table='entradas_produtos';
    protected $fillable=[
        'produto_id',
        'fornecedor_id',
        'quantidade',
        'preco',
        'nota_fiscal',
        'descricao',
        'data'
    ];

    public function produto(){
        return $this->belongsTo('App\Models\Produto');
    }
}
