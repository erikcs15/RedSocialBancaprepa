<?php
        
        

        ////////////////////////////////////
        // FUNCION FECHA DEL PRIMER PAGO  //
        ////////////////////////////////////
        $fecha = $this->fechaPrimerPago( $fecha_corrida );
        
   

        // GENERAR E INSERTAR CORRIDA //
        while ($x <= $quincenas)
        {


            $sql = "INSERT INTO p_corridas (p_desembolso_id,    serie,   folio, p_distribuidora_id, p_cliente_id, numPago,   fecha,     capital, pago_quincenal,  seguro, interes_quincenal, estatus_id,      saldo)
                                    VALUES(  $desembolso_id, '$serie',  $folio,  $distribuidora_id,  $cliente_id,      $x, '$fecha',  $pago_com,     $pago_quin, $seguro,     $interes_quin,           1, $pago_com)";
            $r = $this->filasAfectadas( $sql );
            if ($r < 0)
            {
                $resultado[ 'root' ][ 'Datos' ] = $sql;
                $resultado[ 'root' ][ 'Error' ] = 'X';
                return $resultado;
            }

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

?>