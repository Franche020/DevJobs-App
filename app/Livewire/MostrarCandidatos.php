<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidato;
use Livewire\Attributes\On;

class MostrarCandidatos extends Component
{
    public $vacante;
    public $candidaturaId;

    #[On('actualizarVista')]
    public function actualizarVista($candidaturaId) {
        $candidatura = Candidato::find($candidaturaId);
        if($candidatura->vista === 0){
            $candidatura->vista = 1;
        } else {
            $candidatura->vista = 0;
        }
        $candidatura->save();
    }
    public function render()
    {
        return view('livewire.mostrar-candidatos');
    }
}
