<!DOCTYPE html>
<html lang="en" >


   
<head>
    
        <meta charset="UTF-8">  
        <title>Sistema Bancaprepa</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="css/bancaprepa.css"> 
        
</head>
    <body onLoad="cargarPublicacionesB()">
    <div id="container" ><!-- CONTENEDOR 1 -->
        <div class="nav-wrapper">
            
        </div>
    
            <?php
                include('menu/menu.php');
            ?>

              <nav class="nav-extended ">
       
                <div class="nav-content">
                    <center>
                    <ul id='tipoPublicacion' class="tabs tabs-transparent">
                    
                    </ul>
                    </center>
                </div>
                </nav>
            <div class="row">
                

                 <div class="col s8 offset-s2" >

                    <div class="card ">
                            <div class="card-image waves-effect waves-block waves-light">
                            <iframe src="imagenes/publicaciones/GENERAL PRESICO SINALOA NORTE.pdf"  class="col s12" style="border: none;height:700px"></iframe>
                                </div>
                                <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                                <p><a href="#">This is a link</a></p>
                                </div>
                                <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Card Title</span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>
                    </div>

                 </div>

                 <div class="col s8 offset-s2" >

<div class="card ">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="imagenes/publicaciones/p.jpg">
            </div>
            <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
            <p><a href="#">This is a link</a></p>
            </div>
            <div class="card-reveal">
            <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Card Title</span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
    </div>
</div>

</div>


               

                
                 
            </div>
               
                    
     

 
 

    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/bancaprepa.js"></script>
    <script type="text/javascript" src="js/js.cookie.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script> 

    
 
    </body>
</html>