<!DOCTYPE html>
<html lang="en" >

   
    <head>
        
            <meta charset="UTF-8">  
            <title>Solicitudes de prestamos</title>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
            <link rel="stylesheet" type="text/css" href="../css/bancaprepa.css"> 
            
    </head>
    <link rel="icon" type="image/png" href="/img/favicon.ico" /> 
    <body onload="cargarSolicitud()">
    <div id="container" ><!-- CONTENEDOR 1 -->
        <div class="nav-wrapper">
           <?php
                include('../menu/menu.php');
            ?>
        </div>
        <h3 class="header " align="center" style="color:#1a237e;">Solicitud de Prestamo Personal</h3> 
      
        <div class="row"><!-- CONTENEDOR 1 -->
            <div class="col s12">
                <table class="highlight">
                    <thead >
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Fecha Solicitud</th>
                        <th>Monto Solicitado</th>
                        <th>Monto Total a Pagar</th>
                        <th>Descuento quincenal</th>
                        <th>Estatus</th>
                        <th>Fecha Autorizado</th>
                        <th>Persona que autorizo</th>                                       
                    </tr>
                    </thead>

                    <tbody id="tablaSolicitudPrestamo">
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>        

        <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/ajax.js"></script>
        <script type="text/javascript" src="../js/bancaprepa.js"></script>
        <script type="text/javascript" src="../js/js.cookie.js"></script>
        <script type="text/javascript" src="../js/equipo.js"></script>
        <script type="text/javascript" src="../js/prestamos.js"></script>

        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
            });
        </script> 
    </body>
</html>