<?php

if (isset($_POST['submit'])) {
    include('../classes/db2.php');
    include ('../classes/voluntariosDB.php');

    $voluntario = new voluntariosDB();

    $id = $_POST['id'];

    $nome = filter_var(trim($_POST['nome']), FILTER_SANITIZE_STRING);
    $sobrenome = filter_var(trim($_POST['sobrenome']), FILTER_SANITIZE_STRING);
    $idade = filter_var(trim($_POST['idade']), FILTER_VALIDATE_INT);
    $cpf = filter_var(trim($_POST['cpf']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    
     $consulta = $voluntario->unico($cpf, $email);

    if (!empty($consulta)) {
        header('Location: paraparte.php?repetido=idade');
    } 
    else if ($idade < 18) {
        header('Location: paraparte.php?menor=idade');
    }
    else {
        $insere = $voluntario->cadastroVoluntario($nome, $sobrenome, $idade, $cpf, $email);
        if ($insere) {
            header('Location: paraparte.php?sucess=cadastrado');
        }
    }
    if(isset($_GET['menor']))
    {
        print "<script>alert('necessario responsavel legal')</script>";
    }
    if(isset($_GET['sucess']))
    {
        print "<script>alert('sucesso ao editar voluntario')</script>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empresas</title>
    <link rel = "stylesheet" href="../css2/paraparte.css">
</head>
<body>
    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Edição de voluntario</h1>
        <p id="subtitulo">Edite as informacoes</p>
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
        <h2 class="desenvolvido">Lar Bastet</h2>
    </footer>
</body>
</html>