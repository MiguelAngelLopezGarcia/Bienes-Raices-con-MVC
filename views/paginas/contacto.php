<main class="contenedor seccion">
        <h1 data-cy='heading-contacto'>Contacto</h1>

        <?php if($mensaje) { ?>
                <p data-cy='alerta-envio-formulario' class='alerta <?php echo $enviado ?>'><?php echo $mensaje ?></p>
            <?php } ?>


        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Imagen Contacto" loading="lazy">
        </picture>

        <h2 data-cy='heading-formulario'>Rellene el Formulario de Contacto</h2>
        <form data-cy='formulario-contacto' class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre:</label>
                <input data-cy='input-nombre' type="text" name="contacto[nombre]" placeholder="Tu Nombre" id="nombre" required>

                <label for="mensaje">Mensaje:</label>
                <textarea data-cy='input-mensaje' name="contacto[mensaje]" id="mensaje" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Sobre la Propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                <select data-cy='input-opciones' name="contacto[tipo]" id="opciones" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto:</label>
                <input data-cy='input-precio' type="number" name="contacto[precio]" placeholder="Tu Precio o Presupuesto" id="presupuesto" required>
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>¿Cómo desea ser contactado?</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input data-cy='forma-contacto' name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono" required>

                    <label for="contactar-email">Email</label>
                    <input data-cy='forma-contacto' name="contacto[contacto]" type="radio" value="email" id="contactar-email" required> 
                </div>

                <div id="contacto"></div>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>
