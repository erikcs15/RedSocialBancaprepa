<!DOCTYPE html>
<html lang="en" >

<head>
    
        <meta charset="UTF-8">  
        <title>Accesos</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bancaprepa.css">
</head>
    <body onLoad="cargarDoc()">
    
     <div id="container" ><!-- CONTENEDOR 1 -->
            <div class="nav-wrapper">
                <div class="row">
                    <div class="nav-wrapper">
                        <?php
                            include('../menu/menu.php');
                        ?> 
                        <h4 class="header " style="color:#1a237e;">Accesos</h4>
                        <hr>
                    </div>
                </div>
            </div>
          
            <div class="row">
                    <div class='input-field col s4'>
                            <select id="tipoRolAc" onChange="cargarAccesos(tipoRolAc.value)"> 
                            </select>
                            <label><strong>Seleccione el Rol:</strong></label>
                    </div>
                    <div class=' col s6' id="accesosRol">
                   
                        
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
     <!-------------------- Inicializar modal-------------------------->
    <script>
            $(document).ready(function(){
                 $('.modal').modal();
            });
    </script>
                
    </body>
</html>