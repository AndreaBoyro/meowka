<?php
class Usuarios_modelo
{
	private $db;
    private $usuarios;
	public function __construct()
	{
		require_once('conexion.php');
		try
		{
			$this->db = Conexion::conexionbd();  
			$this->usuarios=array();   
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function getUsuarios(){
		try
		{
            $consulta=$this->db->query("SELECT * FROM usuarios");
            while ($filas =$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->usuarios[]=$filas;
            }
            return $this->usuarios;
        }
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getID($id){
		try
		{
            $consulta=$this->db->query("SELECT * FROM usuarios WHERE idUsuario= {$id}");
			if($consulta){
				$fila=$consulta->fetch(PDO::FETCH_ASSOC);
			}
            return $fila;
        }
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function update($datos){
		try
		{	
			 $this->db->query("UPDATE usuarios SET
			 nombreUs='{$datos['nombreUs']}',
			 apellidos='{$datos['apellidos']}',
			 fechNac='{$datos['fechNac']}',
			 direccion='{$datos['direccion']}' ,
			 numTlf='{$datos['numTlf']}',
			 poblacion='{$datos['poblacion']}'  ,
			 email='{$datos['email']}',
			 pass='{$datos['pass']}'  
			 WHERE idUsuario={$datos['idUsuario']} 
			 ");

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		return true;
	}
	public function create($datos)
	{
		try 
		{
			$this->db->query("INSERT INTO usuarios (nombreUs, apellidos, direccion, poblacion, numTlf, email,
			fechNac, pass, rol) 
			VALUES ('{$datos['nombreUs']}', 
			'{$datos['ape']}', 
			'{$datos['dir']}',
			'{$datos['poblacion']}',
			'{$datos['tlf']}', 
			'{$datos['mail']}',
			'{$datos['fech']}', 
			'{$datos['pass']}', 
			'{$datos['rol']}' ) 
			");
		  
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		return true;
	}
    public function validar($usuario, $pass){
		$consulta=$this->db->query("SELECT * FROM usuarios WHERE email = '$usuario'");
		$fila=$consulta->fetch(PDO::FETCH_ASSOC);
			if($fila){
				if(password_verify($pass, $fila['pass'])){
					return $fila;
				}
				else{
					//Contraseña incorrecta					
					$fila=null;
					return $fila;
				}
			}else{
				//No existe usuario
				return $fila;
			}
			
    }
	public function getEmail($email){
		try
		{	
			 $consulta=$this->db->query("SELECT * FROM usuarios WHERE email = '$email'");
			 $fila=$consulta->fetch(PDO::FETCH_ASSOC);
			 if($fila){
				 return true;
			 }
			 else{
				 return false;
			 }

			 

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		return true;

	}

}
	
?>
 
    