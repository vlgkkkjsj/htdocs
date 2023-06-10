<?php

if (isset($_POST['submit'])) {
    include("../classes/empresaDB.php");

    $editar = new empresa();

    $id = $_POST['id'];

    $empresa = filter_var($empresa, FILTER_SANITIZE_STRING);
    $mensagem = filter_var($mensagem, FILTER_SANITIZE_STRING);
    $assunto = filter_var($assunto, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $editacao = $editar->EditarEmpresa($id,$empresa,$assunto,$email,$mensagem);

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
    <title>Editar Empresas</title>
    <link rel = "stylesheet" href="../css2/empresarial.css">
</head>
<body>
    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Empresarial</h1>
        <p id="subtitulo">Complete suas informações</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="icon.png">
    <form class="formulario" method="POST">
    <input type="hidden" name="id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : ''; ?>">
    <input type="hidden" name="acao" value="editar_empresarial">
        <fieldset class="grupo">
            <div class="campo" >
                <label for="nome"><strong>Nome da empresa</strong></label>
                <input type="text" name="empresa" id="nome" required>
            </div>

            <div class="campo" >
                <label for="assunto"><strong>Assunto</strong></label>
                <input type="text" name="assunto" id="assunto" required>
            </div>

        </fieldset>

        <div class="campo">
            <label for="email"><strong>Email</strong></label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="campo">
        <br>
        <label>Mensagem</label>
        <textarea row="6" style="width: 26em" id="mensagem" name="mensagem"></textarea>
        
      </div>

      <button class="botao" type="submit" name="submit">Concluir</button>
    </form>
</section>
    </main>
</body>
</html>