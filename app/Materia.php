<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    //
    protected $table = 'Materia';
    protected $primaryKey = 'IdMateria';
    protected $fillable = [
        'Materia',
        'fechaCreacion',
        'IdCurso'
    ];

    public function curso(){
        return $this->belongsTo('App\Curso', 'IdCurso');
    }

    public function evaluaciones(){
        return $this->hasMany('App\Evaluacion','IdDimencion');
    }

    public function dimenciones(){
        return $this->belongsToMany('App\Dimencion', 'Evaluacion', 'IdMateria', 'IdDimencion');
    }
}
