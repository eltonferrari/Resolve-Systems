<?php
    session_start();
    include 'class_user.php';
    echo "===== SESSION =====";    
    echo '<pre>';
        print_r($_SESSION);
    echo '<pre>';
    echo "===== POST =====";
    echo '<pre>';
        print_r($_POST);
    echo '<pre>';

    $user = new User();
    $perfil = $user->getUserById($_SESSION['iduser']);
    
    foreach($perfil as $pessoa) {
        $user_id = $pessoa['iduser'];
        $user_name = $pessoa['name'];
        $user_email = $pessoa['email'];
        $user_password = $pessoa['password'];
        $user_image = $pessoa['image'];
        $user_type = $pessoa['type'];
        $user_active = $pessoa['active'];
        $user_created = $pessoa['created_at'];
        $user_updated = $pessoa['updated_at'];
    }
    echo "===== BANCO =====";
    
    echo '<pre>';
        print_r($perfil);
    echo '<pre>';

    if($user_name != $_POST['name_user']) {
        echo "Troca de nome";
    }



    
?>