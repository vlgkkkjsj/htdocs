<?php

$sql = "SELECT *FROM paraadotar WHERE id=".$_REQUEST["id"];
$res = $conn1 -> query($sql);
$row = $res -> fetch_object();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Animais</title>
    <link rel = "stylesheet" href="formParaAdotar.css">
</head>
<body>
<main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">coloque para adotar</h1>
        <p id="subtitulo">Complete as informações do animal</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="icon.png">
    <form class="formulario" method="POST" action="?page=salvar"enctype="multipart/form-data">
    <input type="hidden" name="acao" value="editar_animal"> 
    <input type="hidden" name="id" value="<?php print $row->id; ?>" >
        <input type="hidden" name="acao" value="editar_animal">
        <fieldset class="grupo">
            <div class="campo" >
                <label for="nome"><strong>Tipo de Animal</strong></label>
                <input type="text" name="animal" id="animal" required>
            </div>

            <div class="campo" >
                <label for="assunto"><strong>Onde foi encontrado</strong></label>
                <input type="text" name="localizacao" id="localizacao" required>
            </div>

        </fieldset>

        <div class="campo">
            <label for="email"><strong>Email Para entrarmos em contato</strong></label>
            <input type="email" name="email" id="email" required>
        </div>

          <div class="campo">     
                     <label for="arquivo">Enviar arquivo</label>
                     <input type="file" name="arquivo" id="arquivo">
          </div>

      <button class="botao" type="submit" name="submit">Concluir</button>
 

    </form>
    </section>
    </main>
    
</body>
</html>