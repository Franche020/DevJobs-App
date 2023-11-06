<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Illuminate\Contracts\Database\Eloquent\Builder;

class HomeVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;
    
    #[On('buscar')]
    public function buscar(string $termino, int $categoria, int $salario)
    {   
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }
    public function render(): View
    {
        //$vacantes = Vacante::all();

        $vacantes = Vacante::when($this->termino, function(Builder $query) {
            $query->where('titulo', 'LIKE',"%" . $this->termino ."%");
        })
        ->when($this->termino, function(Builder $query) {
            $query->orWhere('empresa', 'LIKE',"%" . $this->termino ."%");
        })
        ->when($this->categoria, function (Builder $query) {
            $query->where('categoria_id' , $this->categoria);
        })
        ->when($this->salario , function (Builder $query) {
            $query->where('salario_id', $this->salario);
        })
        ->paginate(10);

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
