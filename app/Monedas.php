<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;

class Monedas extends Model
{
    protected $table="Monedas"; 

    public $timestamps = false;

	protected $fillable = 	[
								'country', 			// Es el pais en el que circula la moneda.
								'name',				// Es el nombre de la moneda.
								'symbol',			// Es el simbolo representativo de la moneda.
								'cc',				// Es el codigo iso de la moneda.
							];
							
}
