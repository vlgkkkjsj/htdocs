<h1>Listar usuários</h1>

<?php


include("../classes/UsuarioDB.php");

$usuarioDB = new UsuarioDB(); // Cria uma instância da classe UsuarioDB

$res = $usuarioDB->ListarUsuarios(); // Chama o método ListarUsuarios para obter os usuários

$qtd = count($res); // Obtém a quantidade de usuários

if ($qtd > 0) {
    echo "<table class='table'>";
    echo "<th>ID</th>";
    echo "<th>Nome</th>";
    echo "<th>Sobrenome</th>";
    echo "<th>Senha</th>";
    echo "<th>CPF</th>";
    echo "<th>Email</th>";
    echo "<th>Ações</th>";
    foreach ($res as $row) {
        echo "<tr>";
        echo "<td>" . $row->getId() . "</td>";
        echo "<td>" . $row->getNome() . "</td>";
        echo "<td>" . $row->getSobrenome() . "</td>";
        echo "<td>" . $row->getSenha() . "</td>";
        echo "<td>" . $row->getCpf() . "</td>";
        echo "<td>" . $row->getEmail() . "</td>";
        
        // Se você precisar dos atributos CPF e Email, adicione aqui
        echo "<td>
        <button onclick=\"location.href='?page=editar&cpf=" . $usuarioDB->getCpf() . "'\" class='editar'>Editar</button>
        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&icpf=" . $usuarioDB->getCpf() . "';}else{false;}\" class='excluir'>Excluir</button>
      </td>";
        echo "</tr>";


    }
    echo "</table>";
} else {
    echo "<p class='alert alert-danger'>Nenhum cadastro encontrado!!!</p>";
}
?>