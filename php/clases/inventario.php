<?php
	
	require_once("../conexion/conexion.php");

	class Inventario extends Conectar{


			public function registroAreas($area_id,$nombre){
					$capturista_id=$_COOKIE["b_capturista_id"];
					$res=array();
					$datos=array();
					$i=0; 



				if($area_id>0){
					$query="UPDATE b_cat_areas SET descripcion='$nombre' WHERE id=$area_id";  
					$resp=	mysqli_query($this->con(), $query); 

				}else{
					$query="INSERT INTO b_cat_areas (descripcion,estatus_id,capturista_id,fecha_captura,hora_captura)
									VALUES('$nombre',5,$capturista_id,CURDATE(),CURTIME())";  
					$resp=	mysqli_query($this->con(), $query);  
				} 

				if($resp>0){
					$datos[$i]['respuesta'] = '2';
				}else{

					$datos[$i]['respuesta'] = '3';
				}

				return $datos;

			}

			public function cargarAreas(){
				$res=array();
				$datos=array();
				$i=0;

				$query="SELECT b_cat_areas.id,b_cat_areas.descripcion,estatus.descripcion FROM b_cat_areas
							JOIN estatus ON estatus.id=b_cat_areas.estatus_id";  
					$respuesta= mysqli_query($this->con(), $query);  
					while ($res = mysqli_fetch_row($respuesta)) {

					   $datos[$i]['area_id'] = $res[0];
					   $datos[$i]['descripcion'] = $res[1]; 
					   $datos[$i]['estatus'] = $res[2]; 
					   $i++;

					} 

				return $datos;
			}

			public function buscarArea($area_id,$area){
				$res=array();
				$datos=array();
				$i=0; 

				if($area_id>0){
					$ql='WHERE b_cat_areas.id='.$area_id;
				}
				else{
					$ql='WHERE b_cat_areas.descripcion like "%$area%"';
				}

				$query="SELECT b_cat_areas.id,b_cat_areas.descripcion,estatus.descripcion FROM b_cat_areas
							JOIN estatus ON estatus.id=b_cat_areas.estatus_id ".$ql;   
					$respuesta= mysqli_query($this->con(), $query);  
					while ($res = mysqli_fetch_row($respuesta)) {

					   $datos[$i]['area_id'] = $res[0];
					   $datos[$i]['descripcion'] = $res[1]; 
					   $datos[$i]['estatus'] = $res[2]; 
					   $i++;

					} 

				return $datos;
			}
			public function desHabilitarArea($area_id){
				$res=array();
				$datos=array();
				$i=0; 

				 $query="UPDATE b_cat_areas SET estatus_id=6 WHERE id=$area_id";  
					$resp=	mysqli_query($this->con(), $query); 

				return $datos;
			}
			public function eliminarArea($area_id){
				$res=array();
				$datos=array();
				$i=0; 

				$query="DELETE FROM b_cat_areas WHERE id=$area_id";  
					$resp=	mysqli_query($this->con(), $query); 

				return $datos;
			}

}

?>