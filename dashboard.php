<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard_styles.css">
</head>

<body>
    <div class="dashboard-container">
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "<h1>Welcome, " . htmlspecialchars($username) . "</h1>";
        } else {
            // Redirigir al usuario a index.php si no está logueado
            header('Location: index.html');
            exit;
        }
        ?>
        <!-- Botón de Ayuda -->
        <div class="help-button">
            <button id="helpBtn">Ayuda</button>
        </div>

        <!-- Ventana Modal de Ayuda -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>¿Necesitas ayuda?</h2>
                <p>Si tienes problemas con tu dashboard o necesitas asistencia técnica, puedes consultar nuestra sección de Preguntas Frecuentes (FAQ) o contactar con soporte técnico.</p>
                <p><b>Almacenamiento:</b> Pulsa el boton de la carpeta para acceder al sistema de almacenamiento.</p>
                <p><b>Camara de Seguridad:</b> Pulsa el boton de la camra para acceder a las imagenes en directo.</p>
                <p>Estamos aquí para ayudarte a aprovechar al máximo tu experiencia en el dashboard.</p>
            </div>
        </div>

        <div class="logout">
            <form action="logout.php" method="post">
                <button type="submit" name="logout" class="logout-button">Salir</button>
            </form>
        </div>
        <!-- Contenido del dashboard -->

        <div class="option">
            <a href="almacenamiento.php">
                <img src="https://cdn-icons-png.flaticon.com/512/3767/3767084.png" alt="Folder Access">
                <p>Acceso Sistema de Almacenamiento</p>
            </a>
        </div>

        <div class="option">
            <a href="camera.php">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/005/261/421/small/cctv-camera-icon-security-camera-icon-free-vector.jpg" alt="Camera Access">
                <p>Acceso Camara de Seguridad</p>
            </a>
        </div>
    </div>
    <script>
        // Obtener el modal
        var modal = document.getElementById("myModal");

        // Obtener el botón que abre el modal
        var btn = document.getElementById("helpBtn");

        // Obtener el elemento <span> que cierra el modal
        var span = document.getElementsByClassName("close")[0];

        // Cuando el usuario hace clic en el botón, abrir el modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // Cuando el usuario hace clic en <span> (x), cerrar el modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Cuando el usuario hace clic en cualquier lugar fuera del modal, cerrarlo
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>