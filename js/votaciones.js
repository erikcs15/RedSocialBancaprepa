$(document).ready(function(){

    $( "#btnEnviarFormVotaciones" ).click(function() {

        console.log("Presiono boton votaciones . js");
       /*  
        var titulo = $("#pTitulo").val();
        var documento = $("#docId").val();
        var descripcion = $("#pDescripcion").val();
        var tipopublic = $("#tipoPubAddFile").val();
        var empresa = $("#tipoEmpresaAddFile").val();
        var docname="SIN DOCUMENTO";
        var usuario = Cookies.get('b_capturista_id');

        if($('#chkDoc').is(":checked")) { 
            if(documento.length<=0){
                M.toast({html: 'Es necesario incluir un documento', classes: 'rounded red'});
                return;
            }
            docname = $("#tittleDoc").val();
            var cdocumento ='S';
         } 
         else{
            cdocumento ='N';
         }
 

         //valida que los campos no queden vacios para evitar errores
        if(titulo.length<=0){
            M.toast({html: 'El Titulo de la publicacion no puede estar vacio', classes: 'rounded red'});
            return;
        }
 
        if(descripcion.length<=0){
            M.toast({html: 'Es necesario incluir una descripcion en la publicacion', classes: 'rounded red'});
            return;
        }
        if(tipopublic <=0){
            M.toast({html: 'Es necesario especificar el tipo de publicacion', classes: 'rounded red'});
            return;
        }
        if(empresa<=0){
            M.toast({html: 'Es necesario especificar la empresa ala que se dirige', classes: 'rounded red'});
            return;
        }
        /*
        ---Se comento porque ya no fue necesario---
        if(tiporol<=0){
            M.toast({html: 'Es necesario especificar el rol al que se dirige la publicacion', classes: 'rounded red'});
            return;
        } 
        onRequest({ opcion : 76, usuario_id:usuario},respPermitirPublicacion);

        */

        //$( "#formFiles" ).submit();
      });
      


});