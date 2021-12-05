<?php
require_once('controlador/adopcion.controlador.php');
require_once('controlador/gatos.controlador.php');
if(!isset($_POST['crud'])){
    $contrato=new controllerAdopcion();

?>  
<main class="contenedor">    
    <header class="titulo-ppal"><h1>Lista de contratos de adopción</h1></header>
            <table width="50%" border="0" align="center">
                <thead>
                        <th scope="col">ID CONTRATO</th>
                        <th scope="col">GATO</th>
                        <th scope="col">ID USUARIO</th>
                        <th scope="col">USUARIO</th>
                        <th scope="col">DATOS CONTACTO</th>
                        <th scope="col">FECHA PETICION</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">EDITAR ESTADO PETICIÓN</th>
                        <th scope="col">FORMULARIO</th>

                </thead>
                <tbody>
                    <?php 
                    foreach ($contrato->listado() as $registro):?>
                    <tr>
                    <th scope="row"><?php echo $registro["idAdop"]?></th>
                        <td><?php echo $registro["nombreGato"]?></td>
                        <td><?php echo $registro["idUsuario"]?></a></td>
                        <td><?php echo $registro["nombreUs"]?></td>
                        <td><?php echo $registro["email"]?> / <?php echo $registro["numTlf"]?></td>
                        <td><?php echo $registro["fechaPeticion"]?></td>
                        <td>
                    <!-- Botones para editar/ver formulario -->
                        <form method="POST">
                                <select name="estado" id="">
                                    <option name="estadoPeticion" value="<?php echo $registro["estadoPeticion"]?>"><?php echo $registro["estadoPeticion"]?></option>
                                    <option name="estadoPeticion" value="Pendiente">Pendiente</option>
                                    <option name="estadoPeticion" value="Aceptada">Aceptada</option>
                                    <option name="estadoPeticion" value="Denegada">Denegada</option>
                                </select>
                                <input type="hidden" name="crud" value="editar" >
                                <input type="hidden" name="r" value="listaAdopcion" >
                                <input type="hidden" name="idGato" value="<?php echo $registro["idGato"]?>">
                                <input type="hidden" name="idAdop" value="<?php echo $registro["idAdop"]?>">
                        <td>
                            <button type="submit">Editar estado</button>
                        </td>
                             </form>
                        </td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="r" value="verFormulario">
                                <input type="hidden" name="idAdop" value="<?php echo $registro["idAdop"]?>">
                                <button type="submit" ><i class="fas fa-trash"></i>Ver completo</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>

                </tbody>
            </table> 

</main>

<?php
}
else if($_POST['crud']=='ver'){
    $formulario=new controllerAdopcion();
    $ver=$formulario->ver($_POST['idAdop']);
}

else if ($_POST['crud']=='editar'){
    //Edita el estado del contrato de adopción y el del gato asociado
    $estado=new controllerAdopcion();
    $gato=new controllerGatos();
    $registro=array(
        'idAdop'=> $_POST['idAdop'],
        'estadoPeticion'=> $_POST['estado'],
        'idGato'=> $_POST['idGato']
    );
        if($registro['estadoPeticion']=='Aceptada'){
            $gato->estado($registro['idGato'], 'Adoptado');
            $estado->editarEstado($registro);
        }
        else if($registro['estadoPeticion']=='Denegada'){
        $gato->estado($_POST['idGato'], 'Refugio');
        $estado->editarEstado($registro);
        }
        else if($registro['estadoPeticion']=='Pendiente'){
            $gato->estado($_POST['idGato'], 'Reservado');
            $estado->editarEstado($registro);
        }

        if($estado==true){
            ?>
            <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
              <h2>Se ha actualizado la información correctamente.</h2>
              <br>
                   
              <button><a href="adopciones">Volver</a></button>
              <br>
            </div>
        <?php
        
           
          }
          else{
            ?>
          <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
            <h2>Error al registrar los datos. </h2>
            <br>
            <button><a href="adopciones">Volver</a></button>
            <br>
          </div>
      <?php
          }
}
else{
    header("Location:error404");
}
?> 

