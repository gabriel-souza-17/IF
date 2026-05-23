<?php

if (
    !isset($_SESSION['usuario_logado']) ||
    $_SESSION['usuario_logado']->usuarios_nivel != 2
) {
    redirectPage(base_url('login'));
    exit;
}

$usuario = $_SESSION['usuario_logado'];

require_once 'Dashboard/index.php';

?>