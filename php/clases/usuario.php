<?php
	
	require_once("../conexion/conexion.php");

	class Usuario extends Conectar{


			public function login($user,$pass){

				    $res=array();
					$datos=array();
					$i=0; 

					$sql="SELECT  usuarios.empleado,
                                  usuarios.nombre,
                                  capturistas.descripcion, 
								  usuarios.b_rol_id
                            FROM usuarios
                                JOIN capturistas ON capturistas.id=usuarios.empleado	
                            WHERE nombre='$user' AND clave=MD5('$pass')"; 
					$resultado = mysqli_query($this->con(), $sql); 

				    while ($res = mysqli_fetch_row($resultado)) {

				       $datos[$i]['empleado_id'] 	= $res[0];
                       $datos[$i]['usuario'] = $res[1]; 
					   $datos[$i]['capturista'] = $res[2]; 
					   $datos[$i]['rol_id'] = $res[3]; 
					   $i++;
 
					} 
					
					if ( count($datos )==0) { 
						$datos[0]['empleado_id']  =0;
						return  $datos; 
				  	}


			return $datos;  
 
			}
			public function catalogoEmpresas($empresa){
                $q="";
				$res=array();
				$datos=array();
				$i=0; 

				if($empresa != "")
				{	
					$q = "Where nombre like '%$empresa%'";
				}

				$sql="SELECT  id, nombre, estatus
						FROM b_cat_empresas ".$q; 
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['empresa_id'] = $res[0];
				   $datos[$i]['nombre'] = $res[1]; 
				   $datos[$i]['estatus'] = $res[2]; 
				   $i++;

				} 
				
				if ( count($datos )==0) { 
					$datos[0]['empresa_id']  =0;
					return  $datos; 
				  }


		return $datos;  

		} 

	}