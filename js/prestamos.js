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
    
});
    
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
   var respInsertarSolicutd = function(data) {
       if (!data && data == null)
       return;  

       M.toast({html: 'Datos insertados!.', classes: 'rounded green'}); 
       location.href="/RedSocialBancaprepa/prestamospersonales/solicitarprestamo.php";
       return;

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
                '<td>$'+data[i].monto_pagar+'</td>'+ 
                '<td>$'+data[i].descuento_mensual+'</td>'+ 
                '<td>'+data[i].estatus+'</td>'+ 
                '<td>'+data[i].fecha_autorizado+'</td>'+ 
                '<td>'+data[i].capturista_autorizo+'</td>'+ 
                '</tr> ';

                $("#tablaSolicitudPrestamo").html(d);
            }
        }
        
       

        cargarMenuPorRol();
    }
    
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    
    function cargarSolicitud()
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