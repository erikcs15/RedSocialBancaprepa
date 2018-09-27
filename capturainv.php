<!DOCTYPE html>
<html lang="en" >


   
<head>
    
        <meta charset="UTF-8">  
        <title>Mandar Ticket</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="css/bancaprepa.css"> 
        
</head>
<link rel="icon" type="image/png" href="/img/favicon.ico" /> 
    <body onLoad="capturainv()">
    <div id="container" ><!-- CONTENEDOR 1 -->
        <div class="nav-wrapper">
           <?php
                include('menu/menu.php');
            ?>
        </div>
    
        <h4 class="header " align="center" style="color:#1a237e;">Captura de Inventario</h4>
        <div class="row">
                <div class="row">
                    <div class="input-field col s4 offset-s2">
                            <i class="material-icons prefix">business</i>
                            <select id="sucursalesdd">
                            </select>
                            <label>Sucursal</label>
                    </div>
                        <div class="input-field col s4">
                        <i class="material-icons prefix">laptop_chromebook</i>
                            <select id="tiposequipos">
                            </select>
                            <label>Tipo de Equipo</label>
                        </div>
                </div>
                <div class="row">
                                <div class="input-field col s2 offset-s2">
                                    <i class="material-icons prefix">description</i>
                                    <textarea id="num_equipo" class="materialize-textarea"></textarea>
                                    <label for="icon_prefix2"># de Equipo</label>
                                </div>
                                <div class="input-field col s6">
                            <i class="material-icons prefix">description</i>
                            <textarea id="descripcion" class="materialize-textarea"></textarea>
                            <label for="icon_prefix2">Descripcion</label>
                        </div>
                </div>
                <div class="row">
                        <div class="input-field col s2 offset-s2">
                            <i class="material-icons prefix">description</i>
                            <textarea id="marca" class="materialize-textarea"></textarea>
                            <label for="icon_prefix2">Marca</label>
                        </div>
                        
                        <div class="input-field col s3">
                            <i class="material-icons prefix">description</i>
                            <textarea id="modelo" class="materialize-textarea"></textarea>
                            <label for="icon_prefix2">Modelo</label>
                        </div>
                        <div class="input-field col s3">
                            <i class="material-icons prefix">description</i>
                            <textarea id="serie" class="materialize-textarea"></textarea>
                            <label for="icon_prefix2">Serie</label>
                        </div>
                </div>
                <div class="row">
                    <div class="input-field col s5 offset-s2">
                            <i class="material-icons prefix">date_range</i>
                            <input id="fecha_compra" type="date" class="validate">
                    </div>
                    <div class=' col s1 offset-s1'>
                        <p><label><input type="checkbox" checked="checked" id="estatus"/><span>Estatus</span></label></p>
                    </div>
                </div>
                    <div class="col s12" align="center">
                            <a id="btnCrearinvequipo" class="waves-effect btn blue darken-4"><i class="material-icons left">add</i>Añadir</a>
                    </div>  
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/bancaprepa.js"></script>
    <script type="text/javascript" src="js/js.cookie.js"></script>
    <script type="text/javascript" src="js/equipo.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script> 

    
 
    </body>
</html>