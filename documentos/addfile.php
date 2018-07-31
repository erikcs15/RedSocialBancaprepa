<!DOCTYPE html>
<html lang="en" >


   
<head>
    
        <meta charset="UTF-8">  
        <title>Sistema Bancaprepa</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bancaprepa.css"> 
        
</head>
    <body onLoad="cargarPublicaciones()">
    <div id="container" ><!-- CONTENEDOR 1 -->
        <div class="nav-wrapper">
            
        </div>
    
            <?php
                include('../menu/menu.php');

                    # definimos la carpeta destino
                    $carpetaDestino="../imagenes/";
                
                    # si hay algun archivo que subir
                    if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0])
                    {
                
                        # recorremos todos los arhivos que se han subido
                        for($i=0;$i<count($_FILES["archivo"]["name"]);$i++)
                        {
                
                            # si es un formato de imagen
                            if($_FILES["archivo"]["type"][$i]=="application/pdf" || $_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png")
                            {
                
                                # si exsite la carpeta o se ha creado
                                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                                {
                                    $origen=$_FILES["archivo"]["tmp_name"][$i];
                                    $destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
                
                                    # movemos el archivo
                                    if(@move_uploaded_file($origen, $destino))
                                    {
                                        $documento=$_FILES["archivo"]["name"][$i]." Se movio correctamente";
                                    }else{
                                        $documento= "No se ha podido mover el archivo: ".$_FILES["archivo"]["name"][$i];
                                    }
                                }else{
                                    $documento= "No se ha podido crear la carpeta: ".$carpetaDestino;
                                }
                            }else{
                                $documento= $_FILES["archivo"]["name"][$i]." - NO es imagen jpg, png o gif o pdf";
                            }
                        }
                    }else{
                        $documento= "No se ha subido ninguna imagen";
                    }
            ?>

            
  <div class="col s12">
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
              <form class="col s6 offset-s3 " action="<?php echo $_SERVER["PHP_SELF"]?>"  method="post"  enctype="multipart/form-data" name="inscripcion">
                <div class="row">
                    <div class="input-field col s12">
                    <input placeholder="Escribe Aqui el Titulo de La publicacion" id="pTitulo" type="text" class="validate" required>
                    <label for="pTitulo">TItulo</label>
                    </div> 
                </div>
                <div class="row">
                        <div class="file-field input-field">
                            <div class="btn blue">
                                <span>Documento</span>
                                <input type="file" name="archivo[]" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" value="<?php echo $documento;?>">
                            </div>
                        </div>
                </div>
                <div class="row"> 
                    <div class="row">
                        <div class="input-field col s12"> 
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="pDescripcion" class="materialize-textarea" data-length="500" required></textarea>
                        <label for="pDescripcion">Descripcion</label>
                        </div>
                    </div> 
                </div>
                <div class=" col s12">
                            <div class='input-field col s4'>
                                    <select id="tipoPubAddFile" required="" aria-required="true"> 
                                    </select>
                                    <label>Seleccion el tipo de publicacion</label>
                            </div>
                            <div class='input-field col s4'>
                                    <select id="tipoEmpresaAddFile" required="" aria-required="true"> 
                                    </select>
                                    <label>Seleccion la Empresa</label>
                            </div>
                            <div class='input-field col s4'>
                                    <select id="tipoRolAddFile" required="" aria-required="true"> 
                                    </select>
                                    <label>Seleccione el Rol de Visualizacion</label>
                            </div>
                            
                        </div> 

                  <button class="btn waves-effect waves-light right" type="submit" >Realizar Carga
                        <i class="material-icons right">send</i>
                    </button>
            </div>
 
          

            </form>
        
  </div>


    <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="../js/bancaprepa.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script> 

    
 
    </body>
</html>