<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;
    protected $fillable=[
        'nome', 'descricao', 'marca_id',
         'unidade_medida_id', 'categoria_id',
          'estoque_minimo', 'estoque_ideal', 
          'estoque_maximo', 'estoque_atual',
          'lastro','teor_consumo'
        ];

    public function marca(){
        return $this->belongsTo('App\Models\Marca');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function unidade_medida(){
        return $this->belongsTo('App\Models\UnidadeMedida', 'unidade_medida_id', 'id');
    }

}
