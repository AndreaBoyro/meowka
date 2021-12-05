<!--Formulario para la adopción-->
<?php
require_once('controlador/adopcion.controlador.php');
require_once('controlador/gatos.controlador.php');
$gato=new controllerGatos();
$adopcion=new controllerAdopcion();

if(!isset($_POST['crud'])){
    $datosGato=$gato->ver($_COOKIE['gato']);
    $gatos=$gato->listado();
?>
        
<main class="contenedor">     
  <div class="formulario col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3"> 
    <form class="crudform" action="" method="post" id="regForm" enctype="multipart/form-data">
      <h1>Formulario adopción</h1>
      <div class="tab"> 
        <label for="nombre">Nombre del gato:</label>
        <input type="text" oninput="this.className = ''" name="nombreGato" value="<?php echo $datosGato['nombreGato'] ?>" id="">
        <input type="hidden" name="idGato" value = "<?php echo $datosGato['idGato']?>">
        <p>*Si quieres hacer adopción conjunta déjanos el nombre del otro gato/a en la sección de comentarios.</p>
        <label for="coment">Comentario</label>
        <textarea name="coment" oninput="this.className = ''" id="coment" cols="30" rows="10" value="NULL" placeholder="¿Tienes algo que preguntarnos
              o contarnos?">
        </textarea>
        <br>
      </div>
        <div class="tab"> 
          <h3>¿Cuál es tu situación?</h3>
          <legend class="col-form-label col-sm-2 col-md-4">Ahora tienes...</legend>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="ahora" id="flexCheckDefault" value="Perro">
            <label class="form-check-label" for="ahora" id="flexCheckDefault">Perro</label>
          </div>
          <div class="form-check">
            <input class="form-check-input"  type="checkbox" name="ahora" id="flexCheckDefault" value="Gato">
            <label class="form-check-label" for="ahora" id="flexCheckDefault">Gato</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="ahora" id="flexCheckDefault" value="Otros">
            <label class="form-check-label" for="ahora" id="flexCheckDefault">Otros</label>
          </div>
          <div class="form-check">
            <input class="form-check-input"  type="checkbox" name="ahora" id="flexCheckDefault" value="Nada">
            <label class="form-check-label" for="ahora" id="flexCheckDefault">Nada</label>
          </div>
          <br>
          <legend class="col-form-label col-sm-2 col-md-4">Anteriormente has tenido...</legend>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="antes" id="flexCheckDefault" value="Perro">
            <label class="form-check-label" for="anterior" id="flexCheckDefault">Perro</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="antes" id="flexCheckDefault" value="Gato">
            <label class="form-check-label" for="anterior" id="flexCheckDefault">Gato</label>
          </div >
          <div class="form-check">
            <input class="form-check-input"  type="checkbox" name="antes" id="flexCheckDefault" value="Conejo">
            <label class="form-check-label" for="anterior" id="flexCheckDefault">Conejo</label>
          </div>
          <div class="form-check">
            <input class="form-check-input"  type="checkbox" name="antes" id="flexCheckDefault" value="Aves">
            <label class="form-check-label" for="anterior" id="flexCheckDefault">Aves</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="antes" id="flexCheckDefault" value="Reptiles">
            <label class="form-check-label" for="anterior" id="flexCheckDefault">Reptiles</label>
            </div>
            <div class="form-check">
              <input class="form-check-input"  type="checkbox" name="antes" id="flexCheckDefault" value="No he tenido animales">       
              <label class="form-check-label" for="anterior" id="flexCheckDefault">No he tenido animales</label>
            </div>
            <div class="form-check">
              <input class="form-check-input"  type="checkbox" name="antes" id="flexCheckDefault" value="Otros">
              <label class="form-check-label" for="anterior" id="flexCheckDefault">Otros</label>
            </div>
            <br>
            <label for="razon">Si has tenido perro o gato antes y ya no, indica el motivo:</label>
            <textarea name="razon" id="" cols="30" rows="10"  value="NULL "></textarea>
            <br>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 col-md-4">Vives en:*</legend>
                <div class="col-sm-10 col-md-8">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="vive" value="Piso" required>
                    <label class="form-check-label" for="vive">
                      Piso
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input"type="radio" name="vive" value="Chalet" required>
                    <label class="form-check-label" for="vive">
                      Chalet
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input"  type="radio" name="vive" value="Finca" required>
                    <label class="form-check-label" for="vive">
                      Finca
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>
          <br>
        </div>
          <div class="tab"> 
            <label for="deseo">¿Por qué deseas tener un gato?</label>
            <textarea name="deseo" oninput="this.className = ''" id="deseo" cols="30" rows="10" value="NULL"></textarea>
            <br>
            <label for="porque">¿Por qué has decidido por la adopción?</label>
            <textarea name="adop" oninput="this.className = ''" id="decision" cols="30" rows="10" value=""></textarea>
            <br>
            <label for="horas">¿Cuántas horas estaría el animal solo?*</label>
            <input type="text" oninput="this.className = ''" name="horas" id="horas" required>
            <br>
            <button type="submit">Enviar</button>
            <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['idUsuario'] ?>">
            <input type="hidden" name="crud" value="registrar">
            <input type="button" value = "Cancelar" onclick="location.href='./home';">
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
else if($_POST['crud']=='registrar'){
  //Guarda los datos introducidos en un array y los mando al controlador  
  $registro=array(
        'idGato'=> $_POST['idGato'],
        'idUsuario'=> $_POST['idUsuario'],
        'ahora'=> $_POST['ahora'],
        'antes'=>$_POST['antes'],
        'razon'=>$_POST['razon'],
        'vive'=> $_POST['vive'],
        'deseo'=> $_POST['deseo'],
        'decision'=>$_POST['decision'],
        'horas'=> $_POST['horas']
    );
    $creada=$adopcion->crear($registro);
    //Si se devuelve true, está guardado correctamente y muestra un mensaje
    if($creada==true){
      ?>
      <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
        <h2>Hemos recibido la petición de adopción.</h2>
        <br>
        <p>En 24-48horas contactaremos contigo por teléfono o email para darte la evaluación de tu solicitud.
        </p>
        <p>Puedes acceder a tu perfil desde el siguiente botón</p>

        <button><a href="perfil">Mi perfil</a></button>
        <br>
      </div>
  <?php
    setcookie('login', time() - 3600);
     
    }
    else{
      ?>
    <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
      <h2>Error al registrar los datos. Pónte en contacto con nosotros via email y te ayudamos.</h2>
      <br>
      <button><a href="gatos">Volver</a></button>
      <br>
    </div>
<?php
    }
 }
 else{
     header('Location:error404.php');
 }

?>
