<h1>Listar Animais</h1>

<?php

$sql = "SELECT *FROM paraadotar";
$res = $conn1 -> query($sql);
$qtd = $res -> num_rows;

if($qtd > 0)
{
    print "<table class='table'>";
    print "<th>Tipo do Animal</th>";
    print "<th>Localizacao de onde foi encontrado</th>";
    print "<th> email</th>";
    print "<th>Ações</th>";

    while ($row = $res->fetch_object())
    {
        print "<tr>";
        print "<td>".$row ->id."</td>";
        print "<td>".$row ->animal."</td>";
        print "<td>".$row ->localizacao."</td>";
        print "<td>".$row ->email."</td>";
        print "<td>;
        <button onclick=\"location.href='?page=editar_animal&id=".$row->id."';\" class='editar'>Editar</button>
        <button onclick=\" if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir_animal&id=".$row->id."';}else{false;}\" class='excluir'>Excluir</button>
        </td>";
    print "</tr>";
    }
    print "</table>";
}
else{
    print("<p class='alert alert-danger'>Nenhum animal encontrado!!!</p>");
}