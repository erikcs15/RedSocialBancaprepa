// Funcion principal de Jquery la cual escanea en tiempo real nuestro documento para verificar que los eventos se ejecuten correctamente
$(document).ready(function(){

    
    $('.tooltipped').tooltip({delay: 50});
      
          
    //inicializamos modals
        $('#modalAceptarDoc').modal();
        
        
    //validacion del submit de publicaciones
    $( "#btnEnviarForm" ).click(function() {
         
        var titulo = $("#pTitulo").val();
        var documento = $("#docId").val();
        var descripcion = $("#pDescripcion").val();
        var tipopublic = $("#tipoPubAddFile").val();
        var tipoempresa = $("#tipoEmpresaAddFile").val();
        var tiporol = $("#tipoRolAddFile").val();
        var docname="SIN DOCUMENTO";

        if($('#chkDoc').is(":checked")) { 
            if(documento.length<=0){
                M.toast({html: 'Es necesario incluir un documento', classes: 'rounded red'});
                return;
            }
            docname = $("#tittleDoc").val();
            var cdocumento ='S';
         } 
         else{
            cdocumento ='N';
         }
 

        if(titulo.length<=0){
            M.toast({html: 'El Titulo de la publicacion no puede estar vacio', classes: 'rounded red'});
            return;
        }
 
        if(descripcion.length<=0){
            M.toast({html: 'Es necesario incluir una descripcion en la publicacion', classes: 'rounded red'});
            return;
        }
        if(tipopublic <=0){
            M.toast({html: 'Es necesario especificar el tipo de publicacion', classes: 'rounded red'});
            return;
        }
        if(tipoempresa<=0){
            M.toast({html: 'Es necesario especificar la empresa ala que se dirige', classes: 'rounded red'});
            return;
        }
        if(tiporol<=0){
            M.toast({html: 'Es necesario especificar el rol al que se dirige la publicacion', classes: 'rounded red'});
            return;
        } 
        

        $('#modalAceptarDoc').modal('open');

        //$( "#formFiles" ).submit();
      });

      //gurdar datos  de la publicacion

      $( "#aceptarPublicacion" ).click(function() {

            var titulo = $("#pTitulo").val();
            var descripcion = $("#pDescripcion").val();
            var tipopublic = $("#tipoPubAddFile").val();
            var tipoempresa = $("#tipoEmpresaAddFile").val();
            var tiporol = $("#tipoRolAddFile").val();
            var docname="SIN DOCUMENTO";
            var cdocumento="";
            var esPDF="";

            if($('#chkDoc').is(":checked")) {  
                 docname = $("#tittleDoc").val();
                 cdocumento ='S';
            } 
            else{
                 cdocumento ='N';
            }
            /*
            if($('#chkPdfImg').is(":checked")) {  
                esPDF="PDF"
           } 
           else{
               esPDF="IMG"
           }
           */
            
            onRequest({ opcion : 25,titulo:titulo,descripcion:descripcion,imagen:docname,documento_id:tipopublic,rol_id:tiporol,empresa_id:tipoempresa,docuemento:cdocumento},respPublicacion);

      });
 
    //inicializamos contador de caracteres
    $('#pDescripcion').characterCounter();
 
    //inicializamos selects
    onRequest({ opcion : 4,doc:''},respTpublic);
    onRequest({ opcion : 2,empresa:''},respEmpresa);
    onRequest({ opcion : 3,rol:''},respRol);
    onRequest({ opcion : 3,rol:''},respRolAccesos);
    onRequest({ opcion : 29,usuario:''},respUsuariosDD);

    (function($) {  
        $.get = function(key)   {  
            key = key.replace(/[\[]/, '\\[');  
            key = key.replace(/[\]]/, '\\]');  
            var pattern = "[\\?&]" + key + "=([^&#]*)";  
            var regex = new RegExp(pattern);  
            var url = unescape(window.location.href);  
            var results = regex.exec(url);  
            if (results === null) {  
                return null;  
            } else {  
                return results[1];  
            }  
        }  
    })(jQuery); 

///----------------------------------------------------------------

    //Inicializamos menu
    $('.dropdown-trigger').dropdown();
    //contador de caracteres para tex area
    $('textarea#textopub').characterCounter();
    //inicializar el modal        
    $('.modal').modal();
      
      
       
     //evento de switch de documentos 
     $( "#chkDoc" ).click(function() {  

        if($(this).is(":checked")) {
             $("#btndocId").removeClass('grey');
             $("#docId").removeAttr("disabled");
          }
          else {
            $("#btndocId").addClass('grey');
            $("#docId").attr('disabled','disabled');
          }
     });

    //Inicia el evento click en el boton del login
    $( "#btn_login" ).click(function() { 
        //inicializamos variables
        var user='';
        var pass='';
        //igualamos variables con jquery obtenemos el valor '.val()' del id indicado con '$(#ID)'
        user = $("#user").val();
        pass =  $("#password").val();

        // Validamos que los campos no esten vacios
        if(user==''){
            M.toast({html: 'El nombre de usuario no puede ir vacio', classes: 'rounded red'}); 
            return;
        }

        if(pass==''){
            M.toast({html: 'La contraseña no puede ir vacia', classes: 'rounded red'}); 
            return;
        }   
       // llamamos a funcion de ajax para conectar con nuestro servidor php funcion(parametro1,parametro2), el primer parametro es un JSON y el segun una funcion de respuesta en donde recibiremos los datos que nos regrese  ajax
       
        onRequest({ opcion : 1 ,usuario:user,password:pass },respUser);

        //Redirige al index
        //location.href="/RedSocialBancaprepa/index.php";
        
        
        
     });
     
     
     // Fin de click en login
     //------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------Cargar el menu por roles------------------------------------------------




//--------------------------------------------------------------------------------------------------------------------------

     //Redirige al login 
     $( "#salirsesion" ).click(function() { 
        location.href="/RedSocialBancaprepa/login.html";
     });
     //Redirige al catalogo de empresas
     $( "#catemp" ).click(function() { 
        
        location.href="/RedSocialBancaprepa/catalogos/catemp.php";
     });
    //Redirige al catalogo de rolas
     $( "#catroles" ).click(function() { 
        location.href="/RedSocialBancaprepa/catalogos/catroles.php";
     });
     //Redirige al catalogo de tipo de documentos
     $( "#catdoc" ).click(function() { 
        location.href="/RedSocialBancaprepa/catalogos/catdoc.php";
     });
     //Redirige al inicio
     $( "#m_inicio" ).click(function() { 
        location.href="/RedSocialBancaprepa/index.php";
     });
      //Redirige a los accesos
     $( "#m_accesos" ).click(function() { 
        location.href="/RedSocialBancaprepa/mantenimiento/accesos.php";
     });
     
     $( "#tipoRolAc" ).keypress(function() { 
        console.log("Presionaste");
     });
     
     $( "#correos" ).click(function() { 
        location.href="/RedSocialBancaprepa/catalogos/catcorreos.php";
     });

     $( "#m_rol_usu" ).click(function() { 
        location.href="/RedSocialBancaprepa/mantenimiento/rolusu.php";
     });

     $( "#m_usuarios" ).click(function() { 
        location.href="/RedSocialBancaprepa/mantenimiento/usuariosTabla.php";
     });
     

//----------------------------------busquedas--------------------------------------------------------------------
     //Busqueda por empresa
     $("#busquedaEmpleados").keypress(function(e) {
          //inicializamos variables
        if(e.which == 13) {
            var busqueda='';
            busqueda =  $("#busquedaEmpleados").val();
            console.log(busqueda);
            onRequest({ opcion : 2,empresa:busqueda},respEmpresas);
        }
    });

    //Busqueda por roles
    $("#busquedaRoles").keypress(function(e) {
        //inicializamos variables
      if(e.which == 13) {
          var busqueda='';
          busqueda =  $("#busquedaRoles").val();
          console.log(busqueda);
          onRequest({ opcion : 3,rol:busqueda},respRoles);
      }
  });

  //Busqueda por tipo de documentos
  $("#busquedaDoc").keypress(function(e) {
    //inicializamos variables
  if(e.which == 13) {
      var busqueda='';
      busqueda =  $("#busquedaDoc").val();
      console.log(busqueda);
      onRequest({ opcion : 4,doc:busqueda},respDoc);
  }
});
 //Busqueda de correos por nombre
 $("#busquedaCorreos").keypress(function(e) {
    //inicializamos variables
  if(e.which == 13) {
      var busqueda='';
      busqueda =  $("#busquedaCorreos").val();
      console.log(busqueda);
      onRequest({ opcion : 26,nombre:busqueda},respCorreos);
  }
});
//Busqueda de usuarios
$("#busquedaUsuarios").keypress(function(e) {
    //inicializamos variables
  if(e.which == 13) {
      var busqueda='';
      busqueda =  $("#busquedaUsuarios").val();
      console.log(busqueda);
      onRequest({ opcion : 40,nom_usuario:busqueda},respCargaUsuarios);
  }
});


//-------------------------------Accion para AGREGAR DENTRO DE LOS MODAL--------------------------------
//-----------------------------------Agregar empresa------------------------------
    $("#BtnAgregarEmpresa").click(function() {
        var nombreEmp='';
        nombreEmp = $("#nomEmp").val().toUpperCase();

        if(nombreEmp==""){
            M.toast({html: 'Los datos ingresados no son correctos.', classes: 'rounded red'}); 
            return;
        }
        console.log("Presionaste el boton del modal para agregar empresa: "+nombreEmp);
        onRequest({ opcion : 5, empresa:nombreEmp},respAgregaEmpresa);

    });

//-------------------------------------AGREGAR ROLES------------------------------------
    $("#BtnAgregarRol").click(function() {
        var nombreRol='';
        nombreRol = $("#nomrol").val().toUpperCase();

        if(nombreRol==""){
            M.toast({html: 'Los datos ingresados no son correctos.', classes: 'rounded red'}); 
            return;
        }
        console.log("Presionaste el boton del modal para agregar roles: "+nombreRol);
        onRequest({ opcion : 6, rol:nombreRol},respAgregaRol);

    });
//-------------------------------------AGREGAR Tipo de documentos------------------------------------
    $("#BtnAgregarDoc").click(function() {
        var nombreDoc='';
        nombreDoc = $("#nomdoc").val().toUpperCase();
        if(nombreDoc==""){
            M.toast({html: 'Los datos ingresados no son correctos.', classes: 'rounded red'}); 
            return;
        }
        console.log("Presionaste el boton del modal para agregar tipo de documentos: "+nombreDoc);
        onRequest({ opcion : 7, doc:nombreDoc},respAgregaDoc);

    });
//-------------------------------Accion para editar DENTRO DE LOS MODAL--------------------------------
//------------------------------------------Editar empresa--------------------------------
    $("#BtnEditarEmpresa").click(function() {
        var empID ='';
        var nomAct='';
        empID = $("#idEmpEdit").val();
        nomAct = $("#nomEmpEdit").val().toUpperCase();
        if(nomAct==""){
            M.toast({html: 'Los datos ingresados no son correctos.', classes: 'rounded red'}); 
            return;
        }
        console.log("Presionaste boton de editar "+empID+nomAct);
        onRequest({ opcion : 9 ,empresa_id:empID,empresa:nomAct}, respActualizarEmp);
    });
//------------------------------------------Editar rol--------------------------------
$("#BtnEditarRol").click(function() {
    var rolID ='';
    var nomAct='';
    rolID = $("#idRolEdit").val();
    nomAct = $("#editNomRol").val().toUpperCase();
    if(nomAct==""){
        M.toast({html: 'Los datos ingresados no son correctos.', classes: 'rounded red'}); 
        return;
    }
    console.log("Presionaste boton de editar "+rolID+nomAct);
    onRequest({ opcion : 11 ,rol_id:rolID,rol:nomAct}, respActualizarRol);
});
//------------------------------------------Editar doc--------------------------------
$("#BtnEditarDoc").click(function() {
    var docID ='';
    var nomAct='';
    docID = $("#idDocEdit").val();
    nomAct = $("#editNomDoc").val().toUpperCase();
    if(nomAct==""){
        M.toast({html: 'Los datos ingresados no son correctos.', classes: 'rounded red'}); 
        return;
    }
    console.log("Presionaste boton de editar "+docID+nomAct);
    onRequest({ opcion : 13 ,doc_id:docID,doc:nomAct}, respActualizarDoc);
});

/*
$( "#btnPrueba" ).click(function() {
     var p = $('#'+id_cb).is(':checked')
});*/
///////////////////////////////////////////////////////////////////////////////////////////////////////////
//-------------------------------Accion para deshabilitar DENTRO DE LOS MODAL--------------------------------
//------------------------------------------Deshabilitar empresa-------------------------------

$("#btnDesEmp").click(function() {
    var empID ='';
    empID = $("#idEmpDes").val();
    console.log("Presionaste boton de deshanilitar "+empID);
    onRequest({ opcion : 14 ,emp_id:empID}, respDesEmpFinal);
});
//------------------------------------------Deshabilitar rol--------------------------------------

$("#btnDesRol").click(function() {
    var rolID ='';
    rolID = $("#idRolDes").val();
    console.log("Presionaste boton de deshabilitar "+rolID);
    onRequest({ opcion : 15 ,rol_id:rolID}, respDesRolFinal);
});
//------------------------------------------Deshabilitar tipo de documento--------------------------------------

$("#btnDesDoc").click(function() {
    var docID ='';
    docID = $("#idDocDes").val();
    console.log("Presionaste boton de deshabilitar "+docID);
    onRequest({ opcion : 16 ,doc_id:docID}, respDesDocFinal);
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//-------------------------------Accion para Eliminar DENTRO DE LOS MODAL--------------------------------
//------------------------------------------Eliminar empresa-------------------------------

$("#btnEliEmp").click(function() {
    var empID ='';
    empID = $("#idEmpEli").val();
    console.log("Presionaste boton de eliminar "+empID);
    onRequest({ opcion : 17 ,emp_id:empID}, respEliEmpFinal);
});
//------------------------------------------Eliminar rol--------------------------------------

$("#btnEliRol").click(function() {
    var rolID ='';
    rolID = $("#idRolEli").val();
    console.log("Presionaste boton de eliminar "+rolID);
    onRequest({ opcion : 18 ,rol_id:rolID}, respEliRolFinal);
});
//------------------------------------------Eliminar tipo de documento--------------------------------------

$("#btnEliDoc").click(function() {
    var docID ='';
    docID = $("#idDocEli").val();
    console.log("Presionaste boton de eliminar "+docID);
    onRequest({ opcion : 19 ,doc_id:docID}, respEliDocFinal);
});
//------------------------------------------Boton agregar configuracion de usuarios-----------------------------
$("#btnAgregarUsu_Rol").click(function() {
    usuario = $("#UsuariosDD2").val();
    rol = $("#tipoRolAc").val();
    console.log("Presionaste boton "+usuario+" "+rol);
    if(rol==null){
        M.toast({html: 'No tiene ningun rol seleccionado!', classes: 'rounded red'});
    }
    else{
        onRequest({ opcion : 33 ,usuario:usuario,rol:rol}, respVerificar_usu_rol);
    }
    
});

$("#btnAgregarEmp_Rol").click(function() {
    empresa = $("#Empresarol").val();
    puesto = $("#tipoPuestoAc").val();
    console.log("Presionaste boton "+empresa+" "+puesto);
    if(puesto==null){
        M.toast({html: 'No tiene ningun puesto seleccionado!', classes: 'rounded red'});
    }
    else{
        onRequest({ opcion : 42 ,idemp:empresa,idrol:puesto}, respVerificar_emp_rol);
    }
    
});


$("#btnAgregarUsu_Empresa").click(function() {
    usuario = $("#UsuariosDD2").val();
    empresa = $("#tipoEmpresaAddFile").val();  
    console.log("Presionaste boton "+usuario+" "+empresa);
    if(empresa==null){
        M.toast({html: 'No tiene ninguna empresa seleccionada!', classes: 'rounded red'});
    }
    else{
        onRequest({ opcion : 34 ,usuario:usuario,empresa:empresa}, respVerificar_usu_empresa);
    }

});

$("#btn_regresar_rolusu").click(function() {
    location.href="/RedSocialBancaprepa/mantenimiento/usuariosTabla.php";

});
$("#btn_regresar_rolemp").click(function() {
    location.href="/RedSocialBancaprepa/catalogos/catemp.php";

});
$("#btnAgEmp_PuestoTmp").click(function() {
    var usuario = Cookies.get('b_capturista_id');
    var empresa = $("#tipoEmpresaAddFile").val();  
    var puesto = $("#tipoPuestoXemp").val(); 
    console.log(usuario+" "+empresa+" "+puesto);
    onRequest({ opcion : 46 ,idemp:empresa,idpuesto:puesto, idusuario:usuario}, respTablaTmp);


});


///------------------------------------------PUBLICACIONES--------------------------------------------------------
//----------------------------------------------Agregar publicacion modal---------------------------------------- 
$("#BtnAgregarPub").click(function() {
    var textoPublicacion='';
    var tipodoc='';
    var empresa_id='';
    var rol_id='';
    var documento='';


    textoPublicacion = $("#textopub").val();
    tipodoc=$("#tipoPub").val();
    empresa_id=$("#tipoEmpresa").val();
    rol_id=$("#tipoRol").val();
    docuemento =$("#documentoCargado").val();
   
    
    console.log(documento);
 
    return;
    onRequest({ opcion : 21, texto:textoPublicacion, tipopub:tipodoc},respAgregaPublicacion);

});



//----------------------------------------------Enter al iniciar------------------------------------
    $("#password").keypress(function(e) {
        if(e.which == 13) {
            $( "#btn_login" ).click();
        }
    });

});

//-----------------------------Funciones para cargar al iniciar una pagina---------------
//Funcion que carga las empresas
function cargarEmpresas(){
    onRequest({ opcion : 2 ,empresa:""}, respEmpresas);
   
}
//Funcion para cargar roles
function cargarRoles(){
    onRequest({ opcion : 3 ,rol:""}, respRoles);
    
}

//Funcion para cargar tipo de documentos
function cargarDoc(){
    onRequest({ opcion : 4 ,doc:""}, respDoc);
   
}

//Funcion que carga las publicaciones
function cargarPublicaciones(){
    console.log("Cargar publicaciones");
    onRequest({ opcion : 20}, respCargarPublicaciones);
   
   
    
}

function cargarCorreos(){
    onRequest({ opcion : 26 ,nombre:""}, respCorreos);
    
}

function cargarMenuPorRol(){
    
    empleadoid = Cookies.get('b_capturista_id');
    console.log("id empleado= "+empleadoid);
    onRequest({ opcion : 31 ,id_usuario:empleadoid },respCargarRolesPorUsuario);
}

//cargamos el menu de publicaciones
function cargarPublicacionesB(){
    onRequest({ opcion : 27}, respCargaPublicacionesB);
    
}

function cargarUsuariosT(){
    onRequest({ opcion : 35, usuario_id:""}, respCargaUsuarios);
}


function cargarConfUsuarios(){
    var a = getParameterByName("usuario_id");
    console.log("usuario:"+a);
    onRequest({ opcion : 36 ,usuario_id:a}, respCargarConfRoles);
    onRequest({ opcion : 37 ,usuario_id:a}, respCargarConfEmpresas);
    onRequest({ opcion : 29,usuario:a},respUsuariosDDConf);
    empleadoid = Cookies.get('b_capturista_id');
    console.log("id empleado= "+empleadoid);
    onRequest({ opcion : 31 ,id_usuario:empleadoid },respCargarRolesPorUsuario);
    
}

function cargarConfEmpresa(){
    var a = getParameterByName("empresa_id");
    console.log("empresa:"+a);
    onRequest({ opcion : 8 ,empresa_id:a },respCargarEmpresaXid);
    onRequest({ opcion : 45 },respCargarPuestos);
    onRequest({ opcion : 43 ,idemp:a}, respCargarRolesXemp);
    
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}


function eliminarRol(rolid) {    
   var usuario = $("#UsuariosDD2").val();
   var rol = rolid;
   console.log("----------Eliminar ROl---------");
   console.log("usuario= "+ usuario);
   console.log("rol= "+ rol);
   onRequest({ opcion : 38 ,usuario_id:usuario,rol_id:rol },respEliminarRolUsu);

}

function eliminarEmp(empid) {    
    var usuario = $("#UsuariosDD2").val();
    var empresa = empid;
    console.log("----------Eliminar empresa---------");
    console.log("usuario= "+ usuario);
    console.log("empresa= "+ empresa);
    onRequest({ opcion : 39 ,usuario_id:usuario,empresa_id:empresa },respEliminarEmpUsu);
 }

 function eliminarRoldeEmp(rolid) {    
    var empresa = $("#Empresarol").val();
    var rol = rolid;
    console.log("----------Eliminar puesto de empresa---------");
    console.log("empresa= "+ empresa);
    console.log("pusto= "+ rol);
    onRequest({ opcion : 44 ,idemp:empresa,idrol:rol },respEliminarRolEmp);
 
 }
 //Cargar los roles en la pagina addfile
 function cargarRolesAf(empid) {    
     var empresa = empid;
     console.log("------------------------ "+empresa);
     onRequest({ opcion : 43 ,idemp:empresa}, respCargarRolesXempChb);

 }
 

//----------------------------------------Funcion de respuesta de la consulta que aplicamos con ajax-----------------------------
var respUser = function(data) { 

    if (!data && data == null) 
        return;   
    
        console.log(data)
            // validamos que exista una respuesta
      if (data[0].empleado_id>0) { 
 
            Cookies.set("b_capturista_id", data[0].empleado_id );
            Cookies.set("b_usuario", data[0].usuario );
            Cookies.set("b_capturista",data[0].capturista);
            Cookies.set("b_rol_id",data[0].rol_id); 

            location.href="/RedSocialBancaprepa/index.php";

         return;
     }
     else{ 
        M.toast({html: 'El usuario o la contraseña no son correctos.', classes: 'rounded red'}); 
     }
}
//---------------------------------------------------CARGAR CATALOGOS--------------------------------------------------
// Funcion de respuesta de la consulta que aplicamos con ajax para el catalogo de empresas
var respEmpresas = function(data) { 
    
    if (!data && data == null) 
    return; 

    var d = '';

     for (var i = 0; i < data.length; i++) {
     d+= '<tr>'+
     '<td>'+data[i].empresa_id+'</td>'+
     '<td>'+data[i].nombre+'</td>'+
     '<td>'+data[i].estatus+'</td>'+ 
     '<td class="left">'+
     '<a onclick="editarEmp('+data[i].empresa_id+')" class="waves-effect waves-light btn-floating btn-small blue btn modal-trigger" href="#modalEditarEmp"><i class="material-icons">edit</i></a>' + 
     '<a onclick="deshabEmp('+data[i].empresa_id+')" class="waves-effect waves-light btn-floating btn-small orange darken-3 btn modal-trigger" href="#modalDeshabEmp"><i class="material-icons">do_not_disturb_alt</i></a>' + 
     '<a onclick="BorrarEmp('+data[i].empresa_id+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalEliminarEmp"><i class="material-icons">delete</i></a>' +
     '<a onclick="editRolesdeEmp('+data[i].empresa_id+')" class="waves-effect waves-light btn-floating btn-small indigo darken-4 btn modal-trigger"><i class="material-icons">build</i></a>' +
     '</td>'  +'</tr> ';
     }
     
     $("#tablaemp").html(d);

     cargarMenuPorRol();
}
// ---------------------------------------------------CATALOGO DE ROLES---------------------------------------------------
var respRoles = function(data) { 
    
    if (!data && data == null) 
    return; 

    var d = '';

     for (var i = 0; i < data.length; i++) {
     d+= '<tr>'+
     '<td>'+data[i].rol_id+'</td>'+
     '<td>'+data[i].descripcion+'</td>'+
     '<td>'+data[i].estatus+'</td>'+ 
     '<td class="left">'+
     '<a onclick="editarRol('+data[i].rol_id+')" class="waves-effect waves-light btn-floating btn-small blue btn modal-trigger" href="#modalEditarRol"><i class="material-icons">edit</i></a>' + 
     '<a onclick="deshabRol('+data[i].rol_id+')" class="waves-effect waves-light btn-floating btn-small orange darken-3 btn modal-trigger" href="#modalDeshabRol"><i class="material-icons">do_not_disturb_alt</i></a>' + 
     '<a onclick="BorrarRol('+data[i].rol_id+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalEliminarRol"><i class="material-icons">delete</i></a>' +
     '</td>'  +'</tr> ';
     }
     
     $("#tablarol").html(d);

     cargarMenuPorRol();
}
// ---------------------------------------------------CATALOGO DE tipo DE DOCUMENTOS---------------------------------------------------
var respDoc = function(data) { 
    
    if (!data && data == null) 
    return; 

    var d = '';
    var x = '';



     for (var i = 0; i < data.length; i++) {
     if(i%2==0)
     {
         x='even';
     }
     else
     {
         x='odd';
     }
     d+= '<tr>'+
     '<td>'+data[i].doc_id+'</td>'+
     '<td>'+data[i].descripcion+'</td>'+
     '<td>'+data[i].estatus+'</td>'+ 
     '<td class="'+x+' left">'+
     '<a onclick="editarDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small blue btn modal-trigger" href="#modalEditarDoc"><i class="material-icons">edit</i></a>' + 
     '<a onclick="deshabDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small orange darken-3 btn modal-trigger" href="#modalDeshabDoc"><i class="material-icons">do_not_disturb_alt</i></a>' + 
     '<a onclick="BorrarDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalEliminarDoc"><i class="material-icons">delete</i></a>' +
     '</td>'  +'</tr> ';
     }
     
     $("#tabladoc").html(d);

     cargarMenuPorRol();
}

// ---------------------------------------------------CATALOGO DE CORREOS---------------------------------------------------
var respCorreos = function(data) { 
    
    if (!data && data == null) 
    return; 

    var d = '';
    var x = '';



     for (var i = 0; i < data.length; i++) {
     if(i%2==0)
     {
         x='even';
     }
     else
     {
         x='odd';
     }
     d+= '<tr>'+
     '<td>'+data[i].dominio+'</td>'+
     '<td>'+data[i].sucursal+'</td>'+
     '<td>'+data[i].nombrecompleto+'</td>'+ 
     '<td>'+data[i].correo+'</td>'+ 
     '<td class="'+x+' left">'+
     '<a onclick="editarDoc('+data[i].correo+')" class="waves-effect waves-light btn-floating btn-small blue btn modal-trigger" href="#modalEditarDoc"><i class="material-icons">edit</i></a>' + 
     '<a onclick="deshabDoc('+data[i].correo+')" class="waves-effect waves-light btn-floating btn-small orange darken-3 btn modal-trigger" href="#modalDeshabDoc"><i class="material-icons">do_not_disturb_alt</i></a>' + 
     '<a onclick="BorrarDoc('+data[i].correo+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalEliminarDoc"><i class="material-icons">delete</i></a>' +
     '</td>'  +'</tr> ';
     }
     
     $("#tablaCorreos").html(d);

     cargarMenuPorRol();
}
//----------------------------RESPUESTAS PARA INSERTAR DATOS------------------------------
//----------------------------insertar empresa---------------------------------------
var respAgregaEmpresa = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Empresa NO agregada', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Empresa agregada', classes: 'rounded blue'}); 
    
    $("#modalAgregarEmp").modal("close");

    onRequest({ opcion : 2 ,empresa:""}, respEmpresas);
}
//--------------------------insertar roles-----------------------------------------
var respAgregaRol = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Rol NO agregado', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Rol agregado', classes: 'rounded blue'}); 
    
    $("#modalAgregarRoles").modal("close");

    onRequest({ opcion : 3 ,rol:""}, respRoles);
}
//--------------------------insertar tipo de documentos----------------------------------
var respAgregaDoc = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Tipo de documento NO agregado', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Tipo de documento agregado', classes: 'rounded blue'}); 
    
    $("#modalAgregarDoc").modal("close");

    onRequest({ opcion : 4 ,doc:""}, respDoc);
}
//-----------------------------------------Respuestas para editar-------------------------
//--------------------------------Editar empresa---------------------------------------
var respEditEmp = function(data) { 

    if (!data && data == null) 
        return;   
    
        console.log(data)
            // validamos que exista una respuesta
      if (data[0].empresa_id>0) { 
          console.log(data[0].nombre);
        $("#idEmpEdit").val(data[0].empresa_id);
        $("#nomEmpEdit").val(data[0].nombre);

         return;
     }
     
}
var respActualizarEmp = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Empresa No Actualizada', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Empresa Actualizada!', classes: 'rounded blue'}); 

    $("#modalEditarEmp").modal("close");

    onRequest({ opcion : 2 ,empresa:""}, respEmpresas);
}
//------------------------------------Editar ROL-------------------------------
var respEditRol = function(data) { 

    if (!data && data == null) 
        return;   
    
        console.log(data)
            // validamos que exista una respuesta
      if (data[0].rol_id>0) { 
            $("#idRolEdit").val(data[0].rol_id);
            $("#editNomRol").val(data[0].descripcion);

         return;
     }
     
}
var respActualizarRol = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Rol No Actualizado', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Rol Actualizado!', classes: 'rounded blue'}); 

    $("#modalEditarRol").modal("close");

    onRequest({ opcion : 3 ,rol:""}, respRoles);
}
//------------------------------------Editar tipo de documento-------------------------------
var respEditDoc = function(data) { 

    if (!data && data == null) 
        return;   
    
        console.log(data)
            // validamos que exista una respuesta
      if (data[0].doc_id>0) { 
            $("#idDocEdit").val(data[0].doc_id);
            $("#editNomDoc").val(data[0].descripcion);

         return;
     }
     
}
var respActualizarDoc = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Tipo de documento No Actualizado', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Tipo de documento Actualizado!', classes: 'rounded blue'}); 

    $("#modalEditarDoc").modal("close");

    onRequest({ opcion : 4 ,doc:""}, respDoc);
}
//_---------------------------------Respuestas para deshabilitar-----------------------------
//---------------------------deshabilitar empresa-------------------------------
var respDesEmp = function(data) { 
    if (!data && data == null) 
    return;   

    console.log(data)
        // validamos que exista una respuesta
  if (data[0].empresa_id>0) { 
      console.log(data[0].nombre);
    $("#idEmpDes").val(data[0].empresa_id);
    $("#nomEmpDes").val(data[0].nombre);

     return;
 }
   
}

