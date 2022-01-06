<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDelivery extends Model
{
    use HasFactory;
    protected $fillable=['id', 'entrega', 'id_user', 'horas', 'description', 'saida'];
    protected $table='delivery';

    public function relUsers()
    {
        return $this->hasOne('App\Models\User','id','id_user');
    }
}

