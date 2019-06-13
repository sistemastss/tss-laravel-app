<?php

namespace Modules\Esp\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Esp\Entities\VisitaDomiciliaria\VisitaDomiciliaria;
use Modules\Shared\Entities\ActividadAplicada;
use Modules\Shared\Entities\CentroCosto;
use Modules\Shared\Entities\Evaluado;

class Esp extends Model
{
    private const basico      = ['HJ', 'VA', 'VL', 'VDS'];
    private const integral    = ['HJ', 'VA', 'VL', 'VDS', 'PL'];
    private const avanzado    = ['HJ', 'VA', 'VL', 'VDS', 'PL', 'EF'];

    protected $guarded = [];

    public function getUpdateAtAttribute()
    {
        return $this->updated_at->format('Y-m-d H:i');
    }

    // protected $dateFormat = 'Y-m-d H:i';

    public function centroCosto()
    {
        return $this->belongsTo(CentroCosto::class);
    }

    public function actividades()
    {
        return $this->morphMany(ActividadAplicada::class, 'servicio');
    }

    public function evaluado()
    {
        return $this->morphOne(Evaluado::class, 'servicio');
    }

    public function visitaDomiciliaria()
    {
        return $this->hasOne(VisitaDomiciliaria::class);
    }

    public static function getActividades(string $tipoEsp) {
        switch ($tipoEsp) {
            case 'basico':
                return self::basico;

            case 'integral':
                return self::integral;

            case 'avanzado':
                return self::avanzado;

            default:
                return [];
        }
    }

    /*public function historialJudicial()
    {
        return $this->hasOne(HistorialJudicial::class, 'servicio_esp_id');
    }*/

    /**
     * visita domiciliaria relationships
     */
    /*public function verificacionDocumental()
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
    }*/


    /**
     *Verificacion laboral
     */

    /*public function verificacionLaboral()
    {
        return $this->hasMany(VerificacionLaboral:: class, 'servicio_esp_id');
    }*/

    /**
     *Verificacion academica
     */

    /*public function verificacionAcademica()
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
    }*/
}
