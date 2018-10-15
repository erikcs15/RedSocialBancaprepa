<?php
require_once( '../clases/utilidades/Funcion.php' );
$funcion = new Funcion();
$sucursal_id    = $_REQUEST[ 'sucursal_id'];
$fecha_inicial  = $_REQUEST[ 'fecha_inicial' ];
$fecha_final    = $_REQUEST[ 'fecha_final' ];

$sql = "SELECT nomComercial FROM sucursales WHERE id = $sucursal_id";
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
    $sucursal = $fila[ 0 ];

//header('Location: http://www.fundacionamiga.com/');
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=ReporteDesembolsos $sucursal del $fecha_inicial al $fecha_final.xls");
header('Pragma: no-cache');
header('Expires: 0');

?>

<HTML>
<HEAD>
 <TITLE>Reporte Desembolsos</TITLE>
</HEAD>
<BODY>
<?php

echo "DESEMBOLSOS DE $sucursal CON FECHA DEL ".$fecha_inicial ." AL ".$fecha_final;

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
        <td><strong>DISTRIBUIDORA</strong></td>
        <td><strong>ID CTE</strong></td>
        <td><strong>CLIENTE</strong></td>
        <td><strong>FECHA</strong></td>
        <td><strong>QUIN.</strong></td>
        <td><strong>IMPORTE</strong></td>
        <td><strong>SUCURSAL</strong></td>
        <td><strong>HORA</strong></td>
        <td><strong>ESTATUS</strong></td>
        <td><strong>CAPTURISTA</strong></td>
        </tr>
    </thead>
    <tbody>
<?php

$sql="SELECT p_desembolsos.p_distribuidora_id
    , p_distribuidoras.descripcion AS distribuidora
    , p_desembolsos.p_cliente_id
    , p_clientes.descripcion AS cliente
    , p_desembolsos.fecha
    , SUM(capital)/*+SUM(redondeo)*/ AS capital
    , sucursales.nomComercial
    , p_desembolsos.quincenas
    , p_desembolsos.hora 
    , p_desembolsos.capturista_id
    , capturistas.descripcion AS capturista
    , estatus.descripcion AS estatus
    FROM p_desembolsos 
    INNER JOIN p_distribuidoras ON (p_distribuidoras.id = p_desembolsos.p_distribuidora_id) 
    INNER JOIN p_clientes ON (p_clientes.id = p_desembolsos.p_cliente_id) 
    INNER JOIN sucursales ON p_distribuidoras.sucursal_id = sucursales.id 
    INNER JOIN capturistas ON (capturistas.id = p_desembolsos.capturista_id)
    INNER JOIN estatus ON (estatus.id = p_desembolsos.estatus_id)
    WHERE p_desembolsos.entrega_fecha BETWEEN '$fecha_inicial' AND '$fecha_final' 
    AND p_desembolsos.estatus_id IN (2,5)
    AND p_distribuidoras.sucursal_id BETWEEN $sucursal_id AND $sucursal_id2 
    GROUP BY p_cliente_id ORDER BY p_desembolsos.fecha,p_desembolsos.id";
$arreglo = $funcion->consulta( $sql );
while ( $fila = mysqli_fetch_array( $arreglo ) )
{
    $distribuidora_id   = $fila[ 0 ];
    $distribuidora      = $fila[ 1 ];
    $cliente_id         = $fila[ 2 ];
    $cliente            = $fila[ 3 ];
    $fecha              = $fila[ 4 ];
    $capital            = $fila[ 5 ];
    $nomComercial       = $fila[ 6 ];
    $quincenas          = $fila[ 7 ];
    $hora               = $fila[ 8 ];
    $capturista_id      = $fila[ 9 ];
    $capturista         = $fila[ 10 ];
    $estatus            = $fila[ 11 ];

    ?>
    
    <tr>
        <td><?php echo $distribuidora_id ?></td>
        <td><?php echo utf8_decode( $distribuidora ) ?></td>
        <td><?php echo $cliente_id ?></td>
        <td><?php echo utf8_decode( $cliente ) ?></td>
        <td><?php echo $fecha ?></td>
        <td><?php echo $quincenas ?></td>
        <td><?php echo $capital ?></td>
        <td><?php echo $nomComercial ?></td>
        <td><?php echo $hora ?></td>
        <td><?php echo $estatus ?></td>
        <td><?php echo utf8_decode( $capturista ) ?></td>
    </tr>
<?php
    $total += $capital;
    $cont++;
    $capital = 0;
}

?>

    <tr>
        <td><?php echo ""; ?></td>
        <td><?php echo ""; ?></td>
        <td><?php echo ""; ?></td>
        <td><?php echo "$cont Desembolsos"; ?></td>
        <td><?php echo ""; ?></td>
        <td><?php echo "Total:"; ?></td>
    <td><?php echo $total; ?></td>
    </tr>
    </tbody>
</table>

</BODY>
</HTML>
