<?php    
    // Inicia sessão
    session_start();
    include '../connections/DBController.php';
    include '../users/class_user.php';
    
    $usuario_autenticado = false;

    /*
    // Variável que verifica se a autenticação foi realizada
    
    $usuario_id = null;
    $usuario_perfil_id = null;
    */
    echo '<pre>';
        print_r($_POST);
    echo '</pre>';
    
    $email = $_POST['email'];
    $password = md5($_POST['senha']);
    $usuario_autenticado = false;
    
    $usuario = new User();
    $userExist = $usuario->getUserByEmail($email);

    echo '<pre>';
        print_r($userExist);
    echo '</pre>';

    echo 'Email Banco: ' . $userExist[0]['email'] . '<br ?>';
    echo 'Password Banco: ' . $userExist[0]['password'] . '<br ?>';
    echo 'Email POST: ' . $email . '<br ?>';
    echo 'Passwor POST: ' . $password . '<br ?>';
    if(is_null($userExist)) {
        $_SESSION['login'] = 0;
        header("Location: login.php?user=no");
    } else {
        foreach($userExist as $user) {
            if($user['email'] == $email && $user['password'] == $password) {
                $_SESSION['login'] = 1;
                $_SESSION['iduser'] = $user['iduser'];
                header("Location: home.php");
            } else {
                $_SESSION['login'] = 0;
                header("Location: login.php?user=no");
            }
        }
    }
?>