<?php
// Comprobar si $_SESSION["timeout"] está establecida
if (isset($_SESSION["timeout"])) {
    // Establecer tiempo de vida de la sesión en segundos
    $inactivity_time = 420;
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    $time_left = $inactivity_time - $sessionTTL;
    if ($time_left < 300) {
        echo "<script>alert('Estimado usuario, le quedan " . $time_left .
            " segundos para caducar su sesión, tome sus medidas')</script>";
    }
    if ($sessionTTL > $inactivity_time) {
        header("Location: logout.php");
    }
}
