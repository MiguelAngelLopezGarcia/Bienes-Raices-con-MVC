<main class="contenedor seccion">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
        <?php endforeach; ?>

            


        <form method="POST" class="formulario" action="/login">
        <fieldset>
                <legend>Email y Password</legend>

                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Tu Email" id="email" required>

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Tu Password" id="password" required>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>
    </main>
