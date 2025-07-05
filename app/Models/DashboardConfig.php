<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class DashboardConfig extends Model
{
    use HasFactory;
    protected $table='dashboard_config';

    public function produto(){
        return $this->belongsTo(Produto::class);
    }

}
