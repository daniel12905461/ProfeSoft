<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    //
    protected $table = 'Evaluacion';
    protected $primaryKey = 'IdEvaluacion';
    protected $fillable = [
        'Evaluacion',
        'fechaCreacion',
        'IdDimencion',
        'IdMateria'
    ];

    public function dimencion(){
        return $this->belongsTo('App\Dimencion', 'IdDimencion');
    }

    public function materia(){
        return $this->belongsTo('App\Materia','IdMateria');
    }

    public function evaluacionEstudiantes(){
        return $this->hasMany('App\EvaluacionEstudiante','Evaluacion');
    }

    public function estudiantes(){
        return $this->belongsToMany('App\Estudiante', 'EvaluacionEstudiante','IdEvaluacion','IdEstudiante');
    }
}
