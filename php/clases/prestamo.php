<?php
	
    require_once("../conexion/conexion.php");
    //require_once("funciones.php");

    class prestamo extends Conectar
    {
        
        function DateAdd($givendate,$day=0,$mth=0,$yr=0) 
        {
            $cd = strtotime($givendate);
            $newdate = date('Y-m-d', mktime(date('h',$cd), //$newdate = date('Y-m-d h:i:s', mktime(date('h',$cd),
            date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
            date('d',$cd)+$day, date('Y',$cd)+$yr));
            return $newdate;
        }
        
        // OBTENER LOS DIAS QUE TIENE UN MES //
        function diasMes($mes,$anio)
        {
            $dias_mes = mktime( 0, 0, 0, $mes, 1, $anio );
            setlocale(LC_ALL,"es_ES");
            $dias_mes = date("t",$dias_mes);
            return $dias_mes;
    }
        public function crearSolicitud($capturista_id,$fechaSolicitud, $puesto_id, $sucursal_id, $empresa_id, $numTarjeta, $beneficiarioCta, $nombreBanco, $montoSolicitado, $quincenas, $mesesApagar, $interes_prestamo, $tipo_abono, $descuento_mensual, $monto_total, $inicioDes, $finDes,$monto_letra)
        {
            $res=array();
				$datos=array();
				$resultado  =array();
				$i=0;	
				$sql="INSERT INTO b_prestamo_solicitudes (capturista_id, fecha_solicitud, puesto_id, sucursal_id, empresa_id, 
                        numTarjeta, beneficiarioCuenta, nombreBanco, monto_solicitado, quincenas, meses_a_pagar, interes_prestamo, 
                        tipo_abono, descuento_mensual, monto_total, inicio_descuento, fin_descuento, estatus_id, monto_letra)
                        VALUES ($capturista_id,'$fechaSolicitud', $puesto_id, $sucursal_id, $empresa_id, '$numTarjeta', '$beneficiarioCta', 
                        '$nombreBanco', $montoSolicitado, $quincenas, $mesesApagar, $interes_prestamo, '$tipo_abono', $descuento_mensual, 
                        $monto_total, '$inicioDes', '$finDes', 4, '$monto_letra')";
           
          
				$resultado = mysqli_query($this->con(), $sql);   
	
				$datos['b_prestamo_solicitudes'] =  array('0' => '0' );
				return  $datos;	
        }

        public function cargarSolicitudesPorEmpleado($capturista_id)
        {
            $q="";
            $res=array();
            $datos=array();
            $i=0; 
            $sql="SELECT p.id, c.descripcion,p.fecha_solicitud,p.monto_solicitado, p.monto_total, e.descripcion, 
                IFNULL(p.fecha_autorizado, '-'),IFNULL(c2.`descripcion`, '-'), p.descuento_mensual, IFNULL(p.comentarios_autorizacion, '-'),
                p.monto_autorizado, p.quincenas, p.estatus_id
                FROM b_prestamo_solicitudes p
                INNER JOIN estatus e ON e.id=p.estatus_id
                INNER JOIN capturistas c ON c.id=p.capturista_id
                LEFT JOIN capturistas c2 ON c2.id=p.`capturista_id_autorizo`
                WHERE p.capturista_id= $capturista_id Order by p.id desc"; 
            
            $resultado = mysqli_query($this->con(), $sql); 
            while ($res = mysqli_fetch_row($resultado)) {

                $datos[$i]['id'] = $res[0];
                $datos[$i]['capturista'] = $res[1];
                $datos[$i]['fecha_solicitud'] = $res[2];
                $datos[$i]['monto_solicitado'] = $res[3];
                $datos[$i]['monto_pagar'] = $res[4];
                $datos[$i]['estatus'] = $res[5];
                $datos[$i]['fecha_autorizado'] = $res[6];
                $datos[$i]['capturista_autorizo'] = $res[7];
                $datos[$i]['descuento_mensual'] = $res[8];
                $datos[$i]['comentario'] = $res[9];
                $datos[$i]['monto_autorizado'] = $res[10];
                $datos[$i]['quincenas'] = $res[11];
                $datos[$i]['id_estatus'] = $res[12];
                $i++;

            } 
            if ( count($datos )==0) { 
                $datos[0]['id']  =0;
                return  $datos; 
                }
            return $datos;  
        }


        public function cargarInfoSolicitudXId($solicitud_id)
        {
            $q="";
            $res=array();
            $datos=array();
            $i=0; 
            $sql="SELECT p.id, c.descripcion,p.fecha_solicitud,p.monto_solicitado, p.monto_total, e.descripcion, 
                IFNULL(p.fecha_autorizado, '-'),IFNULL(c2.`descripcion`, '-'), p.descuento_mensual, IFNULL(p.comentarios_autorizacion, '-'),
                p.monto_autorizado, p.quincenas, p.estatus_id
                FROM b_prestamo_solicitudes p
                INNER JOIN estatus e ON e.id=p.estatus_id
                INNER JOIN capturistas c ON c.id=p.capturista_id
                LEFT JOIN capturistas c2 ON c2.id=p.`capturista_id_autorizo`
                WHERE p.id= $solicitud_id Order by p.id desc"; 
            
            $resultado = mysqli_query($this->con(), $sql); 
            while ($res = mysqli_fetch_row($resultado)) {

                $datos[$i]['id'] = $res[0];
                $datos[$i]['capturista'] = $res[1];
                $datos[$i]['fecha_solicitud'] = $res[2];
                $datos[$i]['monto_solicitado'] = $res[3];
                $datos[$i]['monto_pagar'] = $res[4];
                $datos[$i]['estatus'] = $res[5];
                $datos[$i]['fecha_autorizado'] = $res[6];
                $datos[$i]['capturista_autorizo'] = $res[7];
                $datos[$i]['descuento_mensual'] = $res[8];
                $datos[$i]['comentario'] = $res[9];
                $datos[$i]['monto_autorizado'] = $res[10];
                $datos[$i]['quincenas'] = $res[11];
                $datos[$i]['id_estatus'] = $res[12];
                $i++;

            } 
            if ( count($datos )==0) { 
                $datos[0]['id']  =0;
                return  $datos; 
                }
            return $datos;  
        }

        
        public function cargarSolicitudes()
        {
            
            $res=array();
            $datos=array();
            $i=0; 
            $sql="SELECT p.id, c.descripcion,p.fecha_solicitud,p.monto_solicitado, p.monto_total, e.descripcion, 
                IFNULL(p.fecha_autorizado, '-'), IFNULL(p.capturista_id_autorizo, '-'), p.descuento_mensual, IFNULL(p.comentarios_autorizacion, '-'),
                IFNULL(p.monto_autorizado,'-'), p.`quincenas`, p.estatus_id
                FROM b_prestamo_solicitudes p
                INNER JOIN estatus e ON e.id=p.estatus_id
                INNER JOIN capturistas c ON c.id=p.capturista_id ORDER BY p.id DESC";

            

            $resultado = mysqli_query($this->con(), $sql); 
            while ($res = mysqli_fetch_row($resultado)) {

                $datos[$i]['id'] = $res[0];
                $datos[$i]['capturista'] = $res[1];
                $datos[$i]['fecha_solicitud'] = $res[2];
                $datos[$i]['monto_solicitado'] = $res[3];
                $datos[$i]['monto_pagar'] = $res[4];
                $datos[$i]['estatus'] = $res[5];
                $datos[$i]['fecha_autorizado'] = $res[6];
                $datos[$i]['capturista_autorizo'] = $res[7];
                $datos[$i]['descuento_mensual'] = $res[8];
                $datos[$i]['comentario'] = $res[9];
                $datos[$i]['monto_autorizado'] = $res[10];
                $datos[$i]['quincenas'] = $res[11];
                $datos[$i]['id_estatus'] = $res[12];
                $i++;

            } 
            if ( count($datos )==0) { 
                $datos[0]['id']  =0;
                return  $datos; 
                }
            return $datos;  
        }


        public function cargarUltimoIdSolicitud()
        {
            $q="";
            $res=array();
            $datos=array();
            $i=0; 
            $sql="SELECT id, quincenas, descuento_mensual, fecha_solicitud
                    FROM b_prestamo_solicitudes
                    ORDER BY id DESC LIMIT 1"; 
                
            $resultado = mysqli_query($this->con(), $sql); 
            while ($res = mysqli_fetch_row($resultado)) {

                $datos[$i]['id'] = $res[0];
                $datos[$i]['quincenas'] = $res[1];
                $datos[$i]['descuento_mensual'] = $res[2];
                $datos[$i]['fecha'] = $res[3];
                $i++;

            } 
            if ( count($datos )==0) { 
                $datos[0]['id']  =0;
                return  $datos; 
                }
            return $datos;  
        }

        public function cargarSolicitudxId($id_solicitud)
        {
            $q="";
            $res=array();
            $datos=array();
            $i=0; 
            $sql="SELECT id, quincenas, monto_autorizado, fecha_autorizado, comentarios_autorizacion, estatus_id, monto_solicitado
                    FROM b_prestamo_solicitudes
                    Where id=$id_solicitud"; 
                
            $resultado = mysqli_query($this->con(), $sql); 
            while ($res = mysqli_fetch_row($resultado)) {

                $datos[$i]['id'] = $res[0];
                $datos[$i]['quincenas'] = $res[1];
                $datos[$i]['monto_autorizado'] = $res[2];
                $datos[$i]['fecha_autorizado'] = $res[3];
                $datos[$i]['comentarios'] = $res[4];
                $datos[$i]['estatus_id'] = $res[5];
                $datos[$i]['monto_solicitado'] = $res[6];
                $i++;

            } 
            if ( count($datos )==0) { 
                $datos[0]['id']  =0;
                return  $datos; 
                }
            return $datos;  
        }


        public function insertarCorridas($prestamoId,$fecha_corridap, $quincenas, $pago)
        {
            //$fecha = $this->fechaPrimerPago( $fecha_corridap);

            //return $prestamoId.'-'.$fecha_corridap.'-'.$quincenas.'-'.$pago;
          $anio=0;
          $mes=0;
          $dia=0;
          //$fecha=date('2018-11-15');
          $dias_mes=0;
           
            list($anio, $mes, $dia) = explode('-', $fecha_corridap);
           
            if (empty($anio) || empty($mes))
                list($anio, $mes, $dia) = explode('-', $fecha_corridap);

           // return $dia.'-'.$mes.'-'.$anio;
            if ( $dia >= 1 && $dia <= 15 )
            {
                $difDias=15-$dia;
                //$fecha
                
                // OBTENER LOS DIAS QUE TIENE UN MES //
                $dias_mes = $this->diasMes($mes,$anio);
                $fecha=$this->DateAdd($fecha_corridap,/*($dias_mes-15) */$difDias);

            }
            else
            {
                $dias_mes = $this->diasMes($mes,$anio);
                $fecha=$anio."-".$mes."-".$dias_mes;
            }
            
           // return $fecha;

            
            // GENERAR E INSERTAR CORRIDA //
            $x=1;
            while ($x <= $quincenas)
            {


                if($x==1)
                {
                    $sql = "INSERT INTO b_prestamo_corridas (prestamo_personal_id, num_pago, abono, fecha_pago) VALUES($prestamoId, $x, $pago, '$fecha')";
                    mysqli_query($this->con(), $sql);   
                }
                else
                {
                    $anio=0;
                    $mes=0;
                    $dia=0;
                    $dias_mes=0;
                    list($anio, $mes, $dia) = explode('-', $fecha);
           
                    if (empty($anio) || empty($mes))
                        list($anio, $mes, $dia) = explode('-', $fecha);

                // return $dia.'-'.$mes.'-'.$anio;
                    if ( $dia >= 1 && $dia <= 15 )
                    {
                        // OBTENER LOS DIAS QUE TIENE UN MES //
                        $dias_mes = $this->diasMes($mes,$anio);
                        $fecha=$this->DateAdd($fecha,($dias_mes-15));

                    }
                    else
                    {
                        $fecha=$this->DateAdd($fecha,15);
                    }
                    $sql = "INSERT INTO b_prestamo_corridas (prestamo_personal_id, num_pago, abono, fecha_pago) VALUES($prestamoId, $x, $pago, '$fecha')";
                    mysqli_query($this->con(), $sql);   
                }
               
                $x ++;
            }
            return "Exito!";
        }

        public function calcularFechaPagoInicialYFinal($fecha_corridap, $quincenas)
        {
            
            $datos=array();
            $i=0; 
            $anio=0;
            $mes=0;
            $dia=0;
            $fecha="";

            //$fecha=date('2018-11-15');
            $dias_mes=0;
            
            list($anio, $mes, $dia) = explode('-', $fecha_corridap);
          
            if (empty($anio) || empty($mes))
                list($anio, $mes, $dia) = explode('-', $fecha_corridap);

           // return $dia.'-'.$mes.'-'.$anio;
            if ( $dia >= 1 && $dia <= 15 )
            {
                $difDias=15-$dia;
                //$fecha
                
                // OBTENER LOS DIAS QUE TIENE UN MES //
                $dias_mes = $this->diasMes($mes,$anio);
                $fecha=$this->DateAdd($fecha_corridap,/*($dias_mes-15) */$difDias);

            }
            else
            {
                $dias_mes = $this->diasMes($mes,$anio);
                $fecha=$anio."-".$mes."-".$dias_mes;
                //$fecha=$this->DateAdd($fecha_corridap,/*($dias_mes-15) */$difDias);

                
            }
            
           // return $fecha;

            
            // GENERAR E INSERTAR CORRIDA //
            $x=1;
            while ($x <= $quincenas)
            {


                if($x==1)
                {
                        $datos[0]['inicio'] = $fecha;   
                }
                else
                {
                    $anio=0;
                    $mes=0;
                    $dia=0;
                    $dias_mes=0;
                    list($anio, $mes, $dia) = explode('-', $fecha);
           
                    if (empty($anio) || empty($mes))
                        list($anio, $mes, $dia) = explode('-', $fecha);

                // return $dia.'-'.$mes.'-'.$anio;
                    if ( $dia >= 1 && $dia <= 15 )
                    {
                        // OBTENER LOS DIAS QUE TIENE UN MES //
                        $dias_mes = $this->diasMes($mes,$anio);
                        $fecha=$this->DateAdd($fecha,($dias_mes-15));

                    }
                    else
                    {
                        $fecha=$this->DateAdd($fecha,15);
                    }
                    if($x==$quincenas)
                    {
                        $datos[0]['fechafinal'] = $fecha;  
                    }
                    
                   
                }
               
                $x ++;
            }
            return $datos; 
        }

        public function autorizarPrestamo($prestamoId,$comentario,$id_usuario_autorizador,$montoFinal)
        {
            $res=array();
            $datos=array();
            $resultado  =array();
           
            $sql="UPDATE b_prestamo_solicitudes SET estatus_id=5, fecha_autorizado=CURDATE(), capturista_id_autorizo=$id_usuario_autorizador, 
                comentarios_autorizacion='$comentario', monto_autorizado=$montoFinal WHERE id=$prestamoId";
            
            $resultado = mysqli_query($this->con(), $sql);   
            $datos['b_prestamo_solicitudes'] =  array('0' => '0' );
            return  $datos;	
        }

        public function actualizarPrestamo($prestamoId,$interes,$descuento,$montoFinal,$montoLetra)
        {
            $res=array();
            $datos=array();
            $resultado  =array();
           
            $sql="UPDATE b_prestamo_solicitudes SET interes_prestamo=$interes, descuento_mensual=$descuento, monto_total=$montoFinal, 
                monto_letra='$montoLetra' WHERE id=$prestamoId";
            
            $resultado = mysqli_query($this->con(), $sql);   
            $datos['b_prestamo_solicitudes'] =  array('0' => '0' );
            return  $datos;	
        }

        public function actualizarPrestamoFechasPago($fecha_ini, $fecha_fin, $id_solicitud)
        {
            $res=array();
            $datos=array();
            $resultado  =array();
           
            $sql="UPDATE b_prestamo_solicitudes SET inicio_descuento='$interes', fin_descuento='$fecha_fin' WHERE id=$id_solicitud";
            
            $resultado = mysqli_query($this->con(), $sql);   
            $datos['b_prestamo_solicitudes'] =  array('0' => '0' );
            return  $datos;	
        }

        public function NoAutorizarPrestamo($prestamoId,$comentario,$id_usuario_autorizador)
        {
            $res=array();
            $datos=array();
            $resultado  =array();
           
            $sql="UPDATE b_prestamo_solicitudes SET estatus_id=3, fecha_autorizado=CURDATE(), capturista_id_autorizo=$id_usuario_autorizador, 
                comentarios_autorizacion='$comentario' WHERE id=$prestamoId";
            
            $resultado = mysqli_query($this->con(), $sql);   
            $datos['b_prestamo_solicitudes'] =  array('0' => '0' );
            return  $datos;	
        }

        public function cargarCorridaXid($id_solicitud)
        {
            $q="";
            $res=array();
            $datos=array();
            $i=0; 
            $sql="SELECT s.id, cor.`num_pago`, cor.`abono`, cor.`fecha_pago`, cor.`abonado`
            FROM b_prestamo_corridas cor
            INNER JOIN b_prestamo_solicitudes s ON s.id=cor.`prestamo_personal_id`
            WHERE s.id=$id_solicitud ORDER BY cor.num_pago"; 
                
            $resultado = mysqli_query($this->con(), $sql); 
            while ($res = mysqli_fetch_row($resultado)) {

                $datos[$i]['id'] = $res[0];
                $datos[$i]['num_pago'] = $res[1];
                $datos[$i]['cantidad'] = $res[2];
                $datos[$i]['fecha'] = $res[3];
                $datos[$i]['abonado'] = $res[4];
                $i++;

            } 
            if ( count($datos )==0) { 
                $datos[0]['id']  =0;
                return  $datos; 
                }
            return $datos;  
        }

        public function EliminarCorridaSiTiene($prestamoId)
        {
            $res=array();
            $datos=array();
            $resultado  =array();
           
            $sql="DELETE from b_prestamo_corridas WHERE prestamo_personal_id=$prestamoId";
            
            $resultado = mysqli_query($this->con(), $sql);   
            $datos['b_prestamo_corridas'] =  array('0' => '0' );
            return "HEChO";	
        }

        public function cargarInfoPrestamo($id_solicitud)
        {
            $q="";
            $res=array();
            $datos=array();
            $i=0; 
            $sql2="SET lc_time_names = 'es_ES';"; 
                
            mysqli_query($this->con(), "SET lc_time_names = 'es_ES';"); 

            $sql="SELECT DATE_FORMAT( CURDATE(), '%d de %M de %Y') AS fecha, c.`descripcion`, s.`monto_autorizado` 
            FROM b_prestamo_solicitudes s 
            INNER JOIN capturistas c ON c.`id`= s.`capturista_id`
            WHERE s.id=$id_solicitud"; 
                
            $resultado = mysqli_query($this->con(), $sql); 
            while ($res = mysqli_fetch_row($resultado)) {

                $datos[$i]['fecha'] = $res[0];
                $datos[$i]['nombre_capturista'] = $res[1];
                $datos[$i]['monto_autorizado'] = $res[2];
                $i++;

            } 
            if ( count($datos )==0) { 
                $datos[0]['fecha']  =0;
                return  $datos; 
                }
            return $datos;  
        }

        public function cargarArchivoResponsiva($id_solicitud)
        {
            $q="";
            $res=array();
            $datos=array();
            $i=0; 
            $sql="SELECT id, archivo_responsiva
                FROM b_prestamo_solicitudes WHERE id=$id_solicitud"; 
                
            $resultado = mysqli_query($this->con(), $sql); 
            while ($res = mysqli_fetch_row($resultado)) {

                $datos[$i]['id'] = $res[0];
                $datos[$i]['archivo_responsiva'] = $res[1];
                $i++;

            } 
            if ( count($datos )==0) { 
                $datos[0]['id']  =0;
                return  $datos; 
                }
            return $datos;  
        }

        public function cargarRutaResponsiva($prestamoId,$ruta_responsiva)
        {
            $res=array();
            $datos=array();
            $resultado  =array();
           
            $sql="UPDATE b_prestamo_solicitudes SET archivo_responsiva='$ruta_responsiva' WHERE id=$prestamoId";
            
            $resultado = mysqli_query($this->con(), $sql);   
            $datos['b_prestamo_solicitudes'] =  array('0' => '0' );
            return  $datos;	
        }

       

    }

?>
