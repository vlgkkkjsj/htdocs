<?php


class AnimalDB2
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new conexao();
    }
    public function cadastrarAnimal($nome,$sobrenome,$email,$nome_bichinho)
    {
       if(empty($nome) || empty($sobrenome) || empty($email) || empty($nome_bichinho))
       {
            print "<script>alert('ceritifique-se que informou todas as informacoes corretamente')</script>";
            print "<script>location:adote.php</script>";
       }
       else
       {
        $result = "INSERT INTO adotar (nome,sobrenome,email,nome_bichinho) VALUES ('{$nome}','{$sobrenome}','{$email}','{$nome_bichinho}')";

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