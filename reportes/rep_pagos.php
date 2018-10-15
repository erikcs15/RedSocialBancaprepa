<?php
require_once( '../pdf/pdf.php' );
require_once( '../clases/utilidades/Funcion.php' );
$funcion = new Funcion();

class DF extends PDF
{
    public function Header()
    {
        parent::Header("REPORTE PAGOS DE: ");
    }

    public function Footer()
    {
        parent::Footer();
    }
}

$sucursal_id 	= $_REQUEST[ 'sucursal_id'];
$fecha_inicial 	= $_REQUEST[ 'fecha_inicial' ];
$fecha_final 	= $_REQUEST[ 'fecha_final' ];
$capturista_id 	= $_REQUEST[ 'capturista_id' ];

$sql = "SELECT autorizacion_admin FROM usuarios WHERE empleado = $capturista_id";
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
    $autorizacion_admin = $fila[ 0 ];

$sql = "SELECT nomComercial FROM sucursales WHERE id = $sucursal_id";
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
    $sucursal = $fila[ 0 ];

$df = new DF();
$df->FPDF( 'P', 'mm', 'Letter' );
$df->AddPage();

$df->Ln(-6);
$df->SetFillColor(192,192,192); //Fondo del texto Gris Claro

$totalPagosVale	= 0;
$capital  		= 0;
$interes 		= 0;
$cont 			= 0;
$moratorio 		= 0;
$totalMoratorio = 0;
$fondo 			= 0;
$totalFondo 	= 0;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//											 BUSCAR LOS PAGO DE RELACION DE VALES 														//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$df->Ln(10);
$df->Cell(70);
$df->Cell(195,4,"PAGOS RELACION VALE",0,0,'L',false);

$df->SetFont('Arial','',10);
$df->Ln(5);
$df->Cell(1);
$df->Cell(195,4,"          Id        Distribuidora                                                          Pago          Capturista                                Fecha        Hora",0,0,'L',true);
$df->Ln(2);
$df->Cell(1);
$df->Cell(5,1,"__________________________________________________________________________________________________",0,0,'L');
$df->Ln(1);
$df->SetFont('Arial','',9);
$df->SetFillColor(232,232,232); //Fondo del texto Gris Claro Claro

$color = true;
$x=0;

