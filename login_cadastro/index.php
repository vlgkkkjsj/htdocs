<?php

if(isset($_POST['submit']))
{

  include('classes/db.php');
  include('classes/Usuario.php');

  $cadastro = new UsuarioDB();

  $nome = filter_var(trim($_POST['nome']), FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST['$email']),FILTER_SANITIZE_EMAIL);
  $user = filter_var(trim($_POST['user']),FILTER_SANITIZE_STRING);
  $senha = filter_var(trim($_POST['senha']),FILTER_SANITIZE_STRING);

  if(strlen($senha)<6)
  {
      header('location: index.php?menor=senha');
  }
  else
  {
      $consulta = $cadastro->unico($email, $user);

      if (!empty($consulta['email']) || !empty($consulta['user'])) 
      {
        header('location: index.php?repetido=senha');
      } 
        else 
        {
          $insere = $cadastro-> cadastrar($nome,$email,$user,$senha);

            if ($insere == true)
            {
                header('location: index.php?success=cadastrado');
              }
          }

  } 
}

  ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>cadastre-se</title>
  </head>
  <body>
  <?php
      

       if(isset($_GET['repetido'])) {
        echo "<script>alert('usuario ja existe')</script>";
      }
      else if(isset($_GET['success'])) {
      echo  "<script>alert('cadastrado com sucesso')</script>";
      }
      else if(isset($_GET['menor']))
      {
        echo "<script>alert('a senha possui menos de 6 caracteres')</script>";
      }
    ?>

    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">registre-se</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
      <section class="vh-100" style="background-color: #D3D3D3;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">registre-se</p>
      
                      <form class="mx-1 mx-md-4" method="POST">
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="form3Example1c" class="form-control" name="nome" />
                            <label class="form-label" for="form3Example1c" name="nome">Digite seu nome</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" id="form3Example3c" class="form-control" name="email" />
                            <label class="form-label" for="form3Example3c" name="email">Digite seu email</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="form3Example4c" class="form-control" name="senha"/>
                            <label class="form-label" for="form3Example4c" name="senha">senha</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="form3Example4cd" class="form-control" name="user" />
                            <label class="form-label" for="form3Example4cd" name="user">insira seu username</label>
                          </div>
                        </div>

      
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" class="btn btn-primary btn-lg" name="submit">Register</button>
                        </div>
      
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>