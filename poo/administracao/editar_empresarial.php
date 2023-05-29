<?php

$sql = "SELECT *FROM empresarial WHERE = id".$_REQUEST["id"];
$res = $conn1 ->query($sql);
$row = $res -> fetch_object();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empresas</title>
    <link rel = "stylesheet" href="empresarial.css">
</head>
<body>
<header class="cabecalho">
    <button class="voltar"  onclick="window.location.href='sistema.php'" >voltar</button>
        <img class="logo" alt="logo" src="icon.png">
        <button class="sair"  onclick="window.location.href='login.php'" >sair</button>
    </header>
    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Empresarial</h1>
        <p id="subtitulo">Complete suas informações</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="icon.png">
    <form class="formulario" method="POST" action="?page=salvar">
    <input type="hidden" name="acao" value="editar_empresarial"> 
    <input type="hidden" name="id" value="<?php print $row->id; ?>" >
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