<?php


if($_POST)
{
    
    include('../classes/db2.php');
    include('../classes/adminDB.php');

    $admin = new AdminDB();
    
    $codigoAdm= ($_POST['codigoAdm']);
    $senha= ($_POST['senha']);

    $administrador = $admin->logar($codigoAdm, $senha);

    if($administrador == true)
    {
        session_start();
        $_SESSION['codigoAdm'] = $codigoAdm;
        $_SESSION['senha'] = $senha;
        header('location:../administracao/crud.php');
    }
    else
    {
       print "<script>alert('senha nao reconhecida')</script>";
       header('location: administracao.php');
        
    }

}

?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon.png" type="image/png">
    <title>Aministracao</title>
    <link  rel="stylesheet" href="../css3/administracao.css">
</head>
<body>
<header class="cabecalho">
    <button class="voltar" onclick="window.location.href='../tela_inicial/login.php'">voltar</button>
        <img class="logo" alt="logo do projeto" src="../img/icon.png">
        <nav class="navegacao">
            <a class="cabecalho-menu" href="../sistema/empresarial.php">empresarial</a>
            <a class="cabecalho-menu" href="../sistema/formParaAdotar.php"> coloque para adocao </a>
            <a class="cabecalho-menu"href="../sistema/paraparte.php">faca parte do projeto</a>
        </nav>
    </header>
  

    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Logue no sistema administrativo</h1>
        <p id="subtitulo">insira as informacoes que foram concedidas pelo Administrador do sistema</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="../img/icon.png" height="40px">
    <form class="formulario" method="POST" action="">
        <fieldset class="grupo">
        <div class="campo">
                <label for="cpf" ><strong>Codigo de Usuario Do sistema</strong></label>
                <input type="text" name="codigoAdm" id="codigoAdm"required>
            </div>

            <div class="campo">
                <label for="senha"><strong>Senha</strong></label>
                <input type=password name="senha" id="senha" required>
            </div>

           
        </fieldset>

      <button class="botao" type="submit" name="submit">Concluir</button>
      
    </form>
       

</section>
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">Lar Bastet</h2>
    </footer>
</body>
</html>