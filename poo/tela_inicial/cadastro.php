<?php

if(isset($_POST['submit']))
{

    include('../classes/db2.php');
    include ('../classes/usuarioDB.php');

    $cadastro = new UsuarioDB();


    $nome = filter_var(trim($_POST['nome']), FILTER_SANITIZE_STRING);
    $sobrenome = filter_var(trim($_POST['sobrenome']), FILTER_SANITIZE_STRING);
    $senha = filter_var(trim($_POST['senha']), FILTER_SANITIZE_STRING);
    $confirmacao_senha = filter_var(trim($_POST['confirmacao_senha']), FILTER_SANITIZE_STRING);
    $cpf = filter_var(trim($_POST['cpf']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);



    
    if(strlen($senha)<6)
    {
        header('location: cadastro.php?menor=senha');
    }
    else
    {
        if($senha===$confirmacao_senha)
        {
            $consulta = $cadastro->unico($cpf, $email);

if (!empty($consulta['cpf']) || !empty($consulta['email'])) {
    header('location: cadastro.php?repetido=senha');
} 
else {
    $insere = $cadastro->cadastrar($nome, $sobrenome, $senha, $confirmacao_senha, $cpf, $email);

    if ($insere == true) {
        header('location: cadastro.php?success=cadastrado');
    }
}

 }
}
}
    ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/iconTopo.png" type="image/png">
    <title>Cadastre-se</title>
    <link rel ="stylesheet" href="../css/cadastro.css">
</head>
<body>
<?php
      
      if(isset($_GET['erro'])) {
        echo"<script>alert('as senhas nao coincidem')</script>";
      }
      if(isset($_GET['repetido'])) {
        echo "<script>alert('usuario ja existe')</script>";
      }
      if(isset($_GET['success'])) {
      echo  "<script>alert('cadastrado com sucesso')</script>";
      }
      if(isset($_GET['menor']))
      {
        echo "<script>alert('a senha possui menos de 6 caracteres')</script>";
      }
    ?>
<header class="cabecalho">
    <button class="voltar" onclick="window.location.href='../index.php'">voltar</button>
        <img class="logo" alt="logo do projeto" src="../img/icon2.png">
        <nav class="navegacao">
           
        <a class="cabecalho-menu" href="sobre.php">Sobre Nós</a>
            <a class="cabecalho-menu"href="feed.php">Adote</a>
            <a class= "cabecalho-menu" style= "cursor: default";>|</a>
            <a class= "cabecalho-menu" href="login.php"style="transform: scale(1); transition: transform 0.5s;" onmouseover="this.style.transform = 'scale(1.1)';" onmouseout="this.style.transform = 'scale(1)';">
 Login</a>
        </nav>
    </header>
    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Cadastre-se :)</h1>
        <p id="subtitulo">Complete suas informacoes</p>
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
                <input type="text" name="sobrenome" id="Sobrenome">
            </div>

            <div class="campo">
                <label for="senha"><strong>Senha</strong></label>
                <input type=password name="senha" id="senha" >
            </div>
            <div class="campo">
                <label for="senha"><strong>Confirmacao de senha</strong></label>
                <input type=password name="confirmacao_senha" id="confirmacao_senha" >
            </div>

            <div class="campo">
                <label for="cpf" ><strong>cpf</strong></label>
                <input type="text" name="cpf" id="cpf">
            </div>
        </fieldset>

        <div class="campo">
            <label for="email"><strong>Email</strong></label>
            <input type="email" name="email" id="email" >
        </div>

      <button class="botao" type="submit" name="submit" >Concluir</button>
    </form>
</section>
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">lar bastet</h2>
    </footer>
</body>
</html>