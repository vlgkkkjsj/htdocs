<!-- <?php

/*  switch(@$_REQUEST["acao"])
    {
        case 'cadastrar':
            {
                //filter_var (necessaria passada de dois paramentros , o nome da variavel e o metodo de s)
                $nome = filter_var($nome, FILTER_SANITIZE_STRING);
                $sobrenome= filter_var($sobrenome, FILTER_SANITIZE_STRING);
                $senha= filter_var($senha, FILTER_SANITIZE_STRING);
                $confirmacao_senha= filter_var($confirmacao_senha, FILTER_SANITIZE_STRING);
                $cpf= filter_var($cpf,FILTER_SANITIZE_STRING);
                $email =  filter_var($email, FILTER_SANITIZE_STRING);
                
                if(empty($nome) or empty($sobrenome)or empty($senha) or empty($confirmacao_senha)or empty($cpf)or empty($email))//verificacao se os campos estao preenchidos
                {
                    print "<script> alert('Certifique-se que informou todas as informações')</script>";
                    print "<script> location.href='cadastro.php'</script>";
                }
                else {
    
    
                   $sql = "INSERT INTO cadastro (nome,sobrenome,senha,confirmacao_senha,cpf,email) values 
                   ('{$nome}','{$sobrenome}','{$senha}','{$confirmacao_senha}','{$cpf}','{$email}')";
       
                   $res = mysqli_query($this->conexao->getConn(),$sql);
       
                   if(mysqli_affected_rows($this->conexao->getConn()) > 0) 
                   {
                       return true;
                     } 
                     else
                    {
                       return false;
                     }
                  } 
                }
            break;
      /*   case 'editar':
            $nome = filter_var(trim($_POST['nome']), FILTER_SANITIZE_STRING);
            $sobrenome = filter_var(trim($_POST['sobrenome']), FILTER_SANITIZE_STRING);
            $senha = filter_var(trim($_POST['senha']), FILTER_SANITIZE_STRING);
            $confirmacao_senha = filter_var(trim($_POST['confirmacao_senha']), FILTER_SANITIZE_STRING);
            $cpf = filter_var(trim($_POST['cpf']), FILTER_SANITIZE_STRING);
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        
    
            $sql = "UPDATE cadastro SET 
                    nome = '{$nome}',
                    sobrenome = '{$sobrenome}',
                    senha = '{$senha}',
                    cpf = '{$cpf}',
                    email = '{$email}'
                    
                    where id =".$_REQUEST["id"];
           $res = mysqli_query($this->conexao->getConn(),$sql);
    
            if($res == true){
                print "<script> alert('Editado com sucesso!!! ')</scrip>";
                print"<script>  location.href='?page=listar';</script>";
            }else{
                print"<script>alert('Erro ao editar o usuario')</script>";
            }
    
            break; 
        case 'excluir':
                $sql = "DELETE FROM cadastro WHERE id=" .$_REQUEST["id"];

                $res = $conn1 -> query($sql);

                if($res== true) 
                {
                    print "<script> alert('Usuario deletado com sucesso')</script>";
                    print "<script> location.href='?page=listar';</script>";
                }
                else{
                    print "<script> alert('Falha ao deletar usuario')</script>";
                }
                break;
        case 'editar_animal':
            $animal = $_POST['animal'];
            $localizacao = $_POST['localizacao'];
            $email = $_POST['email'];
    
            $sql = "UPDATE paraadotar SET 
                    animal = '{$animal}',
                    localizacao = '{$localizacao}',
                    email = '{$email}'
                    where id =".$_REQUEST["id"];
             $res = $conn1->query($sql);
    
            if($res == true){
                print "<script> alert('Editado com sucesso!!! ')</script>";
                print"<script>  location.href='?page=listar_animal';</script>";
            }else{
                print"<script>alert('Erro ao editar o usuario')</script>";
            }
            break;    

        case 'excluir_animal':
            $sql = "DELETE FROM paraadotar WHERE id=" .$_REQUEST["id"];

            $res = $conn1 -> query($sql);

            if($res== true) 
            {
                print "<script> alert('animal deletado com sucesso')</script>";
                print "<script> location.href='?page=listar';</script>";
            }
            else{
                print "<script> alert('Falha ao deletar animal')</script>";
            }
            break;
    } */