var respDesEmpFinal = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Empresa no deshabilitada', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Empresa deshabilitada', classes: 'rounded blue'}); 

    $("#modalDeshabEmp").modal("close");

    onRequest({ opcion : 2 ,empresa:""}, respEmpresas);
}
//-----------------------------deshabilitar roles--------------------------
var respDesRol = function(data) { 
    if (!data && data == null) 
    return;   

    console.log(data)
        // validamos que exista una respuesta
  if (data[0].rol_id>0) { 
      console.log(data[0].descripcion);
    $("#idRolDes").val(data[0].rol_id);
    $("#nomRolDes").val(data[0].descripcion);

     return;
 }
   
}

var respDesRolFinal = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Rol no deshabilitado', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Rol deshabilitado', classes: 'rounded blue'}); 

    $("#modalDeshabRol").modal("close");

    onRequest({ opcion : 3 ,rol:""}, respRoles);
}
//-----------------------------deshabilitar tipo de documentos------------------------------
var respDesDoc = function(data) { 
    if (!data && data == null) 
    return;   

    console.log(data)
        // validamos que exista una respuesta
  if (data[0].doc_id>0) { 
      console.log(data[0].descripcion);
    $("#idDocDes").val(data[0].doc_id);
    $("#nomDocDes").val(data[0].descripcion);

     return;
 }
   
}

