<!-- Vista gatos usuario invitado/registrado -->
 <?php
 require_once('controlador/gatos.controlador.php');
  $gatos=new controllerGatos();
        
  //Mostramos los gatos en refugio y mostramos botones para ver gatos adoptados y reservados
  if(isset($_POST['estadoGato'])){
    if($_POST['estadoGato']=='Adoptado'){
      $estadoGatos="Adoptado";
      $gatosArray=$gatos->verEstadoGatos($estadoGatos);
    }
    else if ($_POST['estadoGato']=='Reservado'){
      $estadoGatos="Reservado";
      $gatosArray=$gatos->verEstadoGatos($estadoGatos);

    }
    else{  
      $estadoGatos="Refugio";
      $gatosArray=$gatos->verEstadoGatos($estadoGatos);
    }
 }else{
  $estadoGatos="Refugio";
  $gatosArray=$gatos->verEstadoGatos($estadoGatos);
 }
/*PAGINACIÓN*/
 $registros=6;
 
 if(isset($_POST['pagina'])){
    if($_POST['pagina']==1){
      header('location:./gatos');
    }
    else{
      $pagina=$_POST['pagina'];
    }
 }else{
  $pagina = 1;

 }

$inicioPag= ($pagina - 1) * $registros;
 $total_registros = count($gatosArray);
 $total_paginas = ceil($total_registros / $registros); 
$gatospag=$gatos->paginacion($inicioPag, $registros,$estadoGatos);

?>

<main class="contenedor max-auto">
  <div class="formulario">
    <!-- Botones filtro refugio/reservado/adoptado -->
    <div class="filtro-gatos">
      <div class="boton-filtro-gatos">
        <form action=""   method="post" >     
				  <input type="hidden" name="estadoGato" class="mostrar" id ="Refugio" value="Refugio">
          <button type="submit" id="Refugio" >Gatos en adopción</button>         
        </form>  
      </div>
      <div class="boton-filtro-gatos"> 
        <form action=""    method="post" >  
					<input type="hidden" name="estadoGato" class="mostrar" id ="Reservado" value="Reservado">
          <input type="hidden" name="botonAdop" value="si">
          <button type="submit" id="Reservado">Gatos reservados</button> 
        </form> 
      </div>
      <div class="boton-filtro-gatos">
        <form method="post"  class="bn"  >
					<input type="hidden" name="estadoGato" class="mostrar" id ="Adoptado" value="Adoptado">
          <input type="hidden" name="botonAdop" value="si">
          <button type="submit" id="Adoptado" >Gatos adoptados</button>   
        </form> 
      </div>
    </div>
    <hr>
    <!-- Lista gatos -->
  <div class="lista-gatos offset-lg-1">
<?php 
  foreach ($gatospag as $registro):
?>
      <div class="card col-12 col-sm-10 offset-sm-1 col-md-5 col-lg-4 offset-md-2 ">
        <img class="card-img-top" src="<?php echo $registro['img']?>" alt="foto de <?php echo $registro['nombreGato']?> ">
        <div class="card-body">
          <h5 class="card-title"><?php echo $registro['nombreGato']?></h5>
          <form method="post" action="">
            <input type="hidden" name="idGato" value="<?php echo $registro["idGato"]?>">
            <!-- <input type="hidden" name="crud" value="ver-ficha" > -->
					 <input type="hidden" name="r" value="ficha-gato">

						<button type="submit">¿Quieres conocerme?</button>
					</form>    
        </div>
      </div>
<?php endforeach;?>
<hr>
<!-- PAGINADO -->
      <div class="containerPags"> 
          <nav aria-label="Page navigation">
            <ul class="pagination">
            <?php
              for ($i=1; $i<=$total_paginas; $i++){
                if ($pagina == $i) {
                ?>
                <form method="POST">
                  <input type="hidden" name="pagina" value="<?=$i?>">
                    <li class="page-item active"><button type="submit" class="page-link"><?=$i?></button></li>
                  </form>
                <?php
                } else {
                ?>
                  <form method="POST">
                      <input type="hidden" name="pagina" value="<?=$i?>">
                      <li class="page-item"><button type="submit" class="page-link"><?=$i?></button></li>
                    </form>
                <?php
                } 
              } 
              if ($pagina != $total_paginas){
              ?>
            <?php
            }
            ?>
          </nav>
        </div> <!-- TERMINA EL PAGINADO -->
      </div>
      </div>

</main>


