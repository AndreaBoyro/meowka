<header id="header-pagina">
  <div class="icon"><img id="img-meowka" src="assets/img/img-web/icon.png" alt="icono Meowka"></div>
  <div class="titulo-header">
      <div class="img-header">
        <a href="https://fontmeme.com/fuentes/fuente-bonjour-decatype/">
        <img id="font-meowka" src="https://fontmeme.com/permalink/211019/464b6f293780a85cec40e0acbf6693f1.png" alt="fuente-bonjour-decatype" border="0"></a></div>
      </div>
    <div class="btn-head">
      <!-- Si tiene sesión iniciada muestra botones para perfil/salir -->
      <?php
      if(!isset($_SESSION['idUsuario'])){
        ?>
      <button class="btn-login"><a href="login">Inicio sesión</a></button>
      <?php
      } else{
      ?>
      <button class="btn-perfil"><a href="perfil">Mi perfil</a></button>
      <button class="btn-salir"><a href="salir">Salir</a></button>
      <?php
      }
      ?>
    </div>
</header>
<!-- Sticky navbar -->
<nav id="navbar">
  <button><a href="home">Home</a></button>
  <button><a href="gatos">Nuestros gatos</a></button>
</nav>