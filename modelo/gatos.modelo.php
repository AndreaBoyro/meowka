<?php 
class Gatos_modelo
{
	private $db;
    private $gatos;
	public function __construct()
	{
		require_once('conexion.php');
		try
		{
			$this->db = Conexion::conexionbd();  
			$this->gatos=array(); 
			  
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function getGatos()
	{	
		try
		{				
				$consulta=$this->db->query("SELECT * FROM gatos");
				while ($filas =$consulta->fetch(PDO::FETCH_ASSOC)){
					$this->gatos[]=$filas;
				}
				return $this->gatos;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getGatosPag( $inicio, $regpag, $estado=NULL){
		
		if(isset($estado)){
			try
			{				
				$consulta=$this->db->query("SELECT * FROM gatos WHERE estado='$estado' LIMIT $inicio, $regpag");
				$pagGatos=array();			
					while ($filas =$consulta->fetch(PDO::FETCH_ASSOC)){
						$pagGatos[]=$filas;
					}
					return $pagGatos;
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}else{
			try
			{				
				$consulta=$this->db->query("SELECT * FROM gatos LIMIT $inicio, $regpag");
				$pagGatos=array();			
				while ($filas =$consulta->fetch(PDO::FETCH_ASSOC)){
					$pagGatos[]=$filas;
				}
            return $pagGatos;
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
	}
	public function getID($id){
		try
		{
            $consulta=$this->db->query("SELECT * FROM gatos WHERE idGato= {$id}");
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
	public function getNombre($nombre){
		try
		{
            $consulta=$this->db->query("SELECT * FROM gatos WHERE nombreGato= '{$nombre}'");
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
		//Si no se ha subido foto
		if(empty($datos['img'])){
			try
			{	
				 $this->db->query("UPDATE gatos SET
				 nombreGato='{$datos['nombreGato']}',
				 edad='{$datos['edad']}',
				 sexo='{$datos['sexo']}',
				 esterilizado='{$datos['ester']}',
				 testado='{$datos['testado']}',
				 caracter='{$datos['caracter']}',
				 estado='{$datos['estado']}',
				 descripcion='{$datos['descripcion']}'
				 WHERE idGato={$datos['idGato']} "
				 );
			} catch (Exception $e) 
			{

				die($e->getMessage());
				return false;
			}
			return true;

		}
		else{
		try
		{	
			 $this->db->query("UPDATE gatos SET
			 nombreGato='{$datos['nombreGato']}',
			 edad='{$datos['edad']}',
			 sexo='{$datos['sexo']}',
			 esterilizado='{$datos['ester']}',
			 testado='{$datos['testado']}',
			 caracter='{$datos['caracter']}',
			 estado='{$datos['estado']}',
			 descripcion='{$datos['descripcion']}',
			 img='{$datos['img']}'
			 WHERE idGato={$datos['idGato']} "
			 );
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		return true;
	}
	}
	public function getEstadoGatos($estado){
		try 
		{	$estadoGatos=array();
			$consulta=$this->db->query("SELECT * FROM gatos WHERE estado= '$estado' ");
			while ($filas =$consulta->fetch(PDO::FETCH_ASSOC)){
				$estadoGatos[]=$filas;
            }
            return $estadoGatos;
		}		  
		 catch (Exception $e){
			die($e->getMessage());
		}
	}
	public function setEstado($id, $estado){
		try 
		{
			$this->db->query("UPDATE gatos SET estado='$estado' WHERE idGato={$id} ");
			//header('Location: ./adopciones');
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function create($datos)
	{
		try 
		{
			$this->db->query("INSERT INTO gatos (nombreGato, edad, sexo, esterilizado, testado, 
			caracter, descripcion, img, estado) 
			VALUES ('{$datos['nombreGato']}', 
			'{$datos['edad']}', 
			'{$datos['sexo']}',
			'{$datos['ester']}',
			'{$datos['testado']}', 
			'{$datos['caracter']}', 
			'{$datos['descripcion']}', 
			'{$datos['img']}',
			'{$datos['estado']}' ) 
			");
		  
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		return true;
	}
	public function delete($id){
		try 
		{
			$this->db->query("DELETE FROM gatos WHERE idGato={$id} ");
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		return true;
	}
}
?>
 
    
    