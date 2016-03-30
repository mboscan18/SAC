<?php

namespace SAC;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Carbon\Carbon;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Usuarios';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [ 
                                'identificacion_Usuario',   // Es el codigo de identificacion del usuario (Cedula, Pasaporte, etc).
                                'nombre_Usuario',           // Es el Nombre del Usuario
                                'apellido_Usuario',         // Es el Apellido del Usuario
                                'password',                 // Es el password mediante el cual el usuario podrá acceder al sistema.
                                'telefono_Usuario',         // Es el numero telefonico del usuario.
                                'sexo_Usuario',             // Es el sexo del Usuario (M o F)
                                'email',                    // Es el correo electronico del usuario.    
                                'rol_Usuario',              /* Es el rol que empleará el usuario en el sistema. 
                                                                Administrador: Todos los permisos.
                                                                Supervisor: Puede ver todas las tablas mas no editar.
                                                                Administrador de Contratos: Permisos en algunas tablas.
                                                                Administrador de Finanzas: Permisos en algunas tablas. */
                                'foto',                     // Foto del usuario.
                            ];

    public $timestamps = false;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['deleted_at'];
	
	public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }

    public function setFotoAttribute($foto){
       // return $logo;
        if(! empty($foto)){
            $name = 'Usuario-'
                    .Carbon::now()->timestamp.'-'
                    .Carbon::now()->second.'-'
                    .$foto->getClientOriginalName();
            $this->attributes['foto'] = $name;
            \Storage::disk('local')->put($name, \File::get($foto));
        }
    }   

    public function empresas()
    {
        return $this->hasMany('SAC\Empresas', 'usuario');
    }

    public function centrosCosto()
    {
        return $this->hasMany('SAC\CentrosCosto', 'usuario');
    }

     public function presupuestos()
    {
        return $this->hasMany('SAC\Presupuestos', 'usuario');
    }
}
