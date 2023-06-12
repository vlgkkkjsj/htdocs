<?php

if(isset($_POST['submit']))
{
    include_once('../classes/db2.php');
    include_once('../classes/animalDB.php');



    $animalCadastro = new animalDB();

    $animal = filter_var(trim($_POST['animal']), FILTER_SANITIZE_STRING);
    $localizacao = filter_var(trim($_POST['localizacao']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);

   if($animal==$animal)
   {
        $consulta = $animalCadastro->unico($email);
        
        if($consulta==true)
        {
            if($animal=== $animal)
            {

                $insereAnimal = $animalCadastro ->cadastrarAnimal($animal,$localizacao,$email);
            }
            if($insereAnimal == true)
            {
                header('location:colocarAdocao.php?sucesso=cadastrado');
            }
        }
        else
        {
            header('location:colocarAdocao.php?repetido=email');
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
    <form class="formulario" method="POST">
    <input type="hidden" name="id" value="<?php echo isset($_REQUEST['id']) ? $_REQUEST['id'] : ''; ?>">
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