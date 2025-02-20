<?php

interface IDao {
    public function buscarTodos();
    public function buscar($id);
    public function insertar(Usuario $registro);
    public function actualizar(Usuario $registro);
    public function eliminar($id);
}


