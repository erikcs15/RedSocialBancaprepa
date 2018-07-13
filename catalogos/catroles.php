<!DOCTYPE html>
<html lang="en" >

<head>
    
        <meta charset="UTF-8">  
        <title>Catalogo de roles</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bancaprepa.css">
</head>
    <body onLoad="cargarRoles()">
    
     <div id="container" ><!-- CONTENEDOR 1 -->
     <div class="nav-wrapper">
            <div class="row">
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
                    <h3 class="header " style="color:#1a237e;">Catalogo de Roles</h3>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col s12">      
            <nav>
                <div class="nav-wrapper">
                    <div class="input-field indigo darken-4" >
                        <input id="busquedaRoles" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons ">search</i></label>
                        <i class="material-icons">close</i>
                        <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal btn modal-trigger" href="#modalAgregarRoles">
                         <i class="material-icons blue darken-3">add</i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
            <?php
                 include('../menu/menu.php');
            ?> 
        <div class="col s12">
        <div class="card">
            <div class="card-content">
                <div id="content">
                    <div class="row"><!-- CONTENEDOR 1 -->
                            <div class="col s12"><!-- CONTENEDOR 2 -->
                                    <table class="highlight">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Rol</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>

                                        <tbody id="tablarol">
                                           
                                        </tbody>
                                    </table>
                                </div><!-- CONTENEDOR 2 -->
                    </div><!-- CONTENEDOR 1 -->
                </div>
            </div>
        </div>
        </div>
     </div>

                  

    <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="../js/bancaprepa.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>
    <!-------------------- Modal para agregar roles-------------------------->
    <div id="modalAgregarRoles" class="modal">
           <nav class="blue darken-3">
               <div class="nav-wrapper">
                   <a href="#!" class="brand-logo">
                       <i class="large material-icons">add_circle</i>Agregar roles
                   </a>
               </div>
           </nav>
           <div class="modal-content">
               <form class="col s12 no-padding">
                   <div class="row">
                       <div class="input field col s12">
                           <input placeholder="Nombre del rol" id="nomrol" type="text" class="validate">
                           <label for="Nombre del rol" class="activate"></label>
                       </div>
                   </div>
               </form>
           </div>
           <div class="modal-footer">
               <a href="#!" class= " modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>
               <a id="BtnAgregarRol"class="waves-effect waves-light btn blue darken-3 right"><i class="material-icons left">add_circle_outline</i>Agregar</a>
           </div>
    </div>
    <!----------------------------- Modal para editar rol ---------------------------------->
    <div id="modalEditarRol" class="modal">
           <nav class="blue">
               <div class="nav-wrapper">
                   <a href="#!" class="brand-logo">
                       <i class="large material-icons">edit</i>Editar Rol
                   </a>
               </div>
           </nav>
           <div class="modal-content">
               <form class="col s12 no-padding">
                   <div class="row">
                        <div class="input field col s2">
                            <input placeholder="ID del rol" id="idRolEdit" type="text" class="validate" disabled>
                            <label for="Id del rol" class="activate" ></label>
                        </div>
                       <div class="input field col s8">
                           <input placeholder="Nombre del rol" id="editNomRol" type="text" class="validate">
                           <label for="Nombre del rol" class="activate"></label>
                       </div>
                   </div>
               </form>
           </div>
           <div class="modal-footer">
               <a href="#!" class= " modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>
               <a id="BtnEditarRol" class="waves-effect waves-light btn blue right"><i class="material-icons left">edit</i>Aceptar</a>
           </div>
    </div>
    <!----------------------------- Modal para deshabilitar rol ---------------------------------->
    <div id="modalDeshabRol" class="modal">
           <nav class="orange darken-3">
               <div class="nav-wrapper">
                   <a href="#!" class="brand-logo">
                       <i class="large material-icons">do_not_disturb_alt</i>Deshabilitar Rol
                   </a>
               </div>
           </nav>
           <div class="modal-content">
               <form class="col s12 no-padding">
                   <div class="row">
                       <h5>¿Seguro que quiere deshabilitar esta rol?</h5>
                   </div>
               </form>
           </div>
           <div class="modal-footer">
               <a href="#!" class= " modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>
               <a class="waves-effect waves-light btn orange darken-3 right"><i class="material-icons left">do_not_disturb_alt</i>Deshabilitar</a>
           </div>
    </div>
    <!----------------------------- Modal para eliminar rol ---------------------------------->
    <div id="modalEliminarRol" class="modal">
           <nav class="red accent-4">
               <div class="nav-wrapper">
                   <a href="#!" class="brand-logo">
                       <i class="large material-icons">delete</i>Eliminar Rol
                   </a>
               </div>
           </nav>
           <div class="modal-content">
               <form class="col s12 no-padding">
                   <div class="row">
                       <h5>¿Seguro que desea eliminar esta rol?</h5>
                   </div>
               </form>
           </div>
           <div class="modal-footer">
               <a href="#!" class= " modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>
               <a class="waves-effect waves-light btn red accent-4 right"><i class="material-icons left">delete</i>Eliminar</a>
           </div>
    </div>
     <!-------------------- Inicializar modal-------------------------->
    <script>
            $(document).ready(function(){
                 $('.modal').modal();
            });
    </script>
                
    </body>
</html>