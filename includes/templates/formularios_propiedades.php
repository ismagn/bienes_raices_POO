<div class="info_personal mt-5 pt-2">
                    <div class=" titulos_formularios text-muted">
                        <h3 >INFORMACION GENERAL</h3>
                        </div>
                        <div class="input my-5">
                            <label for="titulo" class="form-label">Titulo</label>
                            <input type="text" id="titulo" class="form-control" placeholder="" name="titulo" value="<?php echo $propiedad->titulo; ?>">
                        </div>
                        <div class="input my-5">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" id="precio" name="precio" class="form-control" value="<?php echo $propiedad->precio; ?>" >
                        </div>
                        <div class="input my-5">
                            <label for="img" class="form-label">Imagen</label>
                            <input type="file" id="img" name="imagen" class="form-control"   accept="image/jpg,image/png,image/jpeg">
                            

                        </div>
                        <div class="input my-5">
                            <label for="descripcion" class="form-label" id="descripcion">Descripcion</label>
                            <textarea  id="descripcion" cols="30" rows="10" class="form-control" name="descripcion"><?php echo $propiedad->descripcion; ?> </textarea>
                        </div>
                </div>

                <div class="info_propiedad mt-5 pt-2">
                    <div class="titulos_formularios text-muted">
                        <h3 >INFORMACION PROPIEDAD</h3>
                    </div>
                        <div class="input my-5">
                            <label for="habitaciones" class="form-label">HABITACIONES</label>
                            <input type="number" id="habitaciones" name="habitaciones" class="form-control" value="<?php echo $propiedad->habitaciones; ?>" >
                        </div>
                        <div class="input my-5">
                            <label for="baños" class="form-label">Baños</label>
                            <input type="number" id="baños" name="baños" value="<?php echo $propiedad->WC; ?>" class="form-control" >
                        </div>
                        <div class="input my-5">
                            <label for="estacionamiento" class="form-label">Estacionamiento</label>
                            <input type="number" id="estacionamiento" name="estacionamiento" value="<?php echo $propiedad->estacionamiento; ?>"  class="form-control" >
                        </div>
                </div>

                <div class="info_propiedad mt-5 pt-2">
                    <div class="titulos_formularios text-muted">
                        <h3 >VENDEDOR</h3>
                    </div>
                    <div class="input my-5">
                        <select name="vendedor"  class="form-select">
                            <?php foreach($vendedores as $row) {?>
                                <option  value="<?php echo $row['id']; ?>"  ><?php echo $row['nombre'] . " " . $row['apellido']; ?></option>
                            <?php }//endWhile ?>
                        </select>
                        
                    </div>
                </div>