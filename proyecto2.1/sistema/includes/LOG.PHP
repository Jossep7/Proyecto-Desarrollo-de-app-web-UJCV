<?php
$logFile = fopen("log.txt", 'a') or die("Error creando archivo");
fwrite($logFile, "\n".date("d/m/Y H:i:s")." Mensaje que se quiera grabar") or die("Error escribiendo en el archivo");fclose($logFile);
?>