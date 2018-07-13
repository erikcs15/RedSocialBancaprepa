<!DOCTYPE html>
<html lang="en" >


   
<head>
    
        <meta charset="UTF-8">  
        <title>Sistema Bancaprepa</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="css/bancaprepa.css">
</head>
    <body>
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
          <ul class="collection">
            <li class="collection-item avatar"> <img src="/RedSocialBancaprepa/img/pic2.png" alt="" class="circle"> <span class="title">Maxa Smith</span>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </li>
            <li class="collection-item avatar"> <img src="/RedSocialBancaprepa/img/pic2.png" alt="" class="circle"> <span class="title">John De</span>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </li>
            <li class="collection-item avatar"> <img src="/RedSocialBancaprepa/img/pic2.png" alt="" class="circle"> <span class="title">Rockstar</span>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </li>
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