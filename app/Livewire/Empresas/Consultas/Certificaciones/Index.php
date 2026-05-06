<?php

namespace App\Livewire\Empresas\Consultas\Certificaciones;

use App\Models\Certificado;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public string $document = '';

    #[Computed]
    public function certificaciones()
    {
        if (empty($this->document)) {
            return [];
        }

        return Certificado::where('documento', $this->document)
            ->get()
            ->toArray();
    }

    public function consult()
    {
        $certificado = Certificado::where('documento', $this->document)
                ->get();

        $this->certificaciones = $certificado->toArray();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.empresas.consultas.certificaciones.index');
    }
}
