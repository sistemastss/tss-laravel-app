<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CentroCostoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'cliente'           => $this->cliente,
            'orden_compra'      => $this->when($this->ordenCompra, new OrdenCompraResource($this->ordenCompra)),
            'solicitante'       => $this->solicitante,
            'email_solicitante' => $this->email_solicitante,
            'destino_factura'   => $this->destino_factura,
            'tipo_sociedad'     => $this->tipo_sociedad,
            'tipo_documento'    => $this->tipo_documento,
            'documento'         => $this->documento,
            'telefono_factura'  => $this->telefono_factura,
            'email_factura'     => $this->email_factura,
        ];
    }
}
