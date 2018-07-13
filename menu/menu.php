<div id="menu">
<nav class=" blue darken-4">
                    <div class="nav-wrapper">
                        
                        <a href="#" class="brand-logo"><i class="material-icons">whatshot</i> Intranet Bancaprepa</a>
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
<ul id="slide-out" class="sidenav sidenav-fixed"  style="transform: translateX(-100%);">
              <li><div class="user-view">
                <div class="background">
                  <img src="/RedSocialBancaprepa/img/logo_bancaprepa.png"  style="width: 290px;">
                </div>
                <br>
                <a><span class="black-text name" id="nombreusuario"><i class="small material-icons">account_circle</i><strong>
                  <?php
                   echo $_COOKIE["b_capturista"];
                  ?>
                </strong></span></a>
              </div></li>
              <li><a id="inicio" name ="inicio" class="waves-effect"><i class="material-icons">home</i>Inicio</a></li>
              <li><a href="#!" class="waves-effect"><i class="material-icons">add_circle</i>Agregar publicación</a></li>
              <li><div class="divider"></div></li>
              <li><a class="waves-effect"><i class="material-icons">drafts</i>Mandar ticket</a></li>
              <li><a  name ="salirsesion" class="dropdown-trigger" data-target='dropdown1'><i class="material-icons">format_list_bulleted</i><i class="material-icons right">arrow_drop_down</i>Catalogos</a></li>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                <li><a id="catemp" name ="catemp" ><i class="material-icons">assignment</i>Catalogo de Empresas</a></li>
                <li><a id="catroles" name ="catroles" ><i class="material-icons">assignment</i>Catalogo de Roles</a></li>
                <li><a id="catdoc" name ="catdoc"><i class="material-icons">assignment</i>Tipos de Documento</a></li>
             </ul>
            
    </ul>
</div>

    
<a href="#" data-target="slide-out" class="sidenav-trigger  hide-on-large-only"><i class="material-icons">menu</i></a>