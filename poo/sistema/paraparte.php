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
        include('../classes/voluntariosDB.php');



        $voluntarioCadastro = new voluntariosDB();

        $nome = trim(strip_tags($_POST['nome']));
        $sobrenome = trim(strip_tags($_POST['sobrenome']));
        $idade = trim(strip_tags($_POST['idade']));
        $cpf = trim(strip_tags($_POST['cpf']));
        $email = trim(strip_tags($_POST['email']));

       if($idade == $idade)
       {
            $consulta = $voluntarioCadastro->maior($idade);

            if($consulta == false)
            {
                header('location:paraparte.php?erro');
            }
            else
            {
                $insere = $voluntarioCadastro->cadastroVoluntario($nome,$sobrenome,$idade,$cpf,$email);
            }   
            if($insere == true)
            {
                header('location:paraparte.php?sucesso=paraparte');
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
    <title>Para Fazer parte</title>
    <link rel="stylesheet" href="../css2/paraparte.css">
</head>
<body>

    <?php
    


    if(isset($_GET['erro']))
    {
        print "<script>alert('necessario responsavel legal')</script>";
    }
    if(isset($_GET['menor']))
    {
        print "<script>alert('erro')</script>";
    }
    if(isset($_GET['sucesso']))
    {
        print "<script>alert('sucesso ao cadastrar voluntario')</script>";
    }

    ?>

<header class="cabecalho">
    <button class="voltar"  onclick="window.location.href='../sistema/sistema.php'" >voltar</button>
        <img class="logo" alt="logo" src="icon.png">
        <nav class="navegacao">
        <a class="cabecalho-menu" href="../sistema/empresarial.php">empresarial</a>
            <a class="cabecalho-menu" href="../sistema/formParaAdotar.php"> coloque para adocao </a>
        </nav>
        <button class="sair"  onclick="window.location.href='logout.php'" >sair</button>
    </header>
<main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Cadastro via sistema Administrativo</h1>
        <p id="subtitulo">Complete as informacoes do usuario</p>
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
                <label for="idade"><strong>idade</strong></label>
                <input type=text name="idade" id="idade" >
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
        <div class="campo">
            <input type="checkbox" name="checkbox" id="checkbox" >
            <label for="checkbox"><strong>Concordo com os termos de condicoes</strong></label>
            
        </div>


      <button class="botao" type="submit" name="submit">Concluir</button>
    </form>
</section>
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">Desenvolvido por Nome do Produto</h2>
        <img class="logo-rodape" src="é_nois.png">
    </footer>
</body>
</html>