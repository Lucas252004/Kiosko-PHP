<?php
require("../Model/Conexion.php");
$con = new Conexion();
$js =  json_encode($_POST['id_usuario']);
print_r($js);
$con->insertarUsuarioActual($js);
?>