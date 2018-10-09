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

    $("#BtnBusquedaEquipo").click(function() {
        
        console.log("Presionaste el boton para buscar");
        var idEquipo = $("#id_equipo").val();
        var sucursal_id = $("#sucursalesdd").val();
        var num_equipo = $("#num_equipo").val();
        if(idEquipo=="" & sucursal_id=="0" & num_equipo=="")
        {
            M.toast({html: 'Favor de ingresar algun dato.', classes: 'rounded red'}); 
            return;
        }
       
        console.log("id:"+ idEquipo+" sucursal:"+sucursal_id+" tipo:"+ num_equipo);
        
        onRequest({ opcion : 77 ,id:idEquipo, sucursal:sucursal_id, numequipo:num_equipo }, respCargarEquipos);


    });

    
    $("#btnDesEquipo").click(function() {
        
        console.log("Presionaste el boton para dar de baja");
        var idEquipo = $("#idEquipoDes").val();
        var notacancelacion = $("#descDes").val().toUpperCase();
        
        if(notacancelacion=="" )
        {
            M.toast({html: 'Favor de ingresar la nota de cancelacion, por favor.', classes: 'rounded red'}); 
            return;
        }
       
        console.log("id:"+ idEquipo+" nota de cancelacion:"+notacancelacion);
        
        onRequest({ opcion : 83 ,equipo_id:idEquipo, descripcion:notacancelacion}, respBajaEquipos);


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

    function busquedaEquipo()
    {
        onRequest({ opcion : 70 }, respcargasucursales);

        onRequest({ opcion : 71 }, respcargatiposequipo);

        var idEquipo = $("#id_equipo").val();
        var sucursal_id = String($("#sucursalesdd").val());
        var num_equipo = $("#num_equipo").val();

        onRequest({ opcion : 77 ,id:idEquipo, sucursal:sucursal_id, numequipo:num_equipo }, respCargarEquipos);
    }

    function desEquipo(idequipo)
    {
        //Carga el equipo por su id para despues deshabilitarla
        console.log("Id del equipo:"+idequipo);
        onRequest({ opcion : 82 ,equipo_id:idequipo}, respCargarEquipoPorId);
        

    }
    function notaCancelacion(idequipo)
    {
        //Carga el equipo por su id para despues deshabilitarla
        console.log("Id del equipo:"+idequipo);
        onRequest({ opcion : 82 ,equipo_id:idequipo}, respCargarNota);
        

    }
    
    function buscaEmpleados()
    {
        var bus= $("#nomResponsable").val();
        if (bus.length>2)
        {
            document.getElementById('listaEmpleados').style.display = 'block';
            onRequest({ opcion : 84 ,nombre:bus}, respBuscarEmpleados);
        }
        console.log("Buscando texto:"+bus);
        
    }

    function asignarResponsable(equipo_id)
    {  
        console.log("id del equipo:"+equipo_id);
        Cookies.set("i_idequipo", equipo_id );
        $("#IdResponsable").val("");
        $("#nomResponsable").val("");
        $("#comenEquipo").val("");
        $("#respFecha_ent").val("");

        var equip = Cookies.get('i_idequipo');

        console.log("id del equipo desde cookies:"+equip);
        onRequest({ opcion : 88 ,equipo_id:equip}, respCargarResponsables);

    }
    
    function asignarEquipo()
    {  
        var equip = Cookies.get('i_idequipo');
        var id_emp = $("#IdResponsable").val();
        var fecha_ent = $("#respFecha_ent").val();
        if(fecha_ent=="")
        {
            M.toast({html: 'Agrega la fecha de entrega', classes: 'rounded red'}); 
            return;
        }

        var comentarios = $("#comenEquipo").val();
        if(comentarios=="")
        {
            M.toast({html: 'Agregue comentarios sobre el equipo.', classes: 'rounded red'}); 
            return;
        }
        console.log("id de empleado:"+id_emp+" equipo id:"+equip+"fecha entrega:"+fecha_ent);

        onRequest({ opcion : 85 ,id_empleado:id_emp, idequipo:equip, fecha_ent:fecha_ent, comen:comentarios}, respAsignarResponsiva);

    }

    


    function agregarAdiv(id_empleado)
    {  
        
        document.getElementById('listaEmpleados').style.display = 'none';
        $("#IdResponsable").val(id_empleado);
        var id=$("#IdResponsable").val();
        onRequest({ opcion : 87 ,empleado_id:id}, respAgregarNombreAdiv);

       
       

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
            '</tr> ';
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
     
        var documento='<option value="0"  selected>Seleccione Sucursal</option>';
    
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
     
        var documento='<option value="0" selected>Seleccione Tipo Equipo</option>';
    
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

        console.log(data)
        
    
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
            var descripcion=$("#descripcion").val().toUpperCase();
            var marca=$("#marca").val().toUpperCase();
            var modelo=$("#modelo").val().toUpperCase();
            var serie=$("#serie").val().toUpperCase();
            var fecha_compra=$("#fecha_compra").val();
            var valor_factura=$("#valor_factura").val();
            var capturistaid=Cookies.get('b_capturista_id');
            

        
            onRequest({ opcion : 72, sucursal_id:sucursal_id, tipo_equipo:tipo_equipo,num_equipo:num_equipo, 
                descripcion:descripcion,marca:marca, modelo:modelo,serie:serie, fecha_compra:fecha_compra, 
                valor_factura:valor_factura, capturista:capturistaid},respCrearinvequipo);
        }
    }

    

    var respCargarEquipos = function(data) { 
    
        if (!data && data == null) 
        return; 
    
        var d = '';
        var x = '';
        console.log(data);
        console.log("------------"+data);
            for (var i = 0; i < data.length; i++) {
                if(data[i].estatus=="BAJA")
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
                    '<td>'+data[i].nomComercial+'</td>'+  
                    '<td>'+data[i].numEquipo+'</td>'+
                    '<td>'+data[i].tipo+'</td>'+ 
                    '<td>'+data[i].equipo+'</td>'+             
                    '<td>'+data[i].estatus+'</td>'+
                    '<td class="'+x+' left">'+
                    '<a onclick="asignarResponsable('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small  green darken-4 btn modal-trigger" href="#modalAsignarResp"><i class="material-icons">assignment_ind</i></a>' + 
                    '<a onclick="desEquipo('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small orange darken-2 btn modal-trigger disabled" href="#modalDeshEquipo"><i class="material-icons">do_not_disturb</i></a>' +
                    '<a onclick="notaCancelacion('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small grey darken-1 btn modal-trigger" href="#modalNotaCancelacion"><i class="material-icons">library_books</i></a>' + 
                    '</tr> ';
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
                    '<td>'+data[i].nomComercial+'</td>'+  
                    '<td>'+data[i].numEquipo+'</td>'+
                    '<td>'+data[i].tipo+'</td>'+ 
                    '<td>'+data[i].equipo+'</td>'+             
                    '<td>'+data[i].estatus+'</td>'+
                    '<td class="'+x+' left">'+
                    '<a onclick="asignarResponsable('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small  green darken-4 btn modal-trigger" href="#modalAsignarResp"><i class="material-icons">assignment_ind</i></a>' + 
                    '<a onclick="desEquipo('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small orange darken-2 btn modal-trigger" href="#modalDeshEquipo"><i class="material-icons">do_not_disturb</i></a>' 
                    //'<a onclick="DetallesEquipo('+data[i].id+')" class="waves-effect waves-light btn-floating btn-small orange darken-3 btn modal-trigger" href="#modalDetallesEquipo"><i class="material-icons">remove_red_eye</i></a>' + 
                    +'</tr> ';
                }
            }
                
                $("#tablaEquipos").html(d);
        
        cargarMenuPorRol();
    }

    
    var respCargarEquipoPorId = function(data) { 
    
        if (!data && data == null) 
        return; 
    
        if (data[0].id>0) { 
            console.log(data[0].id);
          $("#idEquipoDes").val(data[0].id);
    
           return;
         
        }
    }
    
    var respCargarNota = function(data) { 
    
        if (!data && data == null) 
        return; 
    
        if (data[0].id>0) { 
            console.log(data[0].id);
          $("#idEquipoNota").val(data[0].id);
          $("#notaEquipo").val(data[0].nota);
          $("#fechaBaja").val(data[0].fechaB);
           return;
         
        }
    }

    
    var respBajaEquipos = function(data) { 
    
        if (!data && data == null)
        {
            M.toast({html: 'Equipo no Actualizado, contacte al area de sistemas.', classes: 'rounded red'}); 
            return;
        }
        
        M.toast({html: 'El Equipo se dio de baja correctamente!', classes: 'rounded green'}); 
    
        $("#modalDeshEquipo").modal("close");
    
        busquedaEquipo();
    }

    
    var respBuscarEmpleados = function(data) { 
    
        if (!data && data == null)
        {
            M.toast({html: 'No se encontraron coincidencias.', classes: 'rounded red'}); 
            return;
        }
        
        var d='';
        for (var i = 0; i < data.length; i++) 
        {
            var nombre=String(data[i].descripcion);
            
            d+="<tr> <td>"+data[i].descripcion+" </td>" 
            +"<td> <a onclick='agregarAdiv("+data[i].id+");' class='waves-effect waves-light btn-floating btn-small blue'><i class='material-icons'>add</i></a> " +
            "</td> </tr> ";
            
        }

        $("#listaEmpleados").addClass("espacioClientes");
        $("#listaEmpleadosTabla").html(d);
    }
    

    var respAsignarResponsiva = function(data) { 
    
        if (!data && data == null)
        {
            M.toast({html: 'No se encontraron coincidencias.', classes: 'rounded red'}); 
            return;
        }
        
        M.toast({html: 'Responsable asignado.', classes: 'rounded green'})
        $("#IdResponsable").val("");
        $("#nomResponsable").val("");
        $("#comenEquipo").val("");
        $("#respFecha_ent").val("");

        var equip = Cookies.get('i_idequipo');

        console.log("id del equipo desde cookies:"+equip);
        onRequest({ opcion : 88 ,equipo_id:equip}, respCargarResponsables);
    }
    
    

    var respAgregarNombreAdiv = function(data) { 
    
        if (!data && data == null)
        {
            M.toast({html: 'No se encontraron coincidencias.', classes: 'rounded red'}); 
            return;
        }

        var nombre=data[0].nombre;
        $("#nomResponsable").val(nombre);
        
    }

    

    var respCargarResponsables = function(data) { 
    
        if (!data && data == null)
        {
            M.toast({html: 'Ocurrío un problema, contacte al equipo de sistemas.', classes: 'rounded red'}); 
            return;
        }


        var d='';
        for (var i = 0; i < data.length; i++) 
        {
            var nombre=String(data[i].nombreEncargado);
            console.log("-------"+nombre);
            if(nombre=="undefined")
            {
                d+= '<tr>'+
                '<td>No tiene responsable asignado</td>'+
                '<td class="left">'+ 
                '</tr> ';  
            }
            else
            {
                d+="<tr> "+
                '<td>'+data[i].nombreEncargado+'</td>'+ 
                '<td>'+data[i].fechaEntrega+'</td>'+  
                '<td>'+data[i].comentario+'</td>'+
                '</tr> ';
            }
            
            
        }

        $("#datosEncargadoTabla").html(d);
       
    }
    
    




    