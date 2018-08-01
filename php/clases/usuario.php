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
			//-----------------------------------------------Cargar Catalogos----------------------------------------------------
			public function catalogoEmpresas($empresa)
			{
                $q="";
				$res=array();
				$datos=array();
				$i=0; 

				if($empresa != "")
				{	
					$q = "Where emp.nombre like '%$empresa%'";
				}

				$sql="SELECT emp.id, emp.nombre, e.descripcion
					FROM b_cat_empresas emp
					INNER JOIN estatus e ON emp.estatus_id = e.id ".$q; 
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

			public function catalogoRoles($rol)
			{
                $q="";
				$res=array();
				$datos=array();
				$i=0; 

				if($rol != "")
				{	
					$q = "Where rol.descripcion like '%$rol%'";
				}

				$sql="SELECT rol.id, rol.descripcion, e.descripcion
						FROM b_cat_roles rol
						INNER JOIN estatus e ON rol.estatus_id = e.id ".$q; 
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['rol_id'] = $res[0];
				   $datos[$i]['descripcion'] = $res[1]; 
				   $datos[$i]['estatus'] = $res[2]; 
				   $i++;

				} 
				
				if ( count($datos )==0) { 
					$datos[0]['rol_id']  =0;
					return  $datos; 
				  }


				return $datos;  

			}

			public function catalogoDocumentos($doc)
			{
                $q="";
				$res=array();
				$datos=array();
				$i=0; 

				if($doc != "")
				{	
					$q = "Where doc.descripcion like '%$doc%'";
				}

				$sql="SELECT doc.id, doc.descripcion, e.descripcion
						FROM b_cat_doc doc
						INNER JOIN estatus e ON doc.estatus_id = e.id ".$q; 
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['doc_id'] = $res[0];
				   $datos[$i]['descripcion']  = $res[1]; 
				   $datos[$i]['estatus'] = $res[2]; 
				   $i++;

				} 
				
				if ( count($datos )==0) { 
					$datos[0]['doc_id']  =0;
					return  $datos; 
				  }


				return $datos;  

			}

			//----------------------------------------Cargar por Id--------------------------------------
			//-------------------------------CARGAR EMPRESA-------------------------------------------------
			public function cargarEmpPorId($empresa)
			{
                $q="";
				$res=array();
				$datos=array();
				$i=0; 
				$sql="SELECT id, nombre
					FROM b_cat_empresas 
					WHERE id= $empresa"; 
				
				$resultado = mysqli_query($this->con(), $sql); 
				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['empresa_id'] = $res[0];
				   $datos[$i]['nombre'] = $res[1];
				   $i++;

				} 
				if ( count($datos )==0) { 
					$datos[0]['empresa_id']  =0;
					return  $datos; 
				  }
				return $datos;  
			}
//--------------------------------------------CARGAR roles-------------------------------------------------
			public function cargarRolPorId($rol)
			{
                $q="";
				$res=array();
				$datos=array();
				$i=0; 
				$sql="SELECT id, descripcion
					FROM b_cat_roles 
					WHERE id= $rol"; 
				
				$resultado = mysqli_query($this->con(), $sql); 
				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['rol_id'] = $res[0];
				   $datos[$i]['descripcion'] = $res[1];
				   $i++;

				} 
				if ( count($datos )==0) { 
					$datos[0]['rol_id']  =0;
					return  $datos; 
				  }
				return $datos;  
			}
