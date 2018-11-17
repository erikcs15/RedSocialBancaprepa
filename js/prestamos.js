$(document).ready(function(){
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
         $('.modal').modal();
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    $("#quincenas").keypress(function(e) {
        //inicializamos variables
      if(e.which == 13) {
          var quincenas=0;
          quincenas =  parseInt($("#quincenas").val());
          var mesesApagar=0;
          mesesApagar=quincenas/2;
          var montoSolicitado=0;
          montoSolicitado= parseInt($("#monto_solicitado").val());
          var interes = 0;
          interes= (montoSolicitado*0.05)*mesesApagar;
          var total_pagar=0;
          total_pagar=interes+montoSolicitado;
          var descuento=0;
          descuento=total_pagar/quincenas;
          var totalConLetra = NumeroALetras(total_pagar);
          $("#meses_pagar").val(mesesApagar);
          $("#interes_prestamo").val(interes);
          $("#monto_total_pagar").val(total_pagar);
          $("#descuento").val(descuento.toFixed(2));
          $("#monto_letra").val(totalConLetra);
          var fecha_solicitud=$('#fecha_solicitud').val();
          prestamosp({ opcion : 5, fecha:fecha_solicitud, quincenas:quincenas},respCargarFechaInicioYFinal);
          
      }
    });
    $( "#btnCrearSolicitud" ).click(function() { 

        console.log("Boton presionado");
        var capturistaId = Cookies.get('b_capturista_id');
        var nombre_solicitante= $('#nombre_solicitante').val();
        var fecha_solicitud=$('#fecha_solicitud').val();
        var sucursal_id=Cookies.get('b_id_sucursal');
        var empresa_id=Cookies.get('b_empresa_id');
        var tipo_abono=$('#tipo_abono').val();
        var puesto_id=Cookies.get('b_puesto_id');
        var numTarjeta= $('#num_tarjeta').val();
        var beneficiarioCta = $('#bnf_cta').val();
        var nombreBanco = $('#nombre_banco').val();
        var monto_solicitado = $('#monto_solicitado').val();
        var quincenas = $('#quincenas').val();
        var meses_pagar = $('#meses_pagar').val();
        var interes_prestamo = $('#interes_prestamo').val();
        var tipo_abono = $('#tipo_abono').val();
        var descuento = $('#descuento').val();
        var monto_total_pagar = $('#monto_total_pagar').val();
        var monto_letra = $('#monto_letra').val();
        var inicio_descuento = $('#inicio_descuento').val();
        var fin_descuento = $('#fin_descuento').val();

        
        if(monto_solicitado=="")
        {
            M.toast({html: 'Favor de ingresar el monto a solicitar.', classes: 'rounded red'}); 
            return;
        }
        if(quincenas=="")
        {
            M.toast({html: 'Favor de ingresar el numero de quincenas.', classes: 'rounded red'}); 
            return;
        }
        if(inicio_descuento=="")
        {
            M.toast({html: 'Favor de ingresar el inicio del descuento.', classes: 'rounded red'}); 
            return;
        }
        if(fin_descuento=="")
        {
            M.toast({html: 'Favor de ingresar el fin del descuento.', classes: 'rounded red'}); 
            return;
        }
        console.log("|Capturista:|"+capturistaId);
        console.log("|nombre_solicitante:|"+nombre_solicitante);
        console.log("|fecha_solicitud:|"+fecha_solicitud);
        console.log("|puesto_id:|"+puesto_id);
        console.log("|sucursal_id:|"+sucursal_id);
        console.log("|empresa_id:|"+empresa_id);
        console.log("|numTarjeta:|"+numTarjeta);
        console.log("|beneficiarioCta:|"+beneficiarioCta);
        console.log("|monto_solicitado:|"+monto_solicitado);
        console.log("|quincenas:|"+quincenas);
        console.log("|meses_pagar:|"+meses_pagar);
        console.log("|interes_prestamo:|"+interes_prestamo);
        console.log("|descuento:|"+descuento);
        console.log("|monto_total_pagar:|"+monto_total_pagar);
        console.log("|inicio_descuento:|"+inicio_descuento);
        console.log("|fin_descuento:|"+fin_descuento);
        console.log("|monto_letra:|"+monto_letra);
        

        prestamosp({ opcion : 1,capturista_id:capturistaId,fecha_solicitud:fecha_solicitud, puesto_id:puesto_id, sucursal_id: sucursal_id, empresa_id:empresa_id, numTarjeta:numTarjeta, beneficiarioCuenta:beneficiarioCta, nombreBanco:nombreBanco, monto_solicitado:monto_solicitado, quincenas:quincenas, meses_a_pagar: meses_pagar, interes_prestamo: interes_prestamo, tipo_abono:tipo_abono, descuento_mensual: descuento,monto_total:monto_total_pagar, inicio_descuento:inicio_descuento, fin_descuento:fin_descuento, monto_letra:monto_letra},respInsertarSolicutd);
        

    });

    
    $( "#btnAutorizarPrestamo" ).click(function() {
        var id_prestamo = Cookies.get('p_idprestamo');
        var comentarios=$('#txtArea').val();
        var usuario_autorizador=Cookies.get('b_capturista_id');

        if($('#chAutorizar').is(":checked")) 
        { 
            var montoFinal= $('#montoAutorizar').val();
            prestamosp({ opcion : 7,id_prestamo:id_prestamo, coment:comentarios, capturista_autoriza:usuario_autorizador, montoAutorizado:montoFinal},respAutorizarPrestamo );
            prestamosp({ opcion : 8,id_solicitud:id_prestamo},respReajustarSolicitud );
            prestamosp({ opcion : 6}, respCargarSolicitudes);
        } 
        else
        {
            prestamosp({ opcion : 11,id_prestamo:id_prestamo, coment:comentarios, capturista_autoriza:usuario_autorizador},respNoAutorizarPrestamo );
            prestamosp({ opcion : 6}, respCargarSolicitudes);
            
        }
        
        

    }); 

    
});
    
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
   var respInsertarSolicutd = function(data) {
       if (!data && data == null)
       return;  

       var capturistaId = Cookies.get('b_capturista_id');

       M.toast({html: 'Solicitud creada, espere a que se contacten con usted para una respuesta!.', classes: 'rounded green'});
       prestamosp({ opcion : 2,capturista_id:capturistaId},respCargarSolicitudesPorCapturista );

       $('#nombre_solicitante').val("");
       $('#fecha_solicitud').val("");
       $('#tipo_abono').val("");
        
       $('#num_tarjeta').val("");
       $('#bnf_cta').val("");
       $('#nombre_banco').val("");
       $('#monto_solicitado').val("");
       $('#quincenas').val("");
       $('#meses_pagar').val("");
       $('#interes_prestamo').val("");
       $('#tipo_abono').val("");
       $('#descuento').val("");
       $('#monto_total_pagar').val("");
       $('#monto_letra').val("");
       $('#inicio_descuento').val("");
       $('#fin_descuento').val("");


   }

   var respCargarSolicitudesPorCapturista = function(data) { 
    
        if (!data && data == null) 
        return; 

        var d = '';
        var x = '';


        
        for (var i = 0; i < data.length; i++) 
        {
            var nombre=String(data[i].capturista);
            console.log("-------"+nombre);
            if(nombre=="undefined")
            {
               d+= '<tr>'+
               '<td>Sin prestamos solicitados</td>'+
               '<td class="left">'+ 
               '</tr> ';  
               $("#tablaSolicitudPrestamo").html(d);
            }
            else
            {
                if(data[i].estatus!="ACTIVO")
                {
                    d+= '<tr>'+
                    '<td>'+data[i].id+'</td>'+
                    '<td>'+data[i].capturista+'</td>'+
                    '<td>'+data[i].fecha_solicitud+'</td>'+ 
                    '<td>$'+data[i].monto_solicitado+'</td>'+
                    '<td>'+data[i].quincenas+'</td>'+
                    '<td>-</td>'+ 
                    '<td>$'+data[i].monto_pagar+'</td>'+ 
                    '<td>$'+data[i].descuento_mensual+'</td>'+ 
                    '<td>'+data[i].estatus+'</td>'+ 
                    '<td>'+data[i].fecha_autorizado+'</td>'+ 
                    '<td>'+data[i].capturista_autorizo+'</td>'+ 
                    '<td class="left">'+
                    '<a onClick="informacionPrestamo('+data[i].id+');" class="waves-effect waves-light btn-floating btn-small grey btn modal-trigger" href="#modalinfoPrestamo"><i class="material-icons">comment</i></a>' + 
                    '</td>' +
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
                    '<td>'+data[i].capturista+'</td>'+
                    '<td>'+data[i].fecha_solicitud+'</td>'+ 
                    '<td>$'+data[i].monto_solicitado+'</td>'+ 
                    '<td>'+data[i].quincenas+'</td>'+
                    '<td>$'+data[i].monto_autorizado+'</td>'+ 
                    '<td>$'+data[i].monto_pagar+'</td>'+ 
                    '<td>$'+data[i].descuento_mensual+'</td>'+ 
                    '<td>'+data[i].estatus+'</td>'+ 
                    '<td>'+data[i].fecha_autorizado+'</td>'+ 
                    '<td>'+data[i].capturista_autorizo+'</td>'+ 
                    '<td class="left">'+
                    '<a onClick="informacionPrestamo('+data[i].id+');" class="waves-effect waves-light btn-floating btn-small grey btn modal-trigger" href="#modalinfoPrestamo"><i class="material-icons">comment</i></a>' + 
                    '</td>' +
                    '</tr> ';
                }
                

                $("#tablaSolicitudPrestamo").html(d);
            }
        }
        
       

        cargarMenuPorRol();
    }

    var respCargarSolicitudes = function(data) { 
    
        if (!data && data == null) 
        return; 


        console.log(data);
        var d = '';
        var x = '';

        

        for (var i = 0; i < data.length; i++) 
        {
            var nombre=String(data[i].capturista);
            console.log("-------"+nombre);
            if(nombre=="undefined")
            {
               d+= '<tr>'+
               '<td>Sin prestamos solicitados</td>'+
               '<td class="left">'+ 
               '</tr> ';  
               $("#tablaSolicitudes").html(d);
            }
            else
            {
                if(data[i].monto_autorizado=="-")
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
                    '<td>'+data[i].capturista+'</td>'+
                    '<td>'+data[i].fecha_solicitud+'</td>'+ 
                    '<td>$'+data[i].monto_solicitado+'</td>'+ 
                    '<td>'+data[i].quincenas+'</td>'+  
                    '<td>$'+data[i].monto_autorizado+'</td>'+ 
                    '<td>-</td>'+
                    '<td>'+data[i].estatus+'</td>'+ 
                    '<td class="left">'+
                    '<a onClick="autorizarPrestamos('+data[i].id+');" class="waves-effect waves-light btn-floating btn-small teal lighten-1 btn modal-trigger" href="#modalAutorizarPrestamos"><i class="material-icons">thumbs_up_down</i></a>' + 
                    '<a onClick="informacionPrestamo('+data[i].id+');" class="waves-effect waves-light btn-floating btn-small grey btn modal-trigger" href="#modalinfoPrestamo"><i class="material-icons">comment</i></a>' + 
                    '</td>'+
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
                    '<td>'+data[i].capturista+'</td>'+
                    '<td>'+data[i].fecha_solicitud+'</td>'+ 
                    '<td>$'+data[i].monto_solicitado+'</td>'+ 
                    '<td>'+data[i].quincenas+'</td>'+  
                    '<td>$'+data[i].monto_autorizado+'</td>'+ 
                    '<td>$'+data[i].descuento_mensual+'</td>'+
                    '<td>'+data[i].estatus+'</td>'+ 
                    '<td class="left">'+
                    '<a onClick="autorizarPrestamos('+data[i].id+');" class="waves-effect waves-light btn-floating btn-small teal lighten-1 btn modal-trigger" href="#modalAutorizarPrestamos"><i class="material-icons">thumbs_up_down</i></a>' + 
                    '<a onClick="informacionPrestamo('+data[i].id+');" class="waves-effect waves-light btn-floating btn-small grey btn modal-trigger" href="#modalinfoPrestamo"><i class="material-icons">comment</i></a>' + 
                    '</td>'+
                    '</tr> ';

                }
                

                $("#tablaSolicitudes").html(d);
            }
        }
        
       

        cargarMenuPorRol();
    }

    var respInsertarCorrida = function(data) {
        if (!data && data == null)
        return;  
 
        var fecha = data[0].fecha;
        var idsolicitud = data[0].id;
        var quincenas = data[0].quincenas;
        var descuento_mensual = data[0].descuento_mensual;

        console.log("Insertando corrida......");
        
        
        prestamosp({ opcion : 3,prestamoId:idsolicitud, fecha:fecha, quincenas:quincenas, abono:descuento_mensual},respFinalInsertarCorrida );
    }

    

    var respFinalInsertarCorrida = function(data) {
        if (!data && data == null)
        return;  


       M.toast({html: 'Solicitud actualizada!.', classes: 'rounded green'}); 
       prestamosp({ opcion : 6}, respCargarSolicitudes);
       console.log(data);
       return;
        
    }
    
    var respCargarFechaInicioYFinal = function(data) {
        if (!data && data == null)
        return;  

        console.log(data);
        var fechaInicio= data[0].inicio;
        var fechaFinal = data[0].fechafinal;

        console.log("Fecha inicio: "+fechaInicio+" Fecha final: "+fechaFinal);
        
        //Se transforma la fecha para poder insertarla en el input del html
        var f=new Date(fechaInicio);
        var mes = f.getMonth()+1; //obteniendo mes
        var dia = f.getDate()+1; //obteniendo dia
        var ano = f.getFullYear(); //obteniendo año
        if(dia<10)
            dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
            mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('inicio_descuento').value=ano+"-"+mes+"-"+dia;

        var f2=new Date(fechaFinal);
        var mesF = f2.getMonth()+1; //obteniendo mes
        var diaF = f2.getDate()+1; //obteniendo dia
        var anoF = f2.getFullYear(); //obteniendo año
        if(diaF<10)
            diaF='0'+diaF; //agrega cero si el menor de 10
        if(mesF<10)
            mesF='0'+mesF //agrega cero si el menor de 10
        document.getElementById('fin_descuento').value=anoF+"-"+mesF+"-"+diaF;
    }

    var respReajustarFechas = function(data) {
        if (!data && data == null)
        return;  

        var fechaInicio= data[0].inicio;
        var fechaFinal = data[0].fechafinal;
        var id_prestamo = Cookies.get('p_idprestamo');
        prestamosp({ opcion : 10, fecha_ini:fechaInicio, fecha_fin:fechaFinal, solicitud_id:id_prestamo},respReajusteFecha2 );
    }

    
    var respReajusteFecha2 = function(data) {
        if (!data && data == null)
        return;          
    }
    
    var respAutorizarPrestamo = function(data) {
        if (!data && data == null)
        return;  


       M.toast({html: 'Prestamo Autorizado!.', classes: 'rounded green'}); 
       $("#modalAutorizarPrestamos").modal("close");
       console.log(data);
       return;
        
    }

    var respNoAutorizarPrestamo = function(data) {
        if (!data && data == null)
        return;  


       M.toast({html: 'Prestamo NO Autorizado!.', classes: 'rounded red'}); 
       $("#modalAutorizarPrestamos").modal("close");
       console.log(data);
       return;
        
    }

    var respReajustarSolicitud = function(data) {
        if (!data && data == null)
        return;
        var id_solicitud=0;
        id_solicitud=data[0].id;
        var quincenas=0;
        quincenas =  data[0].quincenas;
        var mesesApagar=0;
        mesesApagar=quincenas/2;
        var montoAutorizadoF=0;
        montoAutorizadoF= parseInt(data[0].monto_autorizado);
        var interes = 0;
        interes =parseInt((montoAutorizadoF*0.05)*mesesApagar);
        var total_pagar=0;
        total_pagar=parseInt(interes+montoAutorizadoF);
        var descuento=0;
        descuento=(total_pagar/quincenas).toFixed(2);
        var totalConLetra = NumeroALetras(total_pagar);
        var fecha_autorizado = data[0].fecha_autorizado;

        console.log("|monto autorizado:|"+montoAutorizadoF);
        console.log("|quincenas:|"+quincenas);
        console.log("|meses_pagar:|"+mesesApagar);
        console.log("|interes_prestamo:|"+interes);
        console.log("|descuento:|"+descuento);
        console.log("|monto_total_pagar:|"+total_pagar);
        console.log("|monto_letra:|"+totalConLetra);
        console.log("|fecha autorizado:|"+fecha_autorizado);

        
        prestamosp({ opcion : 9, id_solicitud:id_solicitud, interes_prestamo:interes, descuento_mensual:descuento, monto_total:total_pagar,monto_letra:totalConLetra},respAjusteRealizado);
        prestamosp({ opcion : 3,prestamoId:id_solicitud, fecha:fecha_autorizado, quincenas:quincenas, abono:descuento},respFinalInsertarCorrida );
        prestamosp({ opcion : 5, fecha:fecha_autorizado, quincenas:quincenas},respCargarFechaInicioYFinal);
    }

    var respAjusteRealizado = function(data) {
         
    }

    
    var respInfoSolicitudes = function(data) {
        if (!data && data == null)
        return;
        
        console.log(data[0].estatus_id);
        if(data[0].estatus_id==5)
        {
            console.log("activo");
            document.getElementById('texto_monto_autorizado').style.display = 'block';
            document.getElementById('textoMontoAInfo').style.display = 'block';
            $("#textoAreaInfo").val(data[0].comentarios);
            $("#textoMontoAInfo").val(data[0].monto_autorizado);
        }
        else
        {
            document.getElementById('texto_monto_autorizado').style.display = 'none';
            document.getElementById('textoMontoAInfo').style.display = 'none';
            $("#textoAreaInfo").val(data[0].comentarios);
        }
 
    }

    var respCargarCorridaXID = function(data) { 
    
        if (!data && data == null) 
        return; 


        console.log(data);
        var d = '';
        var x = '';

        

        for (var i = 0; i < data.length; i++) 
        {
            var nombre=String(data[i].abonado);
            console.log("-------"+nombre);
            if(nombre=="undefined")
            {
               d+= '<tr>'+
               '<td>Sin corrida realizada</td>'+
               '<td class="left">'+ 
               '</tr> ';  
               $("#tablaCorrida").html(d);
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
                '<td>'+data[i].num_pago+'</td>'+
                '<td>$'+data[i].cantidad+'</td>'+
                '<td>'+data[i].fecha+'</td>'+ 
                '<td>'+data[i].abonado+'</td>'+ 
                '</tr> ';
                

                $("#tablaCorrida").html(d);
            }
        }
        
       

       
    }

    


    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    
    function cargarCreacionSolicitud()
    {
        var f=new Date();
        
        var nombre = Cookies.get('b_capturista');
        var puesto = Cookies.get('b_puesto');
        var sucursal = Cookies.get('b_sucursal');
        var empresa = Cookies.get('b_empresa');
        
        var mes = f.getMonth()+1; //obteniendo mes
        var dia = f.getDate(); //obteniendo dia
        var ano = f.getFullYear(); //obteniendo año
        if(dia<10)
            dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
            mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fecha_solicitud').value=ano+"-"+mes+"-"+dia;
       // var fecha="0"+f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
        
        $('#nombre_solicitante').val(nombre);
        $('#puesto_solicitud').val(puesto);
        $('#sucursal_solicitud').val(sucursal); 
        $('#empresa_solicitud').val(empresa); 
        $('#tipo_abono').val("QUINCENAL");

        var capturistaId = Cookies.get('b_capturista_id');
        prestamosp({ opcion : 2,capturista_id:capturistaId},respCargarSolicitudesPorCapturista );
        
    }

    
    function swAutorizar()
    {
       
        console.log("CAMBIO");
        if($('#chAutorizar').is(":checked")) 
        { 
            document.getElementById('montoAutorizar').style.display = 'block';
            document.getElementById('textoMontoA').style.display = 'block';
        } 
        else
        {
            document.getElementById('montoAutorizar').style.display = 'none';
            document.getElementById('textoMontoA').style.display = 'none';
        }
    }
    function cargarSolicitud()
    {
        prestamosp({ opcion : 6}, respCargarSolicitudes);
        
    }
    
    function autorizarPrestamos(prestamoId)
    {
        console.log("Id prestamo: "+prestamoId); 
        Cookies.set("p_idprestamo",prestamoId);
    }

    function informacionPrestamo(prestamoId)
    {
        prestamosp({ opcion : 8, id_solicitud:prestamoId}, respInfoSolicitudes);
        prestamosp({ opcion : 12, id_prestamo:prestamoId}, respCargarCorridaXID);
        
    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();
    
        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;
    
        return [year, month, day].join('-');
    }

