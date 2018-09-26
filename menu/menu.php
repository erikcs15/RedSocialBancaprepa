<?php
if(is_null($_COOKIE["b_capturista"]) || empty($_COOKIE["b_capturista"]) || is_null($_COOKIE["b_capturista"])){
       // header('http://wwww.intranet.bancaprepa.com/login.html');
     echo "<script> window.location='http://www.intranet.bancaprepa.com/login.html'; </script>";
}

?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<div id="menu" style="margin:0;border:0px">
<nav class=" blue darken-4" style="margin:0;border:0px">
                    <div class="nav-wrapper">
                        
                        <a href="#" class="brand-logo"><i class="material-icons">grain</i>Intranet Bancaprepa</a>
                    
                        <ul class="right hide-on-med-and-down">
                            <li><span id="btnNotiF" class="counts white-text"></span> <a class='dropdown-button waves-effect waves-dark' href='#' data-activates='dropdown_message'><i id="iconNotiF" class="material-icons">notifications_active</i> </a>
                            <ul id="dropdownNotificacion" class="dropdown-content">
                               
                                
                            </ul>
                            
                            <ul id="dropdownCuenta" class="dropdown-content">
                                <li class="divider"></li>
                                <li><a href="#!"><i class="material-icons right">account_circle</i><?php
                                echo $_COOKIE["b_capturista"];
                                ?></a></li>
                                <li><a id="btnCerrarSession" name ="salirsesion" class="waves-effect">Cerrar sesión<i class="material-icons">settings_power</i></a></li>
                               
                            </ul>
                            <li><a class="dropdown-trigger" href="#!" data-target="dropdownCuenta"><i class="material-icons left">account_circle</i>
                            <?php
                                echo $_COOKIE["b_capturista"];
                                ?>
                            </a></li>
                            
                    </div>
            </nav>


<ul id="slide-out" class="sidenav sidenav-fixed"  style="transform: translateX(-100%);">
              <li><div class="user-view">
                <div class="background">
                  <img src="/RedSocialBancaprepa/img/logo_bancaprepa.png"  style="width: 250px;">
                </div>
                <br>  
            

              <li><a id="m_inicio" name ="inicio" class="waves-effect" ><i class="material-icons">home</i>Inicio</a></li>
              <li><a href="/RedSocialBancaprepa/bancaprepa.php" name ="bancaprepa" id="m_bancaprepa" class="waves-effect"><i class="material-icons">assignment</i>Publicaciones Vistas</a></li>
              <!--<li><a id="m_agregarPub" class="subheader waves-effect modal-trigger" href="#modalAgregarPub"><i class="material-icons">add_circle</i>Agregar publicación</a></li>  -->
              <li><a id="m_mandarT" style='display:none;' href="/RedSocialBancaprepa\mandarTicket.php"><i class="material-icons">drafts</i>Mandar ticket</a></li>


 
              <li><div class="divider"></div></li>
              <li><a id="m_catalogos" class="dropdown-trigger" data-target='dropdown1' ><i class="material-icons">format_list_bulleted</i><i class="material-icons right">arrow_drop_down</i>Catalogos</a></li>
                <!-- Dropdown Structure -->
              <ul id='dropdown1' class='dropdown-content'>
                <li><a id="catemp" style='display:none;' name ="catemp" ><i class="material-icons">location_city</i>Catalogo de Empresas</a></li>
                <li><a id="catroles" style='display:none;' name ="catroles" ><i class="material-icons">group</i>Catalogo de Roles</a></li>
                <li><a id="catdoc" style='display:none;' name ="catdoc"><i class="material-icons">folder_open</i>Tipos de Documento</a></li>
                <li><a id="catEquipo" style='display:none;' name ="catEquipo"><i class="material-icons">important_devices</i>Catalogo de equipo</a></li>
                
             </ul>
             <li><a id="M_cargaA" style='display:none;' href="/RedSocialBancaprepa\documentos\addfile.php" class=" waves-effect"><i class="material-icons">file_upload</i>Carga de Archivos</a></li>
             <li><div class="divider"></div></li>
             <li><a id="correos"  name ="correos"><i class="material-icons">local_post_office</i>Correos</a></li> 
             
               <!-- Dropdown Structure -->
               <li><a  id="m_mantenimiento" name ="mantenimiento" class="dropdown-trigger" data-target='mantenimiento'><i class="material-icons">settings</i><i class="material-icons right">arrow_drop_down</i>Mantenimiento</a></li>
            <ul id='mantenimiento' class='dropdown-content'>
                <li><a id="m_usuarios" style='display:none;' name ="usuarios" ><i class="material-icons">person_pin</i>Usuarios</a></li> 
                <li><a id="m_accesos" style='display:none;' name ="accesos" ><i class="material-icons">build</i>Accesos</a></li>
                
             </ul>
                         
    </ul>
</div>

    
<a href="#" data-target="slide-out" class="sidenav-trigger  hide-on-large-only"><i class="material-icons">menu</i></a>