var respDesDocFinal = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Tipo de documento no deshabilitado', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Tipo de documento deshabilitado', classes: 'rounded blue'}); 

    $("#modalDeshabDoc").modal("close");

    onRequest({ opcion : 4 ,doc:""}, respDoc);
}


//_---------------------------------------------------------Respuestas para ELIMINAR-------------------------------------------------------------------------
//---------------------------Eliminar empresa-------------------------------
var respEliEmp = function(data) { 
    if (!data && data == null) 
    return;   

    console.log(data)
        // validamos que exista una respuesta
  if (data[0].empresa_id>0) { 
      console.log(data[0].nombre);
    $("#idEmpEli").val(data[0].empresa_id);
    $("#nomEmpEli").val(data[0].nombre);

     return;
 }
   
}

var respEliEmpFinal = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Empresa no eliminada', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Empresa eliminada', classes: 'rounded red accent-4'}); 

    $("#modalEliminarEmp").modal("close");

    onRequest({ opcion : 2 ,empresa:""}, respEmpresas);
}
//-----------------------------Eliminar roles--------------------------
var respEliRol = function(data) { 
    if (!data && data == null) 
    return;   

    console.log(data)
        // validamos que exista una respuesta
  if (data[0].rol_id>0) { 
      console.log(data[0].descripcion);
    $("#idRolEli").val(data[0].rol_id);
    $("#nomRolEli").val(data[0].descripcion);

     return;
 }
   
}

