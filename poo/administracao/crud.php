<?php
    session_start();
   
    if((!isset ($_SESSION['codigoAdm'])==true) and (!isset($_SESSION['senha'])==true))
    {
        unset( $_SESSION['codigoAdm'] );
        unset( $_SESSION['senha']);
        header('Location: administracao.php');
    }

    $logado = $_SESSION['codigoAdm'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon.png" type="image/png">
    <title>Crud Administrativo</title>
    <link rel="stylesheet" href="../css3/crud.css">
</head>
<body>
<header class="cabecalho">
        <img class="logo" alt="logo do projeto" src="../img/icon.png">
        <nav class="navegacao">
            <a class="cabecalho-menu" href="?page=home">home</a>
            <a class="cabecalho-menu" href="?page=novo"> novo </a>
            <a class="cabecalho-menu"href="?page=listar">listar</a>
            <a class="cabecalho-menu" href="?page=listar_animais">listar animais</a>
            <a class="cabecalho-menu" href="?page=listar_empresarial">listar empresarial </a>
        </nav>
         <button class="sair"  onclick="window.location.href='../sistema/logout.php'" >sair</button> 
    </header>

    <div class="container">
        <div class="titulo-principal">
         <?php
            include("../classes/db2.php");
            switch(@$_REQUEST["page"]){
                case "home":
                    print "<script>alert('Bem vindo ao sistema administrativo')</script>";
                    print("Bem vindos! Essa é nossa área somente para administradores, aproveite sua estadia e siga o que seus supervisores manderem");
                break;

                case "novo":
                    include("novo_usuario.php");
                break;
                case "excluir":
                    include("excluir_usuario.php");
                    break;
                case "editar":
                    include("editar_usuario.php");
                    break;
                case "listar":
                    include("listar_usuario.php");
                    break;
                case "listar_animais":
                    include("listar_animais.php");
                    break;
                case "listar_empresarial":
                    include("listar_empresarial.php");
                    break;
                case "editar_animal":
                    include("editar_animal.php");
                    break;
                case "editar_empresarial":
                    include("editar_empresarial.php");
                    break;
                default:
                    print "<script>alert('Bem vindo ao sistema administrativo')</script>";
                    print("<h1>Bem vindos! Essa é nossa área somente para administradores, aproveite sua estadia e siga o que seus supervisores manderem</h1>");
            }
            ?>
        </div>
</div>

</body>
</html>