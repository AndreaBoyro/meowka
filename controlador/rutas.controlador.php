<?php 
require_once('vista.controlador.php');
require_once('sesion.controlador.php');
class Router {
	public $route;
	public function __construct() {
			$session_options = array(
				session_start (),
				'read_and_close' => true
			);
			if( !isset($_SESSION) )  session_start($session_options);
			if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;
			if($_SESSION['ok']) {
				//Rutas admin
				if($_SESSION['rol']=='admin'){
					$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
					$controlador=new vistaController();
					switch ($this->route) {
						case 'home':
							if( !isset( $_POST['r'] ) )  $controlador->load_view('home');
							else if($_POST['r']== 'ficha-gato') $controlador->load_view('ficha-gato.vista');
							break;
						case 'registro-gatos':
							if(!isset($_POST['r'])) $controlador->load_view('tablaGatos.vista');
							else if($_POST['r']== 'editarGato') $controlador->load_view('editarGato.vista');
							else if($_POST['r']== 'addGato') $controlador->load_view('addGato.vista');
							else if($_POST['r']== 'deleteGato') $controlador->load_view('deleteGato.vista');
							break;
						case 'gatos':
							if(!isset($_POST['r'])) $controlador->load_view('gatos.vista');
							else if($_POST['r']== 'ficha-gato') $controlador->load_view('ficha-gato.vista');
							break;
						case 'adoptar':
							$controlador->load_view('addAdopcion.vista');
							break;
						case 'adopciones':
							if(!isset($_POST['r']) || $_POST['r']=='listaAdopcion') $controlador->load_view('listaAdopcion.vista');
							else if( $_POST['r'] == 'verFormulario' )  $controlador->load_view('verFormulario.vista');
							break;
						case 'registro':
							$controlador->load_view('addUsuario.vista');
							break;
						case 'admin':
							$controlador->load_view('admin.vista');
							break;
						case 'perfil':
							$controlador->load_view('admin.vista');
							break;
						case 'editar-usuario':
							$controlador->load_view('editarUsuario.vista');
							break;
						case 'salir':
							$user_session = new SessionController();
							$user_session->logout();
							break;
						default:
							$controlador->load_view('error404');
							break;
					}
				}
				else if ($_SESSION['rol']=='usuario'){
					//Rutas usuario registrado
					$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
					$controlador = new vistaController();
					switch ($this->route) {
						case 'home':
							if( !isset( $_POST['r'] ) )  $controlador->load_view('home');
							else if($_POST['r']== 'ficha-gato') $controlador->load_view('ficha-gato.vista');
							break;
						case 'gatos':
							if( !isset( $_POST['r'] ) )  $controlador->load_view('gatos.vista');
							//else if(  $_POST['r'] == 'addAdopcion') $controlador->load_view('addAdopcion.vista');						if(!isset($_POST['r'])) $controlador->load_view('gatos.vista');
							else if($_POST['r']== 'ficha-gato') $controlador->load_view('ficha-gato.vista');
							break;
						case 'adoptar':
							$controlador->load_view('addAdopcion.vista');
							break;
						case 'perfil':
							if( !isset( $_POST['r'] ) )  $controlador->load_view('perfil.vista');
							else if( $_POST['r'] == 'editarUsuario' )  $controlador->load_view('editarUsuario.vista');
							break;
						case 'salir':
							$user_session = new SessionController();
							$user_session->logout();
							break;
						default:
							$controlador->load_view('error404');
							break;
					}
				}
			}
			else if ( isset($_POST['user']) && isset($_POST['pass']) ) {
				// Login 
				if ( isset($_POST['user']) && isset($_POST['pass']) ) {
					$user_session = new SessionController();
					$_SESSION = $user_session->login($_POST['user'], $_POST['pass']);
					if ( empty($_SESSION) ) {
						// Si el usuario o la contraseña no se encuentran en la base de datos
						echo "<script>alert('Usuario/contraseña incorrectos'); </script>";
						echo "<script>window.location.href='./login'</script>;";
					}
					else {
						// Si el usuario y la contraseña son correctos se guardan los datos del usuario logueado
						$_SESSION['ok'] = true;
						$controlador = new VistaController();
						switch ($_SESSION['rol']){
							case 'admin':
								header('location:./admin');
								break;
							case 'usuario':
								//si existen las cookies gato y login, envía al formulario de adopción
								if(isset($_COOKIE['gato']) && isset($_COOKIE['login'])) header('location:./adoptar');
								else {header('location:./perfil');}
								break;
							default:
								$controlador->load_view('home');
								break;
						}
					}
				} else {
					$controlador = new VistaController();
					$controlador->load_view('./home');
				}
			//Usuario invitado 
			} else if(!$_SESSION['ok']) {
				$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
				$controlador = new VistaController();
				switch ($this->route) {
					case 'home':
						if( !isset( $_POST['r'] ) )  $controlador->load_view('home');
						else if($_POST['r']== 'ficha-gato') $controlador->load_view('ficha-gato.vista');
						break;
					case 'registro':
						if( !isset( $_POST['r'] ) || $_POST['r']=='addUsuario')  $controlador->load_view('addUsuario.vista');
						break;
					case 'login':
						 $controlador->load_view('login.vista');
						break;
					case 'gatos':
						if( !isset( $_POST['r'] ) )  $controlador->load_view('gatos.vista');
						else if( $_POST['r'] == 'addUsuario' )  $controlador->load_view('addUsuario.vista');
						else if( $_POST['r'] == 'login' )  $controlador->load_view('login.vista');
						else if( $_POST['r'] == 'addAdopcion' )  $controlador->load_view('addAdopcion.vista');
						else if($_POST['r']== 'ficha-gato') $controlador->load_view('ficha-gato.vista');
						break;
					case 'ficha-gato':
						$controlador->load_view('ficha-gato.vista');
						break;
					default:
						$controlador->load_view('error404');
						break;
				}
			}
		}
	} 
?>