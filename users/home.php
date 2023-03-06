<?php
    session_start();
    $idUser = $_SESSION['iduser'];
    include 'class_user.php';
    $user = new User();
    $perfil = $user->getUserById($idUser);
    /*
    echo '<pre>';
        print_r($perfil);
    echo '</pre>';
    */
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
        /*
        echo $user_id .'<br />';
        echo $user_name .'<br />';
        echo $user_email .'<br />';
        echo $user_password .'<br />';
        echo $user_image .'<br />';
        echo $user_type .'<br />';
        echo $user_active .'<br />';
        echo $user_created .'<br />';
        echo $user_updated;
        */
    }    
?>
<!doctype html>
<html lang="pt-br">
    <head>
		<?php include '../template/head_user.php';?>
	</head>
    <body>
        <?php include '../template/menu_user.php';?>
        <div class="container">    
            <form action="valida_perfil.php" method="post">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6 pt-4">
                        <div class="text-center text-primary">
                            <h3>Perfil do Usuário</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="type_user">Tipo:</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4 text-right">
                                        Usuário
                                    </div> 
                                    <div class="col-sm-4">
                                        <input type="range" name="type_user" min="0" max="1" value="<?php echo $user_type;?>">
                                    </div>
                                    <div class="col-sm-4">
                                        Administrador
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 text-right">
                                <label for="activ_user">Usuário:</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4 text-right">
                                        Inativo
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="range" name="active_user" min="0" max="1" value="<?php echo $user_active;?>">
                                    </div>
                                    <div class="col-sm-4">
                                        Ativo
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
                <div class="row pt-5">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 pt-3">
                        <div>
                            ID do Usuário: <?php echo $user_id;?>
                        </div>
                        <div class="pt-2">
                            <label for="name_user">Nome:</label>
                            <input type="text" name="name_user" value="<?php echo $user_name;?>">
                        </div>
                        <div class="pt-2">
                            <label for="email_user">E-Mail:</label>
                            <input type="text" name="email_user" value="<?php echo $user_email;?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6 text-center pt-3">
                                <label for="created_user">Data de criação:</label>
                            </div>
                            <div class="col-md-6 text-center pt-3">
                                <label for="updated_user">Data da última alteração:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center pt-3">
                                <input type="date" name="created_user" value="<?php echo $user_created;?>">
                            </div>
                            <div class="col-md-6 text-center pt-3">
                                <input type="date" name="updated_user" value="<?php echo $user_updated;?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row pt-5">
                    <div class="col-md-5"></div>
                    <div class="col-md-2 d-flex justify-content-center">
                        <button class="btn btn-block btn-success">Salvar</button>
                    </div>
                    <div class="col-md-5"></div>
                </div>
            </form>
        </div>
        <?php
            include '../template/js-bootstrap_user.php' 
        ?>
    </body>
</html>