<?php
   // Comprobar si $_SESSION["timeout"] está establecida
   if(isset($_SESSION["timeout"])){
       // Establecer tiempo de vida de la sesión en segundos
       $inactividad = 420;
       // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
       $sessionTTL = time() - $_SESSION["timeout"];
       $tiempo_restante =$inactividad-$sessionTTL;
       if($tiempo_restante<300){
           echo "<script>alert('Estimado usuario, le quedan ".$tiempo_restante.
           " segundos para caducar su sesion, tome sus medidas')</script>";
       }
       if($sessionTTL > $inactividad){
           header("Location: cerrar.php");
       }
   }
?>