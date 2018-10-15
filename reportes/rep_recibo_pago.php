<?php
require_once( '../pdf/pdf.php' );
require_once( '../clases/utilidades/Funcion.php' );
$funcion = new Funcion();

class DF extends PDF
{
    public function Header()
    {
        //parent::Header("REPORTE PAGOS DE: ");
    }

    public function Footer()
    {
        //parent::Footer();
    }
}

$distribuidora_id 	= $_REQUEST[ 'distribuidora_id'];
$fecha 				= $_REQUEST[ 'fecha'];
$capturista_id 		= $_REQUEST[ 'capturista_id'];

$df = new DF();
//$df ->FPDF( 'P', 'mm', 'Letter' );
$df ->FPDF( 'P', 'mm',array(65,250) );
$df->AddPage(); 

$df->SetFont('Arial','',10);
$df->Ln(-5);
$df->Cell(4);
$df->Multicell(40,5,utf8_decode("RECIBO DE PAGO"),0,C,0);
$df->Ln(2);
$df->Cell(-11);
$df->Cell(10,1,"---------------------------------------------------------------",0,0,'L');

list($anio, $mes, $dia) = explode('/', $fecha);
if (empty($anio) || empty($mes))
    list($anio, $mes, $dia) = explode('-', $fecha);

switch ($mes) {
	case 1: $mes = 'Enero'; break;
	case 2: $mes = 'Febrero'; break;
	case 3: $mes = 'Marzo'; break;
	case 4: $mes = 'Abril'; break;
	case 5: $mes = 'Mayo'; break;
	case 6: $mes = 'Junio'; break;
	case 7: $mes = 'Julio'; break;
	case 8: $mes = 'Agosto'; break;
	case 9: $mes = 'Septiembre'; break;
	case 10: $mes = 'Octubre'; break;
	case 11: $mes = 'Noviembre'; break;
	case 12: $mes = 'Diciembre'; break;
}

$pago = 0;

$sql="SELECT p_pagos.id
	, pago_completo AS pago
	, CONCAT( SUBSTRING( p_pagos.hora,1 ,5), ' ', p_pagos.ampm) AS hora
	, p_distribuidoras.descripcion AS distribuidora
	, capturistas.descripcion AS capturista
	FROM p_pagos
	INNER JOIN p_distribuidoras ON(p_distribuidoras.id = p_pagos.p_distribuidora_id)
	INNER JOIN capturistas ON(capturistas.id = p_pagos.capturista_id)
	WHERE p_distribuidora_id = $distribuidora_id
	AND p_pagos.fecha = '$fecha'
	ORDER BY p_pagos.id DESC LIMIT 1"; 
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
{
	$pago_id 		= $fila[ 0 ];
	$pago 			= $fila[ 1 ];
	$hora 			= $fila[ 2 ];
	$distribuidora 	= $fila[ 3 ];
	$capturista 	= $fila[ 4 ];
}

$df->Ln(4);
$df->Cell(-6);
$df->Cell(5,1,"$dia de $mes de $anio",0,0,'L');
$df->Ln(4);
$df->Cell(-6);
$df->Cell(5,1,"$hora",0,0,'L');
$df->Ln(4);
$df->Cell(-6);
$df->Cell(5,1,"FOLIO: $pago_id",0,0,'L');

$df->Ln(10);
$df->Cell(-6);
$df->Cell(5,1,"DIST. ID: ",0,0,'L');
$df->SetFont('Arial','B',10);
$df->Cell(12);
$df->Cell(5,1,$distribuidora_id,0,0,'L');
$df->SetFont('Arial','',10);

$df->Ln(5);
$df->Cell(-6);
$df->Cell(5,1,"DISTRIBUIDORA:  ",0,0,'L');
$df->Ln(4);
$df->Cell(-6);
$df->SetFont('Arial','B',10);
$df->Multicell(58,5,utf8_decode($distribuidora),0,L,0);
$df->SetFont('Arial','',10);

$df->SetFont('Arial','B',11);
$df->Ln(10);
$df->Cell(-6);
$df->Cell(10,1,"IMPORTE: ",0,0,'L');

$df->Cell(30);
$df->Cell(10,1,'$ '.number_format($pago,2),0,0,'R');
$df->SetFont('Arial','',10);

/*$df->Ln(15);
$df->Cell(-7);
$df->Cell(10,1,"______________________________",0,0,'L');
$df->Ln(4);
$df->Cell(13);
$df->Cell(10,1,"ENTREGO",0,0,'L');*/

$df->Ln(15);
$df->Cell(-7);
$df->SetFont('Arial','',8);
$df->Cell(10,1,utf8_decode($capturista),0,0,'L');
$df->SetFont('Arial','',10);
$df->Ln(1);
$df->Cell(-7);
$df->Cell(10,1,"______________________________",0,0,'L');
$df->Ln(4);
$df->Cell(13);
$df->Cell(10,1,"RECIBIO",0,0,'L');

$df->Ln(10);
$df->Cell(-3);
$df->Cell(10,1,"**GRACIAS POR SU PAGO**",0,0,'L');
$df->Ln(10);
$df->Cell(-10);
$df->Cell(10,1,".",0,0,'L');

$df->Output();
?>
