<?php

class UsuarioDB
{
    //funcoes getSET
    private $conexao;
    private $id;
    private $nome;
    private $email;
    private $user;
    private $senha;

   
   public function __construct()
   {
       $this->conexao = new conexao();
   }
   public function getId()
   {
    return $this->id;
   }
   public function setId($id)
   {
     $this->id = $id;
   }
   public function getNome()
   {
     return $this->nome;
   }
   public function setNome($nome)
   {
     $this->nome = $nome;
   }
   public function getSenha()
   {
     return $this->senha;
   }
   public function setSenha($senha)
   {
    $this->senha = $senha;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email=$email;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user=$user;
    }
 public function login($user,$senha)
 {
    $result = "SELECT *FROM cadastro WHERE user = ? AND senha = ?";
    $stmt = mysqli_prepare($this->conexao->getConn(),$result);
    mysqli_stmt_bind_param($stmt,"ss", $user,$senha);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($res)>0)
    {
        return true;
    }
    else
    {
        return false;
    }
 }
 public function unico($email,$user)
 {
    $unico= "SELECT *FROM cadastro where email=? AND user=?";

    $stmt= mysqli_prepare($this->conexao->getConn(), $unico);

    mysqli_stmt_bind_param($stmt,"ss",$email,$user);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($res);
 }
 public function cadastrar($nome,$email,$user,$senha)
 {
    $nome = filter_var($nome, FILTER_SANITIZE_STRING);
    $email= filter_var($email, FILTER_SANITIZE_EMAIL);
    $user = filter_var($user, FILTER_SANITIZE_STRING);
    $senha = filter_var($senha, FILTER_SANITIZE_STRING);

    if(empty($nome)|| empty($email) || empty($user) || empty($senha))
    {
        print "<script>alert('Certifique-se ')</script>";
        print "<script> location.href='index.php'</script>";
    }

    else if(strlen($senha)<6)
    {
        echo '<script>window.onload = function() {
            alert("senha menor que 6 digitos!");
         }</script>';
    }
    
    else {
        $sql = "INSERT INTO cadastro (nome, email, user,senha) VALUES ('{$nome}', '{$email}', '{$user}', '{$senha}')";

        $res = mysqli_query($this->conexao->getConn(), $sql);

        if (mysqli_affected_rows($this->conexao->getConn()) > 0) {
            return true;
        } else {
            return false;
        }
    }

 }


}


