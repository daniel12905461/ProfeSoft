<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
    protected $table = 'Curso';
    protected $primaryKey = 'IdCurso';
    protected $fillable = [
        'Curso',
        'Grado',
        'Paralelo',
        'Campo',
        'Area',
        'fechaCreacion',
        'IdProfesor'
    ];

    public function profesor(){
        return $this->belongsTo('App\Profesor', 'IdProfesor');
    }

    public function estudiantes(){
        return $this->hasMany('App\Estudiante','IdCurso');
    }

    public function materias(){
        return $this->hasMany('App\Materia','IdCurso');
    }

    public function trimestres(){
        return $this->hasMany('App\Trimestre','IdCurso');
    }
}
