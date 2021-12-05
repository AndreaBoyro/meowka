<!-- Formulario para registro usuario -->
<?php
require_once('controlador/usuarios.controlador.php');
$user=new controllerUsuario();
if (!isset($_POST['crud'])){

?>
<main class="contenedor">
  <div class="formulario col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
  <?php
  //Si no hay sesión iniciada muestra el mensaje
  if(!isset($_SESSION['rol']) || $_SESSION['rol']!='admin'){
  ?>
  <h5>Para poder formalizar el contrato de adopción necesitamos 
    tus datos de contacto.</h5>
    <p>Una vez recibamos el formulario que tienes a continuación valoraremos la información y nos pondremos en contacto
        contigo. De todos modos podrás acceder con tu e-mail y contraseña para ver el estado del contrato en la página de
        tu perfil.</p>
        <br>
        <p>
       <b> Si ya tienes una cuenta con nosotros puedes acceder a tu perfil y adoptar con la sesión inicada.</b> 
        ¿Necesitas reestablecer la contraseña? Envíanos un correo a <a href="mailto:admin@meowka.eus">admin@meowka.eus</a>
    </p>
    <br>
<?php
  }
?>
   <form class="crudform" action="" method="post" id="regForm" name="registrar" onsubmit="verificarPasswords(); return false">
    <h1>Registro usuario</h1>
    <hr>
        <div class="tab"> 
<?php
//Si la sesión está iniciada y es rol admin, guarda el rol para crear otro admin, si no será usuario
  if(isset($_SESSION['rol'])){
      if($_SESSION['rol']=='admin'){

      
?>
    <input type="hidden" name="rol" value="admin">
<?php
         }
        else if($_SESSION['rol']=='usuario'){
            header('location:./perfil');
         }
        }
  else{
       
?>
    <input type="hidden" name="rol" value="usuario">

<?php
  }
  ?>
       <label for="nombreUs">Nombre</label>
       <input type="text" name="nombreUs" id="nombreUs" pattern=".{2,20}"  oninput="this.className = ''" required>
        <br>
       <label for="ape">Apellidos</label>
       <input type="text" name="ape" id="ape" pattern=".{2,50}" oninput="this.className = ''" required>
       <br>
    </div>
    <div class="tab">
       <label for="mail">Email</label>
       <input type="email" name="mail" id="mail" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" oninput="this.className = ''"  required>
       <br>
       <label for="tlf">Nº teléfono</label>
       <input type="text" name="tlf" id="tlf" oninput="this.className = ''" pattern=".{9,15}" required>
       <br>
       <label for="fech">Fecha nacimiento</label>
       <input type="text" pattern=".{3,10}" oninput="this.className = ''" name="fech" id="fech" required>
       <br>
       <label for="dir">Dirección</label>
       <input type="text" name="dir" id="dir" oninput="this.className = ''" required>
       <br>
       <label for="poblacion">Población</label>
       <input type="text" name="poblacion" oninput="this.className = ''" id="poblacion" required>
       <br>
    </div>
    <div class="tab"> 
       <label for="pass">Contraseña</label>
       <input type="password" name="pass1" oninput="this.className = ''" id="pass1" minlength="8" required onclick="lista();">
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
       <input type="password" name="pass2" id="pass2" required onkeyup='check();'>
       <!-- div para mensaje de contraseñas iguales o no -->
       <div id="msg"></div>
        <button class="btnEnviar" id="login" type="submit" disabled>Registrarse</button>
        <input type="hidden" name="crud" value="registrar">
        <input type="hidden" name="r" value="addUsuario">
    </div>
    <!-- Botones para control de multi-step -->
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
   else if($_POST['crud']== 'registrar'){
    //antes de enviar todo el formulario, comprueba que el email no existe en la bbdd. Si existe, muestra mensaje    
    $emailExiste=$user->emailExist($_POST['mail']);
        if ($emailExiste){
            ?>
            <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                <h2>El email introducido está registrado en nuestra base de datos.</h2>
                <p> ¿Necesitas reestablecer la contraseña?
                    Envíanos un correo a <a href="mailto:admin@meowka.eus">admin@meowka.eus</a></p>
                    <br>
                    <p>Puedes entrar en tu perfil pulsando el boton que tienes a continuación:</p>
                
                <br>
                <button><a href="login">Iniciar sesión</a></button>
                <br>
            </div>
                <?php
        

        }
        else{
    //encripta la contraseña para mandarla al controlador
    $pass=$_POST['pass2'];
    $passHash=password_hash($pass, PASSWORD_BCRYPT);

    $registro=array(
    'nombreUs'=> $_POST['nombreUs'],
    'ape'=> $_POST['ape'],
    'mail'=> $_POST['mail'],
    'fech'=> $_POST['fech'],
    'dir'=> $_POST['dir'],
    'poblacion'=> $_POST['poblacion'],
    'pass'=> $passHash,
    'tlf'=>$_POST['tlf'],
    'rol'=> $_POST['rol']

);

            if($_SESSION['rol']=='admin'){
                $userCreado=$user->crear($registro);
                    if($userCreado==true){
                        ?>
                        <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                            <h2>Registro creado correctamente</h2>
                            <br>
                            <button><a href="admin">Volver</a></button>
                            <br>
                        </div>
                            <?php
                
                    }
                    else{
                    
                        ?>
                        <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                            <h2>No se ha podido hacer el registro</h2>
                            <br>
                            <button><a href="gatos">Volver</a></button>
                            <br>
                        </div>
                            <?php
                    


                        }
                }
                else{
                $userCreado=$user->crear($registro);
                    // si los datos se han guardado, crea una cookie para poder utilizar los datos del usuario más adelante
                    if($userCreado==true){
                        $cookielogin = $_POST['nombreUs'];
                        setcookie("login", $cookielogin, time() + 3600, ""); 
                        header('location:./login');
                    }
                    else{

                        ?>
                        <div class="mostrar-error col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                            <h2>No se ha podido hacer el registro</h2>
                            <br>
                            <button><a href="gatos">Volver</a></button>
                            <br>
                        </div>
                            <?php
                        }
                 }
     }
    }
   
else{
    header('location: ./error404');
}
    ?>
