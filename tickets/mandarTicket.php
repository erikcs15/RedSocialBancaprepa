<!DOCTYPE html>
<html lang="en" >


   
<head>
    
        <meta charset="UTF-8">  
        <title>Mandar Ticket</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bancaprepa.css"> 
        
</head>
<link rel="icon" type="image/png" href="../img/favicon.ico" /> 
    <body onLoad="cargarTicketsPorUsuario()">
    <div id="container" ><!-- CONTENEDOR 1 -->
        <div class="nav-wrapper">
           <?php
                include('../menu/menu.php');
            ?>
        </div>
    
        <h4 class="header " align="center" style="color:#1a237e;">Crear Ticket</h4>
        <div class="row">
            <form class="col s8 offset-s2">
                    <div class="row">
                        <div class="input-field col s6">
                        <i class="material-icons prefix">mode_edit</i>
                            <select id="tituloDD">
                                <option value="" disabled selected>Titulo</option>
                                <option value="1">Creacion de usuarios y/o correos</option>
                                <option value="2">Cancelacion de pagos</option>
                                <option value="3">Cancelacion de desembolsos</option>
                                <option value="4">Soporte</option>
                                <option value="5">Instalacion de impresoras, miniprinters</option>
                                <option value="6">Configuracion de correos</option>
                            </select>
                            <label>Seleccione una opcion</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <textarea id="descripcionTicket" class="materialize-textarea"></textarea>
                            <label for="descripcionTicket">Descripcion</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" class="validate">
                            <label for="email">Email para contacto</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">phone</i>
                            <input id="tel" type="tel" class="validate">
                            <label for="tel">Telefono para contacto</label>
                        </div> 
                       
                        <div class="col s12" align="center">
                            <a id="CrearTicketbtn" class="waves-effect btn blue darken-4"><i class="material-icons left">add</i>Crear Ticket</a>
                        </div>
                       
                    </div>

                   
            </form>
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
                                            <th>Atendido por:</th> 
                                            <th>Estatus</th>                                            
                                        </tr>
                                        </thead>

                                        <tbody id="tablaTicketsGeneral">
                                           
                                        </tbody>
                                    </table>
                                </div><!-- CONTENEDOR 2 -->
                    </div><!-- CONTENEDOR 1 -->
                </div>
            </div>
        </div>
        </div>
        </div>

             
            
            
    
    </div>



    <div id="modalComentariosTicket" class="modal">
           <nav class="blue">
               <div class="nav-wrapper">
                   <a href="#!" class="brand-logo">
                       <i class="large material-icons">comment</i>Comentarios Ticket
                   </a>
               </div>
           </nav>
           <div class="modal-content">
           <div class="card">
            <div  class="card-content" id="cardTicketAdm">
              
            </div>
           </div>
               <form class="col s12 no-padding">
               <div class="input-field col s6">
               <a id="ActualizarMensajesManTicket" class="waves-effect waves-light btn-floating btn-small indigo darken-4 left"><i class="material-icons">autorenew</i></a> <br> <br>
                        Comentario:
                        <textarea id="comentarioTicket" class="materialize-textarea"></textarea> 
                        <a id="btnComentarioTicket" class="waves-effect waves-light btn blue right"><i class="material-icons left">send</i>enviar</a> 
               </div>
               </form>
              
               <div class="s2">
                  <!--  <a id="btnComentarioTicket" class="waves-effect waves-light btn blue right"><i class="material-icons left">delete</i>Aceptar</a> -->
                </div>
           </div>
           <div class="modal-footer">
               <a  class= " modal-action modal-close waves-effect waves-green btn-flat right">Cerrar</a>
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

    
 
    </body>
</html>