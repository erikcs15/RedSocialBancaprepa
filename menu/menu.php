<?php
if(is_null($_COOKIE["b_capturista"]) || empty($_COOKIE["b_capturista"]) || is_null($_COOKIE["b_capturista"])){
       // header('http://wwww.intranet.bancaprepa.com/login.html');
     echo "<script> window.location='http://www.intranet.bancaprepa.com/login.html'; </script>";
}

?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<div id="menu" style="margin:0;border:0px">

        <nav class=" blue darken-4" style="margin:0;border:0px"> 
          <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only  right"><i class="material-icons ">menu</i></a>
                <div class="nav-wrapper">
                    
                        <a href="#" class="brand-logo hide-on-small-only"><i class="material-icons ">grain</i>Intranet Bancaprepa</a>
                       

                        <ul class="right hide-on-med-and-down">
                            <li><span id="mensajesUnread" class="counts white-text"></span> <a href="#modalInbox" id="inbox" class='waves-effect waves-dark modal-trigger' ><i  class="material-icons">email</i> </a>
                        <ul id="dropdownNotificacion" class="dropdown-content">     
                        </ul>

                        <ul class="right hide-on-med-and-down">
                            <li><span id="btnNotiF" class="counts white-text"></span> <a class='dropdown-button waves-effect waves-dark' href='/RedSocialBancaprepa/index.php' data-activates='dropdown_message'><i id="iconNotiF" class="material-icons">notifications_active</i> </a>
                               
                        </ul>
                        
                        <ul id="dropdownCuenta" class="dropdown-content">
                            <li class="divider"></li>
                            <li><a href="#!"><i class="material-icons right"></i><?php
                            echo $_COOKIE["b_capturista"];
                            ?></a></li>
                            <li><a  name="salirsesion" class="waves-effect modal-trigger" href="#modalPerfil">Ver Perfil<i class="material-icons">account_box</i></a></li>
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


    <ul id="slide-out" class="sidenav sidenav-fixed blue darken-4 "  style="transform: translateX(-100%); font-size:9px;">
                  <li>
                    <div class="user-view">
                      <div class="background" id="sidenav2">
                        <img src="/RedSocialBancaprepa/img/logo_bancaprepa.png"  style="width: 290px">
                      </div>
                      <br><br>
                      
                    </div>  
                  </li>
                

                  <li><a id="m_inicio" name ="inicio" class="waves-effect white-text " style="font-size:12px;" ><i class="material-icons white-text">home</i>Inicio</a></li>
                  <li><a href="/RedSocialBancaprepa/bancaprepa.php" name ="bancaprepa" style="font-size:12px; id="m_bancaprepa" class="waves-effect white-text"><i class="material-icons white-text">assignment</i>Publicaciones</a></li>
                  <!--<li><a id="m_agregarPub" class="subheader waves-effect modal-trigger" href="#modalAgregarPub"><i class="material-icons">add_circle</i>Agregar publicación</a></li>  -->
                  <li><a id="m_articulos_venta" href="/RedSocialBancaprepa/sales/sales.php" style="font-size:12px;" class=" waves-effect white-text" ><i class="material-icons white-text">local_grocery_store</i>Articulos en Venta</a></li>
                  <li><a id="M_cargaA" style='display:none; font-size:12px;' href="/RedSocialBancaprepa\documentos\addfile.php"  class=" waves-effect white-text"><i class="material-icons white-text">file_upload</i>Carga de Archivos</a></li>
                  
<!--                  <li><a id="m_politicas"  href="/RedSocialBancaprepa/rh/verpoliticas.php" class=" waves-effect white-text" ><i class="material-icons white-text">priority_high</i>Politicas</a></li>
                  <li><a id="m_formatos" href="/RedSocialBancaprepa/rh/verpoliticas.php" class=" waves-effect white-text" ><i class="material-icons white-text">format_line_spacing</i>Formatos</a></li>
                  <li><a id="m_manuales" href="/RedSocialBancaprepa/rh/verpoliticas.php" class=" waves-effect white-text" ><i class="material-icons white-text">import_contacts</i>Manuales</a></li>
                 
