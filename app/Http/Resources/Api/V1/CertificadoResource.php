<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class CertificadoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nombre_completo'      => $this->nombre_completo,
            'tipo_doc'             => $this->tipo_doc,
            'documento'            => $this->documento,
            'fecha_creacion'       => Carbon::parse($this->fecha_creacion)->format('d, M. Y'),
            'departamento'         => $this->departamento,
            'ciudad'               => $this->ciudad,
            'empresa'              => $this->empresa,
            'curso'                => $this->curso,
            'codigo_certificado'   => $this->codigo_certificado,
        ];
    }
}
