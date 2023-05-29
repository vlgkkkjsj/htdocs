<?php

class empresaDB
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = new conexao();
    }

    public function unico($empresa)
    {
        $result = "SELECT *FROM empresarial WHERE empresa = '$empresa'";

        $res = mysqli_query($this->conexao-> getConn(),$result);

        if(mysqli_num_rows($res)>1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function cadastrarEmpresa($empresa,$assunto,$email,$mensagem)
    {
        $empresa = filter_var($empresa, FILTER_SANITIZE_STRING);
       $assunto = filter_var($assunto, FILTER_SANITIZE_STRING);
       $email = filter_var($email, FILTER_SANITIZE_STRING);
       $mensagem = filter_var($mensagem, FILTER_SANITIZE_STRING);

       if(empty($empresa) or empty($assunto) or empty($email) or empty($mensagem))
       {
          
        print "<script>alert('certifique-se que inseriu todas as informações')</script>";
        print "<script>location:empresarial.php</script>";

       }
        else
        {
            
        $result = "INSERT INTO empresarial (empresa,assunto,email,mensagem) VALUES ('{$empresa}','{$assunto}','{$email}','{$mensagem}')";

        $res = mysqli_query($this->conexao->getConn(),$result);

        if(mysqli_affected_rows($this-> conexao ->getConn())>0)
        {
            return true;
        }
        else
        {
            return false;
        }
        }
    }


}