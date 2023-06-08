<?php

class voluntariosDB
{
    private $conexao;
    private $id;
    private $nome;
    private $sobrenome;
    private $idade;
    private $cpf;
    private $email;

    public function __construct()
    {
        $this->conexao = new conexao();
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }
    public function getIdade()
    {
        return $this->idade;
    }
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


   /*  public function maior($idade)
    {
      if($idade>='18')
      {
          return true;
      }
      else
      {
          return false;
      }
    } */
    public function cadastroVoluntario($nome,$sobrenome,$idade,$cpf,$email)
    {
      $nome = filter_var($nome , FILTER_SANITIZE_STRING);
      $sobrenome = filter_var($sobrenome,FILTER_SANITIZE_STRING);
      $idade = filter_var($idade,FILTER_SANITIZE_NUMBER_INT);
      $cpf = filter_var($cpf, FILTER_SANITIZE_STRING);
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (empty($nome) || empty($sobrenome) || empty($idade) || empty($cpf) || empty($email)) {
            print "<script> alert('Certifique-se de que informou todas as informações')</script>";
            print "<script> location.href='paraparte.php'</script>";
        }
        else if($idade<18)
        {
            echo '<script> alert("menor")</script>';
            print "<script> location.href='paraparte.php'</script>";
        }
        else if(strlen($cpf)<11 || strlen($cpf)>11)
        {
            echo '<script> alert("cpf menor ou maior que 11 digitos!")</script>';
            print "<script> location.href='paraparte.php'</script>";
        }
        else
        {
            $sql = "INSERT INTO voluntarios (nome, sobrenome, idade, cpf, email) VALUES ('{$nome}', '{$sobrenome}', '{$idade}', '{$cpf}', '{$email}')";

            $res = mysqli_query($this->conexao->getConn(), $sql);

            if (mysqli_affected_rows($this->conexao->getConn()) > 0) 
            {
                return true;
            }
            else
            {
                return false;
            }
          
        } 
    }
    public function Unico($cpf,$email)
    {
        $unico = "SELECT *FROM voluntarios WHERE cpf = ? AND email=?";

        $stmt = mysqli_prepare($this->conexao->getConn(),$unico);
        mysqli_stmt_bind_param($stmt, "ss",$cpf,$email);
        mysqli_stmt_execute($stmt);
        $res= mysqli_stmt_get_result($stmt);

        return mysqli_fetch_assoc($res);
    }
    public function ListarVoluntarios()
    {
        $voluntarios = array();

        $sql = "SELECT *FROM voluntarios";
        $res = mysqli_query($this->conexao->getConn(),$sql);

        while($row= mysqli_fetch_assoc($res))
        {
            $voluntariodb = new voluntariosDB();

            $voluntariodb->setId($row['id']);
            $voluntariodb->setNome($row['nome']);
            $voluntariodb->setSobrenome($row['sobrenome']);
            $voluntariodb->setIdade($row['idade']);
            $voluntariodb->setCpf($row['cpf']);
            $voluntariodb->setEmail($row['email']);

            return $voluntarios;
        }
    }
    public function EditarVoluntarios($id,$nome,$sobrenome,$idade,$cpf,$email)
    {
        $sql = "UPDATE voluntarios SET
                nome= ?,
                sobrenome=?,
                idade=?,
                cpf=?,
                email = ?
                WHERE id= ?";
        $stmt  = mysqli_prepare($this->conexao->getConn(), $sql);

        mysqli_stmt_bind_param($stmt, "ssssi",$nome, $sobrenome, $idade, $email, $id);

        mysqli_stmt_execute($stmt);

        if(mysqli_affected_rows($this->conexao->getConn())>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function DeletarVoluntarios($id)
    {
        $sql = "DELETE FROM voluntarios WHERE id= '".$id . "'";

        $res = mysqli_query($this->conexao->getConn(),$sql);

        if($res== true)
        {
            print "<script> alert('Usuário deletado com sucesso')</script>";
            print "<script> location.href='?page=listarVoluntario';</script>"; 
        }
        else
        {
            print "<script> alert('Falha ao deletar usuário')</script>";
        }
    }

}