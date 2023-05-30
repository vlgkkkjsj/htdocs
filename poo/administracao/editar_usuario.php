<?php

if (isset($_POST['submit'])) {
    include("../classes/UsuarioDB.php");

    $editar = new UsuarioDB();

    $id = $_POST['id']; // Certifique-se de obter o ID corretamente

    $nome = filter_var(trim($_POST['nome']), FILTER_SANITIZE_STRING);
    $sobrenome = filter_var(trim($_POST['sobrenome']), FILTER_SANITIZE_STRING);
    $senha = filter_var(trim($_POST['senha']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    $editacao = $editar->EditarUsuario($id, $nome, $sobrenome, $senha, $email);

    if ($editacao == true) {
        echo "<script>alert('edição realizada com sucesso')</script>";
        header('location:?page=listar');
    } else {
        echo "<script>alert('erro ao editar')</script>";
        header('location:?page=editar');
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Registros</title>
    <link rel ="stylesheet" href="../css/cadastro.css">
    <link rel="icon" href="icon.png" type="image/png">
</head>
<body>

    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Editor de Usuarios</h1>
        <p id="subtitulo">Atualize as informacoes do usuario</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="icon.png">
    <form class="formulario" method="POST">
    <input type="hidden" name="id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : ''; ?>">
        <input type="hidden" name="acao" value="editar">
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