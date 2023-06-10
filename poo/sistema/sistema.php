<?php
    session_start();
   
    if((!isset ($_SESSION['cpf'])==true) and (!isset($_SESSION['senha'])==true))
    {
        unset( $_SESSION['cpf'] );
        unset( $_SESSION['senha']);
        header('Location: ./tela_inicial/login.php');
    }

    $logado = $_SESSION['cpf'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/iconTopo.png" type="image/png">
    <title>Sistema</title>
    <link rel="stylesheet" href="../css2/sistema.css">
</head>

<body>

<header class="cabecalho">

        <img class="logo" alt="logo do projeto" src="../img/icon.png">
        <nav class="navegacao">
            
            <a class="cabecalho-menu" href="empresarial.php">Parcerias</a>
            <a class="cabecalho-menu" href="formParaAdotar.php"> coloque para adocao </a>
            <a class="cabecalho-menu"href="paraparte.php">faca parte do projeto</a>
            <a class="cabecalho-menu"href="../administracao/administracao.php">admistracao</a>
            
        </nav>
        <button class="sair"  onclick="window.location.href='logout.php'" >sair</button>
    </header>

    <main class="conteudo">
        <section class="conteudo-principal">
            <div class="conteudo-principal-escrito">
                 <h2 class="conteudo-principal-escrito-subtitulo">Seja bem vindo(a) </h2>
                <p class="texto-principal">Olá para voce que adentrou dentro de nosso sistema, estamos muito felizes com seu cadastro e login, nesse ponto acreditamos que voce ja tenha conhecido um pouco
                     mais do nosso trabalho e tenha se interessado pelo mesmo, correto? :)
                     Enfim, nessa parte voce terá acesso a certas coisas que uma pessoa nao logada nao poderia fazer, temos uma pequena listinha de coisas que voce pode fazer para nos ajudar, em cada pagina que voce acessar sera descrito detalhadamente como fazer e o que fazer, se interessou? Dê uma olhada na nossa listinha:</p>
            </div>
            <img class="img-da-ong" src="../img/icon.png">
        </section>
        <section class="conteudo-secundario">
            <h3 class="conteudo-secundario-titulo">Listinha</h3>
            <p class="coisinhas-subtitulo">colocar um bichinho para adocao</p>
            <p class="coisinhas-subtitulo"> caso seja uma empresa e queira nos ajudar pode contar-nos atraves da nossa pagina de contato</p>
            <p class="coisinhas-subtitulo">voce pode fazer parte do nosso time e ajudar a fazer a vida de muitos bichinhos melhor</p>
        </section>
    </main>

    <footer class="rodape">
        <h2 class="desenvolvido">Desenvolvido por Nome do Produto</h2>
    </footer>
</body>
</html>