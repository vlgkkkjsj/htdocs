<?php


class AnimalDB
{
    private $conexao;
    private $id;
    private $animal;
    private $localizacao;
    private $email;

    public function getId()
    {
       return $this->id; 
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function GetAnimal()
    {
       return $this->animal; 
    }
    public function setAnimal($animal)
    {
        return $this->animal = $animal;
    }
    public function getLocalizacao()
    {
        return $this-> localizacao;
    }
    public function setLocalizacao($localizacao)
    {
        return $this->localizacao = $localizacao;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        return $this->email = $email;
    }



    public function __construct()
    {
        $this->conexao = new conexao();
    }


    public function unico($email)
    {
        $result = "SELECT *FROM animais WHERE email = '$email'";

        $res = mysqli_query($this->conexao-> getConn(),$result);

        if(mysqli_num_rows($res)>0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function cadastrarAnimal($animal, $localizacao, $email, $conteudoImagem)
{
    $animal = filter_var(trim($animal), FILTER_SANITIZE_STRING);
    $localizacao = filter_var(trim($localizacao), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($email), FILTER_SANITIZE_STRING);

    if (empty($animal) || empty($localizacao) || empty($email) || empty($conteudoImagem)) {
        print "<script>alert('Ceritifique-se de que informou todas as informações corretamente')</script>";
        print "<script>location:colocarAdocao.php</script>";
    } else {
        // Prepare a query para inserção de dados
        $query = "INSERT INTO animais (animal, localizacao, email, imagem) VALUES (?, ?, ?, ?)";

        // Prepara a declaração para evitar injeção de SQL
        $stmt = mysqli_prepare($this->conexao->getConn(), $query);
        mysqli_stmt_bind_param($stmt, "sssb", $animal, $localizacao, $email, $conteudoImagem);

        // Executa a declaração
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}

    public function ListarAnimais()
    {
        $animais = array();

        $sql = "SELECT * FROM animais";
        $res = mysqli_query($this->conexao->getConn(), $sql);

        while ($row = mysqli_fetch_assoc($res)) {
            $animaldb = new AnimalDB();

            $animaldb->setId($row['id']);
            $animaldb->setAnimal($row['animal']);
            $animaldb->setLocalizacao($row['localizacao']);
            $animaldb->setEmail($row['email']);
            $animais[] = $animaldb;
        }

        return $animais;
    }

    public function EditarAnimal($animal,$localizacao,$email)
    {
        $sql=  "UPDATE animal SET animal=? localizacao=?,email=? WHERE id=?";

        $stmt= mysqli_prepare($this->conexao->getConn(),$sql);

        mysqli_stmt_bind_param($stmt, "sssi", $nome, $sobrenome, $senha, $email, $id); // ssssi = os S indicam uma string o I indica um inteiro
    
        mysqli_stmt_execute($stmt);
    
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