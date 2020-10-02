<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //
    protected $table = 'Estudiante';
    protected $primaryKey = 'IdEstudiante';
    protected $fillable = [
        'PrimerNombre',
        'SegundoNombre',
        'ApellidoPaterno',
        'ApellidoMaterno',
        'CiEstudiante',
        'Genero',
        'FechaNacimiento',
        'IdCurso'
    ];
    public $timestamps = false;

    public function curso(){
        return $this->belongsTo('App\Curso', 'IdCurso');
    }

    public function EvaluacionEstudiantes(){
        return $this->hasMany('App\EvaluacionEstudiante','IdEstudiante');
    }

    public function evaluaciones(){
        return $this->belongsToMany('App\Evaluacion', 'EvaluacionEstudiante','IdEstudiante','IdEvaluacion');
    }

}
