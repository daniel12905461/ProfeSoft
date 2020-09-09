<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    //
    protected $table = 'Profesor';
    protected $primaryKey = 'IdProfesor';
    protected $fillable = [
        'PrimerNombre',
        'SegundoNombre',
        'ApellidoPaterno',
        'ApellidoMaterno',
        'Usuario',
        'Contrasenia'
    ];

    public function cursos(){
        return $this->hasMany('App\Curso','IdProfesor');
    }
}
