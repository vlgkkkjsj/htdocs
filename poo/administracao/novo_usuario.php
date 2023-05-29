<?php

if(isset($_POST['submit']))
{
    include("../classes/UsuarioDB.php");

    $cadastro = new UsuarioDB();


    $nome = filter_var(trim($_POST['nome']), FILTER_SANITIZE_STRING);
    $sobrenome = filter_var(trim($_POST['sobrenome']), FILTER_SANITIZE_STRING);
    $senha = filter_var(trim($_POST['senha']), FILTER_SANITIZE_STRING);
    $confirmacao_senha = filter_var(trim($_POST['confirmacao_senha']), FILTER_SANITIZE_STRING);
    $cpf = filter_var(trim($_POST['cpf']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);


    if($senha===$confirmacao_senha)
    {
        $consulta= $cadastro ->unico($cpf);

        if($consulta== false)
        {
            echo "<script>alert('o cpf ja esta em uso, caso seja o seu,entre em contato conosco')</script>";
            header('location:?page=novo');
        }
        else
        {
            $insere = $cadastro->cadastrar($nome,$sobrenome,$senha,$confirmacao_senha,$cpf,$email);
        }
        if($insere == true)
        {
            echo "<script>alert('cadastro realizado com sucesso')</script>";
            header('location:?page=listar');
        }
    }
    else
    {
        echo "<script>alert('erro ao confirmar senha')</script>";
        header('location:?page=novo');
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
    <title>Cadastro Adm</title>
    <link rel ="stylesheet" href="../css/cadastro.css">
</head>
<body>

    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Cadastro via sistema Administrativo</h1>
        <p id="subtitulo">Complete as informacoes do usuario</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="icon.png">
    <form class="formulario" method="POST">
        <input type="hidden" name="acao" value="cadastrar">
        <fieldset class="grupo">
            <div class="campo" >
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div class="campo">
                <label for="Sobrenome" ><strong>Sobrenome</strong></label>
                <input type="text" name="sobrenome" id="Sobrenome"required>
            </div>

            <div class="campo">
                <label for="senha"><strong>Senha</strong></label>
                <input type=password name="senha" id="senha" required>
            </div>

            <div class="campo">
                <label for="senha"><strong>Confirmacao de senha</strong></label>
                <input type=password name="confirmacao_senha" id="confirmacao_senha" >
            </div>

            <div class="campo">
                <label for="cpf" ><strong>cpf</strong></label>
                <input type="text" name="cpf" id="cpf"required>
            </div>
        </fieldset>

        <div class="campo">
            <label for="email"><strong>Email</strong></label>
            <input type="email" name="email" id="email" required>
        </div>


      <button class="botao" type="submit" name="submit">Concluir</button>
    </form>
</section>
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">Desenvolvido por Nome do Produto</h2>
    </footer>
</body>
</html>