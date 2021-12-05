<!-- Formulario para editar usuario -->
<?php 
require_once('controlador/usuarios.controlador.php');
$user=new controllerUsuario();
if (!isset($_POST['crud'])){
$datos=$user->ver($_SESSION['idUsuario']);
?>
<main class="contenido-main">
    <div class="formulario col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
        <form class="crudform" action="" method="post">
        <input type="hidden" name="idRol" value ="<?php echo $datos['idRol']?>"  >
        <input type="hidden" name="idUsuario" value ="<?php echo $datos['idUsuario']?>"  >
            <div class="tab"> 
                <label for="nombre">Nombre</label>
                <input type="text" name="nombreUs" value ="<?php echo $datos['nombreUs']?>"  >
                <br>
                <label for="ape">Apellidos</label>
                <input type="text" name="apellidos" value ="<?php echo $datos['apellidos']?>"  >
                <br>
                <label for="mail">Fecha de nacimiento</label>
                <input type="text" name="fechNac" value ="<?php echo $datos['fechNac']?>"  >
                <br>
            </div> 
            <div class="tab"> 
                <label for="fech">Dirección</label>
                <input type="text" name="direccion" value ="<?php echo $datos['direccion']?>"  >
                <br>
                <label for="dir">Población</label>
                <input type="text" name="poblacion" value ="<?php echo $datos['poblacion']?>"  >
                <br>
                
                <label for="numTlf">Número de teléfono</label>
                <input type="text" name="numTlf" pattern=".{9,15}"  value ="<?php echo $datos['numTlf']?>" >
                <br>
                <label for="email">Email</label>
                <input type="email" name="email"  pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" value ="<?php echo $datos['email']?>">
                <br>
            </div>
            <div class="tab"> 
                <label for="pass">Contraseña</label>
                <input type="password" name="pass1" id="pass1" value ="" min-length="8" required onclick="lista();">
                <br>
                <div class="controlpass" id="passlista">
                    <ul>
                        <li>Debe contener al menos 1 letra mayúscula</li>
                        <li>Debe contener al menos 1 número</li>
                        <li>Debe contener al menos 1 minúcula</li>
                        <li>Debe contener al menos 1 carácter especial</li>
                        <li>La longitud de la contraseña debe ser de al menos 8 caracteres</li>
                    </ul>
                </div>
                <label for="pass">Repite la contraseña</label>
                <input type="password" name="pass2" id="pass2" minlength="8" required onkeyup='check();'>
                <div id="msg"></div>
                <br>
            <button type="submit" value="editar">Editar registro</button>
                    <input type="hidden" name="crud" value="editar">
                    <input type="hidden" name="r" value="editarUsuario">
                <button type="button" value = "Cancelar" onclick="location.href='./perfil';">Volver</button>
            </div>
            </form>
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
    </div>
</main>   
<?php 
}
  else if(isset($_POST['crud'])){
    $pass=$_POST['pass2'];
    $passHash=password_hash($pass, PASSWORD_BCRYPT);

    $datosMod=array(
       'idRol' => $_POST['idRol'],
       'idUsuario'=>$_POST['idUsuario'],
        'nombreUs' =>  $_POST['nombreUs'],
		'apellidos' =>  $_POST['apellidos'], 
		'email' =>  $_POST['email'],
        'direccion' =>  $_POST['direccion'],
		'poblacion' =>  $_POST['poblacion'],    
        'numTlf' =>  $_POST['numTlf'],
		'fechNac' =>  $_POST['fechNac'], 
		'pass' =>  $passHash,

    );
    $userEditado=$user->editar($datosMod);
    //Control de errores y muestra mensaje
    if($userEditado==true){
?>
      <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
            <h2>Registro editado correctamente.</h2>
            <br>
            <button><a href="perfil">Volver</a></button>
            <br>
        </div>
<?php
    }
    else{
?>
      <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
            <h2>Error al editado los datos. </h2>
            <br>
            <button><a href="registro-gatos">Volver</a></button>
            <br>
    </div>
<?php
    }
}
?>

