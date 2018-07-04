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
    <body>
    
     <div id="container" ><!-- CONTENEDOR 1 -->
        <div class="nav-wrapper">
            <div class="row">
                <div class="col s12 m10 offset-m1">
                    <h3 class="header">Catalogo de Empresas</h3>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col s12">      
            <nav>
                <div class="nav-wrapper">
                <form>
                    <div class="input-field indigo darken-4" >
                    <input id="search" type="search" required>
                    <label class="label-icon" for="search"><i class="material-icons ">search</i></label>
                    <i class="material-icons">close</i>
                    <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal">
                        <i class="material-icons blue darken-3">add</i>
                    </a>
                    </div>
                </form>
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
                                            <th>Nombre de la empresa</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            <tr class="odd">
                                                <td class="left">40</td>
                                                <td>John Doe</td>
                                                <td>Activo</td>
                                                <td class="left">
                                                    <a class="btn-floating blue"><i class="material-icons">edit</i></a> 
                                                    <a href="" class="btn-floating orange darken-3 "><i class="material-icons">do_not_disturb_alt</i></a> 
                                                    <a href="" class="btn-floating red accent-4"><i class="material-icons">delete</i></a> 
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="left">50</td>
                                                <td>Axel Doe</td>
                                                <td>Activo</td>
                                                <td class="left">
                                                    <a class="btn-floating blue"><i class="material-icons">edit</i></a> 
                                                    <a href="" class="btn-floating orange darken-3 "><i class="material-icons">do_not_disturb_alt</i></a> 
                                                    <a href="" class="btn-floating red accent-4"><i class="material-icons">delete</i></a> 
                                                </td>
                                        </tr>
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
    </body>
</html>