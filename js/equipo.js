$(document).ready(function(){

    $("#BtnAgregarEquipo").click(function() {
        var nombreEquipo='';
        nombreEquipo = $("#nomequipo").val();

        if(nombreEquipo==""){
            M.toast({html: 'Necesario ingresar nombre de equipo.', classes: 'rounded red'}); 
            return;
        }
        console.log("Presionaste el boton del modal para agregar equipo: "+nombreEquipo);
        onRequest({ opcion : 69, descripcion:nombreEquipo},respAgregaEquipo);

    });

});
    function cargarMenuPorRol(){
    
    empleadoid = Cookies.get('b_capturista_id');
    console.log("id empleado= "+empleadoid);
    onRequest({ opcion : 31 ,id_usuario:empleadoid },respCargarRolesPorUsuario);
    
    onRequest({ opcion : 62 ,usuario_id:empleadoid}, respNotificaciones);

    }
    
    function cargarInventario(){
        console.log("Cargando Equipos");
        onRequest({ opcion : 68 }, respInventario);

    }

    var respInventario = function(data) { 
    
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
            '<td>'+data[i].id+'</td>'+ 
            '<td>'+data[i].descripcion+'</td>'+ 
            '<td>'+data[i].estatus+'</td>'+
            '<td class="'+x+' left">'+
            // '<a onclick="EditarEstatus('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small blue btn modal-trigger" href="#modalEditarEstatus"><i class="material-icons">edit</i></a>' + 
            //'<a onclick="BajaEquipo('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small red accent-4 btn modal-trigger" href="#modalBajaEquipo"><i class="material-icons">delete</i></a>' +
            //'<a onclick="DetallesEquipo('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small orange darken-3 btn modal-trigger" href="#modalDetallesEquipo"><i class="material-icons">remove_red_eye</i></a>' + 
            '</td>'  +'</tr> ';
            }
                
                $("#tablaequipo").html(d);
        
        cargarMenuPorRol();
    }

    var respAgregaEquipo = function(data) { 
        console.log(data);
        if (!data && data == null)
        {
            M.toast({html: 'Equipo NO agregado', classes: 'rounded red'}); 
            return;
        }
        
        M.toast({html: 'Equipo agregado', classes: 'rounded blue'}); 
        
        $("#modalAgregarEquipo").modal("close");
    
        onRequest({ opcion : 68 }, respInventario);
    }


    