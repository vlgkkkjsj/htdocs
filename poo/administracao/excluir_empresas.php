<?php

include("../classes/empresaDB.php");


if (isset($_GET['id'])) {

    $id = $_GET['id'];


    $empresaDB = new empresa();


    $empresaDB->DeletarEmpresas($id);

    header('location:?page=listar_empresarial');
    exit;
}
?>