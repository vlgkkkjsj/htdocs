<?php
     /* if(isset($_POST['cpf'])==true)
    {
        include_once('conexao/db2.php');
        $senha = md5($_POST['senha']);

        $sql = "UPDATE cadastro SET
         
         senha = '{$senha}'
         where cpf =" .$_REQUEST["cpf"];
         $res = $conn1 -> query($sql);

        if($res == true){
            print "<script> alert('Editado com sucesso!!! ')</script>";
        }else{
            print"<script>alert('Erro ao editar o usuario')</script>";
        }
    }
*/
if(isset($_POST['submit']))
{
    require_once('../classes/db2.php');
    require_once('../classes/usuarioDB.php');

    $esqueci = new UsuarioDB();

    $senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);
    $confirmacao_senha = filter_var($_POST['confirmacao_senha'], FILTER_SANITIZE_STRING);
    $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_STRING);
    
     
    if(strlen($senha)<6)
    {
        header('location: esqueceu_senha.php?menor=senha');
    }
    else
    {
        if($senha===$confirmacao_senha)
        {
            $esqueceu = $esqueci->RedefineSenha($senha, $cpf);
            if($esqueceu==true)
            {
                header('location: esqueceu_senha.php?success=cadastrado');
            }
        }
        else 
        {

            header('location:esqueceu_senha.php?erro=senha');

        }

    }
}




?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>esqueceu a senha</title>
    <link rel="stylesheet" href="../css/esqueceu_senha.css">
</head>
<body>


<?php
      
      if(isset($_GET['erro'])) {
        echo"<script>alert('as senhas nao coincidem')</script>";
      }
      if(isset($_GET['success'])) {
      echo"<script>alert('redefinido  com sucesso')</script>";
      }
      if(isset($_GET['menor']))
      {
        echo "<script>alert('a senha possui menos de 6 caracteres')</script>";
      }
    ?>

<header class="cabecalho">
    <button class="voltar" onclick="window.location.href='login.php'">voltar</button>
        <img class="logo" alt="logo do projeto" src="../img/icon.png">
        <nav class="navegacao">
            <a class="cabecalho-menu" href="">Comunidade</a>
            <a class="cabecalho-menu" href="sobre.php">Sobre Nós</a>
            <a class="cabecalho-menu"href="adote.php">Adote</a>
            <a class="cabecalho-menu" href="">Desenvolvimento</a>
            <a class= "cabecalho-menu" href="">|</a>
            <a class= "cabecalho-menu" href=""> login</a>
        </nav>
    </header>
<main class="conteudo">
    <section class="formulario">        
    <div >
        <h1 id="titulo-principal">Redefina sua senha</h1>
        <p id="subtitulo">insira seu cpf e sua nova senha</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="../img/icon.png" height="40px">
    <form class="formulario" method="POST" action="">
        <fieldset class="grupo">
        <div class="campo">
                <label for="cpf" ><strong>cpf</strong></label>
                <input type="text" name="cpf" id="cpf"required>
            </div>

            <div class="campo">
                <label for="senha"><strong>Senha</strong></label>
                <input type=password name="senha" id="senha" required>
            </div>
            <div class="campo">
                <label for="senha"><strong>confirmacao_senha</strong></label>
                <input type=password name="confirmacao_senha" id="confirmacao_senha" required>
            </div>

         
        </fieldset>
       
      <button class="botao" type="submit" name="submit">Concluir</button>
      </form>
      </section>
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">Desenvolvido por Nome do Produto</h2>
    </footer>
</body>
</html>

