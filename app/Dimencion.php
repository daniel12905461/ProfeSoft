<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimencion extends Model
{
    //
    protected $table = 'Dimencion';
    protected $primaryKey = 'IdDimencion';
    protected $fillable = [
        'Dimencion',
        'fechaCreacion',
        'IdTrimestre'
    ];

    public function trimestre(){
        return $this->belongsTo('App\Trimestre', 'IdTrimestre');
    }

    public function evaluaciones(){
        return $this->hasMany('App\Evaluacion','IdDimencion');
    }

    public function materias(){
        return $this->belongsToMany('App\Materia', 'Evaluacion', 'IdDimencion', 'IdMateria');
    }
}
