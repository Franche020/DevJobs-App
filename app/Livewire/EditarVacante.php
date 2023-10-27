<?php

namespace App\Livewire;

use DateTime;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EditarVacante extends Component
{
    use WithFileUploads;
    public $id;
    #[Rule('required','string')]
    public $titulo;
    #[Rule('required','integer')]
    public $salario;
    #[Rule('required','integer')]
    public $categoria;
    #[Rule('required','string')]
    public $empresa;
    #[Rule('required','date')]
    public $ultimo_dia;
    #[Rule('required','string')]
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    protected $rules = [
        'titulo' => ['required','string'],
        'salario' => ['required','integer'],
        'categoria' => ['required','integer'],
        'empresa' => ['required','string'],
        'ultimo_dia'=> ['required','date'], 
        'descripcion' => ['required','string'],
        'imagen_nueva' => ['nullable','image','max:2048']
    ];

    public function mount(Vacante $vacante)
    {
        $this->id = $vacante->id;
         // Pasar los datos al formulario
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');;
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }
    public function save()
    {   
        // Validar los datos
        $datos = $this->validate();
        // Encontrar la vacante a editar
        $vacante = Vacante::find($this->id);
        // Si hay una nueva imagen
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/','', $imagen);
            // Elimina la imagen
            Storage::delete('public/vacantes/'.$vacante->imagen);
        }

        // Asignar los valores
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;
    
        // Guardar la vacante
        $vacante->save();
        // Redireccionar
        session()->flash('mensaje',__('The job was updated successfully'));
        // Redireccionar al dashboard con mensaje
        return redirect()->route('vacantes.index');
    }
    
    public function render()
    {
        // Consulta
        $salarios = Salario::all();
        $categorias = Categoria::all();


        return view('livewire.editar-vacante', [
            'salarios'=> $salarios,
            'categorias' => $categorias,
        ]);
    }
}
