<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Iniciar Sesion</title>
</head>
<body>
    <!--MENU PRINCIPAL-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">The Editable Web</a>
        <ul class="nav justify-content-end ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php" style="color: white">Inicio</a>
        </li>
        </ul>
    </div>
    </nav>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form action="" name="signUp" id="signUp">
            <h3 class="mb-5">Iniciar Sesion</h3>
            <div class="form-outline mb-4">
              <input type="text" id="email2" name ="email2" class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX-2">Correo Electronico</label>
            </div>
            <div class="form-outline mb-4">
              <input type="password" id="password2" name="password2" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Contraseña</label>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" id="saveData2" name="signup_submit">Iniciar Sesion</button>
            </form>
            <hr class="my-4">
            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39; "
               id="google">Continuar con Google</button>
            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998; margin-top:10px;"
              type="submit">Continuar con Facebook</button><br>
            <a href="registro.php">Si no tienes cuenta. Registrate aca</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>    





<!--JAVASCRIPT-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script src="../js/iniciar_sesion.js" type="module"></script>

</body>
</html>