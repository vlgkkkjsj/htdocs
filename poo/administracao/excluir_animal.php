<?php

include("../classes/animalDB.php");


if (isset($_GET['id'])) {

    $id = $_GET['id'];


    $animalDB = new animalDB();


    $animalDB->DeletarAnimal($id);

    header('location:?page=listar_animal');
    exit;
}
?>
