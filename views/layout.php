<?php


if (!isset($_SESSION)) {
  session_start();
}
$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
  $inicio = false;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienes Raices</title>
  <link rel="stylesheet" href="/bienesraicesMVC/public/build/css/app.css" />
</head>

<body>
  <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
    <div class="contenedor contenido-header">
      <div class="barra">
        <a href="/bienesraicesMVC/index">
          <img src="/bienesraicesMVC/public/build/img/logo.svg" alt="logotipo bienes raices" />
        </a>

        <div class="mobile-menu">
          <img src="/bienesraicesMVC/public/build/img/barras.svg" alt="icono menu responsive">
        </div>

        <div class="derecha">
          <img src="/bienesraicesMVC/public/build/img/dark-mode.svg" alt="modo oscuro" class="dark-mode-boton" />

          <nav class="navegacion">
            <a href="/bienesraicesMVC/nosotros">Nosotros</a>
            <a href="/bienesraicesMVC/propiedades">Anuncios</a>
            <a href="/bienesraicesMVC/blog">Blog</a>
            <a href="/bienesraicesMVC/contacto">Contacto</a>
            <?php if ($auth): ?>
              <a href="/bienesraicesMVC/logout">Cerrar Sesión</a>
              <a href="/bienesraicesMVC/admin">Administrar Propiedades</a>
            <?php endif; ?>

          </nav>
        </div><!--dercha-->
      </div> <!--.barra-->
      <?php if ($inicio) { ?>
        <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
      <?php } ?>
    </div> <!--.contenedor-->
  </header>

<?php echo $contenido; ?>

  <footer class="footer seccion">
      <div class="contenedor contenedor-footer barra">
        <a href="/bienesraicesMVC/index">
          <img src="/bienesraicesMVC/public/build/img/logo.svg" alt="logotipo bienes raices" />
        </a>
        <nav class="navegacion">
            <a href="/bienesraicesMVC/nosotros">Nosotros</a>
            <a href="/bienesraicesMVC/propiedades">Anuncios</a>
            <a href="/bienesraicesMVC/blog">Blog</a>
            <a href="/bienesraicesMVC/contacto">Contacto</a>
        </nav>
      </div>
      <!--footer navegacion-->
     
      <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="/bienesraicesMVC/public/build/js/bundle.min.js"></script>
  </body>
</html>