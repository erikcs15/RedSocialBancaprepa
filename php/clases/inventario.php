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
							JOIN estatus ON estatus.id=b_cat_areas.estatus_id ORDER BY b_cat_areas.`descripcion` ASC";  
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
			public function deshabilitarResponsivas($equipo_id){
				$res=array();
				$datos=array();
				$i=0; 

				 $query=" UPDATE i_responsivas SET estatus=4 WHERE equipo_id=$equipo_id";  
					$resp=	mysqli_query($this->con(), $query); 

				return $datos;
			}

			public function buscarCp($cp){
				$res=array();
				$datos=array();
				$i=0; 

				 $query=" SELECT  cp, estado, c_estado,municipio,c_municipio,ifnull(ciudad,municipio) FROM cp_sepomex WHERE cp=$cp LIMIT 1";   
				 return $query;
					$respuesta= mysqli_query($this->con(), $query);  
					while ($res = mysqli_fetch_row($respuesta)) {

					   $datos[$i]['cp'] = $res[0];
					   $datos[$i]['estado'] = $res[1]; 
					   $datos[$i]['ce'] = $res[2]; 
					   $datos[$i]['municipio'] = $res[3]; 
					   $datos[$i]['cm'] = $res[4]; 
					   $datos[$i]['ciudad'] = $res[5]; 
					   $i++;

					} 

				return $datos;
			}

			public function buscarCpCol($cp){
				$res=array();
				$datos=array();
				$i=0; 

				 $query=" SELECT  colonia FROM cp_sepomex WHERE cp=$cp";   
					$respuesta= mysqli_query($this->con(), $query);  
					while ($res = mysqli_fetch_row($respuesta)) {

					   $datos[$i]['colonia'] = $res[0]; 
					   $i++;

					} 

				return $datos;
			}
			public function registrarStock($txtIdPagoEspecie,$txtFecha,$txtCoordinacion,$cboSucursal,$txtIdDist,$txtDistribuidora,$txtPago,$cboEquipo,$txtMarca,$txtModelo,$txtSerie,$txtDescripcion,$txtUbicacion,$txtEstatus){
 

				$capturista_id=$_COOKIE["b_capturista_id"];
				$res=array();
				$datos=array();
				$i=0; 

				if ($txtIdPagoEspecie>0) {
					$query="UPDATE b_pagos_especie
									SET 
									  fecha = '$txtFecha',
									  coordinacion = '$txtCoordinacion',
									  distribuidora_id = $txtIdDist,
									  distribuidora = '$txtDistribuidora',
									  pago = '$txtPago',
									  descripcion = '$txtDescripcion',
									  ubicacion = '$txtUbicacion',
									  asignado = '$txtEstatus',
									  marca = '$txtMarca',
									  modelo = '$txtModelo',
									  serie = '$txtSerie',
									  estatus_id = 5,
									  fecha_captura = CURDATE(),
									  hora_captura = CURTIME(),
									  capturista_id = $capturista_id
									WHERE id = $txtIdPagoEspecie";
				}else{

				 $query="insert into b_pagos_especie
					            (fecha,
					             coordinacion,
					             sucursal_id,
					             distribuidora_id,
					             distribuidora,
					             pago,
					             tipo_id,
					             descripcion,
					             ubicacion,
					             asignado,
					             marca,
					             modelo,
					             serie,
					             estatus_id,
					             fecha_captura,
					             hora_captura,
					             capturista_id)
						values ('$txtFecha',
						        '$txtCoordinacion',
						        '$cboSucursal',
						        '$txtIdCoor',
						        '$txtDistribuidora',
						        '$txtPago',
						        '$cboEquipo',
						        '$txtDescripcion',
						        '$txtUbicacion',
						        '$txtEstatus',
						        '$txtMarca',
						        '$txtModelo',
						        '$txtSerie',
						        5,
						        CURDATE(),
						        CURTIME(),
						        $capturista_id);";   

						        //return $query;
					  
				}

				$respuesta= mysqli_query($this->con(), $query);  
				 
						if($respuesta>0){
							$datos[$i]['respuesta'] = '2';
						}else{

							$datos[$i]['respuesta'] = '3';
						}

				return $datos;
			}

			public function cargarPagosEspecie(){
				$res=array();
				$datos=array();
				$i=0; 

				 $query=" SELECT pe.id,te.descripcion,s.nomComercial,pe.descripcion,e.descripcion FROM b_pagos_especie pe
							 JOIN i_tipo_equipo te ON te.id=pe.tipo_id
							 JOIN sucursales s ON s.id=pe.sucursal_id
							 JOIN estatus e ON e.id=pe.estatus_id";    
							 
					$respuesta= mysqli_query($this->con(), $query);  
					while ($res = mysqli_fetch_row($respuesta)) {

					   $datos[$i]['id'] = $res[0]; 
					   $datos[$i]['articulo'] = $res[1];
					   $datos[$i]['sucursal'] = $res[2];
					   $datos[$i]['descripcion'] = $res[3];
					   $datos[$i]['estatus'] = $res[4];
					   $i++;

					} 

				return $datos;
			}

			public function deshabilitarPagoEspecie($id,$motivo){

			}

			public function cargarImgStock($id,$docName){
				$res=array();
				$datos=array();
				$i=0; 
				$capturista_id=$_COOKIE["b_capturista_id"];

				$query="INSERT INTO b_img_pago_esp (pago_id,docName,capturista_id,fecha_captura,hora_captura)
												VALUE($id,'$docName',$capturista_id,CURDATE(),CURTIME())";   
				$respuesta= mysqli_query($this->con(), $query);  


				if($respuesta>0){
					$datos[$i]['respuesta'] = '2';
				}else{

					$datos[$i]['respuesta'] = '3';
				}

				return $datos;
			}

			public function buscarPago($id){
				$res=array();
				$datos=array();
				$i=0; 

				 $query="SELECT id,  fecha,  coordinacion,  sucursal_id,  distribuidora_id,  distribuidora,  pago,  tipo_id, descripcion,  ubicacion,  asignado,  marca,  modelo,  serie
						FROM b_pagos_especie
						 WHERE id=$id ";   
					$respuesta= mysqli_query($this->con(), $query);  
					while ($res = mysqli_fetch_row($respuesta)) {

					   $datos[$i]['id'] = $res[0]; 
					   $datos[$i]['fecha'] = $res[1];
					   $datos[$i]['coordinacion'] = $res[2];
					   $datos[$i]['sucursal_id'] = $res[3];
					   $datos[$i]['distribuidora_id'] = $res[4];
					   $datos[$i]['distribuidora'] = $res[5];
					   $datos[$i]['pago'] = $res[6];
					   $datos[$i]['tipo_id'] = $res[7];
					   $datos[$i]['descripcion'] = $res[8];
					   $datos[$i]['ubicacion'] = $res[9];
					   $datos[$i]['asignado'] = $res[10];
					   $datos[$i]['marca'] = $res[11];
					   $datos[$i]['modelo'] = $res[12];
					   $datos[$i]['serie'] = $res[13];
					   $i++;

					} 
				return $datos;
			}

			public function cargarStock(){
				$res=array();
				$datos=array();
				$i=0; 

				 $query="SELECT pe.id,d.docName,te.descripcion equipo,CONCAT(pe.descripcion,' ',pe.marca,' ','Modelo :',modelo) descripcion,ROUND((pe.pago-(pe.pago*.10))) precio,pe.pago precioNormal,IF((pe.pago-(pe.pago*.10))>6000,10,5) quincenas,pe.fecha_captura,IF( DATEDIFF(CURDATE(),pe.fecha_captura)>7,1,0) antiguedad FROM b_img_pago_esp d
						JOIN b_pagos_especie pe ON pe.id=d.pago_id
						JOIN i_tipo_equipo te ON te.id=pe.tipo_id
						WHERE pe.estatus_id=5 GROUP BY d.pago_id";    

					$respuesta= mysqli_query($this->con(), $query);  
					while ($res = mysqli_fetch_row($respuesta)) {

					   $datos[$i]['id'] = $res[0]; 
					   $datos[$i]['imagen'] = $res[1];
					   $datos[$i]['tipo'] = $res[2];
					   $datos[$i]['descripcion'] = $res[3];
					   $datos[$i]['precio'] = $res[4];
					   $datos[$i]['precio_real'] = $res[5];
					   $datos[$i]['quincenas'] = $res[6];
					   $datos[$i]['fecha_captura'] = $res[7];
					   $datos[$i]['antiguedad'] = $res[8];
					   $i++;

					} 
				return $datos;
			}
			public function cargarCarousel($id){
				$res=array();
				$datos=array();
				$i=0; 

				 $query="SELECT pe.id,d.docName,te.descripcion equipo,CONCAT(pe.descripcion,' ',pe.marca,' ','Modelo :',modelo) descripcion,ROUND((pe.pago-(pe.pago*.10))) precio,pe.pago precioNormal,IF((pe.pago-(pe.pago*.10))>6000,10,5) quincenas,pe.fecha_captura,IF( DATEDIFF(CURDATE(),pe.fecha_captura)>7,1,0) antiguedad FROM b_img_pago_esp d
						JOIN b_pagos_especie pe ON pe.id=d.pago_id
						JOIN i_tipo_equipo te ON te.id=pe.tipo_id
						WHERE pe.estatus_id=5 AND pe.id=$id";    

					$respuesta= mysqli_query($this->con(), $query);  
					while ($res = mysqli_fetch_row($respuesta)) {

					   $datos[$i]['id'] = $res[0]; 
					   $datos[$i]['imagen'] = $res[1];
					   $datos[$i]['tipo'] = $res[2];
					   $datos[$i]['descripcion'] = $res[3];
					   $datos[$i]['precio'] = number_format($res[4],2);
					   $datos[$i]['precio_real'] = number_format($res[5],2);
					   $datos[$i]['quincenas'] = $res[6];
					   $datos[$i]['fecha_captura'] = $res[7];
					   $datos[$i]['antiguedad'] = $res[8];
					   $i++;

					} 
				return $datos;
			}

}

?>