//---------------------------------------CARGAR tipo de documentos-------------------------------------------------			
			public function cargarDocPorId($doc)
			{
                $q="";
				$res=array();
				$datos=array();
				$i=0; 
				$sql="SELECT id, descripcion
					FROM b_cat_doc
					WHERE id= $doc"; 
				
				$resultado = mysqli_query($this->con(), $sql); 
				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['doc_id'] = $res[0];
				   $datos[$i]['descripcion'] = $res[1];
				   $i++;

				} 
				if ( count($datos )==0) { 
					$datos[0]['doc_id']  =0;
					return  $datos; 
				  }
				return $datos;  
			}
			//----------------------------------------------Insertar------------------------------------------

			public function guardarEmpresas($empresa)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
	
				$txtUsuario=$_COOKIE["b_capturista_id"];  
	
				$sql="INSERT INTO b_cat_empresas(nombre,capturista_id,fecha_captura,hora_captura) 
									VALUES('$empresa',$txtUsuario,CURDATE(),CURTIME())";
			
				$resultado = mysqli_query($this->con(), $sql);   
	
				$datos['b_cat_empresas'] =  array('0' => '0' );
				return  $datos;	
				
			}

			public function guardarRoles($rol)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
	
				$txtUsuario=$_COOKIE["b_capturista_id"];  
	
				$sql="INSERT INTO b_cat_roles(descripcion,capturista_id,fecha_captura,hora_captura) 
									VALUES('$rol',$txtUsuario,CURDATE(),CURTIME())";
			
				$resultado = mysqli_query($this->con(), $sql);   
	
				$datos['b_cat_roles'] =  array('0' => '0' );
				return  $datos;	
				
			}

			public function guardarDoc($doc)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
	
				$txtUsuario=$_COOKIE["b_capturista_id"];  
	
				$sql="INSERT INTO b_cat_doc(descripcion,capturista_id,fecha_captura,hora_captura) 
									VALUES('$doc',$txtUsuario,CURDATE(),CURTIME())";
			    
				$resultado = mysqli_query($this->con(), $sql);   
	
				$datos['b_cat_doc'] =  array('0' => '0' );
				return  $datos;	
				
			}

//-------------------------------------------------UPDATES---------------------------------------------------

			public function actualizarEmpresa($empId,$emp)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
	
				
	
				$sql="UPDATE b_cat_empresas SET nombre='$emp' WHERE id=$empId";
			    
				$resultado = mysqli_query($this->con(), $sql);   
	
				$datos['b_cat_empresas'] =  array('0' => '0' );
				return  $datos;	
				
			}

			public function actualizarRol($rolId,$rol)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
	
				
	
				$sql="UPDATE b_cat_roles SET descripcion='$rol' WHERE id=$rolId";
			    
				$resultado = mysqli_query($this->con(), $sql);   
	
				$datos['b_cat_roles'] =  array('0' => '0' );
				return  $datos;	
			}

			public function actualizarDoc($DocId,$Doc)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
	
				
	
				$sql="UPDATE b_cat_doc SET descripcion='$Doc' WHERE id=$DocId";
			    
				$resultado = mysqli_query($this->con(), $sql);   
	
				$datos['b_cat_doc'] =  array('0' => '0' );
				return  $datos;	
				
			}
//----------------------------------Deshabilitar-----------------------------------------
//----------------------------------Deshabilitar EMPRESA-----------------------------------------
			public function desEmp($empId)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				

				$sql="UPDATE b_cat_empresas SET estatus_id=6 WHERE id=$empId";
				
				$resultado = mysqli_query($this->con(), $sql);   

				$datos['b_cat_empresas'] =  array('0' => '0' );
				return  $datos;	
				
			}
//----------------------------------Deshabilitar roles-----------------------------------------
			public function desRol($rolId)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				

				$sql="UPDATE b_cat_roles SET estatus_id=6 WHERE id=$rolId";
				
				$resultado = mysqli_query($this->con(), $sql);   

				$datos['b_cat_roles'] =  array('0' => '0' );
				return  $datos;	
				
			}
//----------------------------------Deshabilitar tipo de documentos-----------------------------------------
			public function desDoc($docId)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				

				$sql="UPDATE b_cat_doc SET estatus_id=6 WHERE id=$docId";
				
				$resultado = mysqli_query($this->con(), $sql);   

				$datos['b_cat_doc'] =  array('0' => '0' );
				return  $datos;	
				
			}

//-------------------------------------------Eliminar--------------------------------------------------------------
//------------------------------Eliminar Empresas------------------------
			public function eliminarEmp($empId)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				

				$sql="DELETE FROM b_cat_empresas WHERE id=$empId";
				
				$resultado = mysqli_query($this->con(), $sql);   

				$datos['b_cat_empresas'] =  array('0' => '0' );
				return  $datos;	
				
			}