var respEliRolFinal = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Rol no eliminado', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Rol eliminado', classes: 'rounded red accent-4'}); 

    $("#modalEliminarRol").modal("close");

    onRequest({ opcion : 3 ,rol:""}, respRoles);
}
//-----------------------------Eliminar tipo de documentos------------------------------
var respEliDoc = function(data) { 
    if (!data && data == null) 
    return;   

    console.log(data)
        // validamos que exista una respuesta
  if (data[0].doc_id>0) { 
      console.log(data[0].descripcion);
    $("#idDocEli").val(data[0].doc_id);
    $("#nomDocEli").val(data[0].descripcion);

     return;
 }
   
}

var respEliDocFinal = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Tipo de documento no eliminado', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Tipo de documento eliminado', classes: 'rounded orange darken-3'}); 

    $("#modalEliminarDoc").modal("close");

    onRequest({ opcion : 4 ,doc:""}, respDoc);
}
//------------------------------------------------PUBLICACIONES------------------------------------------
//----------------------------------------Cargar publicaciones en index---------------------------
var respCargarPublicaciones = function(data) { 
    
    if (!data && data == null) 
    return; 

    var d = '';

     for (var i = 0; i < data.length; i++) {
     d+= '<li class="collection-item avatar"> <span class="title"> <strong>'+data[i].publicador+'</strong></span>'+
     '<p>'+data[i].descripcion+'</p>'+
     '</li>';
     }
     
     $("#cargarPubli").html(d);

     cargarConfUsuarios();
}
//---------------------------------------------Agregar publicaciones------------------------------
var respAgregaPublicacion = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Publicacion no agregada, consulte con el area de sistemas', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Publicacion Agregada!', classes: 'rounded #43a047 green darken-1'}); 

    $("#modalAgregarPub").modal("close");

    onRequest({ opcion : 20}, respCargarPublicaciones);


}
// ---------------------------------------CARGAMOS TODOS LOS SELECTS ---------------------------------------
 

