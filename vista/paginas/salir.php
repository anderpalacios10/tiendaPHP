<?php
session_start();

// Destruir todas las variables de sesión
session_unset();
session_destroy();

// Redirigir al login
echo '<script>
    window.location = "usuarios";
</script>';
exit;
?>