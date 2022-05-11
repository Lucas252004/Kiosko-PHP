<?php
//Creo una clase Conexion
require('Model/Conexion.php');
$con = new Conexion();
//Llamo a la funcion getProductos() y almaceno el valor en una variable
$productos = $con->getProductos();
//-----------------AÑADIR AL CARRITO---------------------
if(isset($_POST['boton'])){
    $id_producto = [];
    $id_producto = $_POST['id_producto'];
    echo "<script>alert('Has añadido el producto al carrito');</script>";
    $con->agregarCarrito($id_producto);
    $con->restarStock($id_producto);
}

?>