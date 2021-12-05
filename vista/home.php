<?php
 require_once('controlador/gatos.controlador.php');
  $gatos=new controllerGatos();
  $gatoArray=$gatos->listado();
$gatoAleatorio=array_rand($gatoArray, 1);
$gatoDia=$gatoArray[$gatoAleatorio];   


?>


<main class="contenedor">
<div class="card-group card-home">
  <div class="card card-info">
  <div class="card-header info-home">¿Qué somos?</div>
    <div class="card-body">
      <p class="card-text">Somos una protectora de animales que busca hogares para los gatos que se encuentran en las calles de Basauri
		  y necesitan un hogar por sus características o situación.
		   Estamos inscritos en el Registro General de Asociaciones del País Vasco</p>
    </div>
  </div>

  <div class="card card-info">
  <div class="card-header info-home">¿Quiénes la formamos? </div>
    <div class="card-body">
      <p class="card-text">Somos un grupo voluntarias y voluntarios que, en su tiempo libre, 
		  colaboran en las diferentes necesidades que tenemos para sacar el proyecto adelante</p>
    </div>
  </div>
  <div class="card card-info">
  <div class="card-header info-home">¿Cómo puedes colaborar?</div>
    <div class="card-body">
		  <ul>
			  <li>Adoptar</li>
			  <li>Hazte voluntario/a (envíanos un correo a voluntariado@meowka.eus y te comentamos)</li>
			  <li>Déjanos mantas, juguetes, comida...</li>
			 
		  </ul>
    </div>
  </div>

</div> 
<div class="ficha-gato-contenedor">
        <article class="ver-ficha-gato">
            <header class="nombre-gato titulo-ppal"><h2><b>Hoy te presentamos a <?php echo $gatoDia['nombreGato']?>, nuestro gato del día:</b></h2></header>
                <div class="ficha-gato-dia">
                    <div class="imgGato-dia">
                    <img class="imgGato" src="<?php echo $gatoDia['img']?>" alt="foto de <?php echo $gatoDia['nombreGato']?> ">
                	</div>

                <div class="datosGato">
                    <div class="ficha-linea">
                        <h5 class="descripcion-dato-ficha">Nombre</h5>
                        <p class="dato-ficha"><?php echo $gatoDia['nombreGato']?>
                    </div>
                    <div class="ficha-linea">
                        <h5 class="descripcion-dato-ficha">Edad</h5>
                        <p class="dato-ficha"><?php echo $gatoDia['edad']?>
                    </div>
                    <div class="ver-ficha-dia">
						<form class="ver-ficha-dia" action="" method="post">
							<button>Conocer más</button>
							<input type="hidden" name="idGato" value="<?php echo $gatoDia['idGato']?>">
							<input type="hidden" name="r" value="ficha-gato">
						</form>
                    </div>
               
                </div>
                </div>

             
        </article>
    </div>
	

</main>