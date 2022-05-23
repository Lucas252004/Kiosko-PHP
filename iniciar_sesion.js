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
    const boton2 = document.getElementById('saveData2')
    boton2.addEventListener('click', (e)=>{
        e.preventDefault()
        let email2 = document.getElementById('email2').value;
        let password2 = document.getElementById('password2').value;
        signInWithEmailAndPassword(auth, email2, password2)
            .then((userCredential) => {
                // Signed in
                const user = userCredential.user
                const dt = new Date()
                update(ref(database, 'users/' + user.uid),{
                    last_login: dt,
                })
                alert('Has iniciado sesion con exito !')
                console.log(user)
              //  window.location.replace("http://localhost/proyecto_php")
                // ...
            })
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
                alert(errorMessage)
            })
    })
    const google = document.getElementById('google')
    google.addEventListener('click', (e) =>{
        console.log("CLICK")
        e.preventDefault()
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