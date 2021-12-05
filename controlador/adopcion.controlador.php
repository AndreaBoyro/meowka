<?php
require_once('modelo/adopcion.modelo.php');

class controllerAdopcion{
    private $model;
    public function __construct()
    {
        $this->model = new Adopcion_modelo();
    }
    
    public function listado(){
        return $this->model->getAdopciones();
    }

   public function ver($id){
        return $this->model->getID($id);
     }

    public function verEstado($id){
        return $this->model->getEstado($id);
     }
    public function editarEstado($datos){
      return $this->model->updateEstado($datos);
    }
   public function crear($datos){    
    return $this->model->create($datos);
  }
    
}   
   ?>