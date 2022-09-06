<?php
require_once('../Model/Conexion.php');
$con = new Conexion();
if(isset($_POST['agregar_categoria'])){
    $categoria = $_POST['categoria'];
    $con->insertarCategoria($categoria);
    header("Location: http://localhost/proyecto_php/Controller/C_admin.php");
}
if(isset($_POST['editar_categoria'])){
    $id_categoria = $_POST['id_categoria'];
    $nueva_categoria = $_POST['nombre_categoria'];
    $con->editarCategoria($id_categoria, $nueva_categoria);
    header("Location: http://localhost/proyecto_php/Controller/C_admin.php");
}
if(isset($_POST['borrar_categoria'])){
    $id_categoria = $_POST['id_categoria'];
    $con->borrarCategoria($id_categoria, $nueva_categoria);
    header("Location: http://localhost/proyecto_php/Controller/C_admin.php");
}
$categorias = $con->getCategorias();
?>