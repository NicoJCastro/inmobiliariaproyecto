# NicoJCastro Inmobiliaria Proyecto

Este es un proyecto de una aplicación web para una inmobiliaria. La aplicación permite gestionar propiedades, vendedores y páginas informativas.

## Estructura del Proyecto

```
NicoJCastro-inmobiliariaproyecto/
├── Router.php
├── controllers/
│   ├── PaginasControler.php
│   ├── LoginController.php
│   ├── PropiedadControler.php
│   └── VendedorControler.php
├── .htaccess
├── composer.json
├── public/
│   ├── index.php
│   ├── build/
│   │   ├── img/
│   │   │   ├── anuncio1.webp
│   │   │   ├── anuncio2.webp
│   │   │   ├── anuncio3.webp
│   │   │   ├── anuncio4.webp
│   │   │   ├── anuncio5.webp
│   │   │   ├── anuncio6.webp
│   │   │   ├── blog1.webp
│   │   │   ├── blog2.webp
│   │   │   ├── blog3.webp
│   │   │   ├── blog4.webp
│   │   │   ├── destacada.webp
│   │   │   ├── destacada2.webp
│   │   │   ├── destacada3.webp
│   │   │   ├── encuentra.webp
│   │   │   ├── header.webp
│   │   │   └── nosotros.webp
│   │   ├── css/
│   │   │   ├── app.css
│   │   │   └── app.css.map
│   │   └── js/
│   │       ├── bundle.min.js
│   │       └── bundle.js.min.map
│   ├── .htaccess
│   └── imagenes/
├── package.json
├── models/
│   ├── ActiveRecord.php
│   ├── Propiedad.php
│   ├── Admin.php
│   └── Vendedor.php
├── composer.lock
├── includes/
│   ├── config/
│   │   └── database.php
│   ├── app.php
│   ├── templates/
│   │   ├── formulario_propiedades.php
│   │   ├── header.php
│   │   ├── footer.php
│   │   ├── formulario_vendedores.php
│   │   └── anuncios.php
│   └── funciones.php
├── views/
│   ├── auth/
│   │   └── login.php
│   ├── paginas/
│   │   ├── index.php
│   │   ├── entrada.php
│   │   ├── propiedad.php
│   │   ├── contacto.php
│   │   ├── propiedades.php
│   │   ├── blog.php
│   │   ├── iconos.php
│   │   ├── nosotros.php
│   │   └── listado.php
│   ├── vendedores/
│   │   ├── formulario.php
│   │   ├── crear.php
│   │   └── actualizar.php
│   ├── layout.php
│   └── propiedades/
│       ├── admin.php
│       ├── formulario.php
│       ├── crear.php
│       └── actualizar.php
├── gulpfile.js
└── src/
    ├── .DS_Store
    ├── img/
    ├── js/
    │   ├── modernizr.js
    │   └── app.js
    └── scss/
        ├── .DS_Store
        ├── base/
        │   ├── _mixins.scss
        │   ├── _normalize.scss
        │   ├── _utilidades.scss
        │   ├── _globales.scss
        │   ├── _variables.scss
        │   ├── _darkmode.scss
        │   └── _botones.scss
        ├── layout/
        │   ├── _anuncios.scss
        │   ├── _navegacion.scss
        │   ├── _testimoniales.scss
        │   ├── _header.scss
        │   ├── _inferior.scss
        │   ├── _iconos.scss
        │   ├── _contactar.scss
        │   ├── _footer.scss
        │   └── _formularios.scss
        ├── app.scss
        └── internas/
            ├── _admin.scss
            └── _nosotros.scss
```

## Instalación

1. Clona el repositorio:
    ```sh
    git clone https://github.com/tu-usuario/NicoJCastro-inmobiliariaproyecto.git
    ```
2. Instala las dependencias de Composer:
    ```sh
    composer install
    ```
3. Instala las dependencias de npm:
    ```sh
    npm install
    ```

## Uso

1. Configura la base de datos en `includes/config/database.php`.
2. Ejecuta el servidor local:
    ```sh
    php -S localhost:8000 -t public
    ```
3. Abre tu navegador y navega a `http://localhost:8000`.

## Estructura de Directorios

- **controllers/**: Controladores de la aplicación.
- **models/**: Modelos de la aplicación.
- **public/**: Archivos públicos accesibles desde el navegador.
- **includes/**: Archivos de configuración y funciones auxiliares.
- **views/**: Vistas de la aplicación.
- **src/**: Archivos fuente de JavaScript y SCSS.

## Exposición Pública con ngrok

## Pasos para usar ngrok:

1. **Inicia el servidor local**:
   Si ya tienes Apache o PHP corriendo en tu máquina, asegúrate de que el proyecto esté accesible en `http://localhost`.

2. **Ejecuta ngrok**:
   Abre una terminal y ejecuta el siguiente comando para exponer tu servidor local:
   
   ```bash
   ngrok http 80

## Contribuciones

Las contribuciones son bienvenidas. Por favor, abre un issue o un pull request para discutir cualquier cambio que desees realizar.


