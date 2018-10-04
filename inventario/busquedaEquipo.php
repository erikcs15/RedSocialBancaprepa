<!DOCTYPE html>
<html lang="en" >

   
<head>
    
        <meta charset="UTF-8">  
        <title>Busqueda de Equipo</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bancaprepa.css"> 
        
</head>
<link rel="icon" type="image/png" href="/img/favicon.ico" /> 
    <body onLoad="busquedaEquipo()">
    <div id="container" ><!-- CONTENEDOR 1 -->
        <div class="nav-wrapper">
           <?php
                include('../menu/menu.php');
            ?>
        </div>
    
        <h4 class="header " align="center" style="color:#1a237e;">Captura de Inventario</h4>
        <div class="row">
                <div class="row">
                    <div class="input-field col s2 offset-s2 ">
                                    <i class="material-icons prefix">laptop_chromebook</i>
                                    <textarea id="id_equipo" class="materialize-textarea"></textarea>
                                    <label for="id_equipo">Id equipo</label>
                    </div>
                    <div class="input-field col s3 ">
                            <i class="material-icons prefix">business</i>
                            <select id="sucursalesdd">
                            </select>
                            <label>Sucursal</label>
                    </div>
                    <div class="input-field col s3">
                                    <i class="material-icons prefix">laptop_chromebook</i>
                                     <select id="tiposequipos">
                                    </select>
                                    <label>Tipo de equipo</label>
                     </div>
                </div>
                    <div class="col s12" align="center">
                            <a id="BtnBusquedaEquipo" class="waves-effect btn blue darken-4"><i class="material-icons left">search</i>Buscar</a>
                    </div>  
            </div>
        </div>


        
        <div class="card">
            <div class="card-content">
                <div id="container">
                    <div class="row"><!-- CONTENEDOR 1 -->
                            <div class="col s12 "><!-- CONTENEDOR 2 -->
                                    <table class="highlight">
                                        <thead >
                                        <tr>
                                            <th>Id</th>
                                            <th>Sucursal</th>
                                            <th>Descripcion</th>
                                            
                                            <th>Estatus</th>
                                            <th>Tipo</th>
                                        </tr>
                                        </thead>

                                        <tbody id="tablaEquipos">
                                           
                                        </tbody>
                                    </table>
                            </div><!-- CONTENEDOR 2 -->
                    </div><!-- CONTENEDOR 1 -->
                </div>
            </div>
        </div>
        

        
        
      

    <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="../js/bancaprepa.js"></script>
    <script type="text/javascript" src="../js/js.cookie.js"></script>
    <script type="text/javascript" src="../js/equipo.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script> 

    
 
    </body>
</html>