var respTpublic = function(data) { 
    if (!data && data == null)
        return; 

     
    var documento='<option  disabled selected>Seleccione el Tipo de publicacion</option>';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].doc_id+'>'+data[i].descripcion+'</option>';
    }
    
    $('#tipoPub').html(documento);
    $('#tipoPub').formSelect();  

    $('#tipoPubAddFile').html(documento);
    $('#tipoPubAddFile').formSelect();


    

}
///---------------------------------------RESPUESTAS PARA LOS DROPDOWNLIST
var respEmpresa = function(data) { 
    if (!data && data == null)
        return;  
     
    var documento='<option  disabled selected>Seleccione la Empresa</option>';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].empresa_id+'>'+data[i].nombre+'</option>';
    }
    
    $('#tipoEmpresa').html(documento);
    $('#tipoEmpresa').formSelect(); 

    $('#tipoEmpresaAddFile').html(documento);
    $('#tipoEmpresaAddFile').formSelect(); 
}
var respRol = function(data) { 
    if (!data && data == null)
        return;  
 
    var documento='<option   disabled selected>Seleccione el Rol</option>';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].rol_id+'>'+data[i].descripcion+'</option>';
    }
    
    $('#tipoRol').html(documento);
    $('#tipoRol').formSelect(); 

    $('#tipoRolAddFile').html(documento);
    $('#tipoRolAddFile').formSelect(); 
}

