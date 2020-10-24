<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuerpo_dece extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // Nombre de la tabla en MySQL.
    protected $table='cuerpo_deces';
    
    // Eloquent asume que cada tabla tiene una clave primaria con una columna llamada id.
	// Si éste no fuera el caso entonces hay que indicar cuál es nuestra clave primaria en la tabla:
	protected $primaryKey = 'idPersona';

    // Para indicar que no hay autoincremento en la clave primaria
    public $incrementing = false;

    // Como no se hara operaciones con el numero de cedula
    // indicamos que es string
    protected $keyType = 'string';
    
    
    // Atributos que se pueden asignar de manera masiva.
    protected $fillable = [
        'idPersona','cargo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    // Aquí ponemos los campos que no queremos que se devuelvan en las consultas.
    protected $hidden = [
        'created_at','updated_at'
    ];


    // Definimos a continuación la relación de esta tabla con otras.
	// Ejemplos de relaciones:
	// 1 usuario tiene 1 teléfono   ->hasOne() Relación 1:1
	// 1 teléfono pertenece a 1 usuario   ->belongsTo() Relación 1:1 inversa a hasOne()
	// 1 post tiene muchos comentarios  -> hasMany() Relación 1:N 
	// 1 comentario pertenece a 1 post ->belongsTo() Relación 1:N inversa a hasMany()
	// 1 usuario puede tener muchos roles  ->belongsToMany()
    //  etc..
    
    
    public function Persona()
	{
		// $this hace referencia al objeto que tengamos en ese momento del Usuario
        return $this->belongsTo('App\persona','idPersona','idPersona');
    }

    public function Periodo_Lectivos()
	{
		// $this hace referencia al objeto que tengamos en ese momento del Usuario
        return $this->belongsToMany('App\periodo_lectivo','dece_lectivos','iPeriodoLectivo','idPersona');
    }

    public function Cuestionarios()
	{
		// $this hace referencia al objeto que tengamos en ese momento del Usuario
        return $this->hasMany('App\cuestionario','idPersona','idPersona');
    }
}
