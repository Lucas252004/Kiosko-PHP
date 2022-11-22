<?php
//Creo una clase conexion
class Conexion{
    private $con; 
    //constructor
    public function __construct()
    {
        //me conecto a la base de datos bd_prueba
        $this->con = new mysqli('localhost', 'root', '', 'bd_test');
    }
    //Funcion getProductos
    public function getProductos(){
        //Guardo la consulta en una variable
        $query = $this->con->query('SELECT * FROM productos');
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }
    //Obtener el producto de la base de datos en base al id del producto
    public function getProductoElegido($id_producto){
        //Guardo la consulta en una variable
        $query = $this->con->query("SELECT * FROM productos WHERE id_producto = '$id_producto'");
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }
    //Actualizar producto del catalogo
    public function actualizarProducto($id_producto, $nombre_producto, $descripcion, $precio, $cantidad, $imagen, $categoria){
        $sql = $this->con->query("UPDATE productos SET nombre_producto = '$nombre_producto', descripcion = '$descripcion', precio = '$precio', cantidad = '$cantidad', imagen = '$imagen',  categoria='$categoria' WHERE id_producto = '$id_producto'");
    }
    //Actualizar producto del catalogo sin imagen
    public function actualizarProductoSinImagen($id_producto, $nombre_producto, $descripcion, $precio, $cantidad, $categoria){
        $sql = $this->con->query("UPDATE productos SET nombre_producto = '$nombre_producto', descripcion = '$descripcion', precio = '$precio', cantidad = '$cantidad', categoria='$categoria' WHERE id_producto = '$id_producto'");
    }
    //Esta funcion se utiliza para insertar productos a la base de datos
    public function insertar($nombre_producto, $descripcion, $nombre, $imagen, $cantidad, $categoria){
        $sql = $this->con->query("INSERT INTO productos (nombre_producto, descripcion, precio, imagen, cantidad, categoria) VALUES ('$nombre_producto', '$descripcion', '$nombre', '$imagen', '$cantidad', '$categoria')");
       
    }
    //Agregar al carrito un producto
    public function agregarCarrito($usuario_actual, $id_producto){
        $sql = $this->con->query("INSERT INTO carrito_usuarios(id_sesion, id_producto) VALUES ('$usuario_actual', '$id_producto')");
    }
    //Ver el carrito del usuario actual
    public function verCarrito($id_usuario){
        $sql = $this->con->query("SELECT * FROM productos INNER JOIN carrito_usuarios ON productos.id_producto = carrito_usuarios.id_producto WHERE carrito_usuarios.id_sesion = '$id_usuario'");
        $i = 0;
        $retorno = [];
        while($fila = $sql->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }
    //Borrar un producto del carrito
    public function borrarProductoCarrito($id_carrito){
        $sql = $this->con->query("DELETE FROM carrito_usuarios WHERE id_carrito = '$id_carrito'");
       // echo "Producto supuestamente borrado";
    }
    public function borrarProductoCatalogo($id_producto){
        $sql = $this->con->query("DELETE FROM productos WHERE id_producto = '$id_producto'");
    }
    public function borrarTodoCarrito($usuario){
        $sql = $this->con->query("DELETE FROM carrito_usuarios WHERE id_sesion = '$usuario'");
    }
    public function restarStock($id_producto){
        $sql = $this->con->query("UPDATE productos SET cantidad = cantidad - 1 WHERE id_producto = '$id_producto'");
    }
    public function sumarStock($id_producto){
        $sql = $this->con->query("UPDATE productos SET cantidad = cantidad + 1 WHERE id_producto = '$id_producto'");
    }
    public function insertarUsuarios($id_usuario, $email, $nombre_usuario){
        $sql = $this->con->query("INSERT IGNORE usuarios SET id_usuario = '$id_usuario', email = '$email', nombre_usuario = '$nombre_usuario'");
    }
    public function insertarUsuarioActual($id_usuario){
        //$sql = $this->con->query("INSERT IGNORE usuario_actual SET id_usuario = '$id_usuario'");
        $sql = $this->con->query("REPLACE INTO usuario_actual (id, id_usuario) VALUES (1, '$id_usuario')");
    }
    public function getUsuarioActual(){
        $query = $this->con->query('SELECT * FROM usuario_actual');
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }
    //---------VERIFICAR ADMIN---------
    public function verficarAdmin($nombre_usuario, $pass){
        //Guardo la consulta en una variable
        $query = $this->con->query("SELECT * FROM administrador WHERE nombre_usuario = '$nombre_usuario' AND password = '$pass'");
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }
    //--------COLORES-----------------
    public function insertarColores($codigo_color){
        $sql = $this->con->query("REPLACE INTO editor (id_color, codigo_color) VALUES (1, '$codigo_color')");
    }
    public function insertarColoresMenu($codigo_color){
        $sql = $this->con->query("REPLACE INTO editor (id_color, codigo_color) VALUES (2, '$codigo_color')");
    }
    public function getColorActual(){
        //Guardo la consulta en una variable
        $query = $this->con->query('SELECT * FROM editor WHERE id_color = 1');
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;   
    }
    public function getColorMenuActual(){
        //Guardo la consulta en una variable
        $query = $this->con->query('SELECT * FROM editor WHERE id_color = 2');
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;   
    }
    //--------ENCABEZADO-----------------
    public function getTitulo(){
        //Guardo la consulta en una variable
        $query = $this->con->query('SELECT * FROM editor WHERE id_color = 3');
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;   
    }
    public function cambiarTitulo($nuevo_titulo){
        $sql = $this->con->query("REPLACE INTO editor (id_color, codigo_color) VALUES (3, '$nuevo_titulo')");
    }
    public function cambiarIcono($icono){
        $sql = $this->con->query("REPLACE INTO editor (id_color, codigo_color) VALUES (4, '$icono')");
    }
    public function getIcono(){
        //Guardo la consulta en una variable
        $query = $this->con->query('SELECT * FROM editor WHERE id_color = 4');
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;    
    }
    public function insertarCategoria($categoria){
        $sql = $this->con->query("INSERT INTO categorias(nombre_categoria) VALUES ('$categoria')");
    }
    public function getCategorias(){
        $query = $this->con->query('SELECT * FROM categorias');
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;  
    }
    public function editarCategoria($id_categoria, $nombre_categoria){
        $sql = $this->con->query("UPDATE categorias SET nombre_categoria = '$nombre_categoria' WHERE id = '$id_categoria'");
    }
    public function borrarCategoria($id_categoria){
        $sql = $this->con->query("DELETE FROM categorias WHERE id = '$id_categoria'");
    }
    public function getProductoCategoria($categoria){
        $query = $this->con->query("SELECT * FROM productos WHERE categoria = '$categoria'");
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno; 
    }
    }
?>