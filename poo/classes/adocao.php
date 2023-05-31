<?php


class adocao
{

    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $nome_bichinho;
    private $conexao;

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

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getNomeBichinho()
    {
        return $this->nome_bichinho;
    }
    public function setNomeBichinho($nome_bichinho)
    {
        $this->nome_bichinho = $nome_bichinho;
    }
    public function cadastrarAnimal($nome, $sobrenome, $email, $nome_bichinho,)
    {
        $nome = filter_var($nome, FILTER_SANITIZE_STRING);
        $sobrenome = filter_var($sobrenome, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $nome_bichinho = filter_var($nome_bichinho, FILTER_SANITIZE_STRING);
      

        if (empty($nome) || empty($sobrenome) || empty($email) || empty($nome_bichinho))  {
            print "<script> alert('Certifique-se de que informou todas as informações')</script>";
            print "<script> location.href='cadastro.php'</script>";
        } else {
            $sql = "INSERT INTO adocao (nome, sobrenome, email, nome_bichinho) VALUES ('{$nome}', '{$sobrenome}', '{$email}', '{$nome_bichinho}')";

            $res = mysqli_query($this->conexao->getConn(), $sql);

            if (mysqli_affected_rows($this->conexao->getConn()) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function ListarCandidatos()
    {
        $candidados = array();

        $sql = "SELECT * FROM adocao";
        $res = mysqli_query($this->conexao->getConn(), $sql);

        while ($row = mysqli_fetch_assoc($res)) {
            $candidatodb = new adocao();

            $candidatodb->setId($row['id']);
            $candidatodb->setNome($row['nome']);
            $candidatodb->setSobrenome($row['sobrenome']);
            $candidatodb->setNomeBichinho($row['nome_bichinho']);
            $candidatodb->setEmail($row['email']);

            $candidatos[] = $candidatodb;
        }

        return $candidados;
    }
    public function EditarCandidatos($id, $nome, $sobrenome, $email, $nome_bichinho)
    {
        $sql = "UPDATE cadastro SET 
                    nome = ?,
                    sobrenome = ?,
                    nome_bichinho = ?,
                    email = ?
                WHERE id = ?";
    
        $stmt = mysqli_prepare($this->conexao->getConn(), $sql);
    
        // Bind dos parâmetros
        mysqli_stmt_bind_param($stmt, "ssssi", $nome, $sobrenome, $nome_bichinho, $email, $id);
    
        mysqli_stmt_execute($stmt);
    
        if (mysqli_affected_rows($this->conexao->getConn()) > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function DeletarAdocao($id)
    {
        $sql = "DELETE FROM adocao WHERE id = '" . $id . "'";
    
        $res = mysqli_query($this->conexao->getConn(), $sql);
    
        if ($res == true) {
            print "<script> alert('Adocao deletada com sucesso')</script>";
            print "<script> location.href='?page=listar_animais';</script>";
        } else {
            print "<script> alert('Falha ao deletar usuário')</script>";
        }
    }
}