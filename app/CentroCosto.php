<?php

namespace App;

use App\OrdenCompra;
use Illuminate\Database\Eloquent\Model;

class CentroCosto extends Model
{
    protected $table = 'centro_costo';

    protected $fillable = [
        'usuario_id',
        'solicitante',
        'email_solicitante',
        'telefono',
        'active'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    function ordenCompra()
    {
        return $this->hasOne(OrdenCompra::class, 'centro_costo_id');
    }

    function facturacion()
    {
        return $this->hasOne(Facturacion::class, 'centro_costo_id');

    }

    public function servicio()
    {
        return $this->hasOne(Servicio::class, 'centro_costo_id');
    }

}
