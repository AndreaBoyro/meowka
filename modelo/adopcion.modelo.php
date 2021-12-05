<?php
class Adopcion_modelo
{
	private $db;
    private $adopcion;
	public function __construct()
	{
		require_once('conexion.php');
		try
		{
			$this->db = Conexion::conexionbd();  
			$this->adopcion=array();   
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function getAdopciones()
	{
		try
		{
            $consulta=$this->db->query("SELECT * FROM adopcion INNER JOIN usuarios ON (usuarios.idUsuario = adopcion.idUsuario)
			INNER JOIN gatos ON (gatos.idGato = adopcion.idGato) ");
            
			while ($filas =$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->adopcion[]=$filas;
            }
			return $this->adopcion;
        }
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function getID($id)
	{
		try
		{
            $consulta=$this->db->query("SELECT * FROM adopcion WHERE idAdop= {$id}");
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
	public function getEstado($id){
		try
		{
            $consulta=$this->db->query("SELECT * FROM adopcion WHERE idUsuario= {$id}");
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
	public function updateEstado($datos){
		try
		{
            $consulta=$this->db->query("UPDATE adopcion SET estadoPeticion='{$datos['estadoPeticion']}' WHERE idAdop={$datos['idAdop']}");
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
	public function create($datos)
	{
		$contrato=false;
		try 
		{
			$this->db->query("INSERT INTO adopcion (idGato, idUsuario, ahora, antes,
			razon, vive, deseo, decision, horas, estadoPeticion) 
			VALUES ({$datos['idGato']}, {$datos['idUsuario']},'{$datos['ahora']}',
			'{$datos['antes']}', '{$datos['razon']}', '{$datos['vive']}', '{$datos['deseo']}',
			'{$datos['decision']}', '{$datos['horas']}', 'Recibida') ");
		  //Si se crea el contrato de adopción, cambia el estado del gato a 'reservado'
		   $contrato=true;
		   if($contrato){
			   $gato=new controllerGatos();
			   $gato->estado($datos['idGato'], 'Reservado');
		   }
		  
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		return true;
	}
}
?>
 
    
    


