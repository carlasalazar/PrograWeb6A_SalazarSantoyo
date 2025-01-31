<?php

function jugarPiedraPapel($jugador1, $jugador2) {
    // opciones del juego
    $opciones = [
        0 => "Piedra", 1 => "Papel", 2 => "Tijera", 3 => "Lagarto", 4 => "Spock"
    ];

    echo "Hola! hoy jugaremos Piedra, Papel, Tijera, Lagarto y Spock. \n";

   /* REGLAS DEL JUEGO
    echo "Las reglas del juego son las siguientes: \n";
    echo "Tijeras cortan papel. \n";
    echo "Papel tapa tijera. \n";
    echo "Piedra aplasta a lagarto. \n";
    echo "Lagarto envenena a Spock. \n";
    echo "Spock rompe tijeras. \n";
    echo "Tijeras decapitan lagarto. \n";
    echo "Lagarto devora papel. \n";
    echo "Papel desautoriza Spock. \n";
    echo "Spock vaporiza piedra. \n";
    echo "Piedra aplasta tijeras. \n";*/


    echo "Jugador 1: " . $opciones[$jugador1] . "\n";
    echo "Jugador 2: " . $opciones[$jugador2] . "\n";

    /*0 significa que fue empate.
      1 significa que el jugador 1 ha ganado
      -1 significa que jugador 2 ha ganado
      La matriz funciona de forma que las filas representan las opciones del jugador 1 y las columnas las opciones del jugador 2 */
    $resultados = [
        [0, -1, 1, 1, -1], // Piedra
        [1, 0, -1, -1, 1], // Papel
        [-1, 1, 0, 1, -1], // Tijera
        [-1, 1, -1, 0, 1], // Lagarto
        [1, -1, 1, -1, 0]  // Spock
    ];

    // Determinamos el ganador
    $resultado = $resultados[$jugador1][$jugador2];

    if ($resultado === 0) {
        echo "¡Empate!\n";
    } elseif ($resultado === 1) {
        echo "¡Jugador 1 gana!\n";
    } else {
        echo "¡Jugador 2 gana!\n";
    }
}

// Obtenenemos los argumentos de la línea de comandos
$jugador1 = (int)$argv[1];
$jugador2 = (int)$argv[2];

// se validan esos argumantos
if (count($argv) !== 3 || $jugador1 < 0 || $jugador1 > 4 || $jugador2 < 0 || $jugador2 > 4) {
    echo "Uso: php piedra_papel_tijera_lagarto_spock.php <jugador1> <jugador2>\n";
    echo "Donde <jugador1> y <jugador2> son números del 0 al 4 (Piedra, Papel, Tijera, Lagarto, Spock).\n";
    exit(1);
}

// llamamos a la funcion y se juega
jugarPiedraPapel($jugador1, $jugador2);

?>
