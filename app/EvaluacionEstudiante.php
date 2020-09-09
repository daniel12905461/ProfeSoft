<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionEstudiante extends Model
{
    //
    protected $table = 'EvaluacionEstudiante';
    protected $primaryKey = 'IdEvaluacionEstudiante';
    protected $fillable = [
        'NotaEvaluacion',
        'fechaCreacion',
        'IdEvaluacion',
        'IdEstudiante'
    ];

    public function estudiante(){
        return $this->belongsTo('App\Estudiante', 'IdEstudiante');
    }

    public function evaluacion(){
        return $this->belongsTo('App\Evaluacion','IdEvaluacion');
    }
}
