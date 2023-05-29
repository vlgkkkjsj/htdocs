<?php


if(isset($_POST['submit']))
{
    include('../classes/db2.php');
    include('../classes/animal2DB.php');

    $animalDB2 = new AnimalDB2();

    $nome =  filter_var(trim($_POST['nome']),FILTER_SANITIZE_STRING);
    $sobrenome =  filter_var(trim($_POST['sobrenome']),FILTER_SANITIZE_STRING);
    $email =  filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $nome_bichinho =  filter_var(trim($_POST['sobrenome']),FILTER_SANITIZE_STRING);

    $insere = $animalDB2->cadastrarAnimal($nome,$sobrenome,$email,$nome_bichinho);

    if($insere== true)
    {
        header('location:adote.php?success=adote');
    }
    else
    {
        header('location:adote.php?erro=erro');
    }
    
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon.png" type="image/png">
    <title>Adote</title>
    <link rel="stylesheet" href="../css/adote.css">
</head>
<body>
    
<?php
      if(isset($_GET['erro'])) {
        echo"<script>alert('erro ao enviar')</script>";
      }
      if(isset($_GET['success']))
      {
        echo"<script>alert('intuito de adoção enviado')</script>";
      }
?> 

    <header class="cabecalho">
        <button class="voltar" onclick="window.location.href='../index.php'">voltar</button>
        <img class="logo" alt="logo" src="../img/icon.png">
        <nav class="navegacao">
            <a class="cabecalho-menu" href="">Comunidade</a>
            <a class="cabecalho-menu" href="sobre.php">Sobre Nós</a>
            <a class="cabecalho-menu" href="">Desenvolvimento</a>
            
        </nav>
    </header>
    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Me adote :)</h1>
        <p id="subtitulo">Complete suas informações</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="../img/icon.png">
    <form class="formulario" method="POST" action="">
        <fieldset class="grupo">
            <div class="campo" >
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" name="nome" id="nome" >
            </div>

            <div class="campo">
                <label for="Sobrenome" ><strong>Sobrenome</strong></label>
                <input type="text" name="sobrenome" id="sobrenome">
            </div>
        </fieldset>

        <div class="campo">
            <label for="email"><strong>Email</strong></label>
            <input type="email" name="email" id="email" >
        </div>


        <div class="campo">
            <label for="nome_bichinho" ><strong>nome bichinho</strong></label>
                <input type="text" name="nome_bichinho" id="nome_bichinho">
            </select>
        </div>

      <button class="botao" type="submit" name="submit" >Concluir</button>
    </form>
</section>
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">Desenvolvido por Nome do Produto</h2>
    </footer>
</body>
</html>