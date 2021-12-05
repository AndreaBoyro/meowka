<?php
require_once('modelo/gatos.modelo.php');

class controllerGatos{
    
    private $model;
    
    public function __construct()
    {
        $this->model = new Gatos_modelo();
    }
    public function listado(){
        $arrayGatos=$this->model->getGatos();
        return $arrayGatos;
    }
    public function paginacion($inicio, $regpag, $estado=NULL){
      return $this->model->getGatosPag( $inicio, $regpag,$estado);
    }
   public function ver($id)
    {
      return $this->model->getID($id);
     }
    public function verNombre($nombre){
       return $this->model->getNombre($nombre);
     }
    public function verEstadoGatos($estado){
       return $this->model->getEstadoGatos($estado);
     }

     public function estado($id, $estado){
       return $this->model->setEstado($id, $estado);
     }
   
    public function editar($datos){    
     return $this->model->update($datos);
   }
    
    public function crear($datos){    
      return $this->model->create($datos);
  }
  
  public function eliminar($id){
      return $this->model->delete($id);
  }

  public function img(){
    $target_dir = "assets/img/gatosimg/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Comprueba si es imagen o no

    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
    
      $uploadOk = 0;
    }
  // Comprueba tamaño img
    if ($_FILES["img"]["size"] > 500000) {
      
      $uploadOk = 0;
    }

    // Comprueba formato
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
     
      $uploadOk = 0;
    }

    // Comprobacion 
    if ($uploadOk == 0) {
        return false;
      // si está bien, sube la img y envía la ruta
    } else {
      if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        return $target_file;
      } else {
        
        return false;
      }
    }
  }  
       
    
}   
   ?>