<?php

class voluntariosDB
{
    private $conexao;


    public function __construct()
    {
        $this->conexao = new conexao();
    }


    public function maior($idade)
    {
      if($idade>="18")
      {
          return true;
      }
      else
      {
          return false;
      }
    }
    


    public function cadastroVoluntario($nome,$sobrenome,$idade,$cpf,$email)
    {
       if(empty($nome)or empty($sobrenome) or empty($idade)or empty($cpf) or empty($email))
       {
        print "<script> alert('Certifique-se que informou todas as informações')</script>";
        print "<script> location.href='paraparte.php'</script>";
       }
       else
       {
        $result = "INSERT INTO voluntarios (nome,sobrenome,idade,cpf,email) VALUES ('{$nome}','{$sobrenome}','{$idade}','{$cpf}','{$email}')";

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