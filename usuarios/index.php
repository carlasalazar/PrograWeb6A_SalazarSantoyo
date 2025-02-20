<?php

include 'Usuario.php';

$usuarioDAO = new UsuarioDAO();

$bugs = new Usuario();
$bugs->setNombres("Bugs");
$bugs->setApellidos("Bunny");
$bugs->setCorreo("bugsbunny@wb.com");

$lola = new Usuario();
$lola->setNombres("Lola");
$lola->setApellidos("Bunny");
$lola->setCorreo("lolabunny@wb.com");

$carla = new Usuario();
$carla->setNombres("Carla");
$carla->setApellidos("Hemocha");
$carla->setCorreo("carlahemocha@wb.com");

$poposino = new Usuario();
$poposino->setNombres("Poposino");
$poposino->setApellidos("Cagon");
$poposino->setCorreo("poposinocagon@wb.com");

$usuarioDAO->insertar($bugs);
$usuarioDAO->insertar($lola);
$usuarioDAO->insertar($carla);
$usuarioDAO->insertar($poposino);

// Obtener todos los usuarios y mostrarlos
$usuarios = $usuarioDAO->buscarTodos();

foreach ($usuarios as $usuario) {
    echo $usuario->getNombres() . " " . $usuario->getApellidos() . " " . $usuario->getCorreo() . "<br>";
}
