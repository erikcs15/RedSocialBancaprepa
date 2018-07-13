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
            <nav class=" blue darken-4">
                    <div class="nav-wrapper">
                        
                        <a href="#" class="brand-logo"><i class="material-icons">whatshot</i> Red Social Bancaprepa</a>
                        <ul class="right hide-on-med-and-down">
                            <li> <a class='dropdown-button waves-effect waves-dark' href='#' data-activates='dropdown_message'><i class="material-icons">notifications_active</i><span class="counts">9+</span></a>
                            <ul id='dropdown_message' class='dropdown-content messages collection'>
                                <!--<li class="collection-item"> <img src="/RedSocialBancaprepa/img/pic2.png" alt="" class="circle"> <span class="title">Max Smith</span>
                                    <p>Last Updated: 2:00 AM<br>
                                    <b>Author: maxartkiller.in</b> </p>
                                </li>
                                <li class="collection-item avatar"> <i class="material-icons circle">folder</i> <span class="title">Photos</span>
                                <p>Last Updated: 2:00 AM<br>
                                    <b>Author: maxartkiller.in</b> </p>
                                </li>
                                <li class="collection-item avatar"> <i class="material-icons circle green">insert_chart</i> <span class="title">Analytics</span>
                                <p>Last Updated: 2:00 AM<br>
                                    <b>Author: maxartkiller.in</b> </p>
                                </li>
                                <li class="collection-item avatar"> <i class="material-icons circle red">play_arrow</i> <span class="title">Play it now!</span>
                                <p>Last Updated: 2:00 AM<br>
                                    <b>Author: maxartkiller.in</b> </p>
                                </li>
                                <li class="collection-item center-align"> View all </li>-->
                            </ul>
                            </li>
                            <li> <a class='dropdown-button waves-effect waves-dark' href='#' data-activates='dropdown_task'><i class="material-icons">message</i><span class="counts">9+</span></a>
                            <ul id='dropdown_task' class='dropdown-content listitems collection'>
                                <li class="collection-item row">
                                <div class="col s2"> <img src="/RedSocialBancaprepa/img/pic2.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class --> 
                                </div>
                                <div class="col s10"> <span class="black-text"> This is best ever template we have seen and it will remain our first choice to select.<br>
                                    <small>12:00 am</small> </span> </div>
                                </li>
                                <li class="collection-item row">
                                <div class="col s2"> <img src="../img/pic2.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class --> 
                                </div>
                                <div class="col s10"> <span class="black-text">This is best ever template we have seen and it will remain our first choice to select.<br>
                                    <small>12:00 am</small> </span> </div>
                                </li>
                                <li class="collection-item row">
                                <div class="col s2"> <img src="../img/pic2.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class --> 
                                </div>
                                <div class="col s10"> <span class="black-text">This is best ever template we have seen and it will remain our first choice to select.<br>
                                    <small>12:00 am</small> </span> </div>
                                </li>
                                <li class="collection-item center-align"> View all </li>
                            </ul>
                            </li>
                            <ul id="dropdownCuenta" class="dropdown-content">
                                <li class="divider"></li>
                                <li><a href="#!"><i class="material-icons right">account_circle</i>Cuenta</a></li>
                                <li><a id="salirsesion" name ="salirsesion" class="waves-effect">Cerrar sesión<i class="material-icons">settings_power</i></a></li>
                               
                            </ul>
                            <li><a class="dropdown-trigger" href="#!" data-target="dropdownCuenta"><i class="material-icons right">account_circle</i></a></li>
                            
                    </div>
            </nav>
            
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