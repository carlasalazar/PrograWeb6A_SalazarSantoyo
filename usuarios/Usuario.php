<?php
include 'UsuarioDAO.php';

class Usuario{
    private $id;
    private $nombres;
    private $apellidos;
    private $correo;
    private $password;

    public function __construct($id = null){
        if($id != null){
            $usuarioDAO = new UsuarioDAO();
            $usuario = $usuarioDAO->buscar($id);
            $this->id = $usuario[0]['id'];
            $this->nombres = $usuario[0]['nombres'];
            $this->apellidos = $usuario[0]['apellidos'];
            $this->correo = $usuario[0]['correo'];
            $this->password = $usuario[0]['password'];
        }
    }

    public function crear($datos){
        $usuario = new Usuario();
        $usuario->setNombres($datos['nombres']);
        $usuario->setApellidos($datos['apellidos']);
        $usuario->setCorreo($datos['correo']);
        return $usuario -> guardar();
    }
    
    public function guardar(){
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->insertar($this);
    }

    public function acutualizar(){
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->actualizar($this);
    }

    public function eliminar(){
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->eliminar($this->id);
    }        

    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }   

    public function getPassword(){
        return $this->password;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
}