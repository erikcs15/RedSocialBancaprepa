<!DOCTYPE html>
<html lang="en" >

<head>
    
        <meta charset="UTF-8">  
        <title>Catalogo de empresas</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bancaprepa.css">
</head>
    <body onLoad="cargarEmpresas()">
    
     <div id="container" ><!-- CONTENEDOR 1 -->
        <div class="nav-wrapper">
            <div class="row">
                <div class="col s12 m10 offset-m1">
                    <h3 class="header " style="color:#1a237e;">Catalogo de Empresas</h3>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col s12">      
            <nav>
                <div class="nav-wrapper">
                    <div class="input-field indigo darken-4" >
                    <input id="busquedaEmpleados" type="search" required>
                    <label class="label-icon" for="search"><i class="material-icons ">search</i></label>
                    <i class="material-icons">close</i>
                    <a class="modal-trigger  btn-floating btn-large waves-effect waves-light red" href="#AgregarEmpresa">
                        <i class="material-icons blue darken-3">add</i>
                    </a>
                    
                    </div>
                </div>
            </nav>
        </div>
            <?php
                 include('../menu/menu.php');
            ?> 
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
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>

                                        <tbody id="tablaemp">
                                           
                                        </tbody>
                                    </table>
                                </div><!-- CONTENEDOR 2 -->
                    </div><!-- CONTENEDOR 1 -->
                </div>
            </div>
        </div>
        </div>
     </div>

                  

    <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="../js/bancaprepa.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>
    <div id=AgregarEmpresa class="modal open" style="z-index: 1003; display: block; opacity: 1; transform: scaleX(1) top: 10%">
                        <nav class="red">
                            <div class="nav-wrapper">
                                <a href="#!" class="brand-logo"><i class="material-icons">add</i>Agregar Empresa</a>
                            </div>
                        </nav>
                        <div class="model-content">
                            <form class="col s12 no-padding">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input placeholder="Nombre de la Empresa" id="nombreEmp" type="text" class="validate">
                                        <label for="Nombre de la Empresa" class="active"></label>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
    </body>
</html>