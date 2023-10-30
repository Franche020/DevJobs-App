<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;

class MostrarVacantes extends Component
{
    #[On('eliminarVacante')]
    public function eliminarVacante(Vacante $vacante){
        // Compruebo Policy
        $this->authorize('delete', $vacante);
        // Elimino Imagen
        $result = Storage::delete('public/vacantes/'.$vacante->imagen);
        // Elimino Vacante
        $vacante->delete();
    }
    
    //public $vacantes;
    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.mostrar-vacantes', [
            'vacantes'=> $vacantes
        ]);
    }
}   
