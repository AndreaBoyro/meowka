<!-- Tabla gatos para admin -->
<?php
 require_once('controlador/gatos.controlador.php');
  $gatos=new controllerGatos();
$gatosArray=$gatos->listado();    
/*PAGINACIÓN*/
 $registros=6;
 
 if(isset($_POST['pagina'])){
    if($_POST['pagina']==1){
      header('location:./registro-gatos');
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
$gatospag=$gatos->paginacion($inicioPag, $registros, $estado=NULL);


?>
<main class="contenedor">
    <!-- añadir/buscar -->
<div class="enlaces-admin-tabla col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
    <form method="POST" >
		<input type="hidden" name="r" value="addGato">
		<button type="submit" >Añadir registro</button>
	</form>   
    <form action=""  class="form-buscar" method="post">
        <input type="hidden" name="r" value="editarGato">
        <input type="text" name="idGato">
        <button type="submit">Buscar gato por ID</button>
    </form>
    <form action="" class="form-buscar" method="post">
        <input type="hidden" name="r" value="editarGato">
        <input type="text" name="nombreGato">
        <button type="submit">Buscar gato por nombre</button>
    </form>
 </div> 

<div class="tabla" style="overflow: auto;">
    <caption><h3>Lista gatos</h3></caption>
        <table >
            <thead>
                <tr>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">ID</th>
                    <th scope="col">EDAD</th>
                    <th scope="col">SEXO</th>
                    <th scope="col">FECHA ALTA</th>
                    <th scope="col">TESTADO</th>
                    <th scope="col">ESTERILIZADO</th>
                    <th scope="col">CARACTER</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">EDITAR</th>
                    <th scope="col">ELIMINAR</th>
                    <th scope="col">CONTRATO ADOPCIÓN</th>

                </tr>
            </thead>
            <tbody >
                <?php 
                foreach ($gatospag as $registro):?>
                <tr>
                    <th scope="row"><?php echo $registro["nombreGato"]?></th>
                    <td><?php echo $registro['idGato']?></td>
                    <td><?php echo $registro["edad"]?></td>
                    <td><?php echo $registro["sexo"]?></td>
                    <td><?php echo $registro["fechaAlta"]?></td>
                    <td><?php echo $registro["testado"]?></td>
                    <td><?php echo $registro["esterilizado"]?></td>
                    <td><?php echo $registro["caracter"]?></td>
                    <td><?php echo $registro["estado"]?></td>
                    <td>  
                        <!-- Botones editar/eliminar/ver formulario adopción -->
                            <form method="post">
                                <input type="hidden" name="r" value="editarGato">
                                <input type="hidden" name="idGato" value="<?php echo $registro["idGato"]?>">
                                <button type="submit">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="r" value="deleteGato">
                                <input type="hidden" name="idGato" value="<?php echo $registro["idGato"]?>">
                                <button type="submit" >Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <?php
                            if($registro["estado"]=='Adoptado'){?>
                            <form action="./adopciones">
                        <button type="submit" value = "Ver">Ver petición</button>
                        </form>  
                        <?php }
                        ?>  
                        </td>
                </tr>
                <?php endforeach;?>
            </tbody>  
            </td></tr>
        </table> 
  
    </div>
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
</main>