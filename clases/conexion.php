<?php

class Conexion{
    // Atributos de la conexión
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "crud_pdo";
    // Atributo para la instrucción sql
    private $con;
    //Creamos el método constructor
    function __construct(){
        // creamos un string con los datos de la conexión y la codificación
        $conString = "mysql:host=".$this->host.
                ";dbname=".$this->db.";charset=utf8";
        try{
            // instanciamos la conexión
            $this->con = new PDO($conString,$this->user,$this->password);
            // Estos métodos permiten mostrar si se produjeron errores 
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // si el try es exitoso nos despliega mensaje en el navegador
            // echo "Conexión exitosa";
        } catch(Exception $e){
            // si se ejecuta el catch muestra datos de errores
            $this->con = "Error de conexión";
            echo "Error: ".$e->getMessage();
        }     
    }

    public function conectar(){
        return $this->con;
    }
}

?>