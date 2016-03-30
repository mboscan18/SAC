<?php

namespace SAC;

use Illuminate\Database\Eloquent\Model;

class Procedimientos extends Model
{
    /*
     * Devuelve una cadena de caracteres separada en subcadenas del tamaño indicado por tam
     */
    public static function stringSeparado($str, $tam)
    {
        $stringSeparado = array();

        $cont = 0;
        $i=0;
        $salida = 0;
        while($salida == 0){ 
            if (strlen($str) <= $tam) {
                $stringSeparado[$cont] = $str;
                $salida = 1;
            }else{
                $salida2 = 0;
                $cadenaTemp = '';
                $j = 0;
                while ($salida2 == 0) {
                    $cadenaTemp = $cadenaTemp . $str[$j];
                   // echo $cadenaTemp;
                    if (($j == $tam) || ($j == strlen($str))) {
                        $cadenaTemp = str_replace(chr(10), " ", $cadenaTemp);
                    	for ($c = 0; $c <= 31; ++$c) { 
                            $cadenaTemp = str_replace(chr($i), "", $cadenaTemp); 
                        }
                        $cadenaTemp = str_replace(chr(127), "", $cadenaTemp);
                        if (strcmp($cadenaTemp[$j]," ") == 0) {
                          //  echo 1;
                            $stringSeparado[$cont] = $cadenaTemp;
                            $cont++;
                            $salida2 = 1;

                            $str = substr($str, -(strlen($str) - $j));
                        }else{
                         //   echo 2;
                            $sw = 0;
                            while ($sw == 0) {
                                if (strcmp($cadenaTemp[$j]," ") == 0) {
                                   // echo 'aqui Fue ';
                                    $cadenaTemp[$j] = "";
                                    for ($c = 0; $c <= 31; ++$c) { 
                                        $cadenaTemp = str_replace(chr($i), "", $cadenaTemp); 
                                    }
                                    $cadenaTemp = str_replace(chr(127), "", $cadenaTemp);
                                    $stringSeparado[$cont] = $cadenaTemp;
                                    $cont++;
                                    $sw = 1;
                                    $salida2 = 1;
                                }else{
                                   // echo 'no fue ';
                                    $cadenaTemp[$j] = "";
                                    $j--;
                                    $salida2 = 1;
                                }
                            }
                        //return $cadenaTemp;
                         //   echo $cadenaTemp.'  J: '.strlen($cadenaTemp);
                            $str = substr($str, -(strlen($str) - $j));
                        }
                    }
                       //return ' tam: '.strlen($cadenaTemp);
                    $j++; 
                }
            }
            // return;
        } 
        return $stringSeparado;
    }
}