$i=0;
$folio_cobrador = 0;
$pagosCobrador = Array();
//////////////////////////////////////////
//BUSCAR LOS PAGO DE CAPITAL MAS INTERES//
$sql="SELECT  SUM(pago_completo)
	, capturistas.descripcion AS capturista
	, p_pagos.fecha
	, p_distribuidoras.id AS distribuidora_id
	, p_distribuidoras.descripcion AS distribuidora
	, p_pagos.folio_cobrador
	, p_pagos.cobrador_id
	, CONCAT( SUBSTRING(p_pagos.hora,-8,5),' ',p_pagos.ampm) AS hora
	FROM p_pagos
	INNER JOIN p_distribuidoras ON (p_pagos.p_distribuidora_id = p_distribuidoras.id)
	INNER JOIN capturistas ON (capturistas.id = p_pagos.capturista_id)
	WHERE p_pagos.fecha BETWEEN '$fecha_inicial' AND '$fecha_final'
	AND p_distribuidoras.sucursal_id = $sucursal_id /*AND p_distribuidora_id = $distribuidora_id*/
	GROUP BY p_pagos.id, p_pagos.fecha, p_pagos.p_distribuidora_id, p_pagos.capturista_id
	ORDER BY p_pagos.fecha, p_pagos.p_distribuidora_id, p_pagos.capturista_id";
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
{
	$pago_completo		= $fila[ 0 ];
	$capturista 		= $fila[ 1 ];
	$fecha 				= $fila[ 2 ];
	$distribuidora_id 	= $fila[ 3 ];
	$distribuidora 		= $fila[ 4 ];
	$folio_cobrador 	= $fila[ 5 ];
	$cobrador_id 		= $fila[ 6 ];
	$hora 				= $fila[ 7 ];

	if ( $pago_completo>0 && $folio_cobrador==0 ) 
	{
		$totalPagosVale += $pago_completo;

		$cont ++;
		$df->Ln(3);
		$df->Cell(1);
		$df->Cell(9,2.5,$cont,0,0,'L',$color);
		$df->Cell(12,2.5,$distribuidora_id,0,0,'L',$color);
		$df->Cell(65,2.5,substr($distribuidora,0,35),0,0,'L',$color);
		$df->Cell(25,2.5,"$".number_format($pago_completo,2),0,0,'R',$color);
		$df->Cell(49,2.5,substr($capturista,0,20),0,0,'L',$color);
		$df->Cell(20,2.5,$fecha,0,0,'L',$color);
		$df->Cell(15,2.5,$hora,0,0,'L',$color);
		//$df->Cell(8,2.5,"",0,0,'L',$color);
		$x++;
		if (($x % 2) > 0)
	    	$color = false;
	    else
	    	$color = true;
	}
	else
	{
		$pagosCobrador[$i]['distribuidora_id'] 	= $distribuidora_id;
		$pagosCobrador[$i]['distribuidora'] 	= $distribuidora;
		$pagosCobrador[$i]['pago_completo'] 	= $pago_completo;
		$pagosCobrador[$i]['capturista'] 		= $capturista;
		$pagosCobrador[$i]['fecha'] 			= $fecha.' '.$hora;
		$pagosCobrador[$i]['folio_cobrador'] 	= $folio_cobrador;
		$pagosCobrador[$i]['cobrador_id'] 		= $cobrador_id;
		$pagosCobrador[$i]['tipo_pago'] 		= 'VALE';
		$i++;
	}

	$pago_completo  = 0;
	$folio_cobrador = 0;
}

