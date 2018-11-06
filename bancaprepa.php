<!DOCTYPE html>
<html lang="en" >


   
<head>
    
        <meta charset="UTF-8">  
        <title>Intranet Bancaprepa</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="css/bancaprepa.css"> 
        
</head>
<link rel="icon" type="image/png" href="/img/favicon.ico" /> 
    <body onLoad="cargarPublicacionesB()">
    <div id="container" ><!-- CONTENEDOR 1 -->
        <div class="nav-wrapper">
            
        </div>
    
            <?php
                include('menu/menu.php');
            ?>

              <nav class="nav-extended " style="margin:0">
       
                <div class="nav-content blue darken-4" style="margin:0">
                    <center>
                    <ul id='tipoPublicacion' class="tabs blue darken-4" style="margin:0" >
                    
                    </ul>
                    </center>
                </div>
                </nav>

               <div  class="container ">
                   <div class="row" id="CargarPublicacionesFinal">

                    </div>
                </div>

            <!--div id="miniPublicaciones" class="container ">
                
                <div class="row" >
                     <div class="col l3 mb-5" style="border:1px black solid"><a class="modal-trigge" onclick="abrirModalImg(1)"  href="#"><img class="mosaico" src="/RedSocialBancaprepa/img/pdf.png"></a>
                    <b> <p class="break-word" style="width: 100%;">TITULOssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</p></b>
                 </div>  
                   
                </div>
                 
                
            </div-->
            
            
    
    </div>

      <!-- Modal Structure -->
  <div id="modalImg" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
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
             $('.modal').modal();
        });
    </script> 

    
 
    </body>
</html>