//-------------------------------------------------------Funcion para sacar numero en letra--------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
    function Unidades(num){

        switch(num)
        {
            case 1: return "UN";
            case 2: return "DOS";
            case 3: return "TRES";
            case 4: return "CUATRO";
            case 5: return "CINCO";
            case 6: return "SEIS";
            case 7: return "SIETE";
            case 8: return "OCHO";
            case 9: return "NUEVE";
        }
    
        return "";
    }//Unidades()
    
    function Decenas(num){
    
        decena = Math.floor(num/10);
        unidad = num - (decena * 10);
    
        switch(decena)
        {
            case 1:
                switch(unidad)
                {
                    case 0: return "DIEZ";
                    case 1: return "ONCE";
                    case 2: return "DOCE";
                    case 3: return "TRECE";
                    case 4: return "CATORCE";
                    case 5: return "QUINCE";
                    default: return "DIECI" + Unidades(unidad);
                }
            case 2:
                switch(unidad)
                {
                    case 0: return "VEINTE";
                    default: return "VEINTI" + Unidades(unidad);
                }
            case 3: return DecenasY("TREINTA", unidad);
            case 4: return DecenasY("CUARENTA", unidad);
            case 5: return DecenasY("CINCUENTA", unidad);
            case 6: return DecenasY("SESENTA", unidad);
            case 7: return DecenasY("SETENTA", unidad);
            case 8: return DecenasY("OCHENTA", unidad);
            case 9: return DecenasY("NOVENTA", unidad);
            case 0: return Unidades(unidad);
        }
    }//Unidades()
    
    function DecenasY(strSin, numUnidades) {
        if (numUnidades > 0)
        return strSin + " Y " + Unidades(numUnidades)
    
        return strSin;
    }//DecenasY()
    
    function Centenas(num) 
    {
        centenas = Math.floor(num / 100);
        decenas = num - (centenas * 100);
    
        switch(centenas)
        {
            case 1:
                if (decenas > 0)
                    return "CIENTO " + Decenas(decenas);
                return "CIEN";
            case 2: return "DOSCIENTOS " + Decenas(decenas);
            case 3: return "TRESCIENTOS " + Decenas(decenas);
            case 4: return "CUATROCIENTOS " + Decenas(decenas);
            case 5: return "QUINIENTOS " + Decenas(decenas);
            case 6: return "SEISCIENTOS " + Decenas(decenas);
            case 7: return "SETECIENTOS " + Decenas(decenas);
            case 8: return "OCHOCIENTOS " + Decenas(decenas);
            case 9: return "NOVECIENTOS " + Decenas(decenas);
        }
    
        return Decenas(decenas);
    }//Centenas()
    
    function Seccion(num, divisor, strSingular, strPlural) {
        cientos = Math.floor(num / divisor)
        resto = num - (cientos * divisor)
    
        letras = "";
    
        if (cientos > 0)
            if (cientos > 1)
                letras = Centenas(cientos) + " " + strPlural;
            else
                letras = strSingular;
    
        if (resto > 0)
            letras += "";
    
        return letras;
    }//Seccion()
    
    function Miles(num) {
        divisor = 1000;
        cientos = Math.floor(num / divisor)
        resto = num - (cientos * divisor)
    
        strMiles = Seccion(num, divisor, "UN MIL", "MIL");
        strCentenas = Centenas(resto);
    
        if(strMiles == "")
            return strCentenas;
    
        return strMiles + " " + strCentenas;
    }//Miles()
    
    function Millones(num) {
        divisor = 1000000;
        cientos = Math.floor(num / divisor)
        resto = num - (cientos * divisor)
    
        strMillones = Seccion(num, divisor, "UN MILLON DE", "MILLONES DE");
        strMiles = Miles(resto);
    
        if(strMillones == "")
            return strMiles;
    
        return strMillones + " " + strMiles;
    }//Millones()
    
    function NumeroALetras(num) {
        var data = {
            numero: num,
            enteros: Math.floor(num),
            centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
            letrasCentavos: "",
            letrasMonedaPlural: 'PESOS',//"PESOS", 'Dólares', 'Bolívares', 'etcs'
            letrasMonedaSingular: 'PESO', //"PESO", 'Dólar', 'Bolivar', 'etc'
    
            letrasMonedaCentavoPlural: "CENTAVOS",
            letrasMonedaCentavoSingular: "CENTAVO"
        };
    
        if (data.centavos > 0) {
            data.letrasCentavos = "CON " + (function (){
                if (data.centavos == 1)
                    return Millones(data.centavos) + " " + data.letrasMonedaCentavoSingular;
                else
                    return Millones(data.centavos) + " " + data.letrasMonedaCentavoPlural;
                })();
        };
    
        if(data.enteros == 0)
            return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
        if (data.enteros == 1)
            return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
        else
            return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
    }//NumeroALetras()

//--------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
