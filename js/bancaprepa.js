$(document).ready(function(){

    $( "#btn_login" ).click(function() { 
        var user='';
        var pass='';
        user = $("#user").val();
        pass =   $("#password").val()

        if(user==''){
            M.toast({html: 'El nombre de usuario no puede ir vacio', classes: 'rounded red'}); 
            return;
        }

        if(pass==''){
            M.toast({html: 'La contraseña no puede ir vacia', classes: 'rounded red'}); 
            return;
        }   

        onRequest({ opcion : 1 ,usuario:user,password:pass },respUser);
            
     });

});


var respUser = function(data) { 

    if (!data && data == null) 
        return;   
 
     console.log(data);
}