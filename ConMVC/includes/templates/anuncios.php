<?php
    use App\Propiedad;

    $_SERVER['SCRIPT_NAME'] === '/anuncios.php' ? $propiedades = Propiedad::all() : $propiedades = Propiedad::all('3');
?>

<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad) : ?>
    <div class="anuncio">
        <img class="w-100" src="/imagenes/<?php echo $propiedad->imagen ?>" alt="Imagen Anuncio" loading="lazy">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad->titulo ?></h3>
                <p class="h-20"><?php echo $propiedad->descripcion ?></p>
                <p class="precio"><?php echo $propiedad->precio ?> €</p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" alt="Icono WC" loading="lazy">
                        <p><?php echo $propiedad->wc ?></p>
                    </li>

                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento" loading="lazy">
                        <p><?php echo $propiedad->estacionamiento ?></p>
                    </li>

                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono Habitaciones" loading="lazy">
                        <p><?php echo $propiedad->habitaciones ?></p>
                    </li>
                </ul>

                <a href="anuncio.php?id=<?php echo $propiedad->id ?>" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>