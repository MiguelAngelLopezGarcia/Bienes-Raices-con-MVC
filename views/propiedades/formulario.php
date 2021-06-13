<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Título:</label>
    <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Título Propiedad" value="<?php echo s($propiedad->titulo) ?>">

    <label for="precio">Precio:</label>
    <input type="number" name="propiedad[precio]" id="precio" placeholder="Precio Propiedad" value="<?php echo s($propiedad->precio) ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg, image/png">
    <?php if($propiedad->imagen) : ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="Imagen de la propiedad" class="imagen-small">
    <?php endif ?>

    <label for="descripcion">Descripcion:</label>
    <textarea name="propiedad[descripcion]" id="descripcion" placeholder="Descripción de la propiedad"><?php echo s($propiedad->descripcion) ?></textarea>
</fieldset>

<fieldset>
    <legend>Información de la Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="Habitaciones de Propiedad" min="1" max="9" value="<?php echo s($propiedad->habitaciones) ?>">

    <label for="wc">Baños:</label>
    <input type="number" name="propiedad[wc]" id="wc" placeholder="Baños de Propiedad" min="1" max="9" value="<?php echo s($propiedad->wc) ?>">

    <label for="estacionamiento">Estacionamientos:</label>
    <input type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="Estacionamientos de Propiedad" min="1" max="9" value="<?php echo s($propiedad->estacionamiento) ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <select name="propiedad[vendedorId]">
        <option value="">-- Seleccione --</option>
        <?php foreach($vendedores as $vendedor) : ?>
            <option <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : '' ?> value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?></option>
        <?php endforeach ?>
    </select>
</fieldset>