$df->SetFont('Arial','B',10);
$df->Ln(6);
$df->Cell(1);
$df->Cell(5,1,$cont,0,0,'L');
if( $autorizacion_admin=='S' )
{
	$df->Cell(67);
	$df->Cell(5,1,"TOTALES",0,0,'L');
	$df->Cell(29);
	$df->Cell(5,1,"$".number_format($totalPagosVale,2),0,0,'R');
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//											 BUSCAR LOS PAGO DE PRESTAMOS PERSONALES 													//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$df->Ln(15);
$df->Cell(70);
$df->Cell(195,4,"PAGOS PRESTAMOS PERSONALES",0,0,'L',false);

$df->SetFillColor(192,192,192); //Fondo del texto Gris Claro
$df->SetFont('Arial','',10);
$df->Ln(5);
$df->Cell(1);
$df->Cell(195,4,"          Id        Distribuidora                                                          Pago          Capturista                                Fecha        Hora",0,0,'L',true);
$df->Ln(2);
$df->Cell(1);
$df->Cell(5,1,"__________________________________________________________________________________________________",0,0,'L');
$df->Ln(1);
$df->SetFont('Arial','',9);
$df->SetFillColor(232,232,232); //Fondo del texto Gris Claro Claro

$color = true;
$x=0;
$cont=0;
$totalPrestamoPer	= 0;

$folio_cobrador = 0;
$sql="SELECT SUM(pago_completo)
	, capturistas.descripcion AS capturista
	, dist_pagos.fecha
	, p_distribuidoras.id AS distribuidora_id
	, p_distribuidoras.descripcion AS distribuidora
	, dist_pagos.folio_cobrador
	, dist_pagos.cobrador_id
	, CONCAT( SUBSTRING(dist_pagos.hora,-8,5),' ',dist_pagos.ampm) AS hora
	FROM dist_pagos
	INNER JOIN p_distribuidoras ON (dist_pagos.distribuidora_id = p_distribuidoras.id)
	INNER JOIN capturistas ON (capturistas.id = dist_pagos.capturista_id)
	WHERE dist_pagos.fecha BETWEEN '$fecha_inicial' AND '$fecha_final'
	AND p_distribuidoras.sucursal_id = $sucursal_id
	GROUP BY dist_pagos.id, dist_pagos.fecha, dist_pagos.distribuidora_id, dist_pagos.capturista_id
	ORDER BY dist_pagos.fecha, dist_pagos.distribuidora_id, dist_pagos.capturista_id";
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
{
	$pago_completo		= $fila[ 0 ];
	$capturista 		= $fila[ 1 ];
	$fecha 				= $fila[ 2 ];
	$distribuidora_id 	= $fila[ 3 ];
	$distribuidora 		= $fila[ 4 ];
	$folio_cobrador 	= $fila[ 5 ];
	$cobrador_id 		= $fila[ 6 ];
	$hora 				= $fila[ 7 ];

	if ( $pago_completo>0 && $folio_cobrador==0 ) 
	{
		$totalPrestamoPer += $pago_completo;

		$cont ++;
		$df->Ln(3);
		$df->Cell(1);
		$df->Cell(9,2.5,$cont,0,0,'L',$color);
		$df->Cell(12,2.5,$distribuidora_id,0,0,'L',$color);
		$df->Cell(65,2.5,substr($distribuidora,0,35),0,0,'L',$color);
		$df->Cell(25,2.5,"$".number_format($pago_completo,2),0,0,'R',$color);
		$df->Cell(49,2.5,substr($capturista,0,20),0,0,'L',$color);
		$df->Cell(20,2.5,$fecha,0,0,'L',$color);
		$df->Cell(15,2.5,$hora,0,0,'L',$color);
		//$df->Cell(8,2.5,"",0,0,'L',$color);

		$x++;
		if (($x % 2) > 0)
	    	$color = false;
	    else
	    	$color = true;
	}
	else
	{
		$pagosCobrador[$i]['distribuidora_id'] 	= $distribuidora_id;
		$pagosCobrador[$i]['distribuidora'] 	= $distribuidora;
		$pagosCobrador[$i]['pago_completo'] 	= $pago_completo;
		$pagosCobrador[$i]['capturista'] 		= $capturista;
		$pagosCobrador[$i]['fecha'] 			= $fecha.' '.$hora;
		$pagosCobrador[$i]['folio_cobrador'] 	= $folio_cobrador;
		$pagosCobrador[$i]['cobrador_id'] 		= $cobrador_id;
		$pagosCobrador[$i]['tipo_pago'] 		= 'PRES.PER.';
		$i++;
	}

	$pago_completo  = 0;
	$folio_cobrador = 0;
}
$df->SetFont('Arial','B',10);
$df->Ln(6);
$df->Cell(1);
$df->Cell(5,1,$cont,0,0,'L');
if( $autorizacion_admin=='S' )
{
	$df->Cell(67);
	$df->Cell(5,1,"TOTALES",0,0,'L');
	$df->Cell(29);
	$df->Cell(5,1,"$".number_format($totalPrestamoPer,2),0,0,'R');
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//											 BUSCAR LOS PAGO DE RELACION DE COBRADORES													//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$totalCobradores	= 0;
// SI HAY PAGOS DE COBRADOR SE IMPRIMEN //
if( count($pagosCobrador) )
{
	$df->Ln(15);
	$df->Cell(70);
	$df->Cell(195,4,"PAGOS COBRADORES",0,0,'L',false);

	$df->SetFillColor(192,192,192); //Fondo del texto Gris Claro
	$df->SetFont('Arial','',9);
	$df->Ln(5);
	$df->Cell(1);
	$df->Cell(195,4,"          Id           Distribuidora                                        Pago          Capturista                  Fecha        Cobrador                      Folio   TipoPago",0,0,'L',true);
	$df->Ln(2);
	$df->Cell(1);
	$df->Cell(5,1,"_____________________________________________________________________________________________________________",0,0,'L');
	$df->Ln(1);
	$df->SetFont('Arial','',8);
	$df->SetFillColor(232,232,232); //Fondo del texto Gris Claro Claro

	$color = true;
	$x=0;
	$cont=0;
	
	$pago_completo  	= 0;

	foreach ($pagosCobrador as $pagos)
	{
		$distribuidora_id 	= $pagos['distribuidora_id'];
		$distribuidora 		= $pagos['distribuidora'];
		$pago_completo 		= $pagos['pago_completo'];
		$capturista 		= $pagos['capturista'];
		$fecha 				= $pagos['fecha'];
		$folio_cobrador 	= $pagos['folio_cobrador'];
		$cobrador_id 		= $pagos['cobrador_id'];
		$tipo_pago 			= $pagos['tipo_pago'];

		$sql = "SELECT descripcion FROM capturistas WHERE id = $cobrador_id";
		$arreglo = $funcion->consulta( $sql );
		while ( $fila = mysqli_fetch_array( $arreglo ) )
			$cobrador		= $fila[ 0 ];

		$totalCobradores += $pago_completo;
		$cont ++;

		$df->Ln(3);
		$df->Cell(1);
		$df->Cell(9,2.5,$cont,0,0,'L',$color);
		$df->Cell(12,2.5,$distribuidora_id,0,0,'L',$color);
		$df->Cell(40,2.5,substr($distribuidora,0,25),0,0,'L',$color);
		$df->Cell(25,2.5,"$".number_format($pago_completo,2),0,0,'R',$color);
		$df->Cell(21,2.5,substr($capturista,0,10),0,0,'L',$color);
		$df->Cell(30,2.5,$fecha,0,0,'L',$color);
		$df->Cell(30,2.5,substr($cobrador,0,13),0,0,'L',$color);
		$df->Cell(11,2.5,$folio_cobrador,0,0,'R',$color);
		$df->Cell(17,2.5,substr($tipo_pago,0,15),0,0,'L',$color);
		//$df->Cell(8,2.5,"",0,0,'L',$color);

		$x++;
		if (($x % 2) > 0)
	    	$color = false;
	    else
	    	$color = true;

	    $pago_completo  = 0;
	}

	$df->SetFont('Arial','B',10);
	$df->Ln(6);
	$df->Cell(1);
	$df->Cell(5,1,$cont,0,0,'L');
	if( $autorizacion_admin=='S' )
	{
		$df->Cell(42);
		$df->Cell(5,1,"TOTALES",0,0,'L');
		$df->Cell(29);
		$df->Cell(5,1,"$".number_format($totalCobradores,2),0,0,'R');
	}
}

if( $autorizacion_admin=='S' )
{
	$df->SetFont('Arial','',10);
	$df->Ln(10);
	$df->Cell(1);
	$df->Cell(5,1,"PAGOS RELACION VALE",0,0,'L');
	$df->Cell(70);
	$df->Cell(5,1,"$".number_format($totalPagosVale,2),0,0,'R');

	$df->Ln(4);
	$df->Cell(1);
	$df->Cell(5,1,"PAGOS PRESTAMO PERSONAL",0,0,'L');
	$df->Cell(70);
	$df->Cell(5,1,"$".number_format($totalPrestamoPer,2),0,0,'R');

	$df->Ln(4);
	$df->Cell(1);
	$df->Cell(5,1,"PAGOS COBRADORES",0,0,'L');
	$df->Cell(70);
	$df->Cell(5,1,"$".number_format($totalCobradores,2),0,0,'R');

	$df->Ln(1);
	$df->Cell(55);
	$df->Cell(5,1,"_______________",0,0,'L');

	$df->SetFont('Arial','B',10);
	$df->Ln(4);
	$df->Cell(1);
	$df->Cell(5,1,"TOTAL PAGOS:",0,0,'L');
	$df->Cell(70);
	$df->Cell(5,1,"$".number_format($totalPagosVale+$totalPrestamoPer+$totalCobradores,2),0,0,'R');
}

$df->Output();
?>
