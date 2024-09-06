<!DOCTYPE html>
<html>
<head>
    <title>Ignacio Torrado | Branding Packaging & Naming</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="/img/LOGO_GATO.ico">
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    
</head>
<body>

    <header>
        <a id="enlaceHome" href="index.html">
            <div id="contenedorLogo">
                <img src="/img/LOGO_GATO-05.png" id="logoGatoHeader" alt="Logo de la página"><h1 id="hii">HI!</h1>
            </div>
        </a>
        <div class="contenedorMenu">
            <div id="menu">
                <a href="index.html" class="menu-item" id="work"><span>WORK</span></a> &nbsp;&nbsp;
                <a href="about.html" class="menu-item" id="about"><span>ABOUT</span></a> &nbsp;&nbsp;
                <a href="contact.html" class="menu-item activo" id="contact"><span>CONTACT</span></a> &nbsp;&nbsp;
                <a href="reference.html" class="menu-item" id="refecence"><span>REFERENCE</span></a>
            </div>
            
        </div>
    </header>

    

    <div id="contenedorInfo" id="top">
        
        <?php

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            include("connectionDB.php");

            if ($conexion->connect_error) {
                die("Connection failed: " . $conexion->connect_error);
            }

            // TIPOS DE CLIENTES
            $type_client = "client";
            $type_supplier = "supplier";

            // Obtener los datos del formulario
            try {
                $f_typeForm = isset($_POST['typeForm']) ? $_POST['typeForm'] : null;
                $f_name = isset($_POST['nameSurname']) ? $_POST['nameSurname'] : null;
                $f_email = isset($_POST['email']) ? $_POST['email'] : null;
                $f_phoneNumber = isset($_POST['telf']) ? $_POST['telf'] : null;
                $f_message = isset($_POST['message']) ? $_POST['message'] : null;
            
                if (is_null($f_typeForm) || is_null($f_name) || is_null($f_email) || is_null($f_phoneNumber) || is_null($f_message)) {
                    echo '<h2 id="titContact">Some parameters are missing.</h2>';
                    // die();
                }
            
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }

            // Verifica el tipo de formulario y establece el tipo de cliente
            $type_client = ($f_typeForm == "clientForm") ? 'type_client' : 'type_supplier';

            // Preparar la consulta SQL para insertar datos en la tabla CUSTOMERS
            $sql = "INSERT INTO CUSTOMERS (customerType, name, email, phone, message) VALUES (?, ?, ?, ?, ?)";

            // Inicializa la sentencia preparada
            $stmt = $conexion->prepare($sql);

            if ($stmt) {
                // Establece los valores de los parámetros
                $stmt->bind_param("sssss", $type_client, $f_name, $f_email, $f_phoneNumber, $f_message);

                // Ejecuta la sentencia preparada
                if ($stmt->execute()) {
                    echo '<h2 id="titContact">Thanks!</h2>';
                } else {
                    echo '<h2 id="titContact">Error</h2>' . $stmt->error;
                }

                // Cierra la sentencia
                $stmt->close();
            } else {
                echo '<h2 id="titContact">Error</h2>' . $conexion->error;
            }

            // // Enviar el correo electrónico al ADMINISTRADOR
            $to = 'hello@ignaciotorrado.com'; // CAMBIAR POR EL CORREO A RECIBIR EMAILS
            $subject = "ignaciotorrado.com: $f_typeForm";
            $message = "
    ⭐️ Contact Form $f_typeForm ⭐️

    👤 Name: $f_name
    📧 Email: $f_email
    📞 Phone: $f_phoneNumber
    📝 Message: $f_message
                ";
            $headers = "From: contactoPortfolio@ignaciotorrado.com\r\n" .
                        "Reply-To: noreply@ignaciotorrado.com\r\n" .
                        "X-Mailer: PHP/" . phpversion();
                        
            mail($to, $subject, $message, $headers);

            // Enviar el correo electrónico al CLIENTE
            $to = $f_email;
            $subject = "Your ignaciotorrado.com form";
            $message = "
    
Hello $f_name, we have received your form correctly. Below we show you the data you have sent us:

    Message: $f_message

I will contact you as soon as possible.

Ignacio.";
            $headers = "From: hello@ignaciotorrado.com\r\n" .
                        "Reply-To: hello@ignaciotorrado.com\r\n" .
                        "X-Mailer: IgnacioMailer";


            if (! mail($to, $subject, $message, $headers)) {
                echo '<h2 id="titContact">Email could not be sent to you.</h2>'; 
            }

            // Cerrar la conexión
            $conexion->close();

        ?>

    </div>

    <footer>
        <div id="contenedorTexto">
            <p>
                As your designer, I strive not to just <br>
                create impactful and effective design, <br>
                but to also become you trusted partner. <br>
                Creativity is the only way to keep going forwar. <br>
            </p>
        </div>

        <div class="divEnlaces">
            <div class="divRS">
                <div><a href="https://www.instagram.com/" target="_blank">Instagram<div class="RSIcon arrow-top-corner"></div></a></div>
                <div><a href="https://es.linkedin.com/" target="_blank">Linkedin<div class="RSIcon arrow-top-corner"></div></a></div>
                <div><a href="https://www.behance.net/" target="_blank">Behance<div class="RSIcon arrow-top-corner"></div></a></div>
                <div class="divTop"><a href="#top"><img src="/img/flecha-arriba.svg" alt="Flecha para arriba" width="50px" height="50px" class="TopFlechaArriba">Up</a></div>
            </div>
        </div>      
    </footer>

    <div class="contenedorLogos" id="contenedorLogosLoading">
        <div class="loading-logo">
            <img class="cargar-logo" src="/img/CIRCULO_LETERING_MOVEMNT.gif" alt="Loading Logo">
        </div>
    </div>
    <div class="contenedorLogos" id="contenedorLogosLoading">
        <div class="scroll-logo">
            <img class="cargar-logo" src="/img/CIRCULO_LETERING-02.png" alt="Scroll Logo">
        </div>
    </div>
    
</body>

<script src="./js/cargarLogo.js"></script>

<script src="./js/menu.js"></script>

</html>
