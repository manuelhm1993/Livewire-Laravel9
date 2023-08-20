<?php

namespace App\CustomClasses;

class Helper {
    // ------------ Equivalente a Math.random().toString(36).substring(2) + Date.now()
    public static function generateID() {
        $NumeroAleatorio = (rand() / getrandmax());
        $stringNumeroAleatorio = substr(strval($NumeroAleatorio), 2);
        $alphaNumerico = base_convert($stringNumeroAleatorio, 10, 36);
        $id = $alphaNumerico . time();

        return $id;
    }
}
