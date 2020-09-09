<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trimestre extends Model
{
    //
    protected $table = 'Trimestre';
    protected $primaryKey = 'IdTrimestre';
    protected $fillable = [
        'Trimestre',
        'fechaCreacion',
        'IdCurso'
    ];

    public function curso(){
        return $this->belongsTo('App\Curso', 'IdCurso');
    }

    public function dimenciones(){
        return $this->hasMany('App\Dimencion','IdTrimestre');
    }
}
