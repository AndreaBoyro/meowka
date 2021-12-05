<?php
require_once('modelo/usuarios.modelo.php');
class SessionController {
	private $session;
	public function __construct() {
		$this->session = new Usuarios_modelo();
	}
	public function login($usuario, $pass) {
		return $this->session->validar($usuario, $pass);
		
	}

	public function logout() {
		session_start();
		session_destroy();
		header('Location: ./');
	}
}
?>