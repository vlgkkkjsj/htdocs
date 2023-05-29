<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icon.png" type="image/png">
    <link rel="stylesheet" href="../css/feed.css">
    <script src="../script.js" defer></script>
    <title>feed de fotos</title>
</head>
<body>
<header class="cabecalho">
        <button class="voltar" onclick="window.location.href='../index.php'">voltar</button>
        <img class="logo" alt="logo" src="../img/icon.png">
        <nav class="navegacao">
            <a class="cabecalho-menu" href="">Comunidade</a>
            <a class="cabecalho-menu" href="../tela_inicial/sobre.php">Sobre Nós</a>
            <a class="cabecalho-menu" href="">Desenvolvimento</a>
            <a class= "cabecalho-menu" href="cadastro.php"> cadastre-se</a>
            <a class= "cabecalho-menu" href="">|</a>
            <a class= "cabecalho-menu" href="login.php"> login</a>
        </nav>
    </header>
    <main class="conteudo">
    <h1 id="titulo-principal">Galeria de Fotos :)</h1>
    <p id="subtitulo">Todos os nossos modelos</p>
    </main>

  
        <div class="container">
            <button id="prev-button"><img src="../img/arrow-right.png"></button>
            <div class="container-imagem">
                <img src="../uploads/01.jpeg"class="slider on">
                <img src="../uploads/02.png" class="slider">
                <img src="../uploads/03.jpeg" class="slider">
                <img src="../uploads/04.jpeg" class="slider">
                <img src="../uploads/05.jpeg" class="slider">
                <img src="../uploads/06.jpeg" class="slider">
                <img src="../uploads/07.jpeg" class="slider">
                <img src="../uploads/08.jpeg" class="slider">
                <img src="../uploads/09.jpeg" class="slider">
                <img src="../uploads/010.jpeg" class="slider">
            </div>
            <button id="next-button"><img src="../img/arrow-left.png"></button>
       
        </div>
        <div class="me-adote">
       <button class="me-adote" onclick="window.location.href='../tela_inicial/adote.php'">Me adote </button>
       </div>
   
    <footer class="rodape">
        <h2 class="desenvolvido">Desenvolvido por Nome do Produto</h2>
    </footer>
</body>
</html>