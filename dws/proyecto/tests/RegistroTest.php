<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../registro_funciones.php';

class RegistroTest extends TestCase {

    //Prueba para verificar que un registro válido no produce errores
    public function testRegistroValido() {
        
        $errores = validarRegistro("Juan", "Perez", "juan@mail.com", "123456");
        // Comprobamos que no hay errores (la cantidad de errores debe ser 0)
        $this->assertCount(0, $errores);
    }

    //Prueba para verificar que un correo inválido genera errores
    public function testCorreoInvalido() {
        
        $errores = validarRegistro("Juan", "Perez", "juanmail.com", "123456");
        //Comprobamos que el arreglo de errores no está vacío
        $this->assertNotEmpty($errores);
    }

    //Prueba para verificar que un nombre con números genera errores
    public function testNombreConNumeros() {
        
        $errores = validarRegistro("Juan2", "Perez", "juan@mail.com", "123456");
        $this->assertNotEmpty($errores);
    }
}
