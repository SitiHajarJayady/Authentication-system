<?php
    session_start();
    session_unset();
    session_destroy();
    $url = 'http://localhost/auth-sys/index.php';

    header("Location: $url");


?>