-->
                     <!------------------------------------------------------->
                  <li><a   name ="stock" class="dropdown-trigger white-text" style="font-size:12px;" data-target='desplegableStock'><i class="material-icons white-text">card_travel</i><i class="material-icons right white-text">arrow_drop_down</i>Articulos</a></li>
                    <ul id='desplegableStock' class='dropdown-content blue darken-4'> 

                      <li><a   class="waves-effect blue darken-4 white-text" style="font-size:12px;" href="/RedSocialBancaprepa/sales/stock.php"><i class="material-icons white-text">business_center</i>Registro Stock</a></li>

                      <li><a   class="waves-effect blue darken-4 white-text" style="font-size:12px;" href="/RedSocialBancaprepa/sales/solicitudesStock.php"><i class="material-icons white-text">description</i>Gestion Solicitudes</a></li>
    
                    
                    
                    </ul>


                 <!--  <li><a id="m_mercancia" href="/RedSocialBancaprepa/cp/cp.php" class=" waves-effect white-text" ><i class="material-icons white-text">markunread_mailbox</i>CP</a></li> -->


                  <li><a id="m_mantenimientoPub" style='display:none; font-size:12px' href="/RedSocialBancaprepa\mantPub.php" class=" waves-effect white-text" name ="m_mantenimientoPub"><i class="material-icons white-text">featured_play_list</i>Mmto. Publicaciones</a></li>
                  <li><div class="divider"></div></li>
                  <!-- li><a id="m_votaciones"  href="/RedSocialBancaprepa\mvotaciones\votaciones.php" class=" waves-effect white-text"><i class="material-icons white-text">file_upload</i>Votaciones</a></li--> 
                  <!--<li><a  id="mmto_votaciones"  name ="mmto_votaciones" class="dropdown-trigger white-text" data-target='votacionesdd'><i class="material-icons white-text">insert_comment</i><i class="material-icons right white-text">arrow_drop_down</i>Mmto. Votaciones</a></li>
                    <ul id='votacionesdd' class='dropdown-content blue darken-4'>
                    <li><a id="m_crearVotaciones"  class=" waves-effect blue darken-4 white-text" href="/RedSocialBancaprepa\mvotaciones\crearVotaciones.php"><i class="material-icons white-text">create</i>Crear Votaciones</a></li>
                    <li><a id="m_admVotaciones"  class=" waves-effect blue darken-4 white-text" href="/RedSocialBancaprepa\mvotaciones\mmtovotaciones.php" name ="misTickets" ><i class="material-icons white-text">build</i>Admin. Votaciones</a></li> 
                    </ul>-->
                 <li><a  id="m_tickets" style='display:none;  font-size:12px' name ="ticketsdd" class="dropdown-trigger white-text" data-target='ticketsdd'><i class="material-icons white-text">insert_comment</i><i class="material-icons right white-text">arrow_drop_down</i>Tickets</a></li>
                    <ul id='ticketsdd' class='dropdown-content blue darken-4'>
                    <li><a id="m_mandarT" style='display:none;  font-size:12px' class=" waves-effect blue darken-4 white-text" href="/RedSocialBancaprepa\tickets\mandarTicket.php"><i class="material-icons white-text">drafts</i>Mandar ticket</a></li>
                    <li><a id="m_misTickets" style='display:none;  font-size:12px' class=" waves-effect blue darken-4 white-text" href="/RedSocialBancaprepa\tickets\tickets.php" name ="misTickets" ><i class="material-icons white-text">person_pin</i>Mis Tickets</a></li> 
                    <li><a id="m_mantenimientoTickets" style='display:none;  font-size:12px' class=" waves-effect blue darken-4 white-text" name ="mantenimientoTickets" ><i class="material-icons white-text">build</i>Mantenimiento de tickets</a></li>
                    </ul>
                  <li><a id="correos" class=" waves-effect white-text" style=" font-size:12px" name ="correos white-text"><i class="material-icons white-text">local_post_office</i>Correos</a></li> 
                  <li><a   name ="stock" style=" font-size:12px" class="dropdown-trigger white-text" data-target='despegableActividades'><i class="material-icons white-text">content_paste</i><i class="material-icons right white-text">arrow_drop_down</i>Actividades</a></li>
                    <ul id='despegableActividades' class='dropdown-content blue darken-4'> 

                      <li><a   class="waves-effect blue darken-4 white-text" style="font-size:12px" href="/RedSocialBancaprepa/agendaActividades/crearGrupos.php"><i class="material-icons white-text">business_center</i>Crear Grupos</a></li>

                      <li><a   class="waves-effect blue darken-4 white-text" style="font-size:12px"  href="/RedSocialBancaprepa/agendaActividades/verAactividades.php"><i class="material-icons white-text">description</i>Ver Actividades</a></li>
    
                    
                    
                    </ul>
                  <li><a  id="m_Prestamos" style='display:none; font-size:12px' name ="prestamosdd" class="dropdown-trigger white-text" data-target='prestamosdd'><i class="fas fa-hand-holding-usd white-text"></i><i class="material-icons right white-text">arrow_drop_down</i>Prest. Personales</a></li>
                    <ul id='prestamosdd' class='dropdown-content blue darken-4'>
                    <li><a id="m_crearSolicitud" style='display:none; font-size:12px' class="waves-effect blue darken-4 white-text" name ="m_crearSolicitud" href="\RedSocialBancaprepa\prestamospersonales\solicitarprestamo.php"><i class="material-icons white-text">add_circle_outline</i>Crear Solicitud</a></li> 
                    <li><a id="m_solicitudes"  class="waves-effect blue darken-4 white-text" style='display:none; font-size:12px' name ="m_solicitudes" href="\RedSocialBancaprepa\prestamospersonales\solicitudes.php"><i class="material-icons white-text">bubble_chart</i>Solicitudes</a></li> 
                    <li><a id="m_pagos"  class="waves-effect blue darken-4 white-text" style='display:none; font-size:12px' name ="m_pagos" href="\RedSocialBancaprepa\prestamospersonales\pagospp.php"><i class="material-icons white-text">bubble_chart</i>Pagos</a></li> 
                    <li><a id="m_reportesp"  class="waves-effect blue darken-4 white-text" style='display:none; font-size:12px' name ="m_reportesp" href="\RedSocialBancaprepa\prestamospersonales\reportesPp.php"><i class="material-icons white-text">featured_play_list</i>Reportes</a></li> 
                    </ul>
                    <li><a  id="m_fondoAhorro_menu" style='display:none;' name ="m_fondoAhorro_menu" class="dropdown-trigger white-text" data-target='fondo_menu'><i class="material-icons white-text">local_mall</i><i class="material-icons right white-text">arrow_drop_down</i>Fondo de Ahorro</a></li>
                    <ul id='fondo_menu' class='dropdown-content blue darken-4'>
                    <li><a id="m_fondoAhorro" style='display:none;' class="waves-effect blue darken-4 white-text" name ="capInv"  href="/RedSocialBancaprepa\fondoAhorro.php"><i class="material-icons white-text">local_mall</i>Carta Fondo de ahorro</a></li> 
                    <li><a id="m_SolicitudesfondoAhorro" style='display:none;'  class="waves-effect blue darken-4 white-text" name ="busquedaEquipo" href="/RedSocialBancaprepa\SolicitudesFondoAhorro.php"><i class="material-icons white-text">format_list_bulleted</i>Solicitudes</a></li> 
                    </ul>
                    <!--
                    <li><a  id="m_fondoAhorro_menu" style='display:none;' name ="m_fondoAhorro_menu" class="dropdown-trigger white-text" data-target='fondo_menu'><i class="material-icons white-text">local_mall</i><i class="material-icons right white-text">arrow_drop_down</i>Fondo de Ahorro</a></li>
                    <ul id='fondo_menu' class='dropdown-content blue darken-4'>
                    <li><a id="m_fondoAhorro" style='display:none;' style='font-size:12px' href="/RedSocialBancaprepa\fondoAhorro.php" class=" waves-effect white-text" ><i class="material-icons white-text">local_mall</i>Carta Fondo de ahorro</a></li>
                    <li><a id="m_SolicitudesfondoAhorro" style='display:none;' style='font-size:12px' href="/RedSocialBancaprepa\SolicitudesFondoAhorro.php" class=" waves-effect white-text" ><i class="material-icons white-text">format_list_bulleted</i>Solicitudes</a></li>
                    </ul>
                   -->
                    <li><div class="divider"></div></li>

                  <li><a  id="m_Inventario" style='display:none; font-size:12px' name ="ticketsdd" class="dropdown-trigger white-text" data-target='inventariodd'><i class="material-icons white-text">content_paste</i><i class="material-icons right white-text">arrow_drop_down</i>Inventario</a></li>
                    <ul id='inventariodd' class='dropdown-content blue darken-4'>
                    <li><a id="capInv" style='display:none; font-size:12px' class="waves-effect blue darken-4 white-text" name ="capInv" href="/RedSocialBancaprepa\inventario\capturainv.php"><i class="material-icons white-text">laptop_chromebook</i>Capturar Equipo</a></li> 
                    <li><a id="busquedaEquipo"  class="waves-effect blue darken-4 white-text" style='display:none; font-size:12px' name ="busquedaEquipo" href="/RedSocialBancaprepa\inventario\busquedaEquipo.php"><i class="material-icons white-text">search</i>Busqueda equipo</a></li> 
                    <li><a id="creaInventario" style=" class="waves-effect blue darken-4 white-text"  name ="creaInventario" href="/RedSocialBancaprepa\inventario\inventario.php"><i class="material-icons white-text">chrome_reader_mode</i>Inventario</a></li> 
                    </ul>
    
                  <li><div class="divider"></div></li>
                  <li><a id="m_catalogos" style='display:none; font-size:12px' class="dropdown-trigger white-text" data-target='dropdown1' ><i class="material-icons white-text">format_list_bulleted</i><i class="material-icons right white-text">arrow_drop_down</i>Catalogos</a></li>
                    <!-- Dropdown Structure -->
                  <ul id='dropdown1' class='dropdown-content blue darken-4'>
                    <li><a id="catemp"  class="waves-effect blue darken-4 white-text"  style='display:none; font-size:12px' name ="catemp" ><i class="material-icons white-text">location_city</i>Catalogo de Empresas</a></li>
                    <li><a id="catroles"  class="waves-effect blue darken-4 white-text"  style='display:none; font-size:12px' name ="catroles" ><i class="material-icons white-text">group</i>Catalogo de Roles</a></li>
                    <li><a id="catdoc"  class="waves-effect blue darken-4 white-text"  style='display:none; font-size:12px' name ="catdoc"><i class="material-icons white-text">folder_open</i>Tipos de Documento</a></li>
                    <li><a id="catEquipo"  class="waves-effect blue darken-4 white-text"  style='display:none; font-size:12px' name ="catEquipo"><i class="material-icons white-text">important_devices</i>Catalogo de equipo</a></li>
                     <li><a id="catAreas"  class="waves-effect blue darken-4 white-text"  style='display:none; font-size:12px' name ="catAreas" href="/RedSocialBancaprepa\catalogos\catareas.php"><i class="material-icons white-text">important_devices</i>Catalogo de Areas</a></li>
                    
                </ul>
                <li><div class="divider"></div></li>             
                  <!-- Dropdown Structure -->
                  
                    <!------------------------------------------------------->
                  <li><a  id="m_mantenimiento" style='display:none;  font-size:12px' name ="mantenimiento" class="dropdown-trigger white-text" data-target='mantenimiento'><i class="material-icons white-text">settings</i><i class="material-icons right white-text">arrow_drop_down</i>Mantenimiento</a></li>
                    <ul id='mantenimiento' class='dropdown-content blue darken-4'>
                    <li><a id="m_usuarios" class=" waves-effect blue darken-4 white-text"   style='display:none;  font-size:12px' name ="usuarios" ><i class="material-icons white-text">person_pin</i>Usuarios</a></li> 
                    <li><a id="m_accesos" class=" waves-effect blue darken-4 white-text"   style='display:none;  font-size:12px' name ="accesos" ><i class="material-icons white-text">build</i>Accesos</a></li>
                    
                    </ul>
                <li><div class="divider hide-on-large-only"></div></li>  
                <li><a id="btnCerrarSessionSmall"  class="waves-effect white-text hide-on-large-only" style=" font-size:12px  " ><i class="material-icons white-text">settings_power</i>Cerrar Session</a></li>
                            
    </ul>
