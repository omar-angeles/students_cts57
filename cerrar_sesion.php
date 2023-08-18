<!-- Código que realiza el cierre de sesión.-->
<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit();
?>