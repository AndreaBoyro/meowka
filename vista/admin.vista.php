<!-- Vista perfil admin -->
 <?php
   require_once('controlador/usuarios.controlador.php');
   $user=new controllerUsuario();
?>
<div class="contenedor">
    <div class="perfil col-sm-12 col-md-10 offset-md-1 col-lg-9 offset-lg-1">
        <h3>Hola, <?php echo $_SESSION['nombreUs']?></h3>
        <hr>
        <div class="enlaces-admin">
            <button><a href="registro-gatos">Tabla gatos</a></button>
            <br>
            <button><a href="adopciones">Tabla adopciones</a></button>
            <br>
            <button><a href="editar-usuario">Editar tus datos personales</a></button>
            <br>
            <button><a href="registro">Registro usuario colaborador</a></button>
            <br>
        </div>
    </div>
</div>