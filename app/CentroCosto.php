<?php

namespace App;

use App\OrdenCompra;
use Illuminate\Database\Eloquent\Model;

class CentroCosto extends Model
{
    protected $table = 'centro_costos';

    protected $fillable = [
        'usuario_id',
        'solicitante',
        'correo_solicitante',
        'active'
    ];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }


    function ordenCompra() {
        return $this->hasOne(OrdenCompra::class, 'centro_costo_id');
    }

    public function serviciosEsp()
    {
        return $this->hasMany(ServicioEsp::class, 'centro_costo_id');
    }

    public function investigaciones()
    {
        return $this->hasMany(Investigaciones::class, 'centro_costo_id');
    }

}
