<?php

include_once "../clases/utilidades/ClassXmlArray.php";
include_once "../clases/Sucursal.php";
//include_once "utilidades/Base.php";
$xml = new ClassXmlArray();
$obj = new Sucursal();

$conexion = mysql_connect("mysql.fundacionamiga.com.mx","sergioaviles","26011965.,cienega");
mysql_select_db("dbmontepio", $conexion);
    //Coneccion Local
    //$conexion = mysql_connect("localhost","root","");
    //mysql_select_db("montepio", $conexion);



class Sucursal extends Base
{
    /**
     * Cargar los métodos para la intección con la base de datos 
     * y otros que utilitarios.
     */
    public function __construct() 
    {
        parent::__construct();
    }


    
    function DateAdd2($givendate,$day=0,$mth=0,$yr=0) 
    {
      $cd = strtotime($givendate);
      $newdate = date('Y-m-d', mktime(date('h',$cd), //$newdate = date('Y-m-d h:i:s', mktime(date('h',$cd),
      date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
      date('d',$cd)+$day, date('Y',$cd)+$yr));
      return $newdate;
    }
    function procesos()
    {
        set_time_limit(0);

        $opcion = 21;
        $sucursal_id = 19;
        $fecha=  date("Y-m-d");
        //$fecha =  '2013/12/04';

        $fecha2=DateAdd2($fecha,-1);
        //$fecha2=$this->DateAdd2($fecha,-1);
        echo "$fecha2";
        $sql = "SELECT grupo_id,grupos.vuelta,numPago,cliente_id FROM detalles_corridas 
        INNER JOIN grupos ON(grupos.id = detalles_corridas.grupo_id)
        WHERE fecha = '$fecha2' AND detalles_corridas.estatus_id=1
        AND grupos.vuelta = detalles_corridas.vuelta  
        GROUP BY grupo_id ORDER BY grupo_id ";
        echo "$sql";
        $arreglo=mysql_query($sql,$conexion);
        while ( $row = mysql_fetch_array( $arreglo ) )
        //$arreglo = $this->consulta( $sql );
        //$row = mysqli_fetch_array( $arreglo );
        {
            $grup   =   $row[ 0 ];
            
            $sql2="INSERT INTO procesos_grupos (fecha,grupo_id) VALUES ('$fecha2',$grup)"; 
            $rs2 = mysql_query($sql2, $conexion);
            //$fila = $this->filasAfectadas( $sql2 ); 

            echo "Sii llego";
            //return;
           //procesarIntereses($sucursal_id, $fecha,$grup);
            echo $xml->arrXml( $obj->procesarIntereses( TRUE ) );
            $this->procesarIntereses($sucursal_id, $fecha,$grup);
            
            $sql2 = "SELECT proceso FROM procesos_grupos WHERE grupo_id = $grup";
            $arreglo2=mysql_query($sql2,$conexion);
            while ( $fila2 = mysql_fetch_array( $arreglo2 ) )
            //$arreglo2 = $this->consulta( $sql2 );
            //$fila2 = mysqli_fetch_array( $arreglo2 );
                $proceso  = $fila2[ 0 ];

            if ($proceso == 'N') 
            {
                echo "Ocurrio un problema, el grupo $grup no se le genero el proceso </br>";
            }


        echo "Proceso Finalizado";
        //echo " $sql </br>";
        //echo " Grupo $grup </br>";
        //
        }

        }
}
?>
