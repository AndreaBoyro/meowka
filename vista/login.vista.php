<?php
if(!isset($_COOKIE['login'])){
?>
<!--Inicio sesión general-->
<main class="perfil col-sm-12 col-md-10 offset-md-1 col-lg-9 offset-lg-1">  
    <div class="contenedor"> <h1>Inicia sesión</h1>
        <form action="" id="login" method="post">
            <input type="email" name="user" id="" required>
            <input type="password" name="pass" id="" required>
            <button class="btnlogin" type="submit">Iniciar sesión</button>
        </form>
    </div>
</main>
 <?php

}
else if (isset($_COOKIE['login'])){
?>
<!--Inicio sesión para adoptar, pasa a formulario adopción-->
<main class="perfil col-sm-12 col-md-10 offset-md-1 col-lg-9 offset-lg-2">  
    <h5>Para terminar con la recogida de datos debes inicia sesión.</h5>
        <div class="contenedor"> <h1>Inicia sesión</h1>
            <form action="" id="login" method="post">
                <input type="email" name="user" id="" required>
                <input type="password" name="pass" id="" required>
                <input type="hidden" name="idGato" value="<?php $_POST['idGato']?>">
                <button class="btnlogin" type="submit" >Enviar</button>
            </form>
        </div>
</main>

<?php
}
?>