//------------------------------Eliminar roles------------------------
			public function eliminarRol($rolId)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				

				$sql="DELETE FROM b_cat_roles WHERE id=$rolId";
				
				$resultado = mysqli_query($this->con(), $sql);   

				$datos['b_cat_roles'] =  array('0' => '0' );
				return  $datos;	
				
			}
//------------------------------Eliminar tipo de documentos------------------------
			public function eliminarDoc($docId)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				

				$sql="DELETE FROM b_cat_doc WHERE id=$docId";
			
				$resultado = mysqli_query($this->con(), $sql);   

				$datos['b_cat_doc'] =  array('0' => '0' );
				return  $datos;	
				
			}
//------------------------------------------------------PUBLICACIONES-------------------------------------------
//-----------------------------Cargar publicaciones	-----------------------------
			public function cargarPublicaciones()
			{
				$q="";
				$res=array();
				$datos=array();
				$i=0; 

				//if($empresa != "")
				//{	
				//	$q = "Where emp.nombre like '%$empresa%'";
				//}

				$sql="SELECT c.descripcion AS publicador, p.descripcion 
				      FROM b_publicaciones p 
					  INNER JOIN capturistas c 
					  ON p.capturista_id=c.id
					  ORDER BY fecha_publicacion DESC,hora_publicacion DESC"; 
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['publicador'] = $res[0];
				   $datos[$i]['descripcion'] = $res[1]; 
				   $i++;

				} 
				
				if ( count($datos )==0) { 
					$datos[0]['publicador']  =0;
					return  $datos; 
				  }


				return $datos;  
				
			}
	//-------------------------------Agregar publicaciones-------------------------
			public function agregarPublicaciones($texto,$tipopub)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
	
				$txtUsuario=$_COOKIE["b_capturista_id"];  
	
				$sql="INSERT INTO b_publicaciones(capturista_id,descripcion,fecha_publicacion,hora_publicacion, tipo_doc, empresa_id) 
									VALUES($txtUsuario,'$texto',CURDATE(),CURTIME(),$tipopub,1)";
			    
				$resultado = mysqli_query($this->con(), $sql);   
				
				$datos['b_publicaciones'] =  array('0' => '0' );
				return  $datos;	
			}
//----------------------------------CARGAR MENU para accesos--------------------------------------
			public function cargarAccesos($id_rol)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				

				$sql="SELECT mr.id_rol, mr.id_menu
				FROM b_menu_roles mr
				INNER JOIN b_menu m
				ON mr.id_menu=m.id
				WHERE mr.id_rol=$id_rol";
			
				$resultado = mysqli_query($this->con(), $sql);   
				
				while ($res = mysqli_fetch_row($resultado)) {

					$datos[$i]['id_rol'] = $res[0]; 	
					$datos[$i]['id_menu'] = $res[1];
					$i++;
 
				 }     
				  
				 if ( count($datos )==0) { 
					 $datos[0]['id_rol']  =0;
					 return  $datos; 
				   }
 
 
				 return $datos;
			}
//----------------------------------habilitar y deshabilitar accesos--------------------------------------
			public function habilitarAcceso($rol_id,$menu_id)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				$txtUsuario=$_COOKIE["b_menu_roles"];  

				$sql="INSERT INTO b_menu_roles (id_rol, id_menu) VALUES ($rol_id,$menu_id);";
				
				$resultado = mysqli_query($this->con(), $sql);   
				
				$datos['b_menu_roles'] =  array('0' => '0' );
				return  $datos;	
			}
			
			public function deshabilitarAcceso($rol_id,$menu_id)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				$txtUsuario=$_COOKIE["b_menu_roles"];  

				$sql="DELETE FROM b_menu_roles WHERE id_rol=$rol_id AND id_menu=$menu_id";
				
				$resultado = mysqli_query($this->con(), $sql);   
				
				$datos['b_menu_roles'] =  array('0' => '0' );
				return  $datos;	
			}
}