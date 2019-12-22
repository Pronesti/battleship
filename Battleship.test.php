<?php
require_once("./vendor/autoload.php");
require_once("Battleship.php");

use PHPUnit\Framework\TestCase; #namespace

final class BattleshipTest extends TestCase{

    function testMostrarTablero(){
        $juego = new Battleship(5,10,10);
        $tabJugador1 = $juego->mostrarTablero(1);
        $this-> assertIsArray($tabJugador1);
    }

    function testColocarNave(){
        $juego = new Battleship(5,10,10);
        $juego->colocarNave(1,2,3);
        $tablero = $juego->mostrarTablero(1);
        $this->assertIsArray($tablero);
        $this->assertEquals(1, $tablero[2][3]);
    }

    function testDisparar(){
        $juego = new Battleship(5,10,10);
        $juego->colocarNave(2,2,3);
        $tablero = $juego->disparar(2,3);
        $this->assertIsArray($tablero);
        $this->assertEquals(2, $tablero[2][3]);
    }

    function testComprobarGanador(){
        $juego = new Battleship(5,10,10);
        $res = $juego->comprobarGanador(1);
        $this-> assertTrue($res);
    }

    function testTerminoElJuego(){
        $juego = new Battleship(5,10,10);
        $res = $juego->terminoElJuego();
        $this->assertTrue($res);
    }

    function testCuantosTurnosPasaron(){
        $juego = new Battleship(5,10,10);
        $res = $juego->cuantosTurnosPasaron();
        $this->assertIsInt($res);
        $this->assertEquals(0,$res);
    }


}