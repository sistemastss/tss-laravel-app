<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class CapacidadEndeudamiento extends Model
{
    protected $table = 'capacidad_endeudamiento';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'servicio_esp_id',
        'descripcion',
        'entidad',
        'monto',
        'estado_deuda',
        'valor_mensual',
    ];

    protected function servicioEsp()
    {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }
}
