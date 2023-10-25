<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    use WithFileUploads;

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

    protected $rules = [
        'titulo' => ['required','string'],
        'salario' => ['required','integer'],
        'categoria' => ['required','integer'],
        'empresa' => ['required','string'],
        'ultimo_dia'=> ['required','date'], 
        'descripcion' => ['required','string'],
        'imagen' => ['required','image','max:2048']
    ];

    public function save() 
    {
        $datos = $this->validate();

        // Almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/','', $imagen);

        // Crear la vacante
        Vacante::create([
            'titulo'=> $datos['titulo'],
            'salario_id'=> $datos['salario'],
            'categoria_id'=> $datos['categoria'],
            'empresa'=> $datos['empresa'],
            'ultimo_dia'=> $datos['ultimo_dia'],
            'descripcion'=> $datos['descripcion'],
            'imagen'=> $datos['imagen'],
            'user_id'=> auth()->user()->id,
        ]);
        // Crear un mensaje
        session()->flash('mensaje',__('The job was published successfully'));
        // Redireccionar al dashboard con mensaje
        return redirect()->route('vacantes.index');
    }
        
    public function render()
    {
        // Consultar la DB
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            'salarios'=> $salarios,
            'categorias'=> $categorias,
        ]);
    }
}
