<?php

namespace App\Models;

use App\Models\Salario;
use App\Models\Candidato;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $casts = [
        'ultimo_dia' => 'date'];
    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];
    public function categoria() :BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
    public function salario() :BelongsTo
    {
        return $this->belongsTo(Salario::class);
    }
    public function candidatos() :HasMany
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at','DESC');
    }

    // Este codigo se sale de las convenciones para clarificar el rol concreto que el usuario ha de tener
    public function reclutador() :BelongsTo
    {   
        return $this->belongsTo(User::class,'user_id');
    }
}
