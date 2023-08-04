<?php
    require_once "clases/autoload.php";

    class Usuario extends Conexion{
        private $nombre;
        private $email;
        private $telefono;
        // tenemos que declarar tipo object a $conex, 
        // sino nos marca un error que dice que
        // espera tipo object pero retorna string
        private object $conex;

        public function __construct(){
            $this->conex = new Conexion();
            $this->conex = $this->conex->conectar();
        }

        

        public function insertUsuario( string $nombre, string $email, string $telefono){
            $this->nombre = $nombre;
            $this->email = $email;
            $this->telefono = $telefono;
            // para evitar inyección sql usamos una sentencia preparada
            $sql = "INSERT INTO contacto(nombre,email,telefono) values(?,?,?)";
            $insertar = $this->conex->prepare($sql);
            $arregloDatos = array($this->nombre,$this->email,$this->telefono);
            $resultado = $insertar->execute($arregloDatos);
            $idInsertado = $this->conex->lastInsertId();
            return $idInsertado;
        }

        public function getUsuarios(){
            $sql = "SELECT * FROM contacto";
            $consultar = $this->conex->query($sql);
            $resultado = $consultar->fetchall(PDO::FETCH_ASSOC);
            return $resultado;
        }
    } 
?>