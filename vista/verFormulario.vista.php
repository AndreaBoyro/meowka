<?php
require_once('controlador/adopcion.controlador.php');
$formulario=new controllerAdopcion();
$ver=$formulario->ver($_POST['idAdop']);
?>
<main class="contenedor">
    <div class="formulario col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
        <form class="crudform" action="" method="post" enctype="multipart/form-data">  
            <div class="tab">
                <h1>Adopción nº <?php echo $ver['idAdop']?></h1>
                <br>
                <label for="nombre">ID del gato:</label>
                <input type="text" name="idGato" value = "<?php echo $ver['idGato']?>"readonly>
                <br>
                <label for="nombre">ID del adoptante:</label>
                <input type="text" name="idGato" value = "<?php echo $ver['idUsuario']?>"readonly>
                <br>
                <label for="coment">Comentario</label>
                <textarea name="coment" id="coment" cols="30" rows="10" readonly><?php echo $ver['coment'] ?>
                </textarea>
                <br>
            </div>
            <div class="tab">
                <h3>¿Cuál es tu situacion?</h3>
                <label for="ahora">Ahora tienes...</label>
                <input type="text" name="ahora" id="ahora" value="<?php echo $ver['ahora'] ?>"readonly>
                <br>
                <label for="anterior">Anteriormente has tenido...</label>
                <input type="text" name="antes" value="<?php echo $ver['antes'] ?>"readonly>
                <br>
                <label for="razon">Si has tenido perro o gato antes y ya no, indica el motivo:</label>
                <textarea name="razon" cols="30" rows="10"  readonly><?php echo $ver['razon'] ?></textarea>
                <br>
                <label for="vive">Vives en:*</label>
                <input type="text" name="vive"  value="<?php echo $ver['vive'] ?>" readonly>
                <br>
            </div>
            <div class="tab">
                <label for="deseo">¿Por qué deseas tener un gato?</label>
                <textarea name="deseo" cols="30" rows="10" readonly><?php echo $ver['deseo'] ?></textarea>
                <br>
                <label for="porque">¿Por qué has decidido por la adopción?</label>
                <textarea name="decision"  cols="30" rows="10" readonly><?php echo $ver['decision'] ?></textarea>
                <br>
                <label for="horas">¿Cuántas horas estaría el animal solo?*</label>
                <input type="text" name="horas"  value="<?php echo $ver['horas'] ?>" readonly>
                <button type="submit">Volver</button>
                <input type="hidden" name="r" value="listaAdopcion">
            </div>
            <!-- Multistep -->
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" class="prev" onclick="nextPrev(-1)">Anterior</button>
                    <button type="button" class="nextBtn" onclick="nextPrev(1)">Siguiente</button>
                </div>
            </div>
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </form>
    </div>
</main>
