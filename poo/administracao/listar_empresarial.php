<h1>Listar Empresas Pretendentes</h1>

<?php

$sql = "SELECT *FROM empresarial";

$res = $conn1 -> query($sql);

$qtd = $res -> num_rows;

if($qtd > 0 )
{
    print "<table class='table'>";
    print "<th>ID</th>";
    print "<th> Nome da empresa</th>";
    print "<th>assunto</th>";
    print "<th>email</th>";
    print "<th>Ações</th>";
    while($row = $res->fetch_object() ){
        print "<tr>";
        print "<td>".$row->id."</td>";
        print "<td>".$row->empresa."</td>";
        print "<td>".$row->assunto."</td>";
        print "<td>".$row->email."</td>";
        print "<td>
                <button onclick=\"location.href='?page=editar_empresarial&id=".$row->id."';\" class='editar'>Editar</button>
                <button onclick=\" if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\" class='excluir'>Excluir</button>
                </td>";
        print "</tr>";
        
    }
    print "</table>";
}else{
    print("<p class='alert alert-danger'>Nenhum cadastro encontrado!!!</p>");
}