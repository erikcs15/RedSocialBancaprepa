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
     
        <center><h5>Catalogo Empresas</h5></center>
        <hr>
        <nav>
            <div class="nav-wrapper">
            <form>
                <div class="input-field">
                <input id="search" type="search" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
                <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal">
                    <i class="material-icons">add</i>
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
                                <tr>
                                    <th>Nombre de la empresa</th>
                                    <th>Estatus</th>
                                    <th>Item Price</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>Alvin</td>
                                    <td>Eclair</td>
                                    <td>$0.87</td>
                                </tr>
                                <tr>
                                    <td>Alan</td>
                                    <td>Jellybean</td>
                                    <td>$3.76</td>
                                </tr>
                                <tr>
                                    <td>Jonathan</td>
                                    <td>Lollipop</td>
                                    <td>$7.00</td>
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