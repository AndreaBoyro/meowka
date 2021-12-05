<?php
 require_once('controlador/gatos.controlador.php');
 $gato=new controllerGatos();
if(!isset($_POST['crud'])){
    $verGato=$gato->ver($_POST['idGato']);
?>
<main class="contenedor max-auto">
    <div class="ficha-gato-contenedor">
        <article class="ver-ficha-gato">
            <header class="nombre-gato titulo-ppal"><h1><?php echo $verGato['nombreGato']?></h1></header>
                <div class="ficha-gato-sup">
                    <div class="imgGato-ficha">
                    <img class="imgGato" src="<?php echo $verGato['img']?>" alt="foto de <?php echo $verGato['nombreGato']?> ">
                    <?php
                    //muestra botón adoptar solo para los del refugio. Si no, muestro el estado
                    if($verGato['estado']=='Reservado' || $verGato['estado']=='Adoptado'){
                    ?>
                    <div class="enlace-adop">
                        <div class="ficha-linea">
                            <h5 class="descripcion-dato-ficha">Estado</h5>
                            <p class="dato-ficha"><?php echo $verGato['estado']?>
                        </div>
                    </div>
                    <?php
                        }
                        else{
                        ?>
                     <div class="enlace-adop">
                        <form action="" method="post">
                                <input type="hidden" name="idGato" value="<?php echo $verGato['idGato']?>">   
                                <input type="hidden" name="login-ok" value="si">   
                                <input type="hidden" name="crud" value="adoptar">  
                                <input type="hidden" name="r" value="ficha-gato">
                                <button type="submit">Adopta</button>
                        </form>
                    </div>
                    <?php 

                        }
                    ?>
                </div>
                <div class="datosGato">
                    <div class="ficha-linea">
                        <h5 class="descripcion-dato-ficha">Edad</h5>
                        <p class="dato-ficha"><?php echo $verGato['edad']?>
                    </div>
                    <div class="ficha-linea">
                        <h5 class="descripcion-dato-ficha">Testado</h5>
                        <p class="dato-ficha"><?php echo $verGato['testado']?>
                    </div>
                    <div class="ficha-linea">
                        <h5 class="descripcion-dato-ficha">Esterilizado</h5>
                        <p class="dato-ficha"><?php echo $verGato['esterilizado']?>
                    </div>
                    <div class="ficha-linea">
                        <h5 class="descripcion-dato-ficha">Carácter</h5>
                        <p class="dato-ficha"><?php echo $verGato['caracter']?>
                    </div>
                </div>
                </div>
                <div class="ficha-gato-inf">
                    <article class="descripcion-ficha-gato">
                        <header><h2>La historia de <?php echo $verGato['nombreGato']?></h2></header>
                            <div class="fecha-publicacion"><?php 
                            //modifico el formato de la fecha  	
                            $date = date_create($verGato['fechaAlta']);
                            echo date_format($date,"d/m/Y");?>
                            </div>
                            <div class="publicacion-gato">
                                <?php echo $verGato['descripcion']?>
                            </div>
                    </article>
                </div>
        </article>
    </div>
</main>
<?php
 }else if($_POST['crud']=='adoptar'){
    //crea 1 cookie para poder obtener más adelante los datos del gato seleccionado
    $cookieIDGato = $_POST['idGato'];
    setcookie("gato", $cookieIDGato, time() + (86400 * 30), ""); // 86400 = 1 day
    //sí no tiene sesión iniciada, primero se tiene que registrar
    if(!isset($_SESSION['idUsuario'])){
        header('location:./registro');
    }
    else if (isset($_SESSION['idUsuario'])){
        header('location:./adoptar');
    }
 }
 else{
   header('location:./gatos');
 }
  
  ?>
