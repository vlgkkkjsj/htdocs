<?php

include("../classes/voluntariosDB.php");


if (isset($_GET['id'])) {

    $id = $_GET['id'];


    $voluntariosDB = new voluntariosDB();


    $voluntariosDB->DeletarVoluntarios($id);

    header('location:?page=listar_voluntarios');
    exit;
}
?>