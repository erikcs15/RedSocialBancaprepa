<?php
require_once( '../pdf/pdf.php' );
require_once( '../clases/utilidades/Funcion.php' );
$funcion = new Funcion();

class DF extends PDF
{
    public function Header()
    {
        parent::Header("REPORTE GASTOS DE:");
    }

    public function Footer()
    {
        parent::Footer();
    }
}

$sucursal_id 	= $_REQUEST[ 'sucursal_id'];
$fecha_inicial 	= $_REQUEST[ 'fecha_inicial' ];
$fecha_final 	= $_REQUEST[ 'fecha_final' ];

$sql = "SELECT nomComercial FROM sucursales WHERE id = $sucursal_id";
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
    $sucursal = $fila[ 0 ];


$df = new DF();
$df->FPDF( 'P', 'mm', 'Letter' );
$df->AddPage();

$df->Ln(-6);
$df->SetFillColor(192,192,192); //Fondo del texto Gris Claro

$sucursal_id2 = $sucursal_id;
if($sucursal_id == 0 || empty ($sucursal_id))
{
    $sucursal_id = 1;
    $sucursal_id2 = 999;
}

$total = 0;
$totalTotal = 0;
$x = 0;

//toma las cuentas que estan asignadas a esa sucursal
$sql="SELECT cta FROM gastos 
    INNER JOIN sucursales_gastos ON gastos.id = sucursales_gastos.gasto_id
    WHERE sucursales_gastos.sucursal_id BETWEEN $sucursal_id and $sucursal_id2 AND cta BETWEEN 1 AND 99999
    GROUP BY cta ORDER BY cta"; 
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
{
    $cta		=$fila[ 0 ];

    $sql2="SELECT descripcion FROM gastos WHERE cta = $cta AND scta=0"; 
    $arreglo2 = $funcion->consulta( $sql2 );
	while ( $fila2 = mysqli_fetch_array( $arreglo2 ) )
            $cuenta		=$fila2[ 0 ];
	
    $sql2="SELECT gastos.id,cta,scta,gastos.descripcion,p_gastos.importe,p_gastos.fecha,sucursales.nomComercial,p_gastos.solicitud_id FROM gastos 
        INNER JOIN p_gastos ON p_gastos.gasto_id=gastos.id
        INNER JOIN sucursales_gastos ON gastos.id = sucursales_gastos.gasto_id
        INNER JOIN sucursales ON sucursales.id = p_gastos.sucursal_id AND scta BETWEEN 1 AND 99999
        WHERE p_gastos.sucursal_id BETWEEN $sucursal_id and $sucursal_id2 AND p_gastos.fecha BETWEEN '$fecha_inicial' AND '$fecha_final' AND cta =$cta GROUP BY p_gastos.id
        ORDER BY cta,scta,fecha"; 
    $arreglo2 = $funcion->consulta( $sql2 );
	while ( $fila2 = mysqli_fetch_array( $arreglo2 ) )
    {
        if ($x == 0)
        {
            $df->SetFont('Arial','B',9);
            $df->Ln(10);
            $df->Cell(-3);
            $df->Cell(5,1,$cta,0,0,'L');
            $df->Cell(2);
            $df->Cell(5,1,$cuenta,0,0,'L');

            $df->SetFont('Arial','B',8);
            $df->Ln(3);
            $df->Cell(8);
            $df->Cell(190,3,"Gasto Id     Cta        Scta      Gasto                                            Importe           Fecha        Sucursal                Concepto",0,0,'L',true);
            $df->Ln(1);
            $df->Cell(8);
            $df->Cell(5,1,"________________________________________________________________________________________________________________________",0,0,'L');

            $x++;
        }

        $df->SetFont('Arial','',8);

        $gasto_id	=$fila2[ 0 ];
        $cta		=$fila2[ 1 ];
        $scta		=$fila2[ 2 ];
        $gasto		=$fila2[ 3 ];
        $importe	=$fila2[ 4 ];
        $fecha		=$fila2[ 5 ];
        $sucursal	=$fila2[ 6 ];
        $solicitud_id = $fila2[ 7 ];

        $sql3   ="SELECT concepto FROM solicitud_gasto WHERE id = $solicitud_id";
        $arreglo3 = $funcion->consulta( $sql3 );
        while ( $fila3 = mysqli_fetch_array( $arreglo3 ) )
            $concepto     =$fila3[ 0 ];

        $df->Ln(3.5);
        $df->Cell(12);
        $df->Cell(5,1,$gasto_id,0,0,'L');
        $df->Cell(8);
        $df->Cell(5,1,$cta,0,0,'L');
        $df->Cell(5);
        $df->Cell(5,1,$scta,0,0,'L');
        $df->Cell(4);
        $df->Cell(5,1,substr($gasto,0,20),0,0,'L');
        $df->Cell(47);
        $df->Cell(5,1,"$".number_format($importe,2),0,0,'R');
        $df->Cell(3);
        $df->Cell(5,1,$fecha,0,0,'L');
        $df->Cell(12);
        $df->Cell(5,1,substr($sucursal,0,26),0,0,'L');
        $df->Cell(20);
        $df->Cell(5,1,substr($concepto ,0,30),0,0,'L');

        $total += $importe;
        $concepto = '';
    }

	
    if ($total > 0)
    {
        $totalTotal += $total;

        $df->SetFont('Arial','B',9);
        $df->Ln(4);
        $df->Cell(72);
        $df->Cell(5,1,"Total",0,0,'L');
        $df->Cell(20);
        $df->Cell(5,1,"$".number_format($total,2),0,0,'R');
    }

    $total = 0;
    $x = 0;
	
}
$df->SetFont('Arial','B',10);
$df->Ln(6);
$df->Cell(65);
$df->Cell(5,1,"TOTAL:",0,0,'L');
$df->Cell(30);
$df->Cell(5,1,"$".number_format($totalTotal,2),0,0,'R');

$df->Output();
?>
