<?php
	
	require_once("../conexion/conexion.php");

	class Usuario extends Conectar{


			public function login($user,$pass){

				    $res=array();
					$datos=array();
					$i=0; 

					$sql="SELECT  u.empleado, u.nombre, c.descripcion, ur.rol_id, eu.empresa_id, c.rol_id
							FROM usuarios u
							JOIN capturistas c ON c.id=u.empleado
							INNER JOIN b_usuario_empresa eu ON u.empleado=eu.usuario_id
							INNER JOIN b_usuario_rol ur ON ur.usuario_id=u.empleado
                            WHERE u.nombre='$user' AND u.clave=MD5('$pass')"; 
					$resultado = mysqli_query($this->con(), $sql); 

				    while ($res = mysqli_fetch_row($resultado)) {

				       $datos[$i]['empleado_id'] = $res[0];
                       $datos[$i]['usuario'] = $res[1]; 
					   $datos[$i]['capturista'] = $res[2]; 
					   $datos[$i]['rol_id'] = $res[3];
					   $datos[$i]['empresa_id'] = $res[4];
					   $datos[$i]['puesto_id'] = $res[5];  
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
			public function catalogoCorreos($nombre)
			{
                $q="";
				$res=array();
				$datos=array();
				$i=0; 

				if($nombre != "")
				{	
					$q = "WHERE nombre LIKE '%$nombre%' OR apellido_paterno LIKE '%$nombre%' OR apellido_materno LIKE '%$nombre%'";
				}

				$sql="SELECT dominio, sucursal, nombre, apellido_paterno, apellido_materno, correo
						FROM b_correos ".$q; 
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['dominio'] = $res[0];
				   $datos[$i]['sucursal']  = $res[1]; 
				   $datos[$i]['nombrecompleto'] = $res[2]." ".$res[3]." ".$res[4];
				   $datos[$i]['correo']=$res[5]; 
				   $i++;

				} 
				
				if ( count($datos )==0) { 
					$datos[0]['dominio']  =0;
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

			//--------------------------GUARDAMOS LA INFORMACION BASICA DE UNA PUBLICACION -----------------------------------//////


			public function guardarPublicacion($titulo,$descripcion,$imagen,$documento_id,$docuemento,$chbPDF)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0; 
				$capturista_id=$_COOKIE["b_capturista_id"]; 
				
				

				$sql="INSERT INTO b_publicaciones_bancaprepa(titulo,descripcion,imagen,documento_id,documento,capturista_id,fecha,hora,formato)
														VALUES('$titulo','$descripcion','$imagen',$documento_id,'$docuemento',$capturista_id,CURDATE(),CURTIME(),'$chbPDF')";
				
				
				//return $sql;
				$resultado = mysqli_query($this->con(), $sql);   
				
				$datos[0]['publicacion'] ='1' ;
				return  $datos;	
			}

			//-------------------------------------------cargamos los tipos de documentos--------------------------------------------------------------
			//-----------------------------------------------------
			public function catDocumentos()
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0; 

				$sql="SELECT id,descripcion FROM b_cat_doc WHERE estatus_id=5"; 
				$resultado = mysqli_query($this->con(), $sql);    
				while ($res = mysqli_fetch_row($resultado)) {

					$datos[$i]['id'] = $res[0]; 	
					$datos[$i]['docuemento'] = $res[1];
					$i++;
 
				 }     
				  
 
				 return $datos;
				
			}

			public function catPublicaciones($capturista_id,$menu)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0; 
				$ql='';
				$qlempresas='';

				
				
				$sql="SELECT rol_id FROM b_capturista_roles WHERE capturista_id=$capturista_id ORDER BY rol_id ASC limit 1";  
				$resultado = mysqli_query($this->con(), $sql);    
				while ($res = mysqli_fetch_row($resultado)) {
					// cargamos los roles que tiene el usuario
						$rol_id = $res[0]; 	
						
						if($rol_id==1){
							// cargamos las publicaciones que el rol puede visualizar
							$sqlm="SELECT titulo,descripcion,imagen,b_cat_empresas.nombre ,bp.fecha,bp.hora ,bp.fecha_modificacion,bp.hora_modificacion,documento 
									FROM b_publicaciones_bancaprepa AS bp
									JOIN b_cat_empresas ON b_cat_empresas.id=bp.empresa_id
									WHERE documento_id=$menu"; 
							$resultadom = mysqli_query($this->con(), $sqlm);    
							while ($resm = mysqli_fetch_row($resultadom)) {
			
								$datos[$i]['titulo'] = $resm[0]; 	 
								$datos[$i]['descripcion'] = $resm[1]; 	
								$datos[$i]['imagen'] = $resm[2]; 	
								$datos[$i]['empresa'] = $resm[3]; 	
								$datos[$i]['fecha'] = $resm[4]; 	
								$datos[$i]['hora'] = $resm[5]; 	
								$datos[$i]['fecha_modificacion'] = $resm[6]; 	
								$datos[$i]['hora_modificacion'] = $resm[7]; 
								$datos[$i]['documento'] = $resm[8]; 
								
								$i++;
			
							}  
							
							return $datos;
						}
						else{
									$sqlempresas="SELECT empresa_id FROM b_capturista_empresa WHERE capturista_id=$capturista_id";  
									$resultado = mysqli_query($this->con(), $sqlempresas);    
									while ($res = mysqli_fetch_row($resultado)) {
										// cargamos las empresas que tiene el usuario
										$qlempresas .= $res[0].','; 	
											
									}
					
									
										//CONCATENAMOS TODAS LAS EMPRESAS QUE EL USUARIO TIENE Y PONEMOS LA GENERAL MISMA QUE SE MOSTRARA A TODOS LOS USUARIOS
									$qlempresas =   $qlempresas.'5';
								// cargamos las publicaciones que el rol puede visualizar
									$sqlm="SELECT titulo,descripcion,imagen,b_cat_empresas.nombre ,bp.fecha,bp.hora ,bp.fecha_modificacion,bp.hora_modificacion ,documento
									FROM b_publicaciones_bancaprepa AS bp
									JOIN b_cat_empresas ON b_cat_empresas.id=bp.empresa_id
									WHERE documento_id=$menu AND rol_id >=$rol_id AND empresa_id IN($qlempresas)"; 

											
									$resultadom = mysqli_query($this->con(), $sqlm);    
									while ($resm = mysqli_fetch_row($resultadom)) {

										$datos[$i]['titulo'] = $resm[0]; 	 
										$datos[$i]['descripcion'] = $resm[1]; 	
										$datos[$i]['imagen'] = $resm[2]; 	
										$datos[$i]['empresa'] = $resm[3]; 	
										$datos[$i]['fecha'] = $resm[4]; 	
										$datos[$i]['hora'] = $resm[5]; 	
										$datos[$i]['fecha_modificacion'] = $resm[6]; 	
										$datos[$i]['hora_modificacion'] = $resm[7]; 
										$datos[$i]['documento'] = $resm[8]; 
										
										$i++;

									}  
							return $datos;
						}
				}
 
			
				}
				
			public function cargarUsuarios($usuario)
			{
				$q="";
				$res=array();
				$datos=array();
				$i=0; 

				if($usuario != "")
				{	
					$q = "Where empleado = '$usuario'";
				}

				$sql="SELECT empleado,nombre FROM usuarios ".$q." Order by nombre asc";
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['id'] = $res[0];
				   $datos[$i]['nombre'] = $res[1]; 
				   $i++;

				} 
				
				if ( count($datos )==0) { 
					$datos[0]['id']  =0;
					return  $datos; 
				  }


				return $datos;  
			}
			public function insertarUsuario_rol($empleado_id,$rol)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="INSERT INTO b_usuario_rol (usuario_id, rol_id) VALUES ($empleado_id,$rol);";
				
				$resultado = mysqli_query($this->con(), $sql);   

				$datos['usuario_id'] =  array('0' => '0' );
				return  $datos;	
			}

			public function insertarUsuario_Empresa($empleado_id,$empresa)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="INSERT INTO b_usuario_empresa (usuario_id, empresa_id) VALUES ($empleado_id,$empresa);";
				
				$resultado = mysqli_query($this->con(), $sql);   

				$datos['usuario_id'] =  array('0' => '0' );
				return  $datos;	
			}

			public function cargarRolesUsuarios($idusuario)
			{
				$q="";
				$res=array();
				$datos=array();
				$i=0; 

			

				$sql="SELECT ur.usuario_id, ur.rol_id FROM usuarios u INNER JOIN b_usuario_rol ur 
						ON ur.usuario_id=u.empleado WHERE u.empleado=$idusuario"; 
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['usuarioid'] = $res[0];
				   $datos[$i]['rolid'] = $res[1]; 
				   $i++;

				} 
				
				if ( count($datos )==0) { 
					$datos[0]['usuarioid']  =0;
					return  $datos; 
				  }


				return $datos;  
			}

			public function verificarUsuario_rol($usuario, $rol)
			{
				$q="";
				$res=array();
				$datos=array();
				$i=0; 


				$sql="SELECT COUNT(usuario_id) FROM b_usuario_rol WHERE usuario_id=$usuario AND rol_id=$rol"; 
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {
				   $datos[$i]['contador'] = $res[0];
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['contador']  =0;
					return  $datos; 
				  }


				return $datos;  
			}
			public function verificarUsuario_empresa($usuario, $empresa)
			{
				$q="";
				$res=array();
				$datos=array();
				$i=0; 


				$sql="SELECT COUNT(usuario_id) FROM b_usuario_empresa WHERE usuario_id=$usuario AND empresa_id=$empresa"; 
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {
				   $datos[$i]['contador'] = $res[0];
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['contador']  =0;
					return  $datos; 
				  }


				return $datos;  
			}

			public function cargarListadodeUsuarios($usuario)
			{
				$q="";
				$res=array();
				$datos=array();
				$i=0; 

				if($usuario != "")
				{	
					$q = "Where c.id='$usuario'";
				}

				$sql="SELECT c.id, c.`descripcion` AS Nombre, u.`nombre` AS Usuario, e.descripcion AS estatus
					FROM usuarios u
					INNER JOIN capturistas c ON c.id=u.`empleado`
					INNER JOIN estatus e ON u.`activo`=e.id ".$q;
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['id'] = $res[0];
				   $datos[$i]['nombre'] = $res[1]; 
				   $datos[$i]['usuario'] = $res[2]; 
				   $datos[$i]['estatus'] = $res[3]; 
				   $i++;

				} 
				
				if ( count($datos )==0) { 
					$datos[0]['id']  =0;
					return  $datos; 
				  }


				return $datos;  
			}

			public function cargarRolesDeUsuarios($usuario)
			{
				$q="";
				$res=array();
				$datos=array();
				$i=0; 

				$sql="SELECT c.id, u.nombre AS usuario,cr.`descripcion` AS Roles, cr.`id`AS id_rol
						FROM usuarios u 
						INNER JOIN capturistas c ON c.id=u.empleado
						INNER JOIN b_usuario_rol ur ON ur.usuario_id=u.empleado
						INNER JOIN b_cat_roles cr ON cr.id=ur.rol_id
						WHERE c.id='$usuario'";
				 
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['id'] = $res[0];
				   $datos[$i]['usuario'] = $res[1]; 
				   $datos[$i]['roles'] = $res[2];
				   $datos[$i]['id_rol'] = $res[3];
				   $i++;

				} 
				
				if ( count($datos )==0) { 
					$datos[0]['id']  =0;
					return  $datos; 
				  }


				return $datos;  
			}

			public function cargarEmpresasDeUsuarios($usuario)
			{
				$q="";
				$res=array();
				$datos=array();
				$i=0; 

				$sql="SELECT c.id, u.nombre AS usuario, ce.`nombre`,ce.id AS id_emp
						FROM usuarios u 
						INNER JOIN capturistas c ON c.id=u.empleado
						INNER JOIN b_usuario_empresa ue ON ue.usuario_id=u.empleado
						INNER JOIN b_cat_empresas ce ON ce.id = ue.`empresa_id`
						WHERE c.id='$usuario'";
				 
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['id'] = $res[0];
				   $datos[$i]['usuario'] = $res[1]; 
				   $datos[$i]['empresas'] = $res[2];
				   $datos[$i]['id_emp'] = $res[3]; 
				   $i++;

				} 
				
				if ( count($datos )==0) { 
					$datos[0]['id']  =0;
					return  $datos; 
				  }


				return $datos;  
				}

				

				public function borrarRoldeUsuario($usuario,$rol)
				{
					$res=array();
					$datos=array();
					$resultado  =array();
					$i=0;

					
					$sql="DELETE FROM b_usuario_rol WHERE usuario_id='$usuario' AND rol_id='$rol'";
					
					$resultado = mysqli_query($this->con(), $sql);   
					
					$datos['b_usuario_rol'] =  array('0' => '0' );
					return  $datos;	
				}

				public function borrarEmpdeUsuario($usuario,$emp)
				{
					$res=array();
					$datos=array();
					$resultado  =array();
					$i=0;
				
					$sql="DELETE FROM b_usuario_empresa WHERE usuario_id=$usuario AND empresa_id=$emp";
					
					$resultado = mysqli_query($this->con(), $sql);   
					
					$datos['b_usuario_empresa'] =  array('0' => '0' );
					return  $datos;	
				}
				
			public function cargarUsuariosXnombre($usuario)
			{
				$q="";
				$res=array();
				$datos=array();
				$i=0; 

				if($usuario != "")
				{	
					$q = "WHERE c.descripcion LIKE '%$usuario%'";
				}

				$sql="SELECT c.id, c.`descripcion` AS Nombre, u.`nombre` AS Usuario, e.descripcion AS estatus
					FROM usuarios u
					INNER JOIN capturistas c ON c.id=u.`empleado`
					INNER JOIN estatus e ON u.`activo`=e.id ".$q;
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['id'] = $res[0];
				   $datos[$i]['nombre'] = $res[1]; 
				   $datos[$i]['usuario'] = $res[2]; 
				   $datos[$i]['estatus'] = $res[3]; 
				   $i++;

				} 
				
				if ( count($datos )==0) { 
					$datos[0]['id']  =0;
					return  $datos; 
				  }


				return $datos;  

			}

			public function insertarEmpresa_rol($empresa,$puesto)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="INSERT INTO b_empresa_puesto (empresa_id, puesto_id) VALUES ($empresa,$puesto)";
				
				$resultado = mysqli_query($this->con(), $sql);   

				$datos['id_emp'] =  array('0' => '0' );
				return  $datos;	
			}

			public function VerifInsertarEmpresa_rol($empresa,$puesto)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="SELECT COUNT(empresa_id) FROM b_empresa_puesto WHERE empresa_id=$empresa AND puesto_id=$puesto";
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['contador'] = $res[0];				   
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['contador']  =0;
					return  $datos; 
				  }


				return $datos;  
			}

			public function CargarRolXEmp($empresa)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="SELECT r.id,r.`descripcion` FROM roles r INNER JOIN b_empresa_puesto ep ON ep.puesto_id=r.`id`
						WHERE ep.empresa_id=$empresa order by r.descripcion asc";
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['id_rol'] = $res[0];	
				   $datos[$i]['nombre'] = $res[1];					   
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['id_rol']  =0;
					return  $datos; 
				  }


				return $datos;  
			}

			public function borrarRoldeEmp($emp,$rol)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
			
				$sql="DELETE FROM b_empresa_puesto WHERE empresa_id=$emp AND puesto_id=$rol";
				
				$resultado = mysqli_query($this->con(), $sql);   
				
				$datos['b_emp_rol'] =  array('0' => '0' );
				return  $datos;	
			}

			public function CargarPuestos()
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="SELECT id, descripcion FROM roles";
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['id'] = $res[0];	
				   $datos[$i]['nombre'] = $res[1];					   
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['id']  =0;
					return  $datos; 
				  }
  

				return $datos;  
			}
			public function insertarTablaTmp( $empid,$puestoid,$usuario)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="INSERT INTO b_tmp_pub (id_emp, id_puesto, id_usuario) VALUES ($empid,$puestoid,$usuario)";
				
				$resultado = mysqli_query($this->con(), $sql);   

				$datos['id_emp'] =  array('0' => '0' );
				return  $datos;	
			}

			public function CargarTablaTemp($usuario)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="SELECT bt.id_emp, emp. nombre, bt.id_puesto, r.descripcion
				FROM b_tmp_pub bt
				INNER JOIN roles r ON r.id=bt.id_puesto
				INNER JOIN b_cat_empresas emp ON emp.id=bt.id_emp
				WHERE bt.id_usuario=$usuario";
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['id_empresa'] = $res[0];	
				   $datos[$i]['empresa'] = $res[1];
				   $datos[$i]['id_puesto'] = $res[2];	
				   $datos[$i]['puesto'] = $res[3];						   
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['id_empresa']  =0;
					return  $datos; 
				  }


				return $datos;  
			}
			
			public function EliminarDatoDeTmp($emp,$puesto)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
			
				$sql="DELETE FROM b_tmp_pub WHERE id_emp=$emp AND id_puesto=$puesto";
				
				$resultado = mysqli_query($this->con(), $sql);   
				
				$datos['b_tmp_pub'] =  array('0' => '0' );
				return  $datos;	
			}
			public function verificarTablaTmp($usuario)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="SELECT COUNT(id)
				FROM b_tmp_pub t
				WHERE id_usuario=$usuario";
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['contador'] = $res[0];				   
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['contador']  =0;
					return  $datos; 
				  }


				return $datos;  
			}

			public function EliminarTodoDeTmp()
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
			
				$sql="DELETE FROM b_tmp_pub";
				
				$resultado = mysqli_query($this->con(), $sql);   
				
				$datos['b_tmp_pub'] =  array('0' => '0' );
				return  $datos;	
			}

			public function idParaTablaTmp($usuario)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="SELECT MAX(id) AS id FROM b_publicaciones_bancaprepa";
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['id'] = $res[0];				   
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['id']  =0;
					return  $datos; 
				  }


				return $datos;  
			}
			public function insertarTablaDetalle( $pub,$emp,$puesto)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="INSERT INTO b_detalle_publicacion (publicacion_id, empresa_id, puesto_id) VALUES ($pub,$emp,$puesto)";
				
				$resultado = mysqli_query($this->con(), $sql);   

				$datos['id_emp'] =  array('0' => '0' );
				return  $datos;	
			}

			public function cargarRolesParaConfirmaciones($publicacion)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="SELECT publicacion_id, puesto_id, empresa_id FROM b_detalle_publicacion WHERE publicacion_id=$publicacion";
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['publicacion_id'] = $res[0];	
				   $datos[$i]['puesto_id'] = $res[1];
				   $datos[$i]['empresa_id'] = $res[2];				   
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['publicacion_id']  =0;
					return  $datos; 
				  }


				return $datos;  
			}

			public function cargarEmpleadosXempresa($empresa)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="SELECT c.id, c.descripcion, ue.empresa_id, c.rol_id 
				FROM capturistas c
				INNER JOIN b_usuario_empresa ue ON ue.usuario_id=c.id
				WHERE ue.empresa_id=$empresa";
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['empleado_id'] = $res[0];	
				   $datos[$i]['nombre'] = $res[1];
				   $datos[$i]['empresa_id'] = $res[2];
				   $datos[$i]['puesto_id'] = $res[3];				   
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['empleado_id']  =0;
					return  $datos; 
				  }


				return $datos;  
			}
			public function cargarEmpleadosXpuesto($puesto)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="SELECT id, descripcion, ue.empresa_id,c.rol_id  
				FROM capturistas c
				INNER JOIN b_usuario_empresa ue ON ue.usuario_id=c.id
				WHERE c.rol_id=$puesto";
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['empleado_id'] = $res[0];	
				   $datos[$i]['nombre'] = $res[1];
				   $datos[$i]['empresa_id'] = $res[2];
				   $datos[$i]['puesto_id'] = $res[3];				   
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['empleado_id']  =0;
					return  $datos; 
				  }


				return $datos;  
			}

			public function insertarTablaConfirmaciones($pub,$empleado,$puesto,$empresa)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
				
				$sql="INSERT INTO b_confirmaciones (publicacion_id, empleado_id, puesto_id, empresa_id) VALUES ($pub,$empleado,$puesto,$empresa)";
				
				$resultado = mysqli_query($this->con(), $sql);   
				$datos['id'] =  array('0' => '0' );
				return  $datos;	
			}

			public function cargaPublicacionesBancaprepa($empresa, $puesto)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;

				
				$sql="SELECT p.id, p.titulo, p.descripcion,p.imagen,p.formato, conf.empresa_id,conf.puesto_id, conf.visto 
				FROM b_publicaciones_bancaprepa p
				INNER JOIN b_confirmaciones conf ON conf.publicacion_id=p.id
				INNER JOIN capturistas c ON c.id=conf.puesto_id
				WHERE conf.empresa_id=$empresa AND conf.puesto_id=$puesto ORDER BY p.id DESC";
				
				$resultado = mysqli_query($this->con(), $sql); 

				while ($res = mysqli_fetch_row($resultado)) {

				   $datos[$i]['id_publicacion'] = $res[0];	
				   $datos[$i]['titulo'] = $res[1];
				   $datos[$i]['descripcion'] = $res[2];
				   $datos[$i]['ruta'] = $res[3];
				   $datos[$i]['formato'] = $res[4];	
				   $datos[$i]['empresa_id'] = $res[5];
				   $datos[$i]['puesto_id'] = $res[6];	
				   $datos[$i]['visto'] = $res[7];					   
				   $i++;
				} 
				
				if ( count($datos )==0) { 
					$datos[0]['id_publicacion']  =0;
					return  $datos; 
				  }


				return $datos;  
			}

			public function ActualizarVisto($pub,$empleado)
			{
				$res=array();
				$datos=array();
				$resultado  =array();
				$i=0;
				$visto="S";
				$sql="UPDATE b_confirmaciones SET visto='$visto', fecha_visto=CURDATE(), hora_visto=CURTIME() WHERE publicacion_id=$pub AND empleado_id=$empleado";
				
				$resultado = mysqli_query($this->con(), $sql);   
				$datos['publicacion_id'] =  array('0' => '0' );
				return  $datos;	
			}




			
				



}

