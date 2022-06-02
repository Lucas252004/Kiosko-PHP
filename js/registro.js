    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-app.js";
    import { getDatabase, set, ref, update } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-database.js";
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
    const boton = document.getElementById('saveData')
    //Registrarse
    boton.addEventListener('click', (e) =>{
        e.preventDefault()
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let username = document.getElementById('username').value;
        createUserWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                // Signed in
                alert('Usuario creado con Exito !')
                const user = userCredential.user
                set(ref(database, 'users/' + user.uid),{
                    id: user.uid,
                    username: username,
                    email: email
                })
        
                // ...
            })
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
                alert(errorMessage)
                // ..
            })
        })
    const user = auth.currentUser;
    onAuthStateChanged(auth, (user) => {
        if (user) {
            // User is signed in, see docs for a list of available properties
            // https://firebase.google.com/docs/reference/js/firebase.User
            const uid = user.uid;
            console.log("UID " + uid)
            //console.log(user)
            
            // ...
        } else {
            // User is signed out
            // ...
            console.log("ESTAS FUERA")
            window.close()
        }
    
    });
    const google = document.getElementById('google')
    google.addEventListener('click', (e) =>{
        e.preventDefault()
        console.log("CLICK")
        alert("GOOGLE")
        signInWithPopup(auth, provider)
        //getRedirectResult(auth)
            .then((result) => {
                // This gives you a Google Access Token. You can use it to access Google APIs.
                const credential = GoogleAuthProvider.credentialFromResult(result);
                const token = credential.accessToken;

                // The signed-in user info.
                const user = result.user;
                console.log(user)
                console.log(result.user.providerData[0].displayName)
                console.log(result.user.providerData[0].email)
                console.log(result.user.providerData[0].photoURL)
               // $.post("solicitarDatos.php?op=accesosocial",{usu_correo:result.user.providerData[0].email})
            }).catch((error) => {
                // Handle Errors here.
                const errorCode = error.code;
                const errorMessage = error.message;
                // The email of the user's account used.
                const email = error.email;
                // The AuthCredential type that was used.
                const credential = GoogleAuthProvider.credentialFromError(error);
                // ...
            })
        
    })