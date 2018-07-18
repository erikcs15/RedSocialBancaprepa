<!DOCTYPE html>
<html lang="en" >


   
<head>
    
        <meta charset="UTF-8">  
        <title>Sistema Bancaprepa</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="css/bancaprepa.css">
        
</head>
    <body onLoad="cargarPublicaciones()">
    <div id="container" ><!-- CONTENEDOR 1 -->
        <div class="nav-wrapper">
            
        </div>
    
            <?php
                include('menu/menu.php');
            ?>
            
  <div class="col s12">
    <div class="card">
      <div class="card-content todotitle"> <span class="card-title  grey-text text-darken-4">Recent Comments</span>
        </div>
          <ul class="collection" id="cargarPubli">
            
          </ul>
        </div>
       </div>
      </div>
    </div>
  </div>


    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/bancaprepa.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>

    

    
 
    </body>
</html>