<main class="contenedor seccion">
        <h2 data-cy='sobre-nosotros'>Más Sobre Nosotros</h2>

        <?php include __DIR__ . '/iconos.php'; ?>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Apartamentos en Venta</h2>

        <?php include __DIR__ . '/listado.php'; ?>

        <div class="alinear-derecha">
            <a data-cy='ver-propiedades' href="/propiedades" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section data-cy='imagen-contacto' class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Rellena el formulario de contacto y un asesor se pondrá en contacto contigo lo antes posible</p>
        <a href="/contacto" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section data-cy='blog' class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="Texto Entrada Blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="Texto Entrada Blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                        <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle más vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section>

        <section data-cy='comentarios' class="comentarios">
            <h3>Comentarios</h3>

            <div class="comentario">
                <blockquote>
                    El personal se comporta de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Miguel Ángel López</p>
            </div>
        </section>
    </div>
