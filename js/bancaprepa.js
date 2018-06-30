// Funcion principal de Jquery la cual escanea en tiempo real nuestro documento para verificar que los eventos se ejecuten correctamente
$(document).ready(function(){
    //Inicializamos menu
    $('.dropdown-trigger').dropdown();
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
        
     });
     // Fin de click en login

     $( "#salirsesion" ).click(function() { 
        location.href="/RedSocialBancaprepa/login.html";
     });

     $( "#catemp" ).click(function() { 
        location.href="/RedSocialBancaprepa/catalogos/catemp.php";
     });



});

    $("#password").keypress(function(e) {
        if(e.which == 13) {
            $( "#btn_login" ).click();
        }
    });


// Funcion de respuesta de la consulta que aplicamos con ajax
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
        M.toast({html: 'El usuario o la contraseña no son correstos!!', classes: 'rounded red'}); 
     }
}