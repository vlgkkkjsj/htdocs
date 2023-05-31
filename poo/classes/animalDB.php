<?php


class AnimalDB
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new conexao();
    }
    public function cadastrarAnimal($animal,$localizacao,$email)
    {

       if(empty($animal) || empty($localizacao) || empty($email))
       {
            print "<script>alert('ceritifique-se que informou todas as informacoes corretamente')</script>";
            print "<script>location:formParaAdotar.php</script>";
       }
       else
       {
        $result = "INSERT INTO paraadotar (animal,localizacao,email) VALUES ('{$animal}','{$localizacao}','{$email}')";

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
    public function ListarUsuarios()
    {
        $animais = array();

        $sql = "SELECT * FROM animais";
        $res = mysqli_query($this->conexao->getConn(), $sql);

        while ($row = mysqli_fetch_assoc($res)) {
            $usuariodb = new UsuarioDB();

            $usuariodb->setNome($row['id']);
            $usuariodb->setNome($row['nome']);
            $usuariodb->setSobrenome($row['sobrenome']);
            $usuariodb->setSenha($row['senha']);
            $usuariodb->setCpf($row['cpf']);
            $usuariodb->setEmail($row['email']);

            $usuarios[] = $usuariodb;
        }

        return $usuarios;
    }
}