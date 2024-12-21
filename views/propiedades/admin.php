<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

   <?php 
    if($resultado){
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
        <p class="alerta exito"><?php echo s($mensaje) ?></p>
        <?php } 
     } 
     ?>
  

    <a href='/bienesraicesMVC/propiedades/crear' class="boton boton-verde">Agregar Nueva Propiedad</a>
    <a href="/bienesraicesMVC/vendedores/crear" class="boton boton-amarillo">Agregar Nuevo Vendedor</a>


    <h2>Lista de Propiedades</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody> <!-- Mostramos los resultados -->
            <?php foreach($propiedades as $propiedad): ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td> <img src="/bienesraicesMVC/public/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt="imgen-tabla"></td>
                <td>$ <?php echo $propiedad->precio; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/bienesraicesMVC/propiedades/eliminar">

                    <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>"> <!-- Creamos un input oculto para enviar el id de la propiedad a eliminar -->
                    <input type="hidden" name="tipo" value="propiedad">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a class="boton-amarillo-block" href="/bienesraicesMVC/propiedades/actualizar?id=<?php echo $propiedad->id; ?>">Actualizar</a>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Lista de Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>                
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody> <!-- Mostramos los resultados -->
            <?php foreach($vendedores as $vendedor): ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/bienesraicesMVC/vendedores/eliminar">

                    <!-- Creamos un input oculto para enviar el id de la propiedad a eliminar -->

                    <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                    <input type="hidden" name="tipo" value="vendedor">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a class="boton-amarillo-block" href="/bienesraicesMVC/vendedores/actualizar?id=<?php echo $vendedor->id; ?>">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>