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

        public function actualizarUsr(int $id,string $nombre, string $email, string $telefono){
            $this->nombre = $nombre;
            $this->email = $email;
            $this->telefono = $telefono;
            // para evitar inyección sql usamos una sentencia preparada
            $sql = "UPDATE contacto SET nombre=? ,email =? ,telefono=? 
            WHERE id = $id";
            $actualizar = $this->conex->prepare($sql);
            $arregloDatos = array($this->nombre,$this->email,$this->telefono);
            $resultadoActualizar = $actualizar->execute($arregloDatos);
            return $resultadoActualizar;
        }

        public function getUsr(int $id){
            $sql = "SELECT * FROM contacto WHERE id = ? ";
            $arrId = array($id);
            $query = $this->conex->prepare($sql);
            $query->execute($arrId);
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function borrarUsr(int $id){
            $sql = "DELETE FROM contacto WHERE id = ? ";
            $arrId = array($id);
            $borrar = $this->conex->prepare($sql);
            $borrado = $borrar->execute($arrId);
            return $borrado;
           }
        } 
?>