</div>

    


  <!-- Modal Structure -->
  <div id="modalPerfil" class="modal modal-small " >
    <div class="modal-content">
      <div class="row">
          <div class="col s12 " >
            <div class="card">
              <div class="card-image" >
               <center> 
               <!-- <img src="http://www.fundacionamiga.com/php/archivos/empleados/<?php echo $_COOKIE['b_capturista_id']?>.jpg" class="circle responsive-img" onerror="this.src='../img/avatar.png'" style="width: 250px">   -->
              </center>
              </div>
              <div class="card-content">
                <hr>
                <div class="row">
                  <div class="input-field col s5 l3">
                    <input id="capturista_id" class="black-text" type="text" disabled value="<?php echo $_COOKIE['b_capturista_id']?>">
                    <label for="" class="black-text"># Empleado</label>
                  </div>
                  <div class="input-field col s7 l9">
                    <input id="" class="black-text" type="text" disabled value="<?php echo $_COOKIE['b_capturista']?>" >
                    <label for="" class="black-text">Nombre Empleado</label>
                  </div> 
                  <div class="input-field col s6 ">
                    <input id="" class="black-text" type="text" disabled value="<?php echo $_COOKIE['b_sucursal']?>">
                    <label for="" class="black-text">Sucursal</label>
                  </div>
                  <div class="input-field col s6 ">
                    <input id="" class="black-text" type="text" disabled value="<?php echo $_COOKIE['b_puesto']?>" >
                    <label for="" class="black-text">Puesto</label>
                  </div>
                  <div class="input-field col s12 ">
                    <input id="telefonoEmpleado" class="black-text col s10" type="text" value="<?php echo $_COOKIE['b_telefono']?>">
                    <label for="telefonoEmpleado" class="black-text">Num. Celular</label>
                    <a id="btnGuardarCel" class="btn-floating waves-effect waves-light green tooltipped" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a>
        
                  </div>
                  <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-white btn-flat red white-text">Cerrar</a>
                  </div>
                  
                </div>

              </div> 

            </div>
          </div>
      </div>
    </div>
    
  </div>

    <!-- Modal Structure -->
  <div id="modalInbox" class="modal modal-fixed-footer" >
    
    <div class="modal-content">
       <nav class=" blue accent-4">
                    <div class="nav-wrapper">
                        <a class="brand-logo">
                            Mensajes
                        </a>
                    </div>
      </nav>
      <div class="row">
          <div class="col s12 " >
            
            <ul class="collapsible" id="cajaDeMensajes">
               <li>
                <div class="collapsible-header">21<i class="material-icons red-text">local_post_office</i>Axel Cortez</div>
                <div class="collapsible-body cajaPorUser" id="">
                  <p ><b class="green-text">Axel Cortez:</b> bienvendo.</p>
                  <p><b>Sergio Ponce:</b> Gracias.</p>
                </div> 

              </li>
            </ul>
            
            
          </div>

      </div>
      <!--div class="row">
              <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea"></textarea> 
              </div>
              <div class="container">
                <div class="row ">
                          <div class="col s6 offset-s3">
                            <a class="waves-effect waves-light btn red"><i class="material-icons left">close</i>Cancelar</a>
                            <a class="waves-effect waves-light btn green"><i class="material-icons right">send</i>Enviar</a>
        
                          </div>
                      
                </div>  
              </div>

      </div--> 
    </div>
    
  </div>


  <script type="text/javascript">
    

  </script>

