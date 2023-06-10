<?php
    session_start();
   
    if((!isset ($_SESSION['cpf'])==true) and (!isset($_SESSION['senha'])==true))
    {
        unset( $_SESSION['cpf'] );
        unset( $_SESSION['senha']);
        header('Location: login.php');
    }

    $logado = $_SESSION['cpf'];


    if(isset($_POST['submit']))
    {
        include('../classes/db2.php');
        include ('../classes/empresaDB.php');

        $empresaCadastro = new empresa();

       $empresa = filter_var(trim($_POST['empresa']),FILTER_SANITIZE_STRING);
       $assunto = filter_var(trim($_POST['assunto']),FILTER_SANITIZE_STRING);
       $email =  filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
        $mensagem= filter_var(trim($_POST['mensagem']),FILTER_SANITIZE_STRING);
       
    

        
      if($empresa==$empresa)
      {
        $consulta = $empresaCadastro->unico($empresa);

        if($consulta== true)
        {
            $insere = $empresaCadastro->cadastrarempresa($empresa,$mensagem,$assunto,$email);
            if($insere == true)
            {
                header('location:empresarial.php?sucesso=cadastrado');
            }
        }
        else
        {
           header('location:empresarial.php?repetido=empresa');
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
    <link rel="icon" href="../img/icon.png" type="image/png">
    <title>Empresarial</title>
    <link rel="stylesheet" href="../css2/empresarial.css">
</head>
<body>

<?php

    if(isset($_GET['repetido']))
    {
        print "<script>alert('empresa ja cadastrada')</script>";
    }
    if(isset($_GET['sucesso']))
    {
        print "<script>alert('sucesso ao cadastrar empresa')</script>";
    }

?>

    <header class="cabecalho">
    <button class="voltar"  onclick="window.location.href='sistema.php'" >voltar</button>
        <img class="logo" alt="logo" src="../img/icon.png">
        <nav class="navegacao">
            <a class="cabecalho-menu" href="../sistema/formParaAdotar.php"> coloque para adocao </a>
            <a class="cabecalho-menu"href="">faca parte do projeto</a>
            
        </nav>
        <button class="sair"  onclick="window.location.href='logout.php'" >sair</button>
    </header>
    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Parcerias</h1>
        <p id="subtitulo">Complete as informações
        </p>
        <br>
    </div>
    <img class="img-logo-projeto" src="../img/icon.png">
    <form class="formulario" method="POST" action="">
        <fieldset class="grupo">
            <div class="campo" >
                <label for="nome"><strong>Nome da empresa</strong></label>
                <input type="text" name="empresa" id="empresa" >
            </div>

            <div class="campo" >
                <label for="assunto"><strong>Assunto</strong></label>
                <input type="text" name="assunto" id="assunto" >
            </div>

        </fieldset>

        <div class="campo">
            <label for="email"><strong>Email</strong></label>
            <input type="email" name="email" id="email" >
        </div>

        <div class="campo">
        <br>
        <label>Mensagem</label>
        <textarea row="6" style="width: 26em" id="mensagem" name="mensagem"></textarea>
        
      </div>

      <button class="botao" type="submit" name="submit" >Concluir</button>
    </form>
</section>
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">Ong Lar bastet</h2>
    </footer>
</body>
</html>