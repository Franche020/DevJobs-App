<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarVacante extends Component
{
    public $vacante;
    public $devAplicado;
    public function render()
    {   
        if(!$this->vacante->candidatos->where('user_id',auth()->user()->id)->all()){
            $this->devAplicado = false;
        } else {
            $this->devAplicado = true;
        }
        return view('livewire.mostrar-vacante');
    }
}