var respRolAccesos = function(data) { 
    if (!data && data == null)
        return;  
        

        console.log(data)
    var documento='<option value="0" disabled selected>Seleccione el Tipo de rol</option>';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].rol_id+'>'+data[i].descripcion+'</option>';
    }
    
    $('#tipoRolAc').html(documento);
    $('#tipoRolAc').formSelect(); 

    $('#tipoRolAcAddFile').html(documento);
    $('#tipoRolAcAddFile').formSelect(); 
}


var respUsuariosDD = function(data) { 
    if (!data && data == null)
        return;  
 
    var documento='<option value="0" disabled selected>Seleccione el usuario</option>';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].id+'>'+data[i].nombre+'</option>';
    }
    console.log("checarc");
    
    $('#UsuariosDD').html(documento);
    $('#UsuariosDD').formSelect(); 

}

var respUsuariosDDConf = function(data) { 
    if (!data && data == null)
        return;  
 
    var documento='';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].id+' selected>'+data[i].nombre+'</option>';
        console.log("checarc2 "+data[i].id);
    }
    console.log("checarc2");
    
    $('#UsuariosDD2').html(documento);
    $('#UsuariosDD2').formSelect(); 

}
//---------------------------------------respuesta para los check de los accesos dependiendo del rol---------
var respAccesosPorRol  = function(data) { 
    if (!data && data == null)
        return;  
 
    for(var i=0; i<data.length; i++){
        switch(data[i].id_menu)
        {
            case '1': 
                $('#agregarPub').prop('checked', true); 
                break;
            case '2':
                $('#mandarTicket').prop('checked', true);
                break;
            case '3':
                $('#catEmp').prop('checked', true);
                break;
            case '4':
                $('#catRoles').prop('checked', true);
                break;
            case '5':
                $('#tipoDoc').prop('checked', true);
                break;
            case '6':
                $('#cargarArchivos').prop('checked', true);
                break;
            case '7':
                $('#usuarios').prop('checked', true);
                break;
            case '8':
                $('#accesosCheck').prop('checked', true); 
                break;
            case '9':
                $('#correosCheck').prop('checked', true); 
                break;
            case '10':
                $('#rolesUsuCh').prop('checked', true); 
                break;
            case '11':
                $('#bancaprepaCh').prop('checked', true); 
                break;
        }    
    }
} 


//---------Respuesta para actualizar los accesos al menu de agregar publicacion
var respUpdateAccesos = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Acceso no actualizado, consulte con el area de sistemas', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Acceso Actualizado!', classes: 'rounded #43a047 green darken-1'}); 

    //Actualiza de nuevo los accesos
    
}

//---------Respuesta de la imagen insertada
var respPublicacion = function(data) { 
    if (!data && data == null)
             return;  

             $( "#formFiles" ).submit();
    
    console.log(data);     
}


//---------------Respuesta para cargar menus---------

var respCargarMenu  = function(data) { 
    if (!data && data == null)
        return;  

       // console.log(data)
 
    for(var i=0; i<data.length; i++){
        switch(data[i].id_menu)
        {
            case '1': 
                $('#m_agregarPub').removeClass("subheader"); 
                break;
            case '2':
                $('#m_mandarT').removeClass("subheader"); 
                break;
            case '3':
                $('#catemp').removeClass("subheader"); 
                break;
            case '4':
                $('#catroles').removeClass("subheader"); 
                break;
            case '5':
                $('#catdoc').removeClass("subheader"); 
                break;
            case '6':
                $('#M_cargaA').removeClass("subheader"); 
                break;
            case '7':
                $('#m_usuarios').removeClass("subheader"); 
                break;
            case '8':
                $('#m_accesos').removeClass("subheader"); 
                break;
            case '9':
                 $('#correos').removeClass("subheader"); 
                break;
            case '10':
                $('#m_rol_usu').removeClass("subheader"); 
               break;
            case '11':
               $('#m_bancaprepa').removeClass("subheader"); 
              break;

        }    
    }
  //  $('#accesosRol').html(documento);
}

///////////////////////////////////////////////////////////////////////////////////////
//funciones del catalogo de empresas
function editarEmp(emp_id)
{
    //Carga la empresa por su id para despues editarla
    onRequest({ opcion : 8 ,empresa_id:emp_id}, respEditEmp);
}

function deshabEmp(emp_id)
{
    //Carga la empresa por su id para despues deshabilitarla
    onRequest({ opcion : 8 ,empresa_id:emp_id}, respDesEmp);
}

function BorrarEmp(emp_id)
{
    //Carga la empresa por su id para despues borrarla
    onRequest({ opcion : 8 ,empresa_id:emp_id}, respEliEmp);
}
//Funciones del catalogo de roles
function editarRol(rol_id)
{
    //Carga el rol por su id para despues editarlo
    onRequest({ opcion : 10 ,rol_id:rol_id}, respEditRol);
}

function deshabRol(rol_id)
{
    //Carga el rol por su id para despues deshabilitarlo
    onRequest({ opcion : 10 ,rol_id:rol_id}, respDesRol);
}

function BorrarRol(rol_id)
{
    //Carga el rol por su id para despues borrarlo  
    onRequest({ opcion : 10 ,rol_id:rol_id}, respEliRol);
}
//Funciones del catalogo de documentos
function editarDoc(doc_id)
{
    //Carga el tipo de documento por su id para despues editarlo
    onRequest({ opcion : 12 ,doc_id:doc_id}, respEditDoc);
}

function deshabDoc(doc_id)
{
    //Carga el tipo de documento por su id para despues deshabilitarlo
    onRequest({ opcion : 12 ,doc_id:doc_id}, respDesDoc);
}

function BorrarDoc(doc_id)
{
     //Carga el tipo de documento por su id para despues borrarlo
     onRequest({ opcion : 12 ,doc_id:doc_id}, respEliDoc);
}

