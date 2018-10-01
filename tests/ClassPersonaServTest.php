<?php

class ClassPersonaServTest extends PHPUnit_Framework_TestCase {

    //put your code here
    public function testClassPersonaServ() {
        $persona = new ClassPersonaServ();
        $resul2 = mysql_fetch_array($persona->leerRegistro(17));
        $this->assertEquals(17,$resul2[0]);
    }

}
