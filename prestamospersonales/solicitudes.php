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
        <h3 class="header " align="center" style="color:#1a237e;">Solicitudes de Prestamos Personales</h3> 
      
        <div class="row"><!-- CONTENEDOR 1 -->
            <div class="col s12">
                <table class="highlight">
                    <thead >
                    <tr>
                        <th>Id</th>
                        <th>Nombre del Solicitante</th>
                        <th>Fecha Solicitud</th>
                        <th>Monto Solicitado</th>
                        <th>Monto Autorizado</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                                                         
                    </tr>
                    </thead>

                    <tbody id="tablaSolicitudes">
                        
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

        <!-------------------- Modal para autorizar-------------------------->
    <div id="modalAutorizarPrestamos" class="modal">
           <nav class="teal lighten-1">
               <div class="nav-wrapper">
                   <a href="#!" class="brand-logo">
                       <i class="large material-icons">thumbs_up_down</i>Autorizar Prestamo
                   </a>
               </div>
           </nav>
           <div class="modal-content">
           <h6><b>¿Autorizar Prestamo?</b></h6>
                <div class="switch" onChange="swAutorizar()">
                        <label>
                        No Autorizar
                        <input type="checkbox" id="chAutorizar">
                        <span class="lever"></span>
                        Autorizar
                        </label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <textarea id="txtArea" class="materialize-textarea"></textarea>
                        <label id="textoArea" for="txtArea">Comentario:</label>
                    </div>
                    <div class="input-field col s2">
                        <input id="montoAutorizar" style='display:none;' type="text" class="validate">
                        <label id="textoMontoA" style='display:none;' for="montoAutorizar">Monto a Autorizar</label>
                    </div>
                </div>
           </div>
           <div class="modal-footer">
               <a href="#!" class= " modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>
               <a id="btnAutorizarPrestamo" class="waves-effect waves-light btn teal lighten-1 right"><i class="material-icons left">thumbs_up_down</i>Aceptar</a>
           </div>
    </div>
    </body>
</html>