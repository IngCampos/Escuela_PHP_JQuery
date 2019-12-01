<?php
   // Comprobar si $_SESSION["timeout"] está establecida
   if(isset($_SESSION["timeout"])){
       // Establecer tiempo de vida de la sesión en segundos
       $inactividad = 300;
       // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
       $sessionTTL = time() - $_SESSION["timeout"];
       echo "<script>alert('Estimado usuario, le quedan ".($inactividad-$sessionTTL).
       " segundos para caducar su sesion, tome sus medidas')</script>";
       if($sessionTTL > $inactividad){
           header("Location: cerrar.php");
       }
   }
?>