function editarUsu(usuarioid)
{
     //Carga los datos del usuario, su empresa(s) y rol(es)
     //

     var a = document.createElement('a');
     a.href="/RedSocialBancaprepa/mantenimiento/rolusu.php?usuario_id="+usuarioid;
     document.body.appendChild(a);
     a.click();
}

function cargarAccesos(rol_id){ 

    $('#agregarPub').prop('checked', false);  
    $('#mandarTickket').prop('checked', false); 
    $('#catEmp').prop('checked', false); 
    $('#catRoles').prop('checked', false); 
    $('#tipoDoc').prop('checked', false); 
    $('#cargarArchivos').prop('checked', false); 
    $('#usuarios').prop('checked', false); 
    $('#accesosCheck').prop('checked', false);
    $('#correosCheck').prop('checked', false);
    $('#rolesUsuCh').prop('checked', false);
    $('#bancaprepaCh').prop('checked', false);


    onRequest({ opcion : 22 ,id_rol:rol_id}, respAccesosPorRol);
       
}

function habDesAccesos(id_rol,id_cb,menu_id)
{
    
    console.log("prueba check "+id_rol+" "+id_cb+" "+menu_id);
    if($('#'+id_cb).is(':checked'))
    {
        onRequest({ opcion : 23 ,id_rol:id_rol, id_menu:menu_id }, respUpdateAccesos);
        console.log("Esta check");
    }
    else{
        console.log("No esta check");
        onRequest({ opcion : 24 ,id_rol:id_rol, id_menu:menu_id }, respUpdateAccesos);
    }  
}

function editRolesdeEmp(id_emp)
{
    var a = document.createElement('a');
     a.href="/RedSocialBancaprepa/mantenimiento/rolemp.php?empresa_id="+id_emp;
     document.body.appendChild(a);
     a.click();

}

function eliminarDeTablaTmp(id_emp,id_puesto)
{
    console.log("empresa y sueldo "+id_emp," ",id_puesto);
    onRequest({ opcion : 48 ,empresa:id_emp, puesto:id_puesto }, respEliminarDatoDeTmp);

}

//respuesta de menu publicaciones 
var respCargaPublicacionesB = function(data) { 
    if (!data && data == null)
             return;  

                //console.log(data)
             var documento='';
             var primerMenu=0;

             for(var i=0; i<data.length; i++){

                if(i==0){
                    primerMenu = data[i].id;
                    documento+="<li class='tab active'><a onClick='cargarPublicacion("+data[i].id+")' >"+data[i].docuemento+"</a></li>";
                } 
                else{
                    documento+="<li class='tab'><a onClick='cargarPublicacion("+data[i].id+")' >"+data[i].docuemento+"</a></li>";
                }
                  
             }
              
         
             $('#tipoPublicacion').html(documento); 

             cargarPublicacion(primerMenu);

             cargarMenuPorRol();
}

function cargarPublicacion(primerMenu){
    var capturista_id="";
    capturista_id=Cookies.get('b_capturista_id');

    onRequest({ opcion : 28,capturista_id:capturista_id,menu:primerMenu}, respLasPublicaciones);

}

var respLasPublicaciones = function(data) { 
    if (!data && data == null)
             return;
             console.log(data)
}

var respUsuarios_rol = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Usuario no actualizado, consulte con el area de sistemas', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Agregado rol a usuario!', classes: 'rounded #43a047 green darken-1'}); 

    //Actualiza la pagina
    cargarConfUsuarios();
    
}

var respUsuarios_empresa = function(data) { 
    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Usuario no actualizado, consulte con el area de sistemas', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Agregado empresa a usuario!', classes: 'rounded #43a047 green darken-1'}); 

    //Actualiza la pagina
    cargarConfUsuarios();
    
}

var respCargarRolesPorUsuario = function(data){
    if (!data && data == null)
    {
        M.toast({html: 'Usuario sin roles', classes: 'rounded red'}); 
        return;
    }
    
    for(var i=0; i<data.length; i++){
        var idrol=data[i].rolid;
      //  console.log(idrol);
        onRequest({ opcion : 22 ,id_rol:idrol },respCargarMenu);
    }
}


var respVerificar_usu_rol  = function(data) { 
    if (!data && data == null)
        return;  
    
    
    for(var i=0; i<data.length; i++){
        if(data[i].contador >= 1)
        {
            M.toast({html: '¡El usuario ya cuenta con el rol seleccionado!.', classes: 'rounded red'}); 
        }
        else{
            usuario = $("#UsuariosDD2").val();
            rol = $("#tipoRolAc").val();
            console.log("usuario y rol"+usuario+" "+rol);
            onRequest({ opcion : 30 ,usuario:usuario,rol:rol}, respUsuarios_rol);
        }
    }
}


var respVerificar_usu_empresa  = function(data) { 
    if (!data && data == null)
        return;  
    
    
    for(var i=0; i<data.length; i++){
        if(data[i].contador >= 1)
        {
            M.toast({html: '¡El usuario ya cuenta con la empresa seleccionada!.', classes: 'rounded red'}); 
        }
        else{
            usuario = $("#UsuariosDD2").val();
            empresa = $("#tipoEmpresaAddFile").val();  
            console.log("Presionaste boton "+usuario+" "+empresa);
            onRequest({ opcion : 32 ,usuario:usuario,empresa:empresa}, respUsuarios_empresa);

        }
    }
    cargarConfUsuarios();
        

}
var respCargaUsuarios  = function(data) { 
    
    if (!data && data == null) 
    return; 

    var d = '';

     for (var i = 0; i < data.length; i++) {
     d+= '<tr>'+
     '<td>'+data[i].id+'</td>'+
     '<td>'+data[i].nombre+'</td>'+
     '<td>'+data[i].usuario+'</td>'+ 
     '<td>'+data[i].estatus+'</td>' +
     '<td class="left">'+
     '<a onclick="editarUsu('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small blue btn modal-trigger"><i class="material-icons">edit</i></a>'+
     //'<a onclick="deshabEmp('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small orange darken-3 btn modal-trigger" href="#modalDeshabEmp"><i class="material-icons">do_not_disturb_alt</i></a>' + 
     //'<a onclick="BorrarEmp('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalEliminarEmp"><i class="material-icons">delete</i></a>' +
     '</td>'  +'</tr> ';
     }
     
     $("#tablaUsuarios").html(d);

     cargarMenuPorRol();

}

var respCargarConfRoles = function(data) { 
    
    if (!data && data == null) 
    return; 

    var d = '';

     for (var i = 0; i < data.length; i++) {
         
         var roles=String(data[i].roles);
         console.log("-------"+roles);
         if(roles=="undefined")
         {
            d+= '<tr>'+
            '<td>Sin Roles</td>'+
            '<td class="left">'+ 
            '</tr> ';  
            $("#tablaRolUsuario").html(d);
         }
         else
         {
            d+= '<tr>'+
            '<td>'+data[i].roles+'</td>'+
            '<td class="left">'+
            '<a onclick="eliminarRol('+data[i].id_rol+')" class="waves-effect waves-light btn-floating btn-small red darken-4 btn modal-trigger"><i class="material-icons">delete_forever</i></a>'+ 
            '</tr> ';  
            $("#tablaRolUsuario").html(d);
         }

    }

}


