<?php
require_once('modelo/usuarios.modelo.php');
class controllerUsuario{
    private $model;
    public function __construct()
    {
        $this->model = new Usuarios_modelo();
    }
    public function listado(){
        return $this->model->getUsuarios();
    }
   public function ver($id){
        return  $this->model->getID($id);
     }
   public function editar($datos){    
     return $this->model->update($datos);
   }
   public function crear($datos){ 
      return $this->model->create($datos);

    }
    public function emailExist($email){
      return $this->model->getEmail($email);
    }
    
}   
   ?>