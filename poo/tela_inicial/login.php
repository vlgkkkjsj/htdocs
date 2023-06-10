<?php

if($_POST)
{
    include('../classes/db2.php');
    include ('../classes/usuarioDB.php');

    $usuario = new UsuarioDB();
    
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    
    
    $user = $usuario->login($cpf,$senha);

    if($user == true)
    {
        session_start();
        $_SESSION['cpf'] = $cpf;
        $_SESSION['senha'] = $senha;
        header('location:../sistema/sistema.php');
    }
    else
    {
        header('location: login.php?erro=senha');
        
    }

}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/iconTopo.png" type="image/png">
    <title>Login</title>
    <link rel ="stylesheet" href="../css/loginkk.css">
</head>
<body>

<?php

    if(isset($_GET['erro']))
    {
        print "<script>alert('usuario e/ou senha incorretos')</script>";
    }

?>

<header class="cabecalho">
    <button class="voltar" onclick="window.location.href='../index.php'">voltar</button>
        <img class="logo" alt="logo do projeto" src="../img/icon.png">
        <nav class="navegacao">
            <a class="cabecalho-menu" href="sobre.php">Sobre Nós</a>
            <a class="cabecalho-menu"href="adote.php">Adote</a>

        </nav>
    </header>

    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Logue em sua conta :)</h1>
        <p id="subtitulo">insira suas informacoes</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="../img/icon2.png" height="40px">
    <form class="formulario" method="POST" action="">
        <fieldset class="grupo">
        <div class="campo">
                <label for="cpf" ><strong>cpf</strong></label>
                <input type="text" name="cpf" id="cpf">
            </div>

            <div class="campo">
                <label for="senha"><strong>Senha</strong></label>
                <input type=password name="senha" id="senha" >
            </div>

         
        </fieldset>
       
      <button class="botao" type="submit" name="submit">Concluir</button>

      <a class="cadastroo" href="cadastro.php">Não possui conta? Cadastre-se</a>
      <a class="esqueceu" href="esqueceu_senha.php">Esqueceu a senha? Redefina agora</a>

     
    </form>
       

</section>
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">Desenvolvido por Nome do Produto</h2>
    </footer>
</body>
</html>