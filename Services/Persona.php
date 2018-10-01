<?php

require_once 'ClassPersonaServ.php';

if(isset($_GET['idPersona'])){
    echo $idPersona = $_GET['idPersona'];
}
if(isset($_GET['exampleInputName'])){
    echo $name = $_GET['exampleInputName'];
}
if(isset($_GET['exampleInputLastname'])){
    echo $lastName = $_GET['exampleInputLastname'];
}
if(isset($_GET['exampleInputBirthdate'])){
    echo $birthdate = $_GET['exampleInputBirthdate'];
}

$persona = new ClassPersonaServ();

if (isset($_GET['new'])) {
    $persona->insertPersona($name, $lastName, $birthdate);
    header('Location: ../view/index.php?mensage');
}

if (isset($_GET['edit'])) {
$persona->modifPersona($idPersona, $name, $lastName, $birthdate);
header('Location: ../view/index.php?mensage');
}

if (isset($_GET['delete'])) {
$persona->EliminarRegistro($idPersona);
header('Location: ../view/index.php?mensage');
}

