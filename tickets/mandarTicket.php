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
    <body onLoad="cargarMenuPorRol()">
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
                            <i class="material-icons prefix">business</i>
                            <select id="areaApoyo">
                            <option value="" disabled selected>Area</option>
                            <option value="1">Sistemas</option>
                            <option value="2">Credito</option>
                            <option value="3">Cartera</option>
                            <option value="4">Call Center</option>
                            </select>
                            <label>Seleccione el area del cual necesita apoyo:</label>
                        </div>
                    </div>
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
                        <div class="col s6">
                            <!-- selección única -->
                            <select name="miselect" class="chosen" data-placeholder="Elige un color">
                            <option value=""></option>
                            <option value="azul">Azul</option>
                            <option value="amarillo">Amarillo</option>
                            <option value="blanco">Blanco</option>
                            <option value="gris">Gris</option>
                            <option value="marron">Marrón</option>
                            <option value="naranja">Naranja</option>
                            <option value="negro">Negro</option>
                            <option value="rojo">Rojo</option>
                            <option value="verde">Verde</option>
                            <option value="violeta">Violeta</option>
                            </select>

                        </div>
                        <div class="col s12" align="center">
                            <a id="CrearTicketbtn" class="waves-effect btn blue darken-4"><i class="material-icons left">add</i>Crear Ticket</a>
                        </div>
                       
                    </div>

                   
            </form>
        </div>

             
            
            
    
    </div>

    <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="../js/bancaprepa.js"></script>
    <script type="text/javascript" src="../js/js.cookie.js"></script>
    <script type="text/javascript" src="../js/chosen.jquery.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script> 

    
 
    </body>
</html>