<?php
// Incluir a classe UsuarioDB
include("../classes/UsuarioDB.php");

// Verificar se o parâmetro 'id' foi fornecido
if (isset($_GET['id'])) {
    // Receber o valor do parâmetro 'id'
    $id = $_GET['id'];

    // Criar uma instância da classe UsuarioDB
    $usuarioDB = new UsuarioDB();

    // Chamar o método DeletarUsuario com o ID fornecido
    $usuarioDB->DeletarUsuario($id);

    // Redirecionar para a página desejada após a exclusão
    header('location:?page=listar');
    exit;
}
?>
