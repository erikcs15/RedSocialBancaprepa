// Funcion principal de Jquery la cual escanea en tiempo real nuestro documento para verificar que los eventos se ejecuten correctamente
$(document).ready(function(){
 
    //inicializamos selects
    onRequest({ opcion : 4,doc:''},respTpublic);
    onRequest({ opcion : 2,empresa:''},respEmpresa);
    onRequest({ opcion : 3,rol:''},respRol);
    onRequest({ opcion : 3,rol:''},respRolAccesos);

    //Inicializamos menu
    $('.dropdown-trigger').dropdown();
    //contador de caracteres para tex area
    $('textarea#textopub').characterCounter();
     //inicializar el modal
     $(document).ready(function(){
        $('.modal').modal();
      });
      
       
     //evento de switch de logeo 
     $( "#chkDoc" ).click(function() {  
        if($(this).is(":checked")) {
             $("#btnDocumento").removeClass('grey');
             $("#documentoCargado").removeAttr("disabled");
          }
          else {
            $("#btnDocumento").addClass('grey');
            $("#documentoCargado").attr('disabled','disabled');
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
     $( "#inicio" ).click(function() { 
        location.href="/RedSocialBancaprepa/index.php";
     });
      //Redirige a los accesos
     $( "#accesos" ).click(function() { 
        location.href="/RedSocialBancaprepa/mantenimiento/accesos.php";
     });
     
     $( "#tipoRolAc" ).keypress(function() { 
        console.log("Presionaste");
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
     '</td>'  +'</tr> ';
     }
     
     $("#tablaemp").html(d);
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

     
    var documento='<option value="0" disabled selected>Seleccione el Tipo de publicacion</option>';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].doc_id+'>'+data[i].descripcion+'</option>';
    }
    
    $('#tipoPub').html(documento);
    $('#tipoPub').formSelect();  

}
var respEmpresa = function(data) { 
    if (!data && data == null)
        return;  
     
    var documento='<option value="0" disabled selected>Seleccione el Tipo de publicacion</option>';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].empresa_id+'>'+data[i].nombre+'</option>';
    }
    
    $('#tipoEmpresa').html(documento);
    $('#tipoEmpresa').formSelect(); 
}
var respRol = function(data) { 
    if (!data && data == null)
        return;  
 
    var documento='<option value="0" disabled selected>Seleccione el Tipo de publicacion</option>';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].rol_id+'>'+data[i].descripcion+'</option>';
    }
    
    $('#tipoRol').html(documento);
    $('#tipoRol').formSelect(); 
}

var respRolAccesos = function(data) { 
    if (!data && data == null)
        return;  
 
    var documento='<option value="0" disabled selected>Seleccione el Tipo de rol</option>';

    for(var i=0; i<data.length; i++){
        documento+='<option value='+data[i].rol_id+'>'+data[i].descripcion+'</option>';
    }
    console.log(documento);
    
    $('#tipoRolAc').html(documento);
    $('#tipoRolAc').formSelect(); 
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

function cargarAccesos(rol_id){
    console.log("Cargar accesos "+rol_id);
    
        documento=' <h6>Menu</h6> <p><label><input type="checkbox" checked="checked" /><span>Yellow</span></label></p>';
        $('#accesosRol').html(documento);
}

 
