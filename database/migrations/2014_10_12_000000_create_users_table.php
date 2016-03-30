<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuarios', function (Blueprint $table) {
            $table->string('identificacion');		// Es el codigo de identificacion del usuario (Cedula, Pasaporte, etc).
            $table->string('nombre');				// Es el Nombre del Usuario
            $table->string('apellido');				// Es el Apellido del Usuario
            $table->string('telefono');				// Es el numero telefonico del usuario.
            $table->char('sexo',1);					// Es el sexo del Usuario (M o F)
            $table->string('rol');					// Es el rol que empleará el usuario en el sistema. (Administracion, Obras, Gerencia, Owner)
            $table->string('foto')->nullable();		// Foto del usuario.
            $table->string('email')->unique();		// Es el correo electronico del usuario. 	
            $table->string('password', 60);			// Es el password mediante el cual el usuario podrá acceder al sistema.
            $table->timestamps();					// Es la fecha y hora en la que se creo el registro en la tabla.
            $table->rememberToken();
			
			$table->primary('identificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Usuarios');
    }
}
