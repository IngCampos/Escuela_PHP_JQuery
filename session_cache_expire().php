<?php
// Comprobar si $_SESSION["timeout"] está establecida
if (isset($_SESSION["timeout"])) {
    // Establecer tiempo de vida de la sesión en segundos
    $inactivity_time = 420;
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    $time_left = $inactivity_time - $sessionTTL;
    if ($time_left < 300) {
        echo "<script>alert('Dear user, $time_left minutes left to close the session.')</script>";
    }
    if ($sessionTTL > $inactivity_time) {
        header("Location: logout.php");
    }
}
