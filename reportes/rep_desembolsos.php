<?php
require_once( '../pdf/pdf.php' );
require_once( '../clases/utilidades/Funcion.php' );
$funcion = new Funcion();

class DF extends PDF
{
    public function Header()
    {
        parent::Header("REPORTE DESEMBOLSOS DE: ","logo_valeamigo");
    }

    public function Footer()
    {
        parent::Footer();
    }
}

$sucursal_id    = $_REQUEST[ 'sucursal_id'];
$fecha_inicial  = $_REQUEST[ 'fecha_inicial' ];
$fecha_final    = $_REQUEST[ 'fecha_final' ];

$sql = "SELECT nomComercial FROM sucursales WHERE id = $sucursal_id";
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
    $sucursal = $fila[ 0 ];

$df = new DF();
$df->FPDF( 'P', 'mm', 'Letter' );
$df->AddPage();

$sucursal_id2 = $sucursal_id;
if($sucursal_id == 0 || empty ($sucursal_id))
{
	$sucursal_id   = 1;
	$sucursal_id2  = 999;
}

$df->Ln(-5);
$df->SetFillColor(232,232,232); //Fondo del texto Gris Claro Claro
$total = 0;
$color = true;
$x=0;
$cont=0;

$df->SetFont('Arial','',9);
$df->Ln(10);
$df->Cell(-3);
$df->Cell(5,1,"Id        Distribuidora                                        Cliente                           Fecha      Quin.     Importe        Suc.          Hora         Capturista",0,0,'L');
$df->Ln(1);
$df->Cell(-4);
$df->Cell(5,1,"__________________________________________________________________________________________________________________",0,0,'L');
$df->Ln(1);
$df->SetFont('Arial','',8);

$sql="SELECT p_desembolsos.p_distribuidora_id
    , p_distribuidoras.descripcion AS distribuidora
    , p_desembolsos.p_cliente_id
    , p_clientes.descripcion AS cliente
    , p_desembolsos.entrega_fecha
    , SUM(capital)/*+SUM(redondeo)*/ AS capital
    , sucursales.nomComercial
    , p_desembolsos.quincenas
    , p_desembolsos.hora 
    , p_desembolsos.capturista_id
    , capturistas.descripcion AS capturista
    FROM p_desembolsos 
    INNER JOIN p_distribuidoras ON (p_distribuidoras.id = p_desembolsos.p_distribuidora_id) 
    INNER JOIN p_clientes ON (p_clientes.id = p_desembolsos.p_cliente_id) 
    INNER JOIN sucursales ON p_distribuidoras.sucursal_id = sucursales.id 
    INNER JOIN capturistas ON (capturistas.id = p_desembolsos.capturista_id)
    WHERE p_desembolsos.entrega_fecha BETWEEN '$fecha_inicial' AND '$fecha_final' 
    AND p_desembolsos.estatus_id IN (2,5)
    AND p_distribuidoras.sucursal_id BETWEEN $sucursal_id AND $sucursal_id2 
    GROUP BY p_cliente_id ORDER BY p_desembolsos.fecha,p_desembolsos.id";
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
{
    $distribuidora_id	= $fila[ 0 ];
    $distribuidora		= $fila[ 1 ];
    $cliente_id			= $fila[ 2 ];
    $cliente			= $fila[ 3 ];
    $fecha		        = $fila[ 4 ];
    $capital            = $fila[ 5 ];
    $nomComercial       = $fila[ 6 ];
    $quincenas          = $fila[ 7 ];
    $hora               = $fila[ 8 ];
    $capturista_id      = $fila[ 9 ];
    $capturista         = $fila[ 10 ];

    $x++;
    
    $df->Ln(4);
    $df->Cell(-3);
    $df->Cell(10,3.5,$distribuidora_id,0,0,'L',$color);
    $df->Cell(50,3.5,substr($distribuidora,0,25),0,0,'L',$color);
    $df->Cell(35,3.5,substr($cliente,0,17),0,0,'L',$color);
    $df->Cell(18,3.5,$fecha,0,0,'L',$color);
    $df->Cell(8,3.5,$quincenas,0,0,'L',$color);
    $df->Cell(15,3.5,"$".number_format($capital,2),0,0,'R',$color);
    $df->Cell(5,3.5,"",0,0,'R',$color);
    $df->Cell(12,3.5,substr($nomComercial,0,4),0,0,'L',$color);
    $df->Cell(19,3.5,$hora,0,0,'L',$color);
    $df->Cell(29,3.5,substr($capturista,0,16),0,0,'L',$color);
	
    if (($x % 2) > 0)
    {
    	$color = false;
    }
    else
    	$color = true;
	
	$total += $capital;
    $cont++;
    $capital = 0;
}

$df->SetFont('Arial','',9);
$df->Ln(7);
$df->Cell(1);
$df->Cell(5,1,"Cant. ".$cont,0,0,'L');
$df->Cell(95);
$df->Cell(5,1,"TOTAL DESEMBOLSOS: ",0,0,'R');
$df->Cell(22);
$df->Cell(5,1,"$ ".number_format($total,2),0,0,'R');
$df->Output();
?>