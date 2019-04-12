<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroCosto extends Model
{
    protected $table = 'centro_costo';

    protected $fillable = [
        'usuario_id',
        'solicitante',
        'telefono_solicitante',
        'email_solicitante',
        'destino_factura',
        'tipo_sociedad',
        'tipo_identificacion',
        'numero_identificacion',
        'telefono_factura',
        'email_factura',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    function ordenCompra()
    {
        return $this->hasOne(OrdenCompra::class);
    }

    public function servicioEsp()
    {
        return $this->hasMany(ServicioEsp::class);
    }

    public function investigacion()
    {
        return $this->hasMany(Investigacion::class);
    }

    public function poligrafia()
    {
        return $this->hasMany(Poligrafia::class);
    }

}
