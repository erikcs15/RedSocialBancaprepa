<?php
  $usuario=$_COOKIE["presico_capturista"];
?>
<div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a></div>
<div id="menu">

<ul id="nav-mobile" class="side-nav fixed show-on-large-only" style="transform: translateX(-100%);background-color:#81d4fa;border:1px black solid" > 
		
		
		<li class="logo" style="margin-bottom: 0;padding-bottom: 0;"><img src="/img/presico.png" style="width:70%;"   >
          </li>
		  
		  
        <li class="logo" style="margin-top: 0;padding-top: 0"><a id="logo-container"  class="brand-logo black-text">
        <?php echo substr($usuario,0,20); ?><i class="material-icons black-text">account_box</i></a>
          </li>
 

          <li id="mAsesores"  class="bold subheader dropdown-button black-text">
            <a  class="dropdown-button black-text" data-activates="dropdown3"><i class=" material-icons black-text">person_pin</i>Asesores<i class="material-icons right black-text">arrow_drop_down</i></a>
              
          </li> 


          <ul id='dropdown3' class='dropdown-content text-hover-menu' style="background-color:#039be5 ;">
              <li class="divider"></li>
              <li ><a href=" /asesores/asesores.php" class="waves-effect waves-teal black-text" ><i class=" material-icons black-text">event_note</i> Corte</a></li>
              <li ><a href=" /asesores/efectivo.php" class="waves-effect waves-teal black-text" ><i class=" material-icons black-text">work</i> Dia Operacion</a></li>  
            </ul> 
          <li id="mCoordinadoras" class="bold subheader"><a href=" /coordinadoras/coordinadoras.php" class="waves-effect waves-teal black-text"><i class=" material-icons black-text">person</i> Coordinadoras</a></li>
          <li id="mClientes" class="bold subheader"><a href="/clientes/clientes.php" class="waves-effect waves-teal black-text"><i class=" material-icons black-text">people</i>Clientes</a></li>
          <li id="mOperacion" class="bold subheader"><a href=" /operacion/operacion.php" class="waves-effect waves-teal black-text"><i class=" material-icons black-text">work</i>Operacion</a></li>
          <li id="mReportes" class="bold"><a  class="dropdown-button black-text" data-activates="dropdown1"><i class=" material-icons black-text">assignment</i>Reportes<i class="material-icons right black-text">arrow_drop_down</i></a></li> 
            <ul id='dropdown1' class='dropdown-content text-hover-menu' style="background-color:#039be5 ;">
              <li class="divider"></li>
              <li id="mColocado" class=" boldsubheader  subheader"><a href="/reportes/colocado.php" class="waves-effect waves-teal black-text">Colocado</a></li>
              <li id="mTotal" class=" boldsubheader  subheader"><a href="/reportes/colocadot.php" class="waves-effect waves-teal black-text">Colocado Total</a></li>
              <li ><a href="/reportes/rclientes.php" class="waves-effect waves-teal black-text">Reporte Clientes</a></li>
              <li id="mDesembolsos" class="bold subheader  "><a href="/reportes/desembolsos.php" class="waves-effect waves-teal black-text">Desembolsos</a></li> 
              <li ><a href="/reportes/desembolsosDet.php" class="waves-effect waves-teal black-text">Desembolsos Detalle</a></li> 
              <li ><a href="/reportes/pendientespago.php" class="waves-effect waves-teal black-text">Pendientes de Pago</a></li> 
              <li id="mQuebrantos" class="bold"><a href="/reportes/quebrantos.php" class="waves-effect waves-teal black-text">Quebrantos</a></li> 
              <li class="bold  "><a href="/reportes/cobranza.php" class="waves-effect waves-teal black-text">Reporte de Cobranza</a></li> 
              <li id="mGastos" class="bold subheader "><a href="/reportes/gastos.php" class="waves-effect waves-teal black-text">Gastos</a></li>
              <li id="mEntradasSalidas" class="bold subheader "><a href="/reportes/entradasysalida.php" class="waves-effect waves-teal black-text">Entradas y Salidas</a></li> 
			  <li id="mCajas" class="bold subheader  "><a href="/reportes/monitorcajas.php" class="waves-effect waves-teal black-text">Monitor de Cajas</a></li> 
        <li id="mCteInfo" class="bold   "><a href="/reportes/informacionctes.php" class="waves-effect waves-teal black-text">Informacion de Clientes</a></li> 
            
			  
            </ul> 
          <hr>
          <li id="mMantenimiento" class="bold subheader"  ><a  class="dropdown-button black-text" data-activates="dropdown2"><i class=" material-icons black-text">settings</i>Administracion<i class="material-icons right black-text">arrow_drop_down</i></a></li> 
            <ul id='dropdown2' class='dropdown-content ' style="background-color:#039be5 ;">
              <li class="divider"></li>
              <li id="mZonas" class="subheader  "><a href="/mantenimiento/zonas.php" class="waves-effect waves-teal black-text">Zonas y Rutas</a></li>
              <li id="mUsuarios" class="subheader  "><a href="/mantenimiento/usuarios.php" class="waves-effect waves-teal black-text">Usuarios</a></li>
              <li id="mAccesos" class="subheader  "><a href="/mantenimiento/accesos.php" class="waves-effect waves-teal black-text">Accesos</a></li> 
              <li id="mTransferencias" class="subheader  "><a href="/mantenimiento/caja.php" class="waves-effect waves-teal black-text">Transferencias</a></li>  
            </ul>
          <hr>
          <li class="bold"><a id="btnCerrarSession" class="waves-effect waves-teal black-text"><i class=" material-icons black-text">power_settings_new</i>Cerrar Sesion</a></li>
    </ul> 
</div>