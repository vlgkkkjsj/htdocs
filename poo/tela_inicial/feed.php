<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/iconTopo.png" type="image/png">
    <link rel="stylesheet" href="../css/feed.css">
    <script src="../script.js" defer></script>
    <title>feed de fotos</title>
</head>
<body>
<header class="cabecalho">
        <button class="voltar" onclick="window.location.href='../index.php'">voltar</button>
        <img class="logo" alt="logo" src="../img/icon.png">
        <nav class="navegacao">
         
            <a class="cabecalho-menu" href="sobre.php">Sobre Nós</a>
            <a class= "cabecalho-menu" href="cadastro.php"style="transform: scale(1); transition: transform 0.5s;" onmouseover="this.style.transform = 'scale(1.1)';" onmouseout="this.style.transform = 'scale(1)';"> Cadastre-se</a>
            <a class= "cabecalho-menu" style= "cursor: default";>|</a>
            <a class= "cabecalho-menu" href="login.php"style="transform: scale(1); transition: transform 0.5s;" onmouseover="this.style.transform = 'scale(1.1)';" onmouseout="this.style.transform = 'scale(1)';">
 Login</a>
        </nav>
    </header>
    <main class="conteudo">
    <h1 id="titulo-principal">Galeria de Fotos :)</h1>
    <p id="subtitulo">Todos os nossos modelos</p>
    </main>
        <div class="container">
            <div class="card">
            <img src="../uploads/01.jpeg" alt="Foto 1">
            <p>Ringo</p>
            <p class="additional-info">Macho</p>
            <p class="show-info">1 ano, Fiv/Fielv negativo.</p>
        </div>
        <div class="card">
            <img src="../uploads/03.jpeg" alt="Foto 1">
            <p>Pipoca</p>
            <p class="additional-info">Fêmea</p>
            <p class="show-info">6 meses, Fiv/Fielv positivo.</p>
        </div>
        <div class="card">
            <img src="../uploads/04.jpeg" alt="Foto 1">
            <p>Lily</p>
            <p class="additional-info">Fêmea</p>
            <p class="show-info">5 meses,castração agendada.</p>
        </div>
        <div class="card">
            <img src="../uploads/05.jpeg" alt="Foto 1">
            <p>Cookie</p>
            <p class="additional-info">Fêmea</p>
            <p class="show-info">9 meses, Fiv/Fielv positivo.</p>
        </div>
        <div class="card">
            <img src="../uploads/06.jpeg" alt="Foto 1">
            <p>Doroty</p>
            <p class="additional-info">Fêmea</p>
            <p class="show-info">3 anos, castrada.</p>
        </div>
        <div class="card">
            <img src="../uploads/07.jpeg" alt="Foto 1">
            <p>Nino</p>
            <p class="additional-info">Macho</p>
            <p class="show-info">7 meses, não é castrado.</p>
        </div>
        <div class="card">
            <img src="../uploads/08.jpeg" alt="Foto 1">
            <p>Toco</p>
            <p class="additional-info">Macho</p>
            <p class="show-info">4 meses, não é castrado.</p>
        </div>
        <div class="card">
            <img src="../uploads/01.jpeg" alt="Foto 1">
            <p>Gigi</p>
            <p class="additional-info">Fêmea</p>
            <p class="show-info">5 anos, Fiv/Fielv negativo.</p>
        </div>
        </div>
        <div class="me-adote">
       <button class="me-adote" onclick="window.location.href='../tela_inicial/adote.php'">Me adote </button>
       </div>

    <footer class="rodape">
        <h2 class="desenvolvido">Lar Bastet</h2>
    </footer>
</body>
</html>