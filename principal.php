<?php
require "clases/autoload.php";
// creamos un usuario
$usr = new Usuario();
// Con el método insertUsuario() registramos una instancia de usuario
// $insertado = $usr->insertUsuario("Gustavo Bordagaray","gustavobor@gmail.com","099104306");
// Esto nos devuelve el id del usuario
// print_r($insertado);
echo "<br><br>";

// hacemos una consulta a la BD que nos lista los usuarios
$listaUsuarios = $usr->getUsuarios();
echo "<pre>";
print_r($listaUsuarios);
echo "</pre>";


