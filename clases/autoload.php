<?php
    // Definimos una función que importe una clase 
    function autoload($clase){
        require_once ($clase.'.php');
    }
    // Esta línea de código ejecuta la función 
    // importando la clase en el otro archivo
    spl_autoload_register("autoload");

    /* 
    Se recomienda visitar:
    https://www.php.net/manual/es/language.oop5.autoload.php
    */

?>