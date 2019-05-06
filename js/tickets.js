$(document).ready(function(){
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
         $('.modal').modal();

         $('#descripcionTicket').summernote({
            placeholder: 'Escriba la descripción',
            tabsize: 2,
            height: 100,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null
          });
         
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////

   
    $("#CrearTicketbtn").click(function() {
        var usuario = Cookies.get('b_capturista_id');
        var titulo=$("#tituloDD option:selected").text();
        var desc=$("#descripcionTicket").val();
        var correo=$("#email").val();
        var telefono=$("#tel").val();
        console.log("ID empleado="+usuario+" titulo:"+titulo);
        console.log("desc:"+desc+" email:"+correo+" telefono:"+telefono);
      

      
        if(titulo=="Titulo")
        {
            M.toast({html: 'Ingrese el titulo!', classes: 'rounded red'});
            return;
        }
        if(desc=="")
        {
            M.toast({html: 'Ingrese la descripcion!', classes: 'rounded red'});
            return;
        }
        if(correo=="")
        {
            M.toast({html: 'Agregue su correo!', classes: 'rounded red'});
            return;
        }
        if(telefono=="")
        {
            M.toast({html: 'Agregue su telefono!', classes: 'rounded red'});
            return;
        }
        tickets({ opcion : 1, capturista:usuario,titulo:titulo, desc:desc, email:correo, tel:telefono },respAgregaTicket);

    });

    $("#btnActualizarEstatusticket").click(function() {
        var usuario = Cookies.get('b_capturista_id');
        var ticket_id = Cookies.get('b_ticket_id');
        var estatus =  $("#EstatusTicketDD").val();

        console.log("USUARIO: "+usuario+" TICKET: "+ticket_id+"   estatus: "+estatus);

        tickets({ opcion : 6, ticket_id:ticket_id,usuario:usuario, id_estatus:estatus},respActualizarTicket);
    
    });

    $("#btnComentarioTicketAdm").click(function() {
        var usuario = Cookies.get('b_capturista_id');
        var ticket_id = Cookies.get('b_ticket_id');
        var mensaje = $("#comentarioTicketAdm").val();

        console.log("USUARIO: "+usuario+" TICKET: "+ticket_id+"   mensaje: "+mensaje);

        tickets({ opcion : 7, ticket_id:ticket_id, mensaje:mensaje, usuario:usuario}, respMensajesAdmn);
    
    });

    $("#btnComentarioTicket").click(function() {
        var usuario = Cookies.get('b_capturista_id');
        var ticket_id = Cookies.get('b_ticket_id');
        var mensaje = $("#comentarioTicket").val();

        console.log("USUARIO: "+usuario+" TICKET: "+ticket_id+"   mensaje: "+mensaje);

        tickets({ opcion : 7, ticket_id:ticket_id, mensaje:mensaje, usuario:usuario}, respMensajes);
    
    });


    $("#ActualizarMensajesManTicket").click(function() {
        var ticket_id=Cookies.get('b_ticket_id');
        tickets({ opcion : 8, ticket_id: ticket_id}, respCargarMensajes);
    
    });
    
   


});
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////

 

    var respAgregaTicket = function(data) { 
        //se insertan los datos en la tabla confirmaciones!
        if (!data && data == null)
        {
            M.toast({html: 'Ocurrio un problema, contacte con el departamento de sistemas', classes: 'rounded red'});  
            return;
        }
        

        M.toast({html: 'Ticket insertado correctamente ', classes: 'rounded green'});
        Cookies.get('b_capturista_id');
        
        $("#descripcionTicket").val("");
        $("#email").val("");
        $("#tel").val("");
        cargarTicketsPorUsuario(); 
        
    }
    var respCargarTicketsPorUsuario = function(data) { 
    
        if (!data && data == null) 
        return; 
    
        var d = '';
        var x = '';
    
    
        console.log("Length:"+data.length);
         for (var i = 0; i < data.length; i++) 
         {
             var titulo=String(data[i].titulo);
            if(titulo=="undefined")
            {
                d+= '<tr>'+
                '<td>Sin Tickets generados</td>'+
                '<td class="left">'+ 
                '</tr> ';  
            }
            else
            {
                var estatus=data[i].id_estatus;
                if(estatus==13)
                {
                    if(i%2==0)
                    {
                        x='even';
                    }
                    else
                    {
                        x='odd';
                    }
                    d+= '<tr>'+
                    '<td>'+data[i].id+'</td>'+
                    '<td>'+data[i].titulo+'</td>'+
                    '<td>'+data[i].descripcion+'</td>'+
                    '<td>'+data[i].solicitado+'</td>'+
                    '<td>-</td>'+
                    '<td>'+data[i].estatus+'</td>'+ 
                    '<td class="'+x+' left">'+
                    //'<a onclick="editarDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small blue btn modal-trigger" href="#modalEditarDoc"><i class="material-icons">edit</i></a>' + 
                    //'<a onclick="deshabDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small orange darken-3 btn modal-trigger" href="#modalDeshabDoc"><i class="material-icons">do_not_disturb_alt</i></a>' + 
                    //'<a onclick="BorrarDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalEliminarDoc"><i class="material-icons">delete</i></a>' +
                    '</td>'  +'</tr> ';
                }
                else
                {
                    if(estatus==2)
                    {
                        if(i%2==0)
                        {
                            x='even';
                        }
                        else
                        {
                            x='odd';
                        }
                        d+= '<tr>'+
                        '<td>'+data[i].id+'</td>'+
                        '<td>'+data[i].titulo+'</td>'+
                        '<td>'+data[i].descripcion+'</td>'+
                        '<td>'+data[i].solicitado+'</td>'+
                        '<td>'+data[i].usuario_resolviendo+'</td>'+
                        '<td>'+data[i].estatus+'</td>'+ 
                        '<td class="'+x+' left">'+
                        '<a onclick="comentTicket('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small grey btn modal-trigger" href="#modalComentariosTicket"><i class="material-icons">comment</i></a>' + 
                        '<a class="waves-effect waves-light btn-floating btn-small green btn modal-trigger"><i class="material-icons">assignment_turned_in</i></a>' + 
                        //'<a onclick="BorrarDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalEliminarDoc"><i class="material-icons">delete</i></a>' +
                        '</td>'  +'</tr> ';
                    }
                    else
                    {
                        if(i%2==0)
                        {
                            x='even';
                        }
                        else
                        {
                            x='odd';
                        }
                        d+= '<tr>'+
                        '<td>'+data[i].id+'</td>'+
                        '<td>'+data[i].titulo+'</td>'+
                        '<td>'+data[i].descripcion+'</td>'+
                        '<td>'+data[i].solicitado+'</td>'+
                        '<td>'+data[i].usuario_resolviendo+'</td>'+
                        '<td>'+data[i].estatus+'</td>'+ 
                        '<td class="'+x+' left">'+
                        '<a onclick="comentTicket('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small blue btn modal-trigger" href="#modalComentariosTicket"><i class="material-icons">comment</i></a>' + 
                        //'<a class="waves-effect waves-light btn-floating btn-small green btn modal-trigger"><i class="material-icons">assignment_turned_in</i></a>' + 
                        //'<a onclick="BorrarDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalEliminarDoc"><i class="material-icons">delete</i></a>' +
                        '</td>'  +'</tr> ';
                    }
                }
                
            }
                
        }
             
           
                
            $("#tablaTicketsGeneral").html(d);
            cargarMenuPorRol();
    }
    

    var respCargarTickets = function(data) { 
    
        if (!data && data == null) 
        return; 
    
        var d = '';
        var x = '';
    
    
        console.log("Length:"+data.length);
         for (var i = 0; i < data.length; i++) {
            var titulo=String(data[i].titulo);
            if(titulo=="undefined")
            {
                d+= '<tr>'+
                '<td>Sin Tickets generados</td>'+
                '<td class="left">'+ 
                '</tr> ';  
            }
            else
            {
                if(data[i].id_estatus==13)
                {
                    if(i%2==0)
                    {
                        x='even';
                    }
                    else
                    {
                        x='odd';
                    }
                    d+= '<tr>'+
                    '<td>'+data[i].id+'</td>'+
                    '<td>'+data[i].titulo+'</td>'+
                    '<td>'+data[i].descripcion+'</td>'+
                    '<td>'+data[i].solicitado+'</td>'+
                    '<td>-</td>'+
                    '<td>'+data[i].estatus+'</td>'+ 
                    '<td class="'+x+' left">'+
                    '<a onclick="adminTicket('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small indigo darken-4 btn modal-trigger" href="#modalAdminTicket"><i class="material-icons">build</i></a>' + 
                    //'<a onclick="deshabDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small orange darken-3 btn modal-trigger" href="#modalDeshabDoc"><i class="material-icons">do_not_disturb_alt</i></a>' + 
                    //'<a onclick="BorrarDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalEliminarDoc"><i class="material-icons">delete</i></a>' +
                    '</td>'  +'</tr> ';                  

                }
                else
                {
                    if(data[i].id_estatus==2)
                    {
                        if(i%2==0)
                        {
                            x='even';
                        }
                        else
                        {
                            x='odd';
                        }
                        d+= '<tr>'+
                        '<td>'+data[i].id+'</td>'+
                        '<td>'+data[i].titulo+'</td>'+
                        '<td>'+data[i].descripcion+'</td>'+
                        '<td>'+data[i].solicitado+'</td>'+
                        '<td>'+data[i].usuario_resolviendo+'</td>'+
                        '<td>'+data[i].estatus+'</td>'+ 
                        '<td class="'+x+' left">'+
                        '<a onclick="adminTicket('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small indigo darken-4 btn modal-trigger" href="#modalAdminTicket"><i class="material-icons">build</i></a>' + 
                        '<a class="waves-effect waves-light btn-floating btn-small green btn modal-trigger"><i class="material-icons">assignment_turned_in</i></a>' + 
                        //'<a onclick="BorrarDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalEliminarDoc"><i class="material-icons">delete</i></a>' +
                        '</td>'  +'</tr> ';          
                    }
                    else
                    {
                        if(i%2==0)
                        {
                            x='even';
                        }
                        else
                        {
                            x='odd';
                        }
                        d+= '<tr>'+
                        '<td>'+data[i].id+'</td>'+
                        '<td>'+data[i].titulo+'</td>'+
                        '<td>'+data[i].descripcion+'</td>'+
                        '<td>'+data[i].solicitado+'</td>'+
                        '<td>'+data[i].usuario_resolviendo+'</td>'+
                        '<td>'+data[i].estatus+'</td>'+ 
                        '<td class="'+x+' left">'+
                        '<a onclick="adminTicket('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small indigo darken-4 btn modal-trigger" href="#modalAdminTicket"><i class="material-icons">build</i></a>' + 
                        //'<a onclick="deshabDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small orange darken-3 btn modal-trigger" href="#modalDeshabDoc"><i class="material-icons">do_not_disturb_alt</i></a>' + 
                        //'<a onclick="BorrarDoc('+data[i].doc_id+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalEliminarDoc"><i class="material-icons">delete</i></a>' +
                        '</td>'  +'</tr> ';          
                    }
                            

                }
               

            }
        }
                     
        $("#tablaTicketsTodos").html(d);
        cargarMenuPorRol();
    }


    
    var respCargarAdminTicket = function(data) { 
        if (!data && data == null)
        return;  
 
        var estatus_id=data[0].estatus;

        tickets({ opcion : 5, id_estatus: estatus_id}, respCargarDDEstatus);
        
    }

    var respCargarDDEstatus = function(data) { 
        if (!data && data == null)
        return;  


        
        var documento='<option value="'+data[0].id+'" selected>'+data[0].estatus+'</option>';

        for(var i=1; i<data.length; i++){
            documento+='<option value='+data[i].id+'>'+data[i].estatus+'</option>';
        }
        
        
        $('#EstatusTicketDD').html(documento);
        $('#EstatusTicketDD').formSelect(); 
       
        
    }
    var respActualizarTicket = function(data) { 
        if (!data && data == null)
        return;  


        
        M.toast({html: 'Estatus Actualizado!=)', classes: 'rounded green'});
        cargarTickets();
    }
    var respMensajesAdmn = function(data) { 
        if (!data && data == null)
        return;  



        M.toast({html: 'Mensaje enviado!=)', classes: 'rounded green'});
        $('#comentarioTicketAdm').val("");

        var ticket_id=Cookies.get('b_ticket_id');
        tickets({ opcion : 8, ticket_id: ticket_id}, respCargarMensajes);
    }

    var respMensajes = function(data) { 
        if (!data && data == null)
        return;  



        M.toast({html: 'Mensaje enviado!=)', classes: 'rounded green'});
        $('#comentarioTicket').val("");

        var ticket_id=Cookies.get('b_ticket_id');
        tickets({ opcion : 8, ticket_id: ticket_id}, respCargarMensajes);
    }

    

    var respCargarMensajes = function(data) { 
        if (!data && data == null)
        return;  

        var d="";
        for (var i = 0; i < data.length; i++) 
        {
            var de=String(data[i].de);
            if(de=="undefined")
            {
                d+="<p><b>Sin comentarios.</b></p><br>";
            }
            else
            {
                d+="<p><b>"+data[i].de+"</b>   &nbsp;"+data[i].fecha+"  "+data[i].hora+"</p><br><p>"+data[i].mensaje+"</p><br>";
            }

        }
        $('#cardTicketAdm').html(d); 
    }

    var respCargarComentarioPorEstatus = function(data) { 
        if (!data && data == null)
        return;  

        var estatus=data[0].estatus;
        if(estatus==2)
        {
            console.log("Estatus finalizado");
            $("#comentarioTicket").attr('disabled','disabled');
            $("#btnComentarioTicket").attr('disabled','disabled');
        }
        else
        {
            console.log("Estatus NO finalizado");
            $("#comentarioTicket").removeAttr("disabled");
            $("#btnComentarioTicket").removeAttr("disabled");
        }
    }



    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    
    function cargarTicketsPorUsuario(){

        empleadoid = Cookies.get('b_capturista_id');
        console.log("CARGANDO TICKETS POR USUARIO "+empleadoid);
        tickets({ opcion : 2, capturista: empleadoid}, respCargarTicketsPorUsuario);
        
    }

    function cargarTickets(){

        tickets({ opcion : 3}, respCargarTickets);
        
    }

    function comentTicket(id)
    {
        console.log("ADMINISTRACION DE TICKETS");
        Cookies.set("b_ticket_id", id );
        var ticket_id=Cookies.get('b_ticket_id');
        console.log("TICKET ID DESDE COOKIES: "+ticket_id);
        tickets({ opcion : 4, id_ticket: id}, respCargarComentarioPorEstatus);
        tickets({ opcion : 8, ticket_id: id}, respCargarMensajes);
        
    }
    
    function adminTicket(id)
    {
        console.log("ADMINISTRACION DE TICKETS");
        Cookies.set("b_ticket_id", id );
        var ticket_id=Cookies.get('b_ticket_id');
        console.log("TICKET ID DESDE COOKIES: "+ticket_id);
        tickets({ opcion : 4, id_ticket:id}, respCargarAdminTicket);
        tickets({ opcion : 8, ticket_id: ticket_id}, respCargarMensajes);
       
       
    }

    

 