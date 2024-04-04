<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;
    private float $saldo;
    public function __construct(){
        $this->saldo = 0.0;
    }
    public function getSaldo():float {
        return $this->saldo;
    }
    /**
     * Ingressar una quantitat al compte
     * @param float $cantidad
     */
    public function ingresar(float $cantidad):void {
        if($cantidad > 0.0 && $this->validarCantidad($cantidad)){
            $this->saldo += $cantidad;
        }
    }

    private function validarCantidad(float $cantidad):bool{
        if(round($cantidad, 2) == $cantidad){
            return true;
        }
        return false;
    }
}
