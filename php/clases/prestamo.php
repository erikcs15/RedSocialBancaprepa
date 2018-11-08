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
                IFNULL(p.fecha_autorizado, '-'), IFNULL(p.capturista_id_autorizo, '-'), p.descuento_mensual
                FROM b_prestamo_solicitudes p
                INNER JOIN estatus e ON e.id=p.estatus_id
                INNER JOIN capturistas c ON c.id=p.capturista_id
                WHERE p.capturista_id= $capturista_id"; 
            
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
                $fecha=$this->DateAdd($fecha,15);
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

        public function calcularFechaPagoInicialYFinal($fecha_corridap)
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
                $fecha=$this->DateAdd($fecha,15);
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

    }

?>
