<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioEsp extends Model
{
    //
    /**
     * @var string
     */
    protected $table = 'servicios_esp';


    /**
     * @var array
     */
    protected $fillable = [
        'centro_costo_id',
        'descripcion',
        'ciudad_desarrollo',
        'nombre',
        'documento',
        'departamento',
        'ciudad',
        'telefono',
        'email',
        'observaciones',
        'anexo',
        'estado',
    ];


    public function scopeActive($query, $value = true)
    {
        return $query->where('active', $value);
    }


    public function centroCosto()
    {
        return $this->belongsTo(CentroCosto::class, 'centro_costo_id');
    }


    public function actividadAplicada()
    {
        return $this->hasMany(ActividadAplicada::class, 'servicio_esp_id');
    }


    public function personaEvaluada()
    {
        return $this->hasOne(PersonaEvaluada::class, 'servicio_esp_id');
    }


    public function historialJudicial()
    {
        return $this->hasOne(HistorialJudicial::class, 'servicio_esp_id');
    }

    /**
     * visita domiciliaria relationships
     */
    public function verificacionDocumental()
    {
        return $this->hasOne(VerificacionDocumental::class, 'servicio_esp_id');
    }


    public function estadoSalubridad()
    {
        return $this->hasOne(EstadoSalubridad::class, 'servicio_esp_id');
    }


    public function nucleoFamiliar()
    {
        return $this->hasOne(NucleoFamiliar::class, 'servicio_esp_id');
    }


    public function hijos()
    {
        return $this->hasMany(Hijo::class, 'servicio_esp_id');
    }

    public function informacionFamiliar()
    {
        return $this->hasMany(InformacionFamiliar::class, 'servicio_esp_id');
    }

    public function referencias()
    {
        return $this->hasMany(Referencia::class, 'servicio_esp_id');
    }


    public function entornoHabitacional()
    {
        return $this->hasOne(EntornoHabitacional::class, 'servicio_esp_id');
    }


    public function modusVivendi()
    {
        return $this->hasOne(ModusVivendi::class, 'servicio_esp_id');
    }

    public function bienesInmuebles()
    {
        return $this->hasMany(BienesInmuebles::class, 'servicio_esp_id');
    }

    public function bienesMuebles()
    {
        return $this->hasMany(BienesMuebles::class, 'servicio_esp_id');
    }

    public function referenciasBancarias()
    {
        return $this->hasMany(ReferenciaBancaria::class, 'servicio_esp_id');
    }

    public function capacidadEndeudamiento()
    {
        return $this->hasMany(CapacidadEndeudamiento::class, 'servicio_esp_id');
    }


    /**
     *Verificacion laboral
     */

    public function verificacionLaboral()
    {
        return $this->hasMany(VerificacionLaboral:: class, 'servicio_esp_id');
    }

    /**
     *Verificacion academica
     */

    public function verificacionAcademica()
    {
        return $this->hasMany(VerificacionAcademica:: class, 'servicio_esp_id');
    }



    public function decaDactilar()
    {
        return $this->hasOne(DecaDactilar::class, 'servicio_esp_id');
    }


    public function dictamenGrafologico()
    {
        return $this->hasOne(DictamenGrafologico::class, 'servicio_esp_id');
    }


    public function pruebaPsicotecnica()
    {
        return $this->hasOne(PruebaPsicotecnica::class, 'servicio_esp_id');
    }


    public function evaluacionFinanciera()
    {
        return $this->hasMany(EvaluacionFinanciera:: class, 'servicio_esp_id');
    }


    public function cuentasBancarias()
    {
        return $this->hasMany(CuentaBancaria:: class, 'servicio_esp_id');
    }

    public function obligacionesExtinguidas()
    {
        return $this->hasMany(ObligacionExtinguida:: class, 'servicio_esp_id');
    }

    public function obligacionesMora()
    {
        return $this->hasMany(ObligacionMora:: class, 'servicio_esp_id');
    }

    public function obligacionesVigentes()
    {
        return $this->hasMany(ObligacionVigente:: class, 'servicio_esp_id');
    }

    public function obligacionesVigentesReal()
    {
        return $this->hasMany(ObligacionVigenteReal:: class, 'servicio_esp_id');
    }






    public function consolidado()
    {
        return $this->hasMany(Consolidado:: class, 'servicio_esp_id');
    }
}
