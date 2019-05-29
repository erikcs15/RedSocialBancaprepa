$(document).ready(function(){
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// INICIALIZAR VARIABLES ////////////////////////////////////////////////////////////////
         $('.modal').modal();

         
         $('.collapsible').collapsible();
         var elem = document.querySelector('.collapsible.expandable');
            var instance = M.Collapsible.init(elem, {
            accordion: false
            });
           
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// EVENTOS ////////////////////////////////////////////////////////////////

   
  
});

    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// FUNCIONES ////////////////////////////////////////////////////////////////

    function cargarGruposXid()
    {
        console.log("Funciona!");
        var capturista=Cookies.get('b_capturista_id');
        grupos({ opcion : 10, capturista_id:capturista}, respCargarGrupos); 
        cargarMenuPorRol();
    }
    
    function cargarActividades(grupo_id)
    {
        console.log("Click");
        Cookies.set("b_grupo_id", grupo_id);
        grupos({ opcion : 11, grupo_id:grupo_id}, respCargarActividades); 
     
    }

    function cargarSubActividades(act_id)
    {
        console.log("Click");
        Cookies.set("b_act_id", act_id);
        grupos({ opcion : 12, act_id:act_id}, respCargarSubActividades); 
     
    }

    function hacerAlgo()
    {
        console.log("HacerAlgo");
        
    }

    function crearActividad(id_grupo)
    {
        Cookies.set("b_grupo_id", id_grupo);
        var grupo_id=Cookies.get('b_grupo_id');
        console.log("GRUPO= "+grupo_id);
    }

    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////// RESPUESTAS ////////////////////////////////////////////////////////////////


    var respCargarGrupos = function(data)
    {
        if (!data && data == null) 
        return; 

        var txt="";
        if(data[0].id_grupo>0)
        {
            for(var i=0;i<data.length;i++)
            {
                txt += '<li>'+
                '<div onClick="cargarActividades('+data[i].id_grupo+')" class="collapsible-header"><i class="material-icons">chevron_right</i>'+data[i].grupo+'</div> '+
                '<div class="collapsible-body" >'+
                '<a onClick="crearActividad('+data[i].id_grupo+')" href="#modalCrearActividad" class="btn-floating btn-small waves-effect waves-light red right modal-trigger"><i class="material-icons">add</i></a>'+
                '<div class="row">'+
                '<div class="col s12 m12">'+
                '    <ul class="collapsible" data-collapsible="accordion" id="grupo'+data[i].id_grupo+'">'+
                '    </ul>'+
                '   </div>'+
                '</div>';
                '</div>'+
                '</li>';
            }

        }
        else
        {
            txt="Sin actividades";
        }
        
        $("#c_grupos").html(txt);
        $('.collapsible').collapsible();

    }

    

    var respCargarActividades = function(data)
    {
        if (!data && data == null) 
        return; 

        var txt="";
        var texto = data.length;
        console.log(texto);
        var grupo_id=Cookies.get('b_grupo_id');
        
        if(texto>0)
        {
            for(var i=0;i<data.length;i++)
            {
                txt += '<li>'+
                '            <div onClick="cargarSubActividades('+data[i].act_id+')"  class="collapsible-header">'+
                '               <i class="material-icons">chevron_right</i>Actividad '+(i+1)+' ->' +data[i].descripcion_act+' </div>'+
                '<div class="collapsible-body" >'+
                '<div class="row">'+
                '<div class="col s12 m12">'+
                '    <ul class="collapsible" data-collapsible="accordion" id="actividad'+data[i].act_id+'">'+
                '    </ul>'+
                '</div>'+
                '</div>';
                '</div>'+
                '        </li>';
                
            }
        }
        else
        {
            txt += '<li>'+
            '            <div class="collapsible-header">'+
            '               <i class="material-icons">close</i> Sin Actividades </div>'+
            '        </li>';
        }
        console.log(txt);
        $("#grupo"+grupo_id).html(txt);
        $('.collapsible').collapsible();
        

    }
    

    var respCargarSubActividades = function(data)
    {
        if (!data && data == null) 
        return; 

        var txt="";
        var texto = data.length;
        console.log(texto);
        var actividad_id=Cookies.get('b_act_id');
        
        if(texto>0)
        {
            for(var i=0;i<data.length;i++)
            {
                txt += '<li>'+
                '            <div class="collapsible-header">'+
                '               <i class="material-icons">chevron_right</i>'+data[i].capturista+' -> '+data[i].descripcion+' </div>'+
                '        </li>';
                
            }
        }
        else
        {
            txt += '<li>'+
            '            <div class="collapsible-header">'+
            '               <i class="material-icons">close</i> Sin SubActividades </div>'+
            '        </li>';
        }
        console.log(txt);
        $("#actividad"+actividad_id).html(txt);
        $('.collapsible').collapsible();
        

    }






   