# NicoJCastro Inmobiliaria Proyecto

Este es un proyecto de una aplicación web para una inmobiliaria. La aplicación permite gestionar propiedades, vendedores y páginas informativas.


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


