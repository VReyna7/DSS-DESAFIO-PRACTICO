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

}
?>