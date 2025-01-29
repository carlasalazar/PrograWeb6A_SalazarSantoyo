<?php

function imprimirDiamante($tamano)
{
    //valida q el tamano sea un numero entero positivo
    if(!is_numeric($tamano) || $tamano<=0){
        echo "Por favor, ingrese un numero positivo como argumento.";
        return;
    }

    //imprime el diamante
    for($i = 1; $i <= $tamano; $i++){
        //imprime espacios en blanco para alineacion
        echo str_repeat(" ", $tamano - $i);

        //imprime asteriscos para la parte superior del diamante
        echo str_repeat("* ", $i);

        echo "\n";
    }

    for($i = $tamano -1; $i >= 1; $i--){
        //imprime espacios en blanco para alineacion
        echo str_repeat(" ", $tamano - $i);

        //imprime asteriscos para la parte superior del diamante
        echo str_repeat("* ", $i);

        echo "\n";
    }
}

    //Verifica si se proporciono un argumento valido
    if (isset($argv[1])){
        //obtiene el numero ingresado como argumento
        $tamano = intval($argv[1]);

        //llama a la funcion para imprimir el diamante
        imprimirDiamante($tamano);
    } else {
        echo"Por favor, ingrese un numero como argumento.";
    }
    
