<?php
class Validacion{

    public function valCod($cod){
        return preg_match("^(PROD)[\d]{4}$", $cod);
    }

    public function isVoid($val){
        if(empty($val)){
            return true;
        }
    }
    
    public function veriExistencias($ext){
        if($ext<0){
            return true;
        }
    }

    public function veriPrecio($pre){
        if($pre<0){
            return true;
        }
    }

}
?>