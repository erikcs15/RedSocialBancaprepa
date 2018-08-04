<?php
if(is_null($_COOKIE["b_capturista"])){
        header('Location: http://localhost/RedSocialBancaprepa/login.html');
}

?>

<div id="menu">
<nav class=" blue darken-4">
                    <div class="nav-wrapper">
                        
                        <a href="#" class="brand-logo"><i class="material-icons">grain</i>Intranet Bancaprepa</a>
                    
                        <ul class="right hide-on-med-and-down">
                            <li><span class="counts white-text">9+</span> <a class='dropdown-button waves-effect waves-dark ' href='#' data-activates='dropdown_message'><i class="material-icons">notifications_active</i> </a>
                            <ul id='dropdown_message' class='dropdown-content messages collection'>
                             
                            </ul>
                            </li>
                            <li> <span class="counts white-text">9+</span><a class='dropdown-button waves-effect waves-dark' href='#' data-activates='dropdown_task'><i class="material-icons">message</i></a>
                            
                            </li>
                            <ul id="dropdownCuenta" class="dropdown-content">
                                <li class="divider"></li>
                                <li><a href="#!"><i class="material-icons right">account_circle</i><?php
                                echo $_COOKIE["b_capturista"];
                                ?></a></li>
                                <li><a id="salirsesion" name ="salirsesion" class="waves-effect">Cerrar sesión<i class="material-icons">settings_power</i></a></li>
                               
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
<<<<<<< HEAD
              </div></li> 
               <!--li><a id="m_inicio" name ="inicio" class="subheader waves-effect" ><i class="material-icons">home</i>Inicio</a></li>
              <li><a id="m_agregarPub" class="subheader waves-effect modal-trigger" href="#modalAgregarPub"><i class="material-icons">add_circle</i>Agregar publicación</a></li>
              <li><a id="m_mandarT" class="subheader waves-effect"><i class="material-icons">drafts</i>Mandar ticket</a></li-->
 
              <li><a id="inicio" name ="inicio" class="waves-effect"><i class="material-icons">home</i>Inicio</a></li>
              <li><a href="http:\\localhost\RedSocialBancaprepa\bancaprepa.php" name ="inicio" class="waves-effect"><i class="material-icons">assignment</i>Bancaprepa</a></li>
              <li><a class="waves-effect modal-trigger" href="#modalAgregarPub"><i class="material-icons">add_circle</i>Agregar publicación</a></li>
              <li><a class="waves-effect"><i class="material-icons">drafts</i>Mandar ticket</a></li>
 
=======
              </div></li>

              <li><a id="m_inicio" name ="inicio" class="waves-effect" ><i class="material-icons">home</i>Inicio</a></li>
              <li><a id="m_agregarPub" class="subheader waves-effect modal-trigger" href="#modalAgregarPub"><i class="material-icons">add_circle</i>Agregar publicación</a></li>
              <li><a id="m_mandarT" class="subheader waves-effect"><i class="material-icons">drafts</i>Mandar ticket</a></li>


>>>>>>> d5d0143c1d4dc56f0b1bf4117f05cdb0a453ced8
              <li><div class="divider"></div></li>
              <li><a  name ="salirsesion" class="dropdown-trigger" data-target='dropdown1'><i class="material-icons">format_list_bulleted</i><i class="material-icons right">arrow_drop_down</i>Catalogos</a></li>
                <!-- Dropdown Structure -->
              <ul id='dropdown1' class='dropdown-content'>
                <li><a id="catemp" class="subheader" name ="catemp" ><i class="material-icons">assignment</i>Catalogo de Empresas</a></li>
                <li><a id="catroles" class="subheader" name ="catroles" ><i class="material-icons">assignment</i>Catalogo de Roles</a></li>
                <li><a id="catdoc" class="subheader" name ="catdoc"><i class="material-icons">assignment</i>Tipos de Documento</a></li>
                <li><a id="correos" class="subheader" name ="correos"><i class="material-icons">local_post_office</i>Correos</a></li> 
             </ul>
             <li><a id="M_cargaA" href="http:\\localhost\RedSocialBancaprepa\documentos\addfile.php" class=" waves-effect"><i class="material-icons">file_upload</i>Carga de Archivos</a></li>
             <li><div class="divider"></div></li>
               <!-- Dropdown Structure -->
               <li><a  name ="mantenimiento" class="dropdown-trigger" data-target='mantenimiento'><i class="material-icons">settings</i><i class="material-icons right">arrow_drop_down</i>Mantenimiento</a></li>
            <ul id='mantenimiento' class='dropdown-content'>
                <li><a id="m_usuarios" class="subheader" name ="usuarios" ><i class="material-icons">person_pin</i>Usuarios</a></li> 
                <li><a id="m_accesos" class="subheader" name ="accesos" ><i class="material-icons">build</i>Accesos</a></li>
                <li><a id="m_rol_usu" class="subheader" name ="accesos" ><i class="material-icons">build</i>Roles-usuarios</a></li>   
             </ul>
            
    </ul>
</div>

    
<a href="#" data-target="slide-out" class="sidenav-trigger  hide-on-large-only"><i class="material-icons">menu</i></a>


<!--------------------------------------------Modal agregar publicacion-------------------------------------------->
    <div id="modalAgregarPub" class="modal modal-fixed-footer">
            <nav class="blue darken-3">
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">
                        <i class="large material-icons">add_circle</i>Agregar publicación
                    </a> 
                </div>
            </nav>
            <div class="modal-content">
                <form class="col s12 no-padding" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data" name="inscripcion">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="textopub" class="materialize-textarea" data-length="300"></textarea>
                            <label for="textopub">Publicacion</label>
                        </div> 
                        <div class=" col s12">
                            <div class='input-field col s4'>
                                    <select id="tipoPub"> 
                                    </select>
                                    <label>Seleccion el tipo de publicacion</label>
                            </div>
                            <div class='input-field col s4'>
                                    <select id="tipoEmpresa"> 
                                    </select>
                                    <label>Seleccion la Empresa</label>
                            </div>
                            <div class='input-field col s4'>
                                    <select id="tipoRol"> 
                                    </select>
                                    <label>Seleccione el Rol de Visualizacion</label>
                            </div>
                            
                        </div>
                         
                        <div class="file-field input-field">
                            <div id="btnDocumento" class="btn grey">
                                <span>Archivo</span>
                                <input id="documentoCargado" disabled type="file"  name="archivo[]" multiple="multiple">
                            </div>
                            <div class="file-path-wrapper" >
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div> 
                </form>   
            </div>
            <div class="modal-footer">
                <a href="#!" class= " modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>
                <a id="BtnAgregarPub" class="waves-effect waves-light btn blue darken-3 right"><i class="material-icons left">add_circle_outline</i>Publicar</a>
                
            </div>
    </div>