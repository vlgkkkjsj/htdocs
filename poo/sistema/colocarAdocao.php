<?php

session_start();

if ((!isset($_SESSION['cpf']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['cpf']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

$logado = $_SESSION['cpf'];

if (isset($_POST['submit'])) {
    include_once('../classes/db2.php');
    include_once('../classes/animalDB.php');

    $animalCadastro = new animalDB();

    $animal = filter_var(trim($_POST['animal']), FILTER_SANITIZE_STRING);
    $localizacao = filter_var(trim($_POST['localizacao']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);

    if ($animal == $animal) {
        $consulta = $animalCadastro->unico($email);

        if ($consulta == true) {
            if ($animal === $animal) {
                // Salvar imagem no banco de dados
                $imagem = $_FILES['arquivo']['tmp_name']; // Localização temporária do arquivo
                $nomeImagem = $_FILES['arquivo']['name']; // Nome original do arquivo
                
                // Verificar se o arquivo foi enviado com sucesso
                if ($_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
                    $conteudoImagem = file_get_contents($imagem); // Lê o conteúdo do arquivo
            
                    $insereAnimal = $animalCadastro-> cadastrarAnimal($animal, $localizacao, $email, $conteudoImagem);
                } else {
                    // Tratar o erro no envio do arquivo
                    echo "Erro no envio do arquivo: " . $_FILES['arquivo']['error'];
                    exit;
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
    <meta name="viewport" content=" width=device-width, initial-scale=1.0">
    <link rel="icon" href="../css2/icon.png" type="image/png">
    <title>Lar Bastet</title>
    <link rel="stylesheet" href="../css2/formParaAdotar.css">
</head>

<body>

    <?php

    if (isset($_GET['sucesso'])) {
        print "<script>alert('cadastro do animal realizado com sucesso')</script>";
    } else if (isset($_GET['repetido'])) {
        print "<script>alert('email ja em uso')</script>";
    }

    ?>

    <header class="cabecalho">
        <button class="voltar" onclick="window.location.href='sistema.php'">voltar</button>
        <img class="logo" alt="logo" src="../img/icon.png">
        <nav class="navegacao">
            <a class="cabecalho-menu" href="empresarial.php">Parcerias</a>
            <a class="cabecalho-menu" href="paraparte.php">faca parte do projeto</a>

        </nav>
        <button class="sair" onclick="window.location.href='logout.php'">sair</button>
    </header>
    <main class="conteudo">
        <section class="formulario">
            <div>
                <h1 id="titulo-principal">Busque um lar para um animalzinho</h1>
                <p id="subtitulo">Complete as informações do animal</p>
                <br>
            </div>
            <img class="img-logo-projeto" src="../img/icon.png">
            <form class="formulario" method="POST" action="" enctype="multipart/form-data">
                <fieldset class="grupo">
                    <div class="campo">
                        <label for="nome"><strong>Tipo de Animal</strong></label>
                        <input type="text" name="animal" id="animal" required>
                    </div>

                    <div class="campo">
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
                        transform: scale(1);
                        transition: transform 0.5s;" onmouseover="this.style.transform = 'scale(1.1)';" onmouseout="this.style.transform = 'scale(1)'">Enviar arquivo</label>
                    <input type="file" name="arquivo" id="arquivo">
                </div>

                <button class="botao" type="submit" name="submit">Concluir</button>


            </form>
        </section>
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">Lar Bastet</h2>
    </footer>
</body>

</html>