var respCargarConfEmpresas = function(data) { 
    
    if (!data && data == null) 
    return; 

    var d = '';

     for (var i = 0; i < data.length; i++) {
        var empresas=String(data[i].empresas);
        console.log("-------"+empresas);
        if(empresas=="undefined")
        {
           d+= '<tr>'+
           '<td>Sin Empresas</td>'+
           '<td class="left">'+ 
           '</tr> ';  
           $("#tablaEmpUsuario").html(d);
        }
        else
        {
            d+= '<tr>'+
            '<td>'+data[i].empresas+'</td>'+ 
            '<td class="left">'+
            '<a onclick="eliminarEmp('+data[i].id_emp+')" class="waves-effect waves-light btn-floating btn-small red darken-4 btn modal-trigger"><i class="material-icons">delete_forever</i></a>'+ 
            '</tr> ';

            $("#tablaEmpUsuario").html(d);
        }
     }
     
     

}


var respEliminarRolUsu = function(data) { 
    console.log("--------------"+data);
    if (!data && data == null)
    {
        M.toast({html: 'Rol no actualizado, contacte con el departamento de sistemas', classes: 'rounded red'});  
        return;
    }
    
    M.toast({html: 'Rol eliminado!.', classes: 'rounded red'});  

    //Actualiza de nuevo los accesos

    cargarConfUsuarios();
    console.log("Actualizado!!");
}

var respEliminarEmpUsu = function(data) { 
    console.log("--------------"+data);
    if (!data && data == null)
    {
        M.toast({html: 'Empresa no actualizado, contacte con el departamento de sistemas', classes: 'rounded red'});  
        return;
    }
    
    M.toast({html: 'Empresa eliminada!.', classes: 'rounded red'});  

    //Actualiza de nuevo los accesos

    cargarConfUsuarios();
    console.log("Actualizado!!");
}

var respCargarEmpresaXid = function(data) { 
    if (!data && data == null)
        return;  
 
    var documento='';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].empresa_id+' selected>'+data[i].nombre+'</option>';
        console.log("empresa "+data[i].empresa_id);
    }
   
    
    $('#Empresarol').html(documento);
    $('#Empresarol').formSelect();    
}

var respVerificar_emp_rol  = function(data) { 
    if (!data && data == null)
        return;  
    
    
    for(var i=0; i<data.length; i++){
        if(data[i].contador >= 1)
        {
            M.toast({html: '¡La empresa ya cuenta con el puesto seleccionado!.', classes: 'rounded red'}); 
        }
        else{
            empresa = $("#Empresarol").val();
            rol = $("#tipoPuestoAc").val();
            console.log("empresa y rol"+empresa+" "+rol);
            onRequest({ opcion : 41 ,idemp:empresa,idrol:rol}, respEmpresas_rol);
        }
    }
}

var respEmpresas_rol  = function(data) { 

    console.log(data);
    if (!data && data == null)
    {
        M.toast({html: 'Empresa no actualizado, consulte con el area de sistemas', classes: 'rounded red'}); 
        return;
    }
    
    M.toast({html: 'Agregado puesto a empresa!', classes: 'rounded #43a047 green darken-1'}); 

    //Actualiza la pagina
    cargarConfEmpresa();
}

var respCargarRolesXemp = function(data) { 
    
    if (!data && data == null) 
    return; 

    var d = '';

     for (var i = 0; i < data.length; i++) {
         
         var roles=String(data[i].nombre);
         console.log("-------"+roles);
         if(roles=="undefined")
         {
            d+= '<tr>'+
            '<td>Sin puestos seleccionados</td>'+
            '<td class="left">'+ 
            '</tr> ';  
            $("#tablaRolEmpresa").html(d);
         }
         else
         {
            d+= '<tr>'+
            '<td>'+data[i].nombre+'</td>'+
            '<td class="left">'+
            '<a onclick="eliminarRoldeEmp('+data[i].id_rol+')"  class="waves-effect waves-light btn-floating btn-small red darken-4 btn modal-trigger tooltipped" data-tooltip="I am a tooltip" data-delay="50"  ><i class="material-icons">delete_forever</i></a>'+ 
            '</tr> ';  
            $("#tablaRolEmpresa").html(d);
         }

    }
    cargarMenuPorRol();
}


var respEliminarRolEmp = function(data) { 
    console.log("--------------"+data);
    if (!data && data == null)
    {
        M.toast({html: 'Puesto no eliminado, contacte con el departamento de sistemas', classes: 'rounded red'});  
        return;
    }
    
    M.toast({html: 'Puesto eliminado!.', classes: 'rounded red'});  

    //Actualiza de nuevo los accesos

    cargarConfEmpresa();
    console.log("Actualizado!!");
}


var respCargarRolesXempChb = function(data) { 
    
    if (!data && data == null) 
    return; 

    var d = '';

    var documento='<option value="0"  selected>Todos</option>';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].id_rol+'>'+data[i].nombre+'</option>';
    }
    $('#tipoPuestoXemp').html(documento);
    $('#tipoPuestoXemp').formSelect(); 
    
}

var respCargarPuestos = function(data) { 
    if (!data && data == null)
        return;  
        

        console.log(data)
    var documento='<option value="0" disabled selected>Seleccione el puesto</option>';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].id+'>'+data[i].nombre+'</option>';
    }
   
    $('#tipoPuestoAc').html(documento);
    $('#tipoPuestoAc').formSelect(); 
   
}

var respTablaTmp = function(data) { 
    console.log("--------------"+data);
    if (!data && data == null)
    {
        M.toast({html: 'Datos no actualizados, contacte con el departamento de sistemas', classes: 'rounded red'});  
        return;
    }
    
    M.toast({html: 'Datos actualizados!', classes: 'rounded green'});  
    var usuario = Cookies.get('b_capturista_id');
    onRequest({ opcion : 47 ,idusuario:usuario}, respCargarTablaTmp);
}

var respCargarTablaTmp = function(data) { 
    if (!data && data == null) 
    return; 

    var d = '';

     for (var i = 0; i < data.length; i++) {    
            d+= '<tr>'+
            '<td>'+data[i].empresa+'</td>'+
            '<td>'+data[i].puesto+'</td>'+
            '<td class="left">'+
            '<a onclick="eliminarDeTablaTmp('+data[i].id_empresa+','+data[i].id_puesto+')"  class="waves-effect waves-light btn-floating btn-small red darken-4 btn modal-trigger tooltipped" data-tooltip="I am a tooltip" data-delay="50"  ><i class="material-icons">delete_forever</i></a>'+ 
            '</tr> '; 
    }
    $("#tablaPuestoEmpresa").html(d);
}

var respEliminarDatoDeTmp = function(data) { 
    
    if (!data && data == null)
    {
        M.toast({html: 'Datos no eliminados, contacte con el departamento de sistemas', classes: 'rounded red'});  
        return;
    }
    
    M.toast({html: 'Datos Eliminados!', classes: 'rounded green'});  
    var usuario = Cookies.get('b_capturista_id');
    onRequest({ opcion : 47 ,idusuario:usuario}, respCargarTablaTmp);
    
}
