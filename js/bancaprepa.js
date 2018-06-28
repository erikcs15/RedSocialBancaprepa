$(document).ready(function(){

    $( "#btn_login" ).click(function() { 
        var correo='';
        var pass='';
        correo = $("#email").val();
        pass =   $("#password").val()

        if(correo==''){
            M.toast({html: 'El correo no puede ir vacio', classes: 'rounded red'}); 
            return;
        }

        if(pass==''){
            M.toast({html: 'La contraseña no puede ir vacia', classes: 'rounded red'}); 
            return;
        }   


            
     });

});