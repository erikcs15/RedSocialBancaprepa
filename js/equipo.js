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

    function capturainv(){
        console.log("Cargando Sucursales");
        onRequest({ opcion : 70 }, respcargasucursales);

        onRequest({ opcion : 71 }, respcargatiposequipo);

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

    var respcargasucursales = function(data) { 
        if (!data && data == null)
            return;  
     
        var documento='<option value="0" disabled selected>Seleccione Sucursal</option>';
    
        for(var i=0; i<data.length; i++){
            documento+='<option value='+data[i].id+'>'+data[i].nomComercial+'</option>';
        }
        console.log("checarc");
        
        $('#sucursalesdd').html(documento);
        $('#sucursalesdd').formSelect(); 
        cargarMenuPorRol();
    
    }

    var respcargatiposequipo = function(data) { 
        if (!data && data == null)
            return;  
     
        var documento='<option value="0" disabled selected>Seleccione Tipo Equipo</option>';
    
        for(var i=0; i<data.length; i++){
            documento+='<option value='+data[i].id+'>'+data[i].descripcion+'</option>';
        }
        console.log("checarc");
        
        $('#tiposequipos').html(documento);
        $('#tiposequipos').formSelect(); 
    
    }

    $( "#btnCrearinvequipo" ).click(function() { 
        var sucursal_id=$("#sucursalesdd").val();
        var tipo_equipo=$("#tiposequipos").val();
        var num_equipo=$("#num_equipo").val();
        var descripcion=$("#descripcion").val();
        var marca=$("#marca").val();
        var modelo=$("#modelo").val();
        var serie=$("#serie").val();
        var fecha_compra=$("#fecha_compra").val();
        var valor_factura=$("#valor_factura").val();
        console.log(sucursal_id+" "+tipo_equipo+" "+num_equipo+" "+descripcion+" "+marca+" "+modelo+" "+serie+" "+fecha_compra+""+valor_factura+"");
    
    if(sucursal_id<=0)
    {
        M.toast({html: 'Favor de seleccionar sucursal', classes: 'rounded red'}); 
        return;
    }

    if(tipo_equipo<= 0)
    {
        M.toast({html: 'Favor de seleccionar tipo de equipo', classes: 'rounded red'}); 
        return;
    }

    if(num_equipo=="")
    {
        M.toast({html: 'Favor de ingresar numero de equipo', classes: 'rounded red'}); 
        return;
    }

    if(descripcion=="")
    {
        M.toast({html: 'Favor de ingresar descripcion de equipo', classes: 'rounded red'}); 
        return;
    }

    if(marca=="")
    {
        M.toast({html: 'Favor de ingresar marca del equipo', classes: 'rounded red'}); 
        return;
    }

    if(modelo=="")
    {
        M.toast({html: 'Favor de ingresar modelo del equipo', classes: 'rounded red'}); 
        return;
    }

    if(serie== "")
    {
        M.toast({html: 'Favor de ingresar serie del equipo', classes: 'rounded red'}); 
        return;
    }

    if(fecha_compra=="")
    {
        M.toast({html: 'Favor de ingresar fecha de compra', classes: 'rounded red'}); 
        return;
    }

    if(valor_factura=="")
    {
        M.toast({html: 'Favor de ingresar valor factura', classes: 'rounded red'}); 
        return;
    }

    
    onRequest({ opcion : 73, serie:serie},respverificar);
    
    });

    var respverificar = function(data) { 
  
        if (!data && data == null)
        {
            M.toast({html: 'Ocurrio un problema, contacte con el departamento de sistemas', classes: 'rounded red'});  
            return;
        }
        if(data[0].contador>0)
        {
            M.toast({html: 'Numero de Serie repetida', classes: 'rounded red'});  
            return;
        }
        else 
        {
            var tipo_equipo=$("#tiposequipos").val();
            var num_equipo=$("#num_equipo").val();
            onRequest({ opcion : 74, tipo_equipo:tipo_equipo, num_equipo:num_equipo},respverificar2);
        }
    }

    var respCrearinvequipo = function(data) { 
        //se insertan los datos en la tabla confirmaciones!
        if (!data && data == null)
        {
            M.toast({html: 'Ocurrio un problema, contacte con el departamento de sistemas', classes: 'rounded red'});  
            return;
        }
        
    
        M.toast({html: 'ENHORABUENA...!!! Equipo agregado correctamente ', classes: 'rounded green'}); 
        $("#sucursalesdd").val("");
        $("#tiposequipos").val("");
        $("#num_equipo").val("");
        $("#descripcion").val("");
        $("#marca").val("");
        $("#modelo").val("");
        $("#serie").val("");
        $("#fecha_compra").val("");
        $("#valor_factura").val("");
        cargarInventario();
    }

    var respverificar2 = function(data) { 
  
        if (!data && data == null)
        {
            M.toast({html: 'Ocurrio un problema, contacte con el departamento de sistemas', classes: 'rounded red'});  
            return;
        }
        if(data[0].contador>0)
        {
            M.toast({html: 'Tipo de equipo ya asignado a un numero de equipo', classes: 'rounded red'});  
            return;
        }
        else 
        {
            var sucursal_id=$("#sucursalesdd").val();
            var tipo_equipo=$("#tiposequipos").val();
            var num_equipo=$("#num_equipo").val();
            var descripcion=$("#descripcion").val();
            var marca=$("#marca").val();
            var modelo=$("#modelo").val();
            var serie=$("#serie").val();
            var fecha_compra=$("#fecha_compra").val();
            var valor_factura=$("#valor_factura").val();
        
            onRequest({ opcion : 72, sucursal_id:sucursal_id, tipo_equipo:tipo_equipo,num_equipo:num_equipo, 
                descripcion:descripcion,marca:marca, modelo:modelo,serie:serie, fecha_compra:fecha_compra, 
                valor_factura:valor_factura},respCrearinvequipo);
        }
    }


    




    