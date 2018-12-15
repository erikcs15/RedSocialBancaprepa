
<!--MODAL PARA DESHABILITAR-->
<div id="modalDeshabilitar" class="modal">
                <nav class=" red accent-4">
                    <div class="nav-wrapper">
                        <a href="#!" class="brand-logo">
                            Deshabilitar Pago
                        </a>
                    </div>
                </nav>
                <div class="modal-content"> 
                    <div class="container"> 
                        <div class="row"><!-- ROW 1-->
                            <div class="input-field col l2">
                              <input id="txtIdCancelacion" class="black-text" type="text" placeholder=" " disabled>
                              <label class="black-text active" for="txtIdCancelacion"  >Id</label>
                            </div>
                            <div class="input-field col l10">
                              <textarea id="txtMotivo" class="materialize-textarea" placeholder=" "></textarea>
                                 <label for="txtMotivo" class="black-text">Motivo</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row" >
                            <div class="col s6 right"    >
                            <a onclick="cancelarPagoEspecie()" class="waves-effect waves-light btn  accent-4 green"><i class="material-icons left">done</i>Aceptar</a>
                                
                            </div>
                            <div class="col s6 "   >
                            <a  class="waves-effect modal-close waves-light btn right accent-4 red"><i class="material-icons left">close</i>Cancelar</a>
                            </div>
                </div>
                
                
                <div class="modal-footer"> 
                    
                </div>
</div>


<!--MODAL PARA CARGAR IMAGEN-->
<div id="modalCargarImg" class="modal">
                <nav class=" blue accent-4">
                    <div class="nav-wrapper">
                        <a href="#!" class="brand-logo">
                            Cargar de imagen
                        </a>
                    </div>
                </nav>
                <div class="modal-content"> 
                    <div class="container"> 
                       <div class="video-container">
                           <iframe id="frameImg"  width="853" height="480" src="img.<?php  ?>" frameborder="0" allowfullscreen>
                            
                            </iframe>
                       </div>
                        

                    </div>
                </div>
                <div class="row" >
                            <div class="col s6 right"    >
                            <a onclick="cancelarPagoEspecie()" class="waves-effect waves-light btn  accent-4 green"><i class="material-icons left">done</i>Aceptar</a>
                                
                            </div>
                            <div class="col s6 "   >
                            <a  class="waves-effect modal-close waves-light btn right accent-4 red"><i class="material-icons left">close</i>Cancelar</a>
                            </div>
                </div>
                
                
                <div class="modal-footer"> 
                    
                </div>
</div>

   <!-- Modal Structure -->
      <div id="modalImagenes" class="modal">
        <div class="modal-content">
          <div class="container">
              <div class="row">
                  <div class="col s12 l12" id="divGaleria">

                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
      </div>


      <div id="modalSolicitar" class="modal modal-large">
        <nav class=" blue accent-4">
                    <div class="nav-wrapper">
                        <a class="brand-logo">
                            Solicitud de articulo
                        </a>
                    </div>
                </nav>
        <div class="modal-content">
          <div class="container">
            <div class="row">
                    <div class="input-field col s12 l2">
                      <input type="text" class="validate black-text" disabled value=" <?php
                            echo $_COOKIE['b_capturista_id'];
                            ?>">
                      <label for="txtIdSolicitar">Id</label>
                    </div>
                    <div class="input-field col s12 l10">
                      <input type="text" class="validate black-text" disabled value=" <?php
                            echo $_COOKIE['b_capturista'];
                            ?>">
                      <label class="active">Solicitante</label>                    
                   </div>
              </div>
              <div class="row">
                    <div class="input-field col s12 l2">
                      <input  " id="txtIdSolicitar" type="text" class="validate black-text" disabled value=" ">
                      <label for="txtIdSolicitar"># Articulo</label>
                    </div>
                    <div class="input-field col s12 l10">
                      <textarea id="txtSolicitud" class="materialize-textarea"> </textarea>
                      <label for="txtSolicitud">Contacto</label>                    
                   </div>
              </div>
              <div class="row" id="vistaSolicitud">
                
              </div>
          </div>
        </div>
        <div class="modal-footer">  
          <div class="row ">
            <center>
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red white-text  hide-on-med-and-up">Cerrar</a>
            </center>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red white-text  hide-on-med-and-down">Cerrar</a>
          </div>
        </div>
      </div>