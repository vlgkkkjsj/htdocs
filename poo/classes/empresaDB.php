<?php

class empresa
{
  
    private $conexao;

    private $id;
    private $empresa;
    private $mensagem;
    private $assunto;
    private $email;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getempresa()
    {
        return $this->empresa;
    }
    public function setempresa($empresa)
    {
        $this->empresa = $empresa;
    }
    public function getMensagem()
    {
        return $this->mensagem;
    }
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }
    public function getAssunto()
    {
        return $this->assunto;
    }
    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

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

   
    public function cadastrarempresa($empresa,$mensagem,$assunto,$email)
    {
        $empresa = filter_var($empresa, FILTER_SANITIZE_STRING);
        $mensagem = filter_var($mensagem, FILTER_SANITIZE_STRING);
        $assunto = filter_var($assunto, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_STRING);

        if (empty($empresa) || empty($mensagem) || empty($assunto)|| empty($email)) {
            print "<script> alert('Certifique-se de que informou todas as informações')</script>";
            print "<script> location.href='cadastro.php'</script>";
        } else {
            $sql = "INSERT INTO cadastro (empresa, mensagem,assunto, email) VALUES ('{$empresa}', '{$mensagem}', '{$assunto}', '{$email}')";

            $res = mysqli_query($this->conexao->getConn(), $sql);

            if (mysqli_affected_rows($this->conexao->getConn()) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function Listarempresas()
    {
        $empresas = array();

        $sql = "SELECT * FROM empresarial";
        $res = mysqli_query($this->conexao->getConn(), $sql);

        while ($row = mysqli_fetch_assoc($res)) {
            $empresa = new empresa();

            $empresa->setId($row['id']);
            $empresa->setempresa($row['empresa']);
            $empresa->setAssunto($row['assunto']);
            $empresa->setEmail($row['email']);
            $empresa->setMensagem($row['mensagem']);
            $empresas[] = $empresa;
        }

        return $empresas;
    }


}