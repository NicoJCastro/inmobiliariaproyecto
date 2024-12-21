<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasControler {
    public static function index( Router $router ) {

        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros( Router $router) {
       
        $router->render('paginas/nosotros');

    }

    public static function propiedades(Router $router) {
        // Listar todas las propiedades

        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);

    }

    public static function propiedad(Router $router) {
        // Buscar una propiedad por su id
        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
        
    }

    public static function blog(Router $router) {
        
        $router->render('paginas/blog'); // ver como hacer dinámico el blog y la entrada a cada blog. Tendira que haber otro modelo y luego obtener el id de la entrada.
    }

    public static function entrada(Router $router) {
        $router->render('paginas/entrada');
        
    }

    public static function contacto(Router $router) {

        $mensaje = null;
      

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $respuestas = $_POST['contacto'];

            // Crear la instancia de PHPmailer

            $mail = new PHPMailer(true);

            //Configurar SMTP (protocolo de transferencia de correo simple)
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io'; // Servidor de correo capaz puede ser sandbox.smtp.mailtrap.io
            $mail->SMTPAuth = true;
            $mail->Username = 'f936d9f970bf0d';
            $mail->Password = '37b11873f4cf9f';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com'); // Email del remitente
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com'); // Email del destinatario
            $mail->Subject = 'Tienes un mensaje de ';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

           

            // Definir el contenido del email
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= 'Nombre: ' . $respuestas['nombre'] . '<br>';
           

            //Enviar de forma condicional algunos campos 

            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Nos desea contactar por teléfono </p>';
                $contenido .= 'Teléfono: ' . $respuestas['telefono'] . '<br>';
                $contenido .= 'En el dia: ' . $respuestas['fecha'] . '<br>';
                $contenido .= 'A la Hora: ' . $respuestas['hora'] . '<br>';
            } else {
                $contenido .= '<p>Nos desea contactar por email </p>';
                $contenido .= 'Email: ' . $respuestas['email'] . '<br>';
            }

            
            $contenido .= 'Mensaje: ' . $respuestas['mensaje'] . '<br>';
            $contenido .= 'Vende o Compra: ' . $respuestas['tipo'] . '<br>';
            $contenido .= 'Precio o Presupuesto: $' . $respuestas['precio'] . '<br>';
            $contenido .= 'Contactar por: ' . $respuestas['contacto'] . '<br>';
            
            $contenido .= '</html>';


            $mail->Body = $contenido;
            $mail->AltBody = 'Texto sin formato HTML';

            //Enviar el email

            if ($mail->send()) {
                $mensaje = "Mensaje enviado Correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar";

            };
           
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);

    }
        

   

}

?>