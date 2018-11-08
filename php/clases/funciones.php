<?php
    
    // AGREGAR UN DIA O UN MES O UN AÑO A UNA FECHA //
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

    // FUNCION FECHA DEL PRIMER PAGO  //
    function fechaPrimerPago( $fecha_corrida )
    {
        $dia_corte1 = 0;
        $dia_corte2 = 0;
        $x = 0;

        list($anio, $mes, $dia) = explode('/', $fecha_corrida);
        if (empty($anio) || empty($mes))
            list($anio, $mes, $dia) = explode('-', $fecha_corrida);

        /*
        $sql = "SELECT dia_mes FROM p_dias_corte";
        $arreglo = $this->consulta( $sql );
        while ( $fila = mysqli_fetch_array( $arreglo ) )
        {
            if( $x==0 )
                $dia_corte1 = $fila[ 0 ];
            if( $x==1 )
                $dia_corte2 = $fila[ 0 ];

            $x++;
        }
        */
        //Todos los vales que se cobren entre el primer dia de corte (8 de cada mes ) y 
        // un dia antes del ultimo dia de corte (23 de cada mes) empezaran a pagarce el ultimo dia 
        // de ese mes
        if( $dia>$1 && $dia<=$15 )
        {
            // OBTENER LOS DIAS QUE TIENE UN MES //
            $dias_mes = $this->diasMes($mes,$anio);

            $dia_p = $dias_mes;
            $fecha = "$anio-$mes-$dia_p"; //FECHA DEL PRIMER PAGO
        }

        //Todos los vales que se cobren antes del primer dia de corte (8 de cada mes)
        // empezaran a pagar el 15 de ese mes
        if( $dia<=$dia_corte1 )
        {
            $dia_p = 15;
            $fecha = "$anio-$mes-$dia_p"; //FECHA DEL PRIMER PAGO
        }

        //Todos los vales que se cobren despues del segundo dia de corte (23 de cada mes)
        // empezaran a pagar el 15 del mes que entra
        if( $dia>$dia_corte2 )
        {
            $dia_p = 15;
            //Sumarle un mes a la fecha para sacar el 15 del mes que sigue
            $sql = "SELECT DATE_ADD('$fecha_corrida', INTERVAL 1 MONTH)"; 
            $arreglo = $this->consulta( $sql );
            while ( $fila = mysqli_fetch_array( $arreglo ) )
                $fecha = $fila[ 0 ];

            list($anio, $mes, $dia) = explode('-', $fecha);
            $fecha = "$anio-$mes-$dia_p"; //FECHA DEL PRIMER PAGO
        }

        return $fecha;
    }