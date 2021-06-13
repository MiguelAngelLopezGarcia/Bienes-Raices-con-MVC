<main class="contenedor seccion">
        <h1 data-cy='heading-login'>Iniciar Sesión</h1>

        <?php foreach($errores as $error) : ?>
            <div data-cy='alerta-login' class="alerta error"><?php echo $error ?></div>
        <?php endforeach; ?>

            


        <form data-cy='formulario-login' method="POST" class="formulario" action="/login">
        <fieldset>
                <legend>Email y Password</legend>

                <label for="email">Email:</label>
                <input data-cy='input-email' type="email" name="email" placeholder="Tu Email" id="email" required>

                <label for="password">Password:</label>
                <input data-cy='input-password' type="password" name="password" placeholder="Tu Password" id="password" required>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>
    </main>
