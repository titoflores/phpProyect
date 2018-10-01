<?php

require_once 'ClassConexionDao.php';

class ClassPersonaDao {

    private $idPersona;
    private $name;
    private $lastName;
    private $birthdate;
    private $connection;

    function __construct() {
        $this->idPersona = 0;
        $this->name = "";
        $this->lastName = "";
        $this->birthdate = '0000-00-00';
        $this->connection = new ClassConexionDao();
    }

    function getIdPersona() {
        return $this->idPersona;
    }

    function getName() {
        return $this->name;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getBirthdate() {
        return $this->birthdate;
    }

    function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    public function newPersona() {
        $this->connection->conectar();
        $sql = "INSERT INTO persona "
                . "VALUES ("
                . "null,"
                . "'$this->name',"
                . "'$this->lastName',"
                . "'$this->birthdate');";
        echo $result = $this->connection->consulta($sql);
        $this->connection->desconectar(); 
    }
    
    public function editPersona() {
        $this->connection->conectar();
        $sql = "UPDATE persona SET name='$this->name',lastName ='$this->lastName', Birthdate ='$this->birthdate'WHERE idPersona = $this->idPersona;";
        echo $result = $this->connection->consulta($sql);
        $this->connection->desconectar(); 
    }
    public function showPersona() {
        $this->connection->conectar();
        $sql = "SELECT * FROM persona;";
        $result = $this->connection->consulta($sql);
        $this->connection->desconectar();
        return $result;
    }
    public function SacarPersona() {
        $this->connection->conectar();
        $sql = "SELECT * FROM persona WHERE idPersona= $this->idPersona;";
        $result = $this->connection->consulta($sql);
        $this->connection->desconectar();
        return $result;
    }
    public function EliminarRegistro() {
        $this->connection->conectar();
        $sql = "DELETE FROM persona WHERE idPersona = $this->idPersona;";
        $result = $this->connection->consulta($sql);
        $this->connection->desconectar();
        return $result;
    }
}
