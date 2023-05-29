<!-- <?php

session_start();
   
if((!isset ($_SESSION['cpf'])==true) and (!isset($_SESSION['senha'])==true))
{
    unset( $_SESSION['cpf'] );
    unset( $_SESSION['senha']);
    header('Location: login.php');
}

$logado = $_SESSION['cpf'];


$nomeEmpresa = $_POST['nomeEmpresa'];
$assunto = $_POST['assunto'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$From = 'fulano@meusite.com';

$Headers      = "MIME-Version: 1.1\n";
$Headers     .= "Content-type: text/html; charset=utf-8\n";
$Headers     .= "From: Meu Site <$From>\n";
$Headers     .= "Return-Path: $From\n";
$Headers     .= "Reply-to: $email\n";

mail($email, $assunto, $mensagem, $Headers, $From);
//fazer dominio pelo firezilla
?> -->
