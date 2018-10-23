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
                            <li><span id="btnNotiF" class="counts white-text"></span> <a class='dropdown-button waves-effect waves-dark' href='/RedSocialBancaprepa/index.php' data-activates='dropdown_message'><i id="iconNotiF" class="material-icons">notifications_active</i> </a>
                            <ul id="dropdownNotificacion" class="dropdown-content">     
                        </ul>
                        
                        <ul id="dropdownCuenta" class="dropdown-content">
                            <li class="divider"></li>
                            <li><a href="#!"><i class="material-icons right">account_circle</i><?php
                            echo $_COOKIE["b_capturista"];
                            ?></a></li>
                            <li><a id="btnCerrarSession" name ="salirsesion" class="waves-effect">Cerrar sesión<i class="material-icons">settings_power</i></a></li>
                            
                        </ul>
                        <li>
                            <a class="dropdown-trigger" href="#!" data-target="dropdownCuenta"><i class="material-icons left">account_circle</i>
                            <?php
                                echo $_COOKIE["b_capturista"];
                                ?>
                            </a>
                        </li>
                        
              </div>
        </nav>


    <ul id="slide-out" class="sidenav sidenav-fixed blue darken-3"  style="transform: translateX(-100%);">
                  <li>
                    <div class="user-view">
                      <div class="background" id="sidenav2">
                        <img src="/RedSocialBancaprepa/img/logo_bancaprepa.png"  style="width: 300px">
                      </div>
                      <br><br>
                      
                    </div>  
                  </li>
                

                  <li><a id="m_inicio" name ="inicio" class="waves-effect white-text " ><i class="material-icons white-text">home</i>Inicio</a></li>
                  <li><a href="/RedSocialBancaprepa/bancaprepa.php" name ="bancaprepa" id="m_bancaprepa" class="waves-effect white-text"><i class="material-icons white-text">assignment</i>Publicaciones Vistas</a></li>
                  <!--<li><a id="m_agregarPub" class="subheader waves-effect modal-trigger" href="#modalAgregarPub"><i class="material-icons">add_circle</i>Agregar publicación</a></li>  -->
                  <li><a id="M_cargaA" style='display:none;' href="/RedSocialBancaprepa\documentos\addfile.php" class=" waves-effect white-text"><i class="material-icons white-text">file_upload</i>Carga de Archivos</a></li>
                  <li><a id="m_mantenimientoPub" style='display:none;' href="/RedSocialBancaprepa\mantPub.php" class=" waves-effect white-text" name ="m_mantenimientoPub"><i class="material-icons white-text">featured_play_list</i>Mmto. Publicaciones</a></li> 
                  <li><a  id="m_tickets" style='display:none;' name ="ticketsdd" class="dropdown-trigger white-text" data-target='ticketsdd'><i class="material-icons white-text">insert_comment</i><i class="material-icons right white-text">arrow_drop_down</i>Tickets</a></li>
                    <ul id='ticketsdd' class='dropdown-content blue darken-4'>
                    <li><a id="m_mandarT" style='display:none;' class=" waves-effect blue darken-4 white-text" href="/RedSocialBancaprepa\tickets\mandarTicket.php"><i class="material-icons white-text">drafts</i>Mandar ticket</a></li>
                    <li><a id="m_misTickets" style='display:none;' class=" waves-effect blue darken-4 white-text" href="/RedSocialBancaprepa\tickets\tickets.php" name ="misTickets" ><i class="material-icons white-text">person_pin</i>Mis Tickets</a></li> 
                    <li><a id="m_mantenimientoTickets" style='display:none;' class=" waves-effect blue darken-4 white-text" name ="mantenimientoTickets" ><i class="material-icons white-text">build</i>Mantenimiento de tickets</a></li>
                    </ul>
                  <li><a id="correos" class=" waves-effect white-text"  name ="correos white-text"><i class="material-icons white-text">local_post_office</i>Correos</a></li> 
                  <li><a  id="m_Inventario" style='display:none;' name ="ticketsdd" class="dropdown-trigger white-text" data-target='inventariodd'><i class="material-icons white-text">content_paste</i><i class="material-icons right white-text">arrow_drop_down</i>Inventario</a></li>
                    <ul id='inventariodd' class='dropdown-content blue darken-4'>
                    <li><a id="capInv" style='display:none;' class="waves-effect blue darken-4 white-text" name ="capInv" href="/RedSocialBancaprepa\inventario\capturainv.php"><i class="material-icons white-text">laptop_chromebook</i>Capturar Equipo</a></li> 
                    <li><a id="busquedaEquipo"  class="waves-effect blue darken-4 white-text" style='display:none;' name ="busquedaEquipo" href="/RedSocialBancaprepa\inventario\busquedaEquipo.php"><i class="material-icons white-text">search</i>Busqueda equipo</a></li> 
                    </ul>
    
                  <li><div class="divider"></div></li>
                  <li><a id="m_catalogos" style='display:none;' class="dropdown-trigger white-text" data-target='dropdown1' ><i class="material-icons white-text">format_list_bulleted</i><i class="material-icons right white-text">arrow_drop_down</i>Catalogos</a></li>
                    <!-- Dropdown Structure -->
                  <ul id='dropdown1' class='dropdown-content blue darken-4'>
                    <li><a id="catemp"  class="waves-effect blue darken-4 white-text"  style='display:none;' name ="catemp" ><i class="material-icons white-text">location_city</i>Catalogo de Empresas</a></li>
                    <li><a id="catroles"  class="waves-effect blue darken-4 white-text"  style='display:none;' name ="catroles" ><i class="material-icons white-text">group</i>Catalogo de Roles</a></li>
                    <li><a id="catdoc"  class="waves-effect blue darken-4 white-text"  style='display:none;' name ="catdoc"><i class="material-icons white-text">folder_open</i>Tipos de Documento</a></li>
                    <li><a id="catEquipo"  class="waves-effect blue darken-4 white-text"  style='display:none;' name ="catEquipo"><i class="material-icons white-text">important_devices</i>Catalogo de equipo</a></li>
                     <li><a id="catAreas"  class="waves-effect blue darken-4 white-text"  style='display:none;' name ="catAreas" href="/RedSocialBancaprepa\catalogos\catareas.php"><i class="material-icons white-text">important_devices</i>Catalogo de Areas</a></li>
                    
                </ul>
                <li><div class="divider"></div></li>             
                  <!-- Dropdown Structure -->
                  
                    <!------------------------------------------------------->
                  <li><a  id="m_mantenimiento" style='display:none;' name ="mantenimiento" class="dropdown-trigger white-text" data-target='mantenimiento'><i class="material-icons white-text">settings</i><i class="material-icons right white-text">arrow_drop_down</i>Mantenimiento</a></li>
                    <ul id='mantenimiento' class='dropdown-content blue darken-4'>
                    <li><a id="m_usuarios" class=" waves-effect blue darken-4 white-text"   style='display:none;' name ="usuarios" ><i class="material-icons white-text">person_pin</i>Usuarios</a></li> 
                    <li><a id="m_accesos" class=" waves-effect blue darken-4 white-text"   style='display:none;' name ="accesos" ><i class="material-icons white-text">build</i>Accesos</a></li>
                    
                </ul>
                            
    </ul>
</div>

    
<a href="#" data-target="slide-out" class="sidenav-trigger  hide-on-large-only"><i class="material-icons">menu</i></a>

