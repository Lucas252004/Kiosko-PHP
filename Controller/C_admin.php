<?php
//Requiero todos los archivos necesarios
require_once('../Model/Conexion.php');
session_start();
if(isset($_SESSION['id_admin']) && isset($_SESSION['nombre_usuario'])){
    require_once('C_insertar_producto.php');
    require_once('C_editor.php');
    require_once('C_categorias.php');
    require_once('../Views/insertar_productos.php');
}else{
    header("Location: http://localhost/proyecto_php/Views/iniciar_sesion_admin.php");
    exit();
}
?>