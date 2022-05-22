
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Lista de Productos</title>
</head>
<body>
    <!--MENU PRINCIPAL-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">The Editable Web</a>
        <ul class="nav justify-content-end ">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php" style="color: white">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="verCarrito.php" style="color: white">Ver Carrito</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: white" id="logout" style="cursor: pointer;">Cerrar Sesion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Views/insertar_productos.php" style="color: white">Añadir Productos</a>
            </li>
        </ul>
    </div>
    </nav>
        <div align="center" style="padding: 20px;">

        
            <?php
                //Recorro el array con los valores de la base de datos  
                foreach($productos as $producto){
                    if($producto['cantidad'] <= 0){
                        echo "<form action='index.php' method='POST' enctype='multipart/form-data' style='display: inline-block'>";
                        echo "<div class='card' style='width: 18rem; display: inline-block ; margin: 10px;'align='center'; >";
                        //Imprimo los valores por pantalla
                        echo "<div class='card-body'>";
                        echo "<img src='".$producto['imagen']."' class='card-img-top' alt='foto' style=' height:350px; border-radius: 10px;'><br>";
                        echo "<input type='hidden' name='id_producto' placeholder='Descripcion' value='".$producto['id_producto'] ."'>";
                        echo "<h5 class='card-title'>". $producto['nombre_producto'] ."</h5>";
                        echo "<p class='card-text'>". $producto['descripcion'] ."</p>";
                        echo "<p class='card-text'> $". $producto['precio'] ."</p>";
                        echo "<p class='card-text'> Cantidad ". $producto['cantidad'] ."</p>";
                        echo "<input type='hidden' name ='boton' value='Añadir producto' >";
                        echo "<p class='card-text'>Producto Agotado</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</form>";
                    }else{
                        echo "<form action='index.php' method='POST' enctype='multipart/form-data' style='display: inline-block'>";
                        echo "<div class='card' style='width: 18rem; display: inline-block ; margin: 10px;'align='center'; >";
                        //Imprimo los valores por pantalla
                        echo "<div class='card-body'>";
                        echo "<img src='".$producto['imagen']."' class='card-img-top' alt='foto' style=' height:350px; border-radius: 10px;'><br>";
                        echo "<input type='hidden' name='id_producto' placeholder='Descripcion' value='".$producto['id_producto'] ."'>";
                        echo "<h5 class='card-title'>". $producto['nombre_producto'] ."</h5>";
                        echo "<p class='card-text'>". $producto['descripcion'] ."</p>";
                        echo "<p class='card-text'> $". $producto['precio'] ."</p>";
                        echo "<p class='card-text'> Cantidad ". $producto['cantidad'] ."</p>";
                        echo "<input type='submit' name ='boton' value='Añadir producto' >";
                        echo "</div>";
                        echo "</div>";
                        echo "</form>";
                    }

                   
                }
            ?>
        </div>  
    <script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-app.js";
    import { getDatabase, set, ref, update } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-database.js";
    import { getAuth, createUserWithEmailAndPassword,  signInWithEmailAndPassword, onAuthStateChanged, signOut, GoogleAuthProvider,  signInWithRedirect, getRedirectResult, signInWithPopup } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-auth.js";

    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries
  
    // Your web app's Firebase configuration
    const firebaseConfig = {
      apiKey: "AIzaSyDLBElztDZrLNtNOtd_3pWFcV5H6MEI6DM",
      authDomain: "pruebafirebase-2cb7a.firebaseapp.com",
      databaseURL: "https://pruebafirebase-2cb7a-default-rtdb.firebaseio.com",
      projectId: "pruebafirebase-2cb7a",
      storageBucket: "pruebafirebase-2cb7a.appspot.com",
      messagingSenderId: "249150742609",
      appId: "1:249150742609:web:81a2242f7cd36edc731870"
    };
  
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const database = getDatabase(app);
    const auth = getAuth();
    const provider = new GoogleAuthProvider();
    const user = auth.currentUser;
    let ventana
    onAuthStateChanged(auth, (user) => {
    if (user) {
        // User is signed in, see docs for a list of available properties
        // https://firebase.google.com/docs/reference/js/firebase.User
        const uid = user.uid;
        console.log("UID " + uid)
        //console.log(user)
        //window.location.replace("http://localhost/prueba_firebase/solicitarDatos.php")
        // ...
    } else {
        // User is signed out
        // ...
        console.log("ESTAS FUERA")
        alert("DEBES DE INICIAR SESION PARA ENTRAR")
        window.location.replace("http://localhost/proyecto_php/Views/registro.php")
    }

    });
    const boton3 = document.getElementById('logout')
    boton3.addEventListener('click', (e) =>{
        e.preventDefault()
        signOut(auth).then(() => {
        // Sign-out successful.
            alert("TE FUISTE PA")
            
        }).catch((error) => {
        // An error happened.
            alert("NO TE FUISTE PA")
        });
    })
    </script>
</body>

</html>