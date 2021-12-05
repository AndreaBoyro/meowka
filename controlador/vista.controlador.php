<?php 
class vistaController {
	private static $vista_path = './vista/';
	
	public function load_view($vista) {
		require_once( self::$vista_path . 'header.php' );
		require_once( self::$vista_path . $vista . '.php' );
       
		require_once( self::$vista_path . 'footer.php' );
	}
}
?>