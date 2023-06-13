<h1>Listar Empresas</h1>

<?php


include("../classes/empresaDB.php");

$candidatoss = new empresa(); 

$res = $candidatoss->ListarEmpresas();

$qtd = count($res); 

if ($qtd > 0) {
    echo "<table class='table'>";
    echo "<th>ID</th>";
    echo "<th>Empresa</th>";
    echo "<th>Assunto</th>";
    echo "<th>Email</th>";
    echo "<th>Mensagem</th>";
    echo "<th>Ações</th>";
    foreach ($res as $row) {
        echo "<tr>";
        echo "<td>" . $row->getId() . "</td>";
        echo "<td>" . $row->getEmpresa() . "</td>";
        echo "<td>" . $row->getAssunto() . "</td>";
        echo "<td>" . $row->getEmail() . "</td>";
          echo "<td>" . $row->getMensagem() . "</td>";
        
        // Se você precisar dos atributos CPF e Email, adicione aqui
       echo "<td>
            <button onclick=\"location.href='?page=editar_empresarial&id=" . $row->getId() . "'\" class='editar'>Editar</button>
            <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=excluir_empresas&acao=excluir&id=" . $row->getId() . "';}else{false;}\" class='excluir'>Excluir</button>
            </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='alert alert-danger'>Nenhum cadastro encontrado!!!</p>";
}
?>
