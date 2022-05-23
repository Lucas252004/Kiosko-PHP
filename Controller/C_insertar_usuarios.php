<?php
//Llamo al archivo Conexion.php
//require('Model/Conexion.php');
$con = new Conexion();
$nombre_usuario = "";
$email = "";
$id_usuario = "";
$data = json_decode(file_get_contents("https://pruebafirebase-2cb7a-default-rtdb.firebaseio.com/users.json"), true);
foreach($data as $i){
    $id_usuario = $i['id'];
    $email = $i['email'];
    $nombre_usuario = $i['username'];
    $con->insertarUsuarios($id_usuario, $email, $nombre_usuario);
}
?>