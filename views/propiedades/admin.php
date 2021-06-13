<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <?php 
        if($resultado) {
            $mensaje = mostrarNotificacion(intval($resultado));
            if($mensaje) : ?>
                <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php   endif;
        }?>

    <a href="/propiedades/crear" class="boton-verde">Nueva Propiedad</a>
    <a href="/vendedores/crear" class="boton-amarillo">Nuevo/a Vendedor/a</a>

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <th>ID</th>
            <th>Título</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </thead>

        <tbody>
            <?php foreach($propiedades as $propiedad) : ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de propiedad" class="imagen-tabla"></td>
                <td><?php echo $propiedad->precio; ?> €</td>
                <td>
                    <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar Propiedad</a>
                    <form method="POST" class="w-100" action="/propiedades/eliminar">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="boton-rojo-block" value="Borrar Propiedad">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>

    <table class="propiedades">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </thead>

        <tbody>
            <?php foreach($vendedores as $vendedor) : ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>
                    <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar Vendedor/a</a>
                    <form method="POST" class="w-100" action="/vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo-block" value="Borrar Vendedor/a">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</main>
