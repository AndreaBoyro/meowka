<!-- Formulario para editar registro gato -->
<?php 
require_once('controlador/gatos.controlador.php');
$gato=new controllerGatos();

if (!isset($_POST['crud'])){
  //Obtiene los datos del gato que recibe a través de POST, por ID o por nombre, y los muestra
  if(isset($_POST['idGato'])){
    $datos=$gato->ver($_POST["idGato"]);
  }
  else if(isset($_POST['nombreGato'])){
    $datos=$gato->verNombre($_POST['nombreGato']);
  }
?>
<main class="contenedor">
  <div class="formulario col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
    <form class="crudform" action="" method="post" enctype="multipart/form-data">
      <h3>Actualizar datos de <?php echo $datos['nombreGato']?></h3>
      <hr> 
      <div class="tab">
        <div class="form-row"> 
          <input type="hidden" name="idGato" value="<?php echo $datos['idGato'] ?>">
          <label for="nombre">Nombre: </label>
          <input type="text" name="nombreGato" value="<?php echo $datos['nombreGato']?>"readonly>
        </div>
        <br>
        <div class="form-group row">
          <label for="edad">Edad:</label>
          <input type="text" name="edad" id="edad" value="<?php echo $datos['edad']?>">
        </div>
        <br>
        <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2">Sexo</legend>
              <input type="text" name="sexo" value="<?php echo $datos['sexo']?>"readonly>

              <div class="col-sm-10">
                <div class="form-check">
                  <label class="form-check-label" for="Macho">
                  </label>
                  <input class="form-check-input" type="radio" name="sexo" value="Macho"> Macho
                </div>
                <div class="form-check">
                  <label class="form-check-label" for="Hembra"> Hembra
                  </label>
                  <input class="form-check-input" type="radio" name="sexo" value="Hembra">
                </div>
              </div>
            </div>
          </fieldset>
        <br>
      </div>
      <div class="tab">
      <fieldset class="form-group">
          <div class="row">
            <legend class="col-form-label col-sm-2 pt-2">Esterilizado</legend>
            <input type="text" name="ester" value="<?php echo $datos['esterilizado']?>"readonly>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="ester" value="Sí">
                <label class="form-check-label" for="ester">
                  Sí
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="ester" value="Pendiente">
                <label class="form-check-label" for="Pendiente">
                  Pendiente
                </label>
              </div>
            </div>
          </div>
        </fieldset>
        <fieldset class="form-group">
          <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Testado</legend>
            <input type="text" name="testado" value="<?php echo $datos['testado']?>" readonly>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="testado" id="gridRadios1" value="Sí">
                <label class="form-check-label" for="testado">
                  Sí
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="testado" id="gridRadios2" value="Pendiente">
                <label class="form-check-label" for="testado">
                  Pendiente
                </label>
              </div>
            </div>
          </div>
        </fieldset>    
      <br>
      </div>
      <div class="tab">
        <div class="form-group row">
          <label for="caracter">Carácter:</label>
          <select name="caracter" id="">
            <option name="caracter" value="<?php echo $datos['caracter']?>"readonly><?php echo $datos['caracter']?>
            <option name="caracter"  id="caracter" value="Cariñoso/a">Cariñoso/a</option>
            <option name="caracter" id="caracter" value="Tímido/a">Tímido/a</option>
            <option name="caracter" id="caracter" value="Asustadizo/a">Asustadizo/a</option>
            <option name="caracter" id="caracter" value="Sociable">Sociable</option>
            <option name="caracter" id="caracter" value="Desconfiado/a">Desconfiado/a</option>
            <option name="caracter" id="caracter" value="Simpático/a" >Simpático/a</option>
            <option name="caracter" id="caracter" value="Huidizo/a" >Huidizo/a</option>
          </select>
        </div>
        <br>
        <div class="form-group row">
          <label for="descripcion">Descripción</label>
          <textarea name="descripcion" id="" cols="100" rows="3" value="descripción"><?php echo $datos['descripcion']?></textarea>
          <br>
        </div>
        <div class="form-group row">
          <label for="img">Añadir imagen</label>
          <input type="file" name="img" id="img" value="NULL">
          <br>
        </div>
        <div class="form-group row">
          <label for="estado">Estado: </label>
          <select name="estado" id="">
            <option name="estado" value="<?php echo $datos['estado']?>"readonly><?php echo $datos['estado']?>
            <option name="estado" value="Refugio" > Refugio</option>
            <option name="estado" value="Acogida"> Acogida</option>
            <option name="estado" value="Proceso adopción"> Proceso adopción</option>
            <option name="estado" value="Adoptado"> Adoptado</option>
          </select>
        </div>
        <br>
          <button type="submit">Editar registro</button>
          <input type="hidden" name="crud" value="editar">
          <input type="hidden" name="r" value='editarGato'>
          <button type="button" value = "Volver" onclick="location.href='./gatos';">Volver</button>
      </div>
      <!-- Botones para multistep -->
      <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" class="prev" onclick="nextPrev(-1)">Anterior</button>
            <button type="button" class="nextBtn" onclick="nextPrev(1)">Siguiente</button>
          </div>
        </div>

      <!-- Círculos para multistep -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>
    </form>
  </div>
</main>

<?php 

}
  else if($_POST['crud']== 'editar'){


    //Controla si se ha introducido img nueva o no
    if(empty($_FILES['img']['tmp_name']) ){
      $registro=array(
        'idGato'=> $_POST['idGato'],
        'nombreGato'=> $_POST['nombreGato'],
        'edad'=>$_POST['edad'],
        'sexo'=>$_POST['sexo'],
        'ester'=> $_POST['ester'],
        'testado'=> $_POST['testado'],
        'caracter'=>$_POST['caracter'],
        'descripcion'=>$_POST['descripcion'],
        'estado'=> $_POST['estado']
 
      );
    $editado=$gato->editar($registro);
    //Control de errores y muestra de mensaje
    if($editado==true){
?>
      <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
            <h2>Registro editado correctamente.</h2>
            <br>
            <button><a href="registro-gatos">Volver</a></button>
            <br>
      </div>
<?php
    }
    else{
?>
    <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
          <h2>Error al editar los datos.</h2>
          <br>
          <button><a href="registro-gatos">Volver</a></button>
          <br>
    </div>
<?php
    }

  } else if (!empty($_FILES['img']['tmp_name'])) {
      $uploadedImg= $gato->img($_FILES['img']['tmp_name']);
        if($uploadedImg){
          $registro=array(
              'idGato'=> $_POST['idGato'],
              'nombreGato'=> $_POST['nombreGato'],
              'edad'=>$_POST['edad'],
              'sexo'=>$_POST['sexo'],
              'ester'=> $_POST['ester'],
              'testado'=> $_POST['testado'],
              'caracter'=>$_POST['caracter'],
              'descripcion'=>$_POST['descripcion'],
              'img'=> $uploadedImg,
              'estado'=> $_POST['estado']
      
          );
        }
          else{
          ?>
        <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
              <h2>Error al guardar la imagen</h2>
              <p>Recuerda que los formatos para imágen deben ser: .jpg, .png, .gif</p>
              <br>
              <button><a href="registro-gatos">Volver</a></button>
              <br>
        </div>



          <?php  

          }
       $editado= $gato->editar($registro);
       //Control de errores y muestra de mensaje
          if($editado==true){
  ?>
        <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
              <h2>Registro editado correctamente.</h2>
              <br>
              <button><a href="registro-gatos">Volver</a></button>
              <br>
        </div>
  <?php
          }
          else{
  ?>
        <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
              <h2>Error al editar los datos.</h2>
              <br>
              <button><a href="registro-gatos">Volver</a></button>
              <br>
          </div>
  <?php
          }
      }
    //si no se ha subido imagen

    }
else{
   header('Location:error404.php');
}
?>

