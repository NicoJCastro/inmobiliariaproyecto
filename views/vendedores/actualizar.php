<main class="contenedor seccion">
    <h1>Actualizar Vendedor(a)</h1>

    <a href="/bienesraicesMVC/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error): ?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <!-- Realizar agregar imagenes a los vendedores. Agregar enctype="multipart/form-data" en el form -->

    <form class="formulario" method="POST">

       <?php include 'formulario.php' ?>

        <input type="submit" value="Guardar Cambios" class="boton boton-verde">

    </form>

</main>