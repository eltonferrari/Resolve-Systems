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
    $user_edited = new User();
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

    $user_edited->editUser($user_id,
                    $_POST['name_user'],
                    $user_email,
                    $user_password,
                    $user_image,
                    $_POST['type_user'],
                    $_POST['active_user'],
                    );

    if($user_name != $_POST['name_user']) {
        $name = $_POST['name_user'];
        echo "Troca de nome para $name.<br />";
    }
    
    if($user_type != $_POST['type_user']) {
        $type = $_POST['type_user'];
        if ($type == 0) {
            $type = "usuário";
        } else {
            $type = "administrador";
        }
        echo "Troca de tipo de usuário para $type.<br />";
    }
    
    if($user_active != $_POST['active_user']) {
        $active = $_POST['active_user'];
        if ($active == 0) {
            $active = "inativo";
        } else {
            $active = "ativo";
        }
        echo "Usuário alterado para $active.<br />";
    }
    










    echo '<br /><br /><br /><br /><br /><br /><br /><br />';

?>