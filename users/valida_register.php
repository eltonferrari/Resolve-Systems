<?php
    session_start();
    include '../connections/DBController.php';
    include '../users/class_user.php';
    
    // Procura usuários e senhas válidos em "Banco de Dados"
    $usuario = new User();
    $userExist = $usuario->getAllUsers();
    $save = null;
    $novoEmail = $_POST['email'];
    $novaSenha = md5($_POST['senha']);
        
    if($userExist == null) {
        $save = $usuario->addUser($novoEmail, $novaSenha); 
        header("Location: register.php?register=cadastrado&user=$novoEmail");
    } else {
        foreach($userExist as $user) {
            echo '<pre>';
                print_r($user);
            echo '<pre>';
            if($user['email'] == $novoEmail) {
                header("Location: register.php?register=erro2&user=$novoEmail");
                break;
            } else {                
                echo "E-mail: $novoEmail e Password: $novaSenha <br />";
                $save = $usuario->addUser($novoEmail, $novaSenha); 
                header("Location: register.php?register=cadastrado&user=$novoEmail");
            }
        }
    }
?>