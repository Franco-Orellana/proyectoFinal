<?php 

    include("./config/db.php");


    // Uso de los botones de categorias
    $id = (isset($_POST['id']))?$_POST['id']:"";   

    
    $sentenciaSQL = $conexion->prepare("SELECT  casas.id, casas.img_principal, casas.titulo, casas.ubicacion, casas.direccion, casas.precio, casas.anunciante,
                                                        casas.categoria , detalles.titulo_completo, 
                                                        detalles.descripcion, detalles.mapa, detalles.cant_m2, detalles.cant_m2_cubierto, 
                                                        detalles.cant_ambientes, detalles.cant_banios, detalles.cant_dormitorios, imagenes.casa_img
                                                FROM casas 
                                                INNER JOIN detalles ON casas.id_detalles = detalles.id_detalles
                                                INNER JOIN imagenes  ON casas.id_imagenes = imagenes.id_img
                                                WHERE casas.id LIKE '%$id'
                                            ");
    $sentenciaSQL->execute();
    $listadoDeCasas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

    $sentenciaSQL = $conexion -> prepare("SELECT * FROM categorias");
    $sentenciaSQL -> execute();


    // Formulario de modificar datos de las casas
    foreach($listadoDeCasas as $casas) {
        echo' 
            <div class="modal-body container p-0">
                <div class="row align-items-center gy-2 card-body">
                    <div class="form-group col-lg-4 col-md-6">
                        <label for="txtImagen" class="mb-2">Imagen Principal:</label>
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresar la foto más representativa de la propiedad." style="border:none; background:none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </button> 
                        <input type="file" name="txtImagen" id="txtImagen" class="form-control" value="'.$casas['img_principal'].'">
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                        <label for="txtNombre" class="mb-2">Título acortado:</label>
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresar un texto menor a 23 letras, contando los espacios, de lo contrario este no entrará en la presentación." style="border:none; background:none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </button> 
                        <input type="text" value="'.$casas['titulo'].'" name="txtNombre" id="txtNombre" class="form-control" placeholder="Ej: Casa lujosa">
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                        <label for="txtUbicacion" class="mb-2">Ubicación:</label>
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresar lugar donde se sitúa la propiedad." style="border:none; background:none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </button>
                        <input type="text" value="'.$casas['ubicacion'].'" name="txtUbicacion" id="txtUbicacion" class="form-control" placeholder="Ej: Palermo, Buenos Aires">
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                        <label for="txtDireccion" class="mb-2">Dirección:</label>
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresar la dirección específica de la propiedad." style="border:none; background:none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </button> 
                        <input type="text" value="'.$casas['direccion'].'" name="txtDireccion" id="txtDireccion" class="form-control" placeholder="Ej: 11 de Septiembre 1900">
                    </div>
                    <div class="form-group col-lg-3 col-md-6">
                        <label for="txtAnunciante" class="mb-2">Anunciante:</label>
                        <select class="form-select" name="txtAnunciante">
                            <option value="'.$casas['anunciante'].'" '.(($casas['anunciante'] == 'Inmobiliaria') ? 'selected' : '').'>Inmobiliaria</option>
                            <option value="'.$casas['anunciante'].'" '.(($casas['anunciante'] == 'Dueño directo') ? 'selected' : '').'>Dueño directo</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-6">
                        <label for="txtCategoria" class="mb-2">Tipo de propiedad:</label> 
                        <select class="form-select" name="txtCategoria">
                            
                            <option selected value="'.$casas['categoria'].'">'.$casas['categoria'].'</option>
                            
                            ';
                        
                                foreach ($sentenciaSQL as $categorias) {
                                    echo '<option value="'.$categorias['nombre_categoria'].'" '.(($casas['categoria'] == $categorias['nombre_categoria']) ? 'style=display:none;' : '').'>'.$categorias['nombre_categoria'].'</option>';                                 
                                }
                            echo '
                        </select>
                    </div>
                    <div class="form-group col-lg-2 col-md-6">
                        <label for="txtPrecio" class="mb-2">Precio:</label>
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresar precio sin puntos ni comas." style="border:none; background:none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </button> 
                        <input type="text" value="'.$casas['precio'].'" name="txtPrecio" id="txtPrecio" class="form-control" placeholder="Ej: 23415">
                    </div>
                </div>
                <div class="dropdown-divider mb-2 mt-0"></div>
                <div class="row align-items-center gy-2 card-body">
                    <div class="form-group col-lg-4 col-md-6">
                        <label for="txtTitulo" class="mb-2">Título completo:</label>
                        <input type="text" value="'.$casas['titulo_completo'].'" name="txtTitulo" id="txtTitulo" class="form-control" placeholder="Ej: Casa lujosa con vista al mar">
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                        <label for="txtMapa" class="mb-2">Ubicación en mapa:</label>
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Luego de ir a compartir, en la pestaña Incorporar un mapa, copie el texto que se encuentra entre comillas dentro de src y peguelo aquí" style="border:none; background:none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </button> 
                        <input type="text" value="'.$casas['mapa'].'" id="txtMapa" name="txtMapa"class="form-control" placeholder="Ej: https://www.google.com/maps/...">
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                        <label for="formFileMultiple" class="form-label">Fotos de la propiedad:</label> 
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese 10 fotos, las primeras 4 fotos deben ser del exterior de la propiedad y las 6 restantes del interior" style="border:none; background:none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </button>  
                        <input class="form-control" type="file" name="imagenes[]" id="formFileMultiple" multiple>
                    </div>
                    
                    <div class="form-group col-lg col-sm-12 col-md-6">
                        <label for="txtCantTotales" class="mb-2">Cantidad de m² totales:</label>
                        <input type="text" value="'.$casas['cant_m2'].'" name="txtCantTotales" id="txtCantTotales" class="form-control" placeholder="Ej: 105">
                    </div>
                    <div class="form-group col-lg col-sm-12 col-md-6">
                        <label for="txtCantCubiertos" class="mb-2">Cantidad de m² cubiertos:</label>
                        <input type="text" value="'.$casas['cant_m2_cubierto'].'" name="txtCantCubiertos" id="txtCantCubiertos" class="form-control" placeholder="Ej: 84">
                    </div>
                    <div class="form-group col-lg col-sm-12 col-md-6">
                        <label for="txtAmbientes" class="mb-2">Cantidad de ambientes:</label>
                        <input type="text" value="'.$casas['cant_ambientes'].'" name="txtAmbientes" id="txtAmbientes" class="form-control" placeholder="Ej: 3">
                    </div>
                    <div class="form-group col-lg col-sm-12 col-md-6">
                        <label for="txtBanios" class="mb-2">Cantidad de baños:</label>
                        <input type="text" value="'.$casas['cant_banios'].'" name="txtBanios" id="txtBanios" class="form-control" placeholder="Ej: 2">
                    </div>
                    <div class="form-group col-lg col-sm-12 col-md-6">
                        <label for="txtDormitorios" class="mb-2">Cantidad de dormitorios:</label>
                        <input type="text" value="'.$casas['cant_dormitorios'].'" name="txtDormitorios" id="txtDormitorios" class="form-control" placeholder="Ej: 2">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="txtDescripcion" class="mb-2">Descripción:</label>
                        <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" cols="30" rows="10" style="resize:none;">'.$casas['descripcion'].'</textarea>
                    </div>
                </div>
            </div>    
            <div class="modal-footer" role="group">
                <input type="hidden" name="txtID" id="txtID" value="'.$casas['id'].'">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="accion" value="Modificar" class="btn btn-success">Modificar</button>
            </div>  
        ';
    }
;
  
?>