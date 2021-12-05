<?php
require_once('controlador/gatos.controlador.php');
$gato=new controllerGatos();

if(!isset($_POST['crud'])){
?>  
<div class="contenedor">
    <div class="formulario">
        <form class="crudform" action="" method="post">
            <h3>Borrar gato con el ID: <?php echo $_POST['idGato']?>?</h3>
           		<input type="hidden" name="crud" value="eliminar" >
                <input type="hidden" name="r" value="deleteGato">
           		<input type="hidden" name="idGato" value="<?php echo $_POST['idGato']?>">
           		<button type="submit" value = "Borrar">Borrar</button>
                <button type="button" value = "Volver" onclick="location.href='./gatos';">Volver</button>
    	</form>
    </div>
</div>
<?php
}
else if($_POST['crud']=='eliminar'){
   $eliminado= $gato->eliminar($_POST['idGato']);
   if($eliminado==true){
        ?>
  <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
        <h2>Registro eliminado correctamente.</h2>
        <br>
        <button><a href="registro-gatos">Volver</a></button>
        <br>
    </div>
       <?php
      }
      else{
        ?>
  <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
        <h2>Error al eliminar los datos. Comprueba que no tenga contratos de adopción asociados.</h2>
        <br>
        <button><a href="registro-gatos">Volver</a></button>
        <br>
    </div>
  <?php
      }
  
   }else{
       header('location:error404.php');
   }
?>
