   <?php
   require_once('controlador/usuarios.controlador.php');
   $control=new controllerUsuario();
   require_once('controlador/adopcion.controlador.php');
   $datos=new controllerAdopcion();
   $contrato=$datos->verEstado($_SESSION['idUsuario']);
   ?>
   <main class="contenedor">
      <div class="perfil col-sm-12 col-md-10 offset-md-1 col-lg-9 offset-lg-1">  
         <h2>Hola, <?php echo $_SESSION['nombreUs']?></h2>
         <hr>
            <form action="" method="post">
               <input type="hidden" name="r" value="editarUsuario">
               <input type="hidden" name="usuario" value="<?php echo $usuario?>">
               <button type="submit">Editar datos personales</button>
            </form>
            <br>
            <h3>Estado de la última solicitud de adopción : <b><?php echo $contrato['estadoPeticion']?></b> </h3>
      </div>
</main>
