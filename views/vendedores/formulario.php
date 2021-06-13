<fieldset>
    <legend>Información del Vendedor/a</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre" value="<?php echo s($vendedor->nombre) ?>">

    <label for="apellido">Apellidos:</label>
    <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellidos" value="<?php echo s($vendedor->apellido) ?>">
</fieldset>

<fieldset>
    <legend>Información Adicional</legend>

    <label for="telefono">Teléfono:</label>
    <input type="number" name="vendedor[telefono]" id="telefono" placeholder="Teléfono" value="<?php echo s($vendedor->telefono) ?>">

</fieldset>
