<?php

class Buscaminas {
    private $filas;
    private $columnas;
    private $minas;


    public function __construct($nivel) {
        //definir las opciones de acuerdo al nivel seleccionado
        switch ($nivel) {
            case 'facil':
                $this->filas = 8;
                $this->columnas = 8;
                $this->minas = 10;
                break;
            case 'medio':
                $this->filas = 16;
                $this->columnas = 16;
                $this->minas = 40;
                break;
            case 'dificil':
                $this->filas = 16;
                $this->columnas = 30;
                $this->minas = 99;
                break;
            default:
                //opcion por defecto si el nivel no es reconocido
                $this->filas = 8;
                $this->columnas = 8;
                $this->minas = 10;
                break;
        }
    }

    public function generarTablero(){
        // Inicializar el tablero con ceros
        $tablero = array_fill(0, $this->filas, array_fill(0, $this->columnas, 0));
    
        // Colocar minas en posiciones aleatorias
        for ($i = 0; $i <$this->minas; $i++){
            do{
                $fila = rand(0, $this->filas -1);
                $columna = rand(0,$this->columnas -1);
            }while ($tablero[$fila][$columna] == -1);

            $tablero[$fila][$columna] = -1;

            //incrementar los valores alrededor de la mina
            for ($j = $fila -1; $j <= $fila + 1; $j++){
                for ($k = $columna -1; $k <= $columna + 1; $k++){
                    if ($j >= 0 && $j < $this->filas && $k >= 0 && $k < $this->columnas && $tablero[$j][$k] !== -1)
                        $tablero[$j][$k]++;
                }
            }
        }

        return $tablero;
    }
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = json_decode(file_get_contents('php://input'));
    $nivel = $data->nivel;

    $buscaminas = new Buscaminas($nivel);
    $tablero = $buscaminas->generarTablero();

    //guarda el tablero en una sesion para que este disponible en el siguiente script
    session_start();
    $_SESSION['tablero'] = $tablero;

    echo json_encode([
        'nivel' => $nivel,
        'table' => $tablero,
    ]);
}