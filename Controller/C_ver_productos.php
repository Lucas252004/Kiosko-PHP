<?php
//Creo una clase Conexion
require('Model/Conexion.php');

$con = new Conexion();
//Llamo a la funcion getProductos() y almaceno el valor en una variable
$productos = $con->getProductos();
//Llamo a la function getUsuarioActual() para saber que usuario esta conectado actualmente
$usuario = $con->getUsuarioActual();
$usuario_actual = "";
//-----------------AÑADIR AL CARRITO---------------------
if(isset($_POST['boton'])){
    $id_producto = [];
    $id_producto = $_POST['id_producto'];
    foreach($usuario as $i){
        $usuario_actual = $i['id_usuario'];
    }
    echo "<script>alert('Has añadido el producto al carrito');</script>";
    $con->agregarCarrito($usuario_actual, $id_producto);
    $con->restarStock($id_producto);

}
?>