<!DOCTYPE html>
<html lang="en" >
    <head>
        
            <meta charset="UTF-8">  
            <title>Agenda de Actividades</title>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
            <link rel="stylesheet" type="text/css" href="../css/bancaprepa.css"> 
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
            
    </head>
    <link rel="icon" type="image/png" href="/img/favicon.ico" /> 
    <body onload="cargarGruposXid()">
        <div id="container" ><!-- CONTENEDOR 1 -->
            <div class="nav-wrapper">
            <?php
                    include('../menu/menu.php');
                ?>
            </div>
            <h3 class="header " align="center" style="color:#1a237e;">Agenda de Actividades</h3> 

            <div class="row">
                <div class="col l10 s12 offset-l1" >
                    <ul class="collapsible expandable" id="c_grupos">
                       
                    </ul>
                </div>
            </div>

            
        </div>
        <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/ajax.js"></script>
        <script type="text/javascript" src="../js/bancaprepa.js"></script>
        <script type="text/javascript" src="../js/js.cookie.js"></script>
        <script type="text/javascript" src="../js/fondoAhorro.js"></script>
        <script type="text/javascript" src="../js/gruposTrabajo.js"></script>

        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
            });
        </script> 

        <div id="modalCrearActividad" class="modal">
                <nav class="indigo darken-4">
                    <div class="nav-wrapper">
                        <a href="#!" class="brand-logo">
                            <i class="large material-icons">add</i>Crear Actividad
                        </a>
                    </div>
                </nav>
                <div class="modal-content">
                           
                </div>
                <div class="modal-footer">
                    <a href="#!" class= " modal-action modal-close waves-effect waves-green btn-flat left">Cerrar</a>
                </div>
        </div>
    
    </body>
</html>