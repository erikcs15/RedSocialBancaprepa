<!DOCTYPE html>
<html lang="en" >

<head>
    
        <meta charset="UTF-8">  
        <title>Usuarios</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bancaprepa.css">
</head>
    <body onLoad="cargarUsuariosT()">
    
     <div id="container" ><!-- CONTENEDOR 1 -->
        <div class="nav-wrapper">
            <div class="row">
                <div class="nav-wrapper">
                <?php
                 include('../menu/menu.php');
                 ?> 
                
                    <h4 class="header " style="color:#1a237e;">Usuarios</h4>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col s12">      
            <nav>
                <div class="nav-wrapper">
                    <div class="input-field indigo darken-4" >
                        <input id="busquedaUsuarios" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons ">search</i></label>
                        <i class="material-icons">close</i>
                        
                    </div>
                </div>
            </nav>
        </div>
          
        <div class="col s12">
        <div class="card">
            <div class="card-content">
                <div id="content">
                    <div class="row"><!-- CONTENEDOR 1 -->
                            <div class="col s12"><!-- CONTENEDOR 2 -->
                                    <table class="highlight">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th>Estatus</th>
                                        </tr>
                                        </thead>

                                        <tbody id="tablaUsuarios">
                                           
                                        </tbody>
                                    </table>
                                </div><!-- CONTENEDOR 2 -->
                    </div><!-- CONTENEDOR 1 -->
                </div>
            </div>
        </div>
    </div>

                  

    <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="../js/bancaprepa.js"></script>
    <script type="text/javascript" src="../js/js.cookie.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>                
    </body>
</html>