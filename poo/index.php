<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCC</title>
    <link rel="icon" href="img/icon.png" type="image/png">
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <header class="cabecalho">
        <img class="logo" alt="logo do projeto" src="img/icon.png">
        <nav class="navegacao">
            <a class="cabecalho-menu" href="">Comunidade</a>
            <a class="cabecalho-menu" href="tela_inicial/sobre.php">Sobre Nós</a>
            <a class="cabecalho-menu"href="tela_inicial/feed.php">Adote</a>
            <a class="cabecalho-menu" href="">Desenvolvimento</a>
            <a class= "cabecalho-menu" href="tela_inicial/cadastro.php"style="transform: scale(1); transition: transform 0.5s;" onmouseover="this.style.transform = 'scale(1.1)';" onmouseout="this.style.transform = 'scale(1)';"> cadastre-se</a>
            <a class= "cabecalho-menu" style= "cursor: default";>|</a>
            <a class= "cabecalho-menu" href="tela_inicial/login.php"style="transform: scale(1); transition: transform 0.5s;" onmouseover="this.style.transform = 'scale(1.1)';" onmouseout="this.style.transform = 'scale(1)';">
 login</a>
         <!-- cabecalho principal -->
        </nav>
    </header>

    <!-- tela principal do site onde visitantes e usuarios convidados podem acessar livremente e ate mesmo realizar o cadastro e login -->


    <main class="conteudo">
        <section class="conteudo-principal">
            <div class="conteudo-principal-escrito">
                <h1 class="conteudo-principal-escrito-titulo">Ong Lar Bastet</h1>
                <h2 class="conteudo-principal-escrito-subtitulo">Entenda Mais sobre o projeto</h2>
                <button class="button-principal" onclick="window.location.href='tela_inicial/sobre.php'">Clique Aqui</button>
    <!-- titulos principais e o button clicker onde vai ser redirecionado para a pagina sobre nos, onde o usuario podera ter uma visao melhor 
        sobre o projeto e nossos meios de comunicacao -->
            </div>
            <img class="img-logo-projeto" src="img/icon.png">
        </section>
        <section class="conteudo-secundario">
            <h3 class="conteudo-secundario-titulo" style="transform: scale(1); transition: transform 0.5s;" onmouseover="this.style.transform = 'scale(1.1)';" onmouseout="this.style.transform = 'scale(1)';">Funcoes do Projeto</h3>
            <p class="conteudo-secundario-paragrafo">1.Conseguir um <strong > lar</strong> para nossos amiguinhos</p>
            <p class="conteudo-secundario-paragrafo">2.Tratas e cuidar nossos amiguinhos que estao em situacao de <strong>rua</strong></p>
            <p class="conteudo-secundario-paragrafo">3.Arrecadação de <strong>alimentos</strong> para nossos anjinhos</p>
        </section>
        <!-- conteudo secundario da tela principal onde mostra os objetivos principais da ong -->
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">Desenvolvido por ong lar Bastet</h2>
    </footer>
     <!-- rodape onde ira mostrar o simbolo de copyright e nossa logo oficial -->
</body>
</html>