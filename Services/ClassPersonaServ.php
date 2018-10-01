<?php
//require_once '../Dao/ClassPersonaDao.php';
include_once dirname( __DIR__ ) . '/Dao/ClassPersonaDao.php';
//include_once 'Dao/ClassPersonaDao.php';

class ClassPersonaServ {

private $persServ;

    function __construct() {
        $this->persServ = new ClassPersonaDao();
    }
    public function mostrarPersona() {
        return $this->persServ->showPersona();
    }

    public function insertPersona($name, $lastName, $birthdate) {
       echo $this->persServ->setName($name);
       $this->persServ->setLastName($lastName);
        $this->persServ->setBirthdate($birthdate);
        $this->persServ->newPersona();
    }
    public function  leerRegistro($idPersona) {
        $this->persServ->setIdPersona($idPersona);
        return $this->persServ->SacarPersona();
    }
    public function modifPersona($idPersona, $name, $lastName, $birthdate) {
        $this->persServ->setIdPersona($idPersona);
       $this->persServ->setName($name);
       $this->persServ->setLastName($lastName);
        $this->persServ->setBirthdate($birthdate);
        $this->persServ->editPersona();
    }
    public function  EliminarRegistro($idPersona) {
        $this->persServ->setIdPersona($idPersona);
        return $this->persServ->EliminarRegistro();
    }

}
