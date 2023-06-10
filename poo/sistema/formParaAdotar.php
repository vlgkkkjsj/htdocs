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
            include_once('../sistema/classes/db2.php');
            include_once('../sistema/classes/animalDB.php');



            $animalCadastro = new animalDB();

            $animal = trim(strip_tags($_POST['animal']));
            $localizacao = trim(strip_tags($_POST['localizacao']));
            $email = trim(strip_tags($_POST['email']));

            if($animal=== $animal)
            {

                $insereAnimal = $animalCadastro ->cadastrarAnimal($animal,$localizacao,$email);
            }
            if($insereAnimal == true)
            {
                header('location:formParaAdotar.php?sucesso=formParaAdotar');
            }
        }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../css2/icon.png" type="image/png">
    <title>coloque para adocao</title>
    <link rel="stylesheet" href="../css2/formParaAdotar.css">
</head>
<body>

    <?php

    if(isset($_GET['sucesso']))
    {
        print "<script>alert('cadastro do animal realizado com sucesso')</script>";
    }

    ?>

    <header class="cabecalho">
    <button class="voltar"  onclick="window.location.href='sistema.php'" >voltar</button>
        <img class="logo" alt="logo" src="../img/icon.png">
        <nav class="navegacao">
        <a class="cabecalho-menu" href="../sistema/empresarial.php">Parcerias</a>
            <a class="cabecalho-menu"href="../sistema/paraparte.php">faca parte do projeto</a>
            
        </nav>
        <button class="sair"  onclick="window.location.href='logout.php'" >sair</button>
    </header>
    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">coloque para adotar</h1>
        <p id="subtitulo">Complete as informações do animal</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="../img/icon.png">
    <form class="formulario" method="POST" action="" enctype="multipart/form-data">
        <fieldset class="grupo">
            <div class="campo" >
                <label for="nome"><strong>Tipo de Animal</strong></label>
                <input type="text" name="animal" id="animal" required>
            </div>

            <div class="campo" >
                <label for="assunto"><strong>Onde foi encontrado</strong></label>
                <input type="text" name="localizacao" id="localizacao" required>
            </div>

        </fieldset>

        <div class="campo">
            <label for="email"><strong>Email Para entrarmos em contato</strong></label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="arquivo" style="   
             background-color: #627ABD;
              padding: 20px 10px ;
             width: 200px;
              text-align: center;
              display: block;
             margin-top: 20px;
             border-radius: 25px;
            cursor: pointer;
            transform: scale(1); transition: transform 0.5s;" onmouseover="this.style.transform = 'scale(1.1)';" onmouseout="this.style.transform = 'scale(1)'">Enviar arquivo</label>
            <input type="file" name="arquivo" id="arquivo">
        </div>

      <button class="botao" type="submit" name="submit">Concluir</button>
 

    </form>
    </section>
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">Desenvolvido por Nome do Produto</h2>
    </footer>
</body>
