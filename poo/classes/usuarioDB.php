<?php


class UsuarioDB
{
    private $conexao;
    private $id;
    private $nome;
    private $sobrenome;
    private $senha;
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

    public function login($cpf, $senha)
    {
        $result = "SELECT * FROM cadastro WHERE cpf = ? AND senha = ?";
        $stmt = mysqli_prepare($this->conexao->getConn(), $result);
        mysqli_stmt_bind_param($stmt, "ss", $cpf, $senha);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function unico($cpf, $email)
    {
        $unico = "SELECT * FROM cadastro WHERE cpf = ? AND email = ?";
    
        $stmt = mysqli_prepare($this->conexao->getConn(), $unico);
        mysqli_stmt_bind_param($stmt, "ss", $cpf, $email);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
    
        return mysqli_fetch_assoc($res);
    }
    

    public function cadastrar($nome, $sobrenome, $senha, $confirmacao_senha, $cpf, $email)
    {
        $nome = filter_var($nome, FILTER_SANITIZE_STRING);
        $sobrenome = filter_var($sobrenome, FILTER_SANITIZE_STRING);
        $senha = filter_var($senha, FILTER_SANITIZE_STRING);
        $cpf = filter_var($cpf, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (empty($nome) || empty($sobrenome) || empty($senha) || empty($cpf) || empty($email)) {
            print "<script> alert('Certifique-se de que informou todas as informações')</script>";
            print "<script> location.href='cadastro.php'</script>";
        } 
        if(strlen($cpf)<11 || strlen($cpf)>11)

        {
            echo '<script>window.onload = function() {
                alert("cpf menor ou maior que 11 digitos!");
             }</script>';
        }
        else if(strlen($senha)<6)
        {
            echo '<script>window.onload = function() {
                alert("senha menor que 6 digitos!");
             }</script>';
        }
        
        else {
            $sql = "INSERT INTO cadastro (nome, sobrenome, senha, cpf, email) VALUES ('{$nome}', '{$sobrenome}', '{$senha}', '{$cpf}', '{$email}')";

            $res = mysqli_query($this->conexao->getConn(), $sql);

            if (mysqli_affected_rows($this->conexao->getConn()) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function RedefineSenha($senha, $confirmacao_senha, $cpf)
    {
        $cpf = filter_var($cpf, FILTER_SANITIZE_STRING);
        $senha = filter_var($senha, FILTER_SANITIZE_STRING);
        $confirmacao_senha = filter_var($confirmacao_senha, FILTER_SANITIZE_STRING);

        if (empty($senha) || empty($confirmacao_senha) || empty($cpf)) {
            print "<script> alert('Certifique-se de que informou todas as informações')</script>";
            print "<script> location.href='esqueceu.php'</script>";
        } else {
            $sql = "UPDATE cadastro SET senha = '{$senha}', confirmacao_senha = '{$confirmacao_senha}' WHERE cpf = '{$cpf}'";

            $res = mysqli_query($this->conexao->getConn(), $sql);
            
            if (mysqli_affected_rows($this->conexao->getConn()) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function ListarUsuarios()
    {
        $usuarios = array();

        $sql = "SELECT * FROM cadastro";
        $res = mysqli_query($this->conexao->getConn(), $sql);

        while ($row = mysqli_fetch_assoc($res)) {
            $usuariodb = new UsuarioDB();

            $usuariodb->setId($row['id']);
            $usuariodb->setNome($row['nome']);
            $usuariodb->setSobrenome($row['sobrenome']);
            $usuariodb->setSenha($row['senha']);
            $usuariodb->setCpf($row['cpf']);
            $usuariodb->setEmail($row['email']);

            $usuarios[] = $usuariodb;
        }

        return $usuarios;
    }

    public function EditarUsuario($id, $nome, $sobrenome, $senha, $email)
    {
        $sql = "UPDATE cadastro SET 
                    nome = ?,
                    sobrenome = ?,
                    senha = ?,
                    email = ?
                WHERE id = ?";
    
        $stmt = mysqli_prepare($this->conexao->getConn(), $sql);
    
        // Bind dos parâmetros
        mysqli_stmt_bind_param($stmt, "ssssi", $nome, $sobrenome, $senha, $email, $id); // ssssi = os S indicam uma string o I indica um inteiro
    
        mysqli_stmt_execute($stmt);
    
        if (mysqli_affected_rows($this->conexao->getConn()) > 0) 
        {
            return true;
        } else {
            return false;
        }
    }


    public function DeletarUsuario($id)
    {
        $sql = "DELETE FROM cadastro WHERE id = '" . $id . "'";
    
        $res = mysqli_query($this->conexao->getConn(), $sql);
    
        if ($res == true) {
            print "<script> alert('Usuário deletado com sucesso')</script>";
            print "<script> location.href='?page=listar';</script>";
        } else {
            print "<script> alert('Falha ao deletar usuário')</script>";
        }
    }
    
}
