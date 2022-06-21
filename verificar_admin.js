
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-app.js";
    import { getDatabase, set, ref, update, get, child } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-database.js";
    import { getAuth, createUserWithEmailAndPassword,  signInWithEmailAndPassword, onAuthStateChanged, signOut, GoogleAuthProvider,  signInWithRedirect, getRedirectResult, signInWithPopup } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-auth.js";
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
    let titulo = document.getElementById('titulo')
    let id_usuario = document.getElementById('id_usuario')
    onAuthStateChanged(auth, (user) => {
    if (user) {
        // User is signed in, see docs for a list of available properties
        // https://firebase.google.com/docs/reference/js/firebase.User
        const uid = user.uid;
        console.log("UID " + uid);
        //titulo.innerHTML = user.email
    //    if(user.email != "email.admin@admin.com"){
    //         console.log("NO SOS ADMIN")
    //         alert("No estas autenticado como administrador")
    //         window.location.replace("http://localhost/proyecto_php/")
    //     } 
       // pasarVariable(uid)

        console.log(user)
        //console.log("CCCCCCCCCCCCCCCCCC")
        console.log(user.username)
        // ...
    } else {
        // User is signed out
        // ...
        console.log("ESTAS FUERAAAAAAAAAAA")
        alert("Tienes que iniciar sesion")
        window.location.replace("http://localhost/proyecto_php/Views/iniciar_sesion.php")
    }
    });
    // const boton3 = document.getElementById('logout')
    // boton3.addEventListener('click', (e) =>{
    //     e.preventDefault()
    //     signOut(auth).then(() => {
    //     // Sign-out successful.
    //         alert("Has cerrado sesion")
            
    //     }).catch((error) => {
    //     // An error happened.
    //         alert("ERROR")
    //     });
    // })
