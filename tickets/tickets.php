<!DOCTYPE html>
<html lang="en" >

<head>
    
        <meta charset="UTF-8">  
        <title>Tickets</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bancaprepa.css">
        <link rel="icon" type="image/png" href="../img/favicon.ico" /> 
</head>

    <body onLoad="cargarTickets()">
    
     <div id="container" ><!-- CONTENEDOR 1 -->
     <div class="nav-wrapper">
            <div class="row">
                <div class="nav-wrapper">
                    <?php
                        include('../menu/menu.php');
                    ?> 
                    <h4 class="header " style="color:#1a237e;">Tickets</h4>
                    <hr>
                </div>
            </div>
        </div>
       
        <div class="col s12">
        <div class="card">
            <div class="card-content">
                <div id="content">
                    <div class="row"><!-- CONTENEDOR 1 -->
                            <div class="col s12"><!-- CONTENEDOR 2 -->
                                    <table class="highlight">
                                        <thead >
                                        <tr>
                                            <th>Id</th>
                                            <th>Titulo</th>
                                            <th>Descripcion</th>
                                            <th>Solicitado por:</th>
                                            <th>Atendiendo:</th>
                                            <th>Estatus</th>                                            
                                        </tr>
                                        </thead>

                                        <tbody id="tablaTicketsTodos">
                                           
                                        </tbody>
                                    </table>
                                </div><!-- CONTENEDOR 2 -->
                    </div><!-- CONTENEDOR 1 -->
                </div>
            </div>
        </div>
        </div>
     </div>

     
     <div id="modalAdminTicket" class="modal">
           <nav class="indigo darken-4">
               <div class="nav-wrapper">
                   <a href="#!" class="brand-logo">
                       <i class="large material-icons">comment</i>Comentarios Ticket
                   </a>
               </div>
           </nav>
           <div class="modal-content">
           <div class="input-field col s3">
                        <i class="material-icons prefix">build</i>
                            <select id="EstatusTicketDD">
                               
                            </select>
                            <label>Seleccione una opcion</label>
                            <a id="btnActualizarEstatusticket" class="waves-effect waves-light btn indigo darken-4 right"><i class="material-icons left">autorenew</i>Actualizar</a> 
            </div>
            <br><br>
           <div class="card">
            <div  class="card-content" id="cardTicketAdm">
           
            </div>
           </div>
               <form class="col s12 no-padding">
               <div class="input-field col s6">
               <a id="ActualizarMensajesManTicket" class="waves-effect waves-light btn-floating btn-small indigo darken-4 left"><i class="material-icons">autorenew</i></a> <br> <br>
                        Comentario:
                        <textarea id="comentarioTicketAdm" class="materialize-textarea"></textarea> 
                        <a id="btnComentarioTicketAdm" class="waves-effect waves-light btn indigo darken-4 right"><i class="material-icons left">send</i>enviar</a> 
               </div>
               </form>
              
               <div class="s2">
                  <!--  <a id="btnComentarioTicket" class="waves-effect waves-light btn blue right"><i class="material-icons left">delete</i>Aceptar</a> -->
                </div>
           </div>
           <div class="modal-footer">
               <a class= " modal-action modal-close waves-effect waves-green btn-flat right">Cerrar</a>
           </div>
    </div>

    <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="../js/bancaprepa.js"></script>
    <script type="text/javascript" src="../js/js.cookie.js"></script>
    <script type="text/javascript" src="../js/tickets.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>
   
     <!-------------------- Inicializar modal-------------------------->
    <script>
            $(document).ready(function(){
                 $('.modal').modal();
            });
    </script>
                
    </body>
</html>