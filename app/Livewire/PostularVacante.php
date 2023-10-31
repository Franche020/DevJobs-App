<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\User;

class PostularVacante extends Component
{
    use WithFileUploads;
    #[Rule('required|mimes:pdf')] 
    public $cv;
    public $vacante;

    public function mount(Vacante $vacante)
    {
        // Funcion que asigna la vacante al controlador
        $this->vacante = $vacante;
    }
    public function postularme()
    {
        // Valida la candidatura
        $datos = $this->validate();

        // Guardar el CV
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/','', $cv);
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'CV' =>  $datos['cv']
        ]);
        // Enviar el email

        // Mostrar una notificacion
        session()->flash('mensaje','Se envió correctamente la Candidatura, mucha suerte');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
