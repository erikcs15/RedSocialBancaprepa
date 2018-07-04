<!DOCTYPE html>
<html lang="en" >

<head>
    
        <meta charset="UTF-8">  
        <title>Catalogo de roles</title>
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
                    <h2 class="header">Catalogo de Roles</h2>
                    <hr>
                </div>
            </div>
        </div>      
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
                        <?php
                                include('../menu/menu.php');

                        ?> 
        <div id="content">
            <div class="row"><!-- CONTENEDOR 1 -->
                    <div class="col s12"><!-- CONTENEDOR 2 -->
                            <table class="highlight">
                                <thead>
                                <tr role ="row">
                                    <th>Rol</th>
                                    <th>Estatus</th>
                                    <th>Item Price</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <tr class="odd">
                                        <td>Administrador</td>
                                        <td>Activo</td>
                                        <td class="center">40</td>
                                        <td class="left">
                                            <a class="btn-floating blue"><i class="material-icons">edit</i></a> 
                                            <a href="" class="btn-floating orange darken-3 "><i class="material-icons">do_not_disturb_alt</i></a> 
                                            <a href="" class="btn-floating red accent-4"><i class="material-icons">delete</i></a> 
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>Coordinador</td>
                                        <td>Activo</td>
                                        <td class="center">50</td>
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