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
                        <th>Quincenas</th>
                        <th>Monto Autorizado</th>
                        <th>Descuento Mensual</th>
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
                        Comentario:
                        <textarea id="txtArea" class="materialize-textarea"></textarea> 
                    </div>
                    <div class="input-field col s2">
                        Monto:
                        <input id="montoAutorizar" style='display:none;' type="text" class="validate">
                        
                    </div>
                    <div class="col s2">
                        <br>
                        <br>
                        <a id="btnAutorizarPrestamo" class="waves-effect waves-light btn teal lighten-1 right"><i class="material-icons left">thumbs_up_down</i>Autorizar</a>
                    </div>
                </div>
                <div class="row">
                <div class="col s12" id="cargarArchivoSolicitud"  style='display:none;'>

                </div>
                </div>
           </div>
           <div class="modal-footer">
               <a href="#!" class= " modal-action modal-close waves-effect waves-green btn-flat right">Cancelar</a>
               
           </div>
    </div>
    
    <div id="modalinfoPrestamo" class="modal">
           <nav class="teal lighten-1">
               <div class="nav-wrapper">
                   <a href="#!" class="brand-logo">
                       <i class="large material-icons">comment</i>Información del Prestamo
                   </a>
               </div>
           </nav>
           <div class="modal-content">
                <div class="row">
                    <div class="input-field col s6">
                        <h7>Comentarios:</h7>
                        <textarea id="textoAreaInfo" class="materialize-textarea" disabled></textarea>
                    </div>
                    <div class="input-field col s3">
                        <h7 id="texto_monto_autorizado" style='display:none;'>Monto autorizado:</h7>
                        <input id="textoMontoAInfo" style='display:none;' type="text" class="validate" disabled>
                    </div>
                    <div class="col s12">
                        <table class="highlight">
                            <thead >
                            <tr>
                                <th>Numero de pago</th>
                                <th>Cantidad</th>
                                <th>Fecha de pago</th>
                                <th>Abonado</th>                                 
                            </tr>
                            </thead>

                            <tbody id="tablaCorrida">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
           </div>
           <div class="modal-footer">
               <a href="#!" class= " modal-action modal-close waves-effect waves-green btn-flat left">Cerrar</a>
           </div>
    </div>
    </body>
</html>