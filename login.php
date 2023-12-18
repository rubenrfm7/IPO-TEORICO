<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Leer las credenciales del archivo
    $creeds = file('creeds.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $isValidUser = false;

    // Verificar cada par de credenciales
    foreach ($creeds as $cred) {
        list($fileUsername, $filePassword) = explode(':', $cred);
        if ($username == $fileUsername && $password == $filePassword) {
            $isValidUser = true;
            break;
        }
    }

    // Si las credenciales son válidas, iniciar sesión y redirigir al dashboard
    if ($isValidUser) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        echo 'Invalid username or password';
    }
}
?>
