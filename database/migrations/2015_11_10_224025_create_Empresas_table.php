<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empresas', function (Blueprint $table) {
            $table->string('codIdentificacion');	// Es el codigo de identificacion de la empresa (RIF).
            $table->string('nombre');				// Es el nombre de la empresa.
            $table->string('telefono')->nullable();	// Es el nro telefonico de la Empresa.
            $table->char('agenteRetencion',1);		// Indica si la empresa es agente de retencion especial. Si= "S", No="N"
            $table->string('logo')->nullable();		// Es el logo de la empresa.
            $table->string('usuario');				// Es el usuario que agrega la entrada en la tabla.
            $table->timestamps();					// Es la fecha y hora en la que se creo el registro en la tabla.
			
			$table->foreign('usuario')->references('identificacion')->on('Usuarios');
			$table->primary('codIdentificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Empresas');
    }
}
