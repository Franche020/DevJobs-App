<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use App\Livewire\HomeVacantes;

class FiltrarVacantes extends Component
{
    public $salario;
    public $categoria;
    public $termino;

    public function leerDatosFormulario(){

        $this->dispatch('buscar', 
            termino: $this->termino ?? '', 
            categoria: $this->categoria ?? 0, 
            salario: $this->salario ?? 0
            )->to(HomeVacantes::class);
    }
    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.filtrar-vacantes',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
