<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;
    protected $fillable=['empresa_id', 'nome', 'endereco'];

    public function empresa (){
        return $this->belongsTo(Empresa::class);
    }

 
}
