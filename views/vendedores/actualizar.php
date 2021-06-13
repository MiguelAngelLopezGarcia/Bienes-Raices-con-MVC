<main class="contenedor seccion">
            <h1>Actualizar Vendedor/a</h1>
    
            <a href="/admin/" class="boton-verde">Volver</a>
    
            <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
            <?php endforeach; ?>
    
            <form method="POST" class="formulario">
                <?php include __DIR__ . '/formulario.php'; ?>
    
                <input type="submit" value="Actualizar Vendedor/a" class="boton-verde">
            </form>
        </main>