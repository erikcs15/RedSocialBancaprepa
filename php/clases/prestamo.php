<?php
	
    require_once("../conexion/conexion.php");
    require_once("funciones.php");

    class prestamo extends Conectar
    {
        public function crearSolicitud($capturista_id,$fechaSolicitud, $puesto_id, $sucursal_id, $empresa_id, $numTarjeta, $beneficiarioCta, $nombreBanco, $montoSolicitado, $quincenas, $mesesApagar, $interes_prestamo, $tipo_abono, $descuento_mensual, $monto_total, $inicioDes, $finDes,$monto_letra)
        {
            $res=array();
				$datos=array();
				$resultado  =array();
				$i=0;	
				$sql="INSERT INTO b_solicitud_prestamo (capturista_id, fecha_solicitud, puesto_id, sucursal_id, empresa_id, 
                        numTarjeta, beneficiarioCuenta, nombreBanco, monto_solicitado, quincenas, meses_a_pagar, interes_prestamo, 
                        tipo_abono, descuento_mensual, monto_total, inicio_descuento, fin_descuento, estatus_id, monto_letra)
                        VALUES ($capturista_id,'$fechaSolicitud', $puesto_id, $sucursal_id, $empresa_id, '$numTarjeta', '$beneficiarioCta', 
                        '$nombreBanco', $montoSolicitado, $quincenas, $mesesApagar, $interes_prestamo, '$tipo_abono', $descuento_mensual, 
                        $monto_total, '$inicioDes', '$finDes', 4, '$monto_letra')";
           
          
				$resultado = mysqli_query($this->con(), $sql);   
	
				$datos['b_solicitud_prestamo'] =  array('0' => '0' );
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
                FROM b_solicitud_prestamo p
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
                    FROM b_solicitud_prestamo
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
            $fecha = $this->fechaPrimerPago( $fecha_corridap);
            // GENERAR E INSERTAR CORRIDA //
            $x=1;
            while ($x <= $quincenas)
            {


                $sql = "INSERT INTO b_prestamo_corridas (prestamo_personal_id, num_pago, abono, fecha_pago) VALUES($prestamoId, $x, $pago, '$fecha')";
                
                /*$r = $this->filasAfectadas( $sql );
                if ($r < 0)
                {
                    $resultado[ 'root' ][ 'Datos' ] = $sql;
                    $resultado[ 'root' ][ 'Error' ] = 'X';
                    return $resultado;
                }
                */
                $resultado = mysqli_query($this->con(), $sql);   

                list($anio, $mes, $dia) = explode('/', $fecha);
                if (empty($anio) || empty($mes))
                    list($anio, $mes, $dia) = explode('-', $fecha);

                if ( $dia >= 1 && $dia <= 15 )
                {
                    // OBTENER LOS DIAS QUE TIENE UN MES //
                    $dias_mes = $this->diasMes($mes,$anio);

                    $fecha=$this->DateAdd($fecha,($dias_mes-15) );
                }
                else
                {
                    $fecha=$this->DateAdd($fecha,15);
                }

                $x ++;
            }
        }
    }

?>
