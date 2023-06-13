<h1>Listar Animais</h1>

<?php


include("../classes/animalDB.php");

$animal = new AnimalDB(); 

$res = $animal->ListarAnimais();

$qtd = count($res); 

if ($qtd > 0) {
    echo "<table class='table'>";
    echo "<th>ID</th>";
    echo "<th>animal</th>";
    echo "<th>localizacao</th>";
    echo "<th>Email</th>";
    echo "<th>Ações</th>";
    foreach ($res as $row) {
        echo "<tr>";
        echo "<td>" . $row->getId() . "</td>";
        echo "<td>" . $row->GetAnimal() . "</td>";
        echo "<td>" . $row->getLocalizacao() . "</td>";
        echo "<td>" . $row->getEmail() . "</td>";
        
        // Se você precisar dos atributos CPF e Email, adicione aqui
       echo "<td>
            <button onclick=\"location.href='?page=editar_animal&id=" . $row->getId() . "'\" class='editar'>Editar</button>
            <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=excluir_animais&acao=excluir&id=" . $row->getId() . "';}else{false;}\" class='excluir'>Excluir</button>
            </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='alert alert-danger'>Nenhum cadastro encontrado!!!</p>";
}
?>
