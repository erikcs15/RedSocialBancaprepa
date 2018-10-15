<?php
require_once( '../clases/utilidades/Funcion.php' );
$funcion = new Funcion();
$sucursal_id 	= $_REQUEST[ 'sucursal_id'];
$fecha_inicial 	= $_REQUEST[ 'fecha_inicial' ];
$fecha_final 	= $_REQUEST[ 'fecha_final' ];

$sql = "SELECT nomComercial FROM sucursales WHERE id = $sucursal_id";
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
    $sucursal = $fila[ 0 ];

//header('Location: http://www.fundacionamiga.com/');
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Reporte Gastos $sucursal del $fecha_inicial al $fecha_final.xls");
header('Pragma: no-cache');
header('Expires: 0');

 

?>

<HTML>
<HEAD>
 <TITLE>Reporte de Gastos</TITLE>
</HEAD>
<BODY>
<?php

echo "GASTOS DE $sucursal CON FECHA DEL ".$fecha_inicial ." AL ".$fecha_final;

$sucursal_id2 = $sucursal_id;
if($sucursal_id == 0 || empty ($sucursal_id))
{
    $sucursal_id   = 1;
    $sucursal_id2  = 999;
}
?>
<table>
    <thead>
        <tr>
        <td><strong>ID</strong></td>
        <td><strong>CTA</strong></td>
        <td><strong>SCTA</strong></td>
        <td><strong>GASTO</strong></td>
        <td><strong>IMPORTE</strong></td>
        <td><strong>FECHA</strong></td>
        <td><strong>SUCURSAL</strong></td>
        <td><strong>CONCEPTO</strong></td> 
        </tr>
    </thead>
    <tbody>
<?php

$sql="SELECT gastos.id,cta,scta,gastos.descripcion,p_gastos.importe,p_gastos.fecha,sucursales.nomComercial,p_gastos.solicitud_id FROM gastos 
         
        INNER JOIN p_gastos ON p_gastos.gasto_id=gastos.id
        INNER JOIN sucursales_gastos ON gastos.id = sucursales_gastos.gasto_id
        INNER JOIN sucursales ON sucursales.id = p_gastos.sucursal_id AND scta BETWEEN 1 AND 99999
        WHERE p_gastos.sucursal_id BETWEEN $sucursal_id and $sucursal_id2 AND p_gastos.fecha BETWEEN '$fecha_inicial' AND '$fecha_final'  GROUP BY p_gastos.id
        ORDER BY cta,scta,fecha"; 
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
{
        $gasto_id	=$fila[ 0 ];
        $cta		=$fila[ 1 ];
        $scta		=$fila[ 2 ];
        $gasto		=$fila[ 3 ];
        $importe	=$fila[ 4 ];
        $fecha		=$fila[ 5 ];
        $sucursal	=$fila[ 6 ];
        $solicitud_id = $fila[ 7 ];
        


        $sql4   ="SELECT descripcion FROM gastos WHERE cta=$cta AND scta=0";
            $arreglo4 = $funcion->consulta( $sql4 );
            while ( $fila4 = mysqli_fetch_array( $arreglo4 ) )
                $cuenta     =$fila4[ 0 ];

        if($solicitud_id==0){
            $concepto ='NOMINA';
        }
        else
        {
            $sql3   ="SELECT concepto FROM solicitud_gasto WHERE id = $solicitud_id";
            $arreglo3 = $funcion->consulta( $sql3 );
            while ( $fila3 = mysqli_fetch_array( $arreglo3 ) )
                $concepto     =$fila3[ 0 ];
        }

    ?>
    
    <tr>
        <td><?php echo $gasto_id ?></td>
        <td><?php echo  $cuenta ?></td>
        <td><?php  ?></td>
        <td><?php echo  $gasto ?></td>
        <td><?php echo $importe ?></td>
        <td><?php echo $fecha ?></td>
        <td><?php echo $sucursal ?></td>
        <td><?php echo $concepto ?></td> 
    </tr>
<?php
    $total += $importe;
        $concepto = '';
}

?>

    <tr>
        <td><?php echo ""; ?></td>
        <td><?php echo ""; ?></td>
        <td><?php echo ""; ?></td>  
        <td><?php echo "Total:"; ?></td>
    <td><?php echo $total; ?></td>
    </tr>
    </tbody>
</table>

</BODY>
</HTML>
