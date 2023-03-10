<?php    
    // Inicia sessão
    session_start();

    // Verifica se sessão está definida como 
    // autenticado, senão envia para login.php
    // para autenticar.
    if(!isset($_SESSION['login']) || $_SESSION['login'] != 1 ) {
        header('Location: login.php?login=0');
    }
?>