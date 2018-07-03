<div id="menu">
<ul id="slide-out" class="sidenav sidenav-fixed" style="transform: translateX(-100%);">
              <li><div class="user-view">
                <div class="background">
                  <img src="/RedSocialBancaprepa/img/logo_bancaprepa.png"  style="width: 290px;">
                </div>
                <br>
                <a><span class="black-text name" id="nombreusuario"><strong>
                  <?php
                   echo $_COOKIE["b_capturista"];
                  ?>
                </strong></span></a>
              </div></li>
              <li><a id="inicio" name ="inicio" class="waves-effect"><i class="material-icons">home</i>Inicio</a></li>
              <li><a href="#!" class="waves-effect"><i class="material-icons">add_circle</i>Agregar publicación</a></li>
              <li><div class="divider"></div></li>
              <li><a class="waves-effect"><i class="material-icons">message</i>Mandar ticket</a></li>
              <li><a  name ="salirsesion" class="dropdown-trigger" data-target='dropdown1'><i class="material-icons">assignment</i><i class="material-icons right">arrow_drop_down</i>Catalogos</a></li>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                <li><a id="catemp" name ="catemp" ><i class="material-icons">assignment</i>Catalogo de Empresas</a></li>
                <li><a id="catroles" name ="catroles" ><i class="material-icons">assignment</i>Catalogo de Roles</a></li>
                <li><a id="catdoc" name ="catdoc"><i class="material-icons">assignment</i>Tipos de Documento</a></li>
             </ul>
             <li><a id="salirsesion" name ="salirsesion" class="waves-effect"><i class="material-icons">settings_power</i>Cerrar sesión</a></li>
    </ul>
</div>

    
<a href="#" data-target="slide-out" class="sidenav-trigger  hide-on-large-only"><i class="material-icons">menu</i></a>