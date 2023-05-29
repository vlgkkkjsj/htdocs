<?php


class AdminDB
{
    private  $conexao;

    public function __construct()
        {
            $this-> conexao = new conexao();
        }
    public function logar($codigoAdm, $senha)
    {
        $result =  "SELECT *FROM adm WHERE codigoAdm ='$codigoAdm' and senha = '$senha'";

        $res = mysqli_query($this->conexao->getConn(), $result);

        if(mysqli_num_rows($res)>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}