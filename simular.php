<?php
require_once("Battleship.php");

function dibujarTablero($tablero){
    foreach($tablero as $i => $iv){
        //print(implode(" ", $iv) . "\n");
        foreach($tablero[$i] as $j => $jv){
            if($jv == 0){
                print("\033[94m");
                print($jv);
                print(" \033[0m");
            }elseif($jv == 1){
                print("\033[32m");
                print($jv);
                print(" \033[0m");
            }elseif($jv == 2){
                print("\033[32m");
                print($jv);
                print(" \033[0m");
            }elseif($jv == 9){
                print("\033[31m");
                print($jv);
                print(" \033[0m");
            }
        }
        print("\n");
    }
    print("\n");
}


$filas = 20;
$columnas = 20;
$naves=10;
$game = new Battleship($filas,$columnas,$naves);
while($naves > 0){
    $game->colocarNave(1,random_int(0,$filas),random_int(0,$columnas));
    $game->colocarNave(2,random_int(0,$filas),random_int(0,$columnas));
    $naves = $naves-1;
}
while(!$game->terminoElJuego()){
    $game->disparar(random_int(0,$filas),random_int(0,$columnas));
}
print("\n Tablero: Jugador 1. \n");
dibujarTablero($game->mostrarTablero(1));
print("\n Tablero: Jugador 2. \n");
dibujarTablero($game->mostrarTablero(2));
print_r($game->cuantosTurnosPasaron());
if($game->comprobarGanador(1)){
    print("\n Ganador: Jugador 1.");
}else{
    print("\n Ganador: Jugador 2.");
}
?>