<!--Formulario para la creación de registro gato-->
<?php 
require_once('controlador/gatos.controlador.php');
$gato=new controllerGatos();

if (!isset($_POST['crud'])){
    
?> 
<main class="contenedor">
  <div class="formulario col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
    <form class="crudform" action="" method="post" enctype="multipart/form-data">
      <h1>Añadir gato a la base de datos</h1>
      <hr>
      <div class="tab"> 
      <label for="nombre">Nombre: </label>
        <input type="text" oninput="this.className = ''" name="nombreGato" id="nombreGato" required>
        <br>
        <label for="edad">Edad:</label>
        <input type="text" oninput="this.className = ''" name="edad" id="edad" required>
        <br>
        <fieldset class="form-group">
          <div class="row">
            <legend class="col-form-label col-sm-2">Sexo</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <label class="form-check-label" for="Macho">
                </label>
                <input class="form-check-input"  type="radio" name="sexo" value="Macho" checked> Macho
              </div>
              <div class="form-check">
                <label class="form-check-label" for="Hembra"> Hembra
                </label>
                <input class="form-check-input"  type="radio" name="sexo" value="Hembra">
              </div>
            </div>
          </div>
        </fieldset>
      </div>
      <div class="tab">
        <fieldset class="form-group">
          <div class="row">
            <legend class="col-form-label col-sm-2 col-md-4">Esterilizado</legend>
            <div class="col-sm-10 col-md-8">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="ester" value="Sí" checked>
                <label class="form-check-label" for="ester">
                  Sí
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input"  type="radio" name="ester" value="Pendiente">
                <label class="form-check-label" for="Pendiente">
                  Pendiente
                </label>
              </div>
            </div>
          </div>
        </fieldset>
        <fieldset class="form-group">
          <div class="row">
            <legend class="col-form-label col-sm-2 col-md-4">Testado</legend>
            <div class="col-sm-10 col-md-8">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="testado" id="gridRadios1" value="Negativo" checked>
                <label class="form-check-label" for="testado">
                    Negativo
                </label>
              </div>        
              <div class="form-check">
                <input class="form-check-input" type="radio" name="testado" id="gridRadios1" value="Positivo FIV" >
                <label class="form-check-label" for="testado">
                    Positivo FIV
                </div>
                <div class="form-check">
                <input class="form-check-input"  type="radio" name="testado" id="gridRadios1" value="Positivo FELV " >
                <label class="form-check-label" for="testado">
                    Positivo FELV
                </label>
              </div>
              <div class="form-check">
                 <input class="form-check-input"  type="radio" name="testado" id="gridRadios2" value="Pendiente">
                <label class="form-check-label" for="testado">
                    Pendiente
                </label>
              </div>
            </div>
          </div>
        </fieldset>    
          </div>
            <div class="tab"> 
              <input type="hidden" id="pass1"  >
              <label for="caracter">Carácter:</label>
                  <select name="caracter" id="">
                    <option name="caracter"  id="caracter" value="Cariñoso/a">Cariñoso/a</option>
                    <option name="caracter" id="caracter" value="Tímido/a">Tímido/a</option>
                    <option name="caracter" id="caracter" value="Asustadizo/a">Asustadizo/a</option>
                    <option name="caracter" id="caracter" value="Sociable">Sociable</option>
                    <option name="caracter" id="caracter" value="Desconfiado/a">Desconfiado/a</option>
                    <option name="caracter" id="caracter" value="Simpático/a" >Simpático/a</option>
                    <option name="caracter" id="caracter" value="Huidizo/a" >Huidizo/a</option>
                  </select>
                  <br>
                  <div class="form-group row">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="" cols="100" rows="3" value="descripción"></textarea>
                    <br>
                  </div>

              <label for="img">Añadir imagen</label>
              <input type="file" name="img" id="img">
              <br>
              <label for="estado">Estado: </label>
              <select name="estado" id="" required>
                <option name="estado"  value="Refugio"> Refugio</option>
                <option name="estado"  value="Acogida"> Acogida</option>
                <option name="estado"  value="Proceso adopción"> Proceso adopción</option>
                <option name="estado"  value="Adoptado"> Adoptado</option>
              </select>
              <br>
              <button type="submit">Añadir registro</button>
                <input type="hidden" name="crud" value="registrar">
                <input type="hidden" name="r" value="addGato">
            <button type="button" value = "Cancelar" onclick="location.href='./registro-gatos';">Volver</button>
          </div>
         <!--Botones de multi-step-->
          <div style="overflow:auto;">
            <div style="float:right;">
              <button type="button" class="prev" onclick="nextPrev(-1)">Anterior</button>
              <button type="button" class="nextBtn" onclick="nextPrev(1)">Siguiente</button>
            </div>
          </div>

          <!-- Círculos del multi-step -->
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
else if($_POST['crud']== 'registrar'){
    $uploadedImg= $gato->img($_FILES['img']['tmp_name']);
   //envía los datos de la imagen al controlador para confirmar que cumpla requisitos, si está bien
   //lo guarda en el array y se manda todo a bbdd
   
  if(isset($uploadedImg) && $uploadedImg==true){
    $registro=array(
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
    $creada=$gato->crear($registro);
    //Si recibe true no ha habido error al insertar los datos, muestra mensaje

    if($creada==true){
?>
    <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
          <h2>Registro guardado correctamente.</h2>
          <br>
          <button><a href="registro-gatos">Volver</a></button>
          <br>
    </div>
<?php
    }
    else{
      ?>
    <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
          <h2>Error al registrar los datos.</h2>
          <br>
          <button><a href="registro-gatos">Volver</a></button>
          <br>
    </div>
<?php
    }
   }
   else if($uploadedImg==false){//error al guardar la imagen
     ?>
    <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
    <h2>Error al insertar la imagen.</h2>
    <p>Recuerda que los formatos para imágen deben ser: .jpg, .png, .gif</p>
    <br>
    <button><a href="registro-gatos">Volver</a></button>
    <br>
   </div>
   <?php
 }
}
else{
  header('Location:error404.php');
}
?>

