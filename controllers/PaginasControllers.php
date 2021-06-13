<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasControllers {
    public static function index(Router $router) {
        $propiedades = Propiedad::all('3');
        $inicio = true;

        $router->render('/paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router) {
        $router->render('/paginas/nosotros', []);
    }

    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();

        $router->render('/paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router) {
        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);

        $router->render('/paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router) {
        $router->render('/paginas/blog', []);
    }

    public static function entrada(Router $router) {
        $router->render('/paginas/entrada', []);
    }

    public static function contacto(Router $router) {
        $mensaje = null;
        $enviado = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = $_POST['contacto'];

            // Crear instancia de PHP Mailer
            $mail = new PHPMailer();

            // Configurar SMPT
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '06082b5fd67a1f';
            $mail->Password = '5717cdf814a159';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject= 'Tienes un Nuevo Mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Tipo transacción: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Presupuesto: ' . $respuestas['precio'] . ' €</p>';
            $contenido .= '<p>Forma de contacto: ' . $respuestas['contacto'] . '</p>';
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';
            } else {
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }
            $contenido .= '</html>'; 

            $mail->Body = $contenido;
            
            // Enviar el email
            if($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
                $enviado = 'exito';
            } else {
                $mensaje = "El mensaje no se pudo enviar...";
                $enviado = 'error';
            }
        }

        $router->render('/paginas/contacto', [
            'mensaje' => $mensaje,
            'enviado' => $enviado
        ]);
    }

}