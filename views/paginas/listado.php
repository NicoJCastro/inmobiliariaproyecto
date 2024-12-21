<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad): ?>        
            <div class="card"> <!--Aca puede ser class "anuncio"-->
                
                    <img loading="lazy" src="/bienesraicesMVC/public/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">
                
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad->titulo ?></h3>
                    <p><?php echo $propiedad->descripcion ?></p>
                    <p class="precio">$<?php echo $propiedad->precio ?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="/bienesraicesMVC/public/build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad->wc ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="/bienesraicesMVC/public/build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedad->estacionamiento ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="/bienesraicesMVC/public/build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $propiedad->habitaciones ?></p>
                        </li>
                    </ul>

                    <a href="/bienesraicesMVC/propiedad?id=<?php echo $propiedad->id ?>" class="boton-amarillo-block">Ver Propiedad</a>
                </div> <!--.contenido-anuncio-->
            </div> <!--.card-->         
    <?php endforeach; ?>
            

</div> <!--.contenedor-anuncios-->