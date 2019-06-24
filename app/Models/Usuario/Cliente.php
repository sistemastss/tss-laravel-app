<?php

namespace App\Models\Usuario;

use App\Models\CentroCosto;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $guarded = [];

    protected $hidden = ['id', 'usuario_id'];

    protected $casts = [
        'sistema_gestion' => 'boolean',
    ];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function centroCosto()
    {
        return $this->hasMany(CentroCosto::class);
    }

    public function analista() {
        return $this->belongsTo(Usuario::class, 'analista_id');
    }
}
