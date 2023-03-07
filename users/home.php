<?php
    session_start();
    $idUser = $_SESSION['iduser'];
    $_SESSION['home'] = true;
    include 'class_user.php';
    $user = new User();
    $perfil = $user->getUserById($idUser);
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
                                    <div class="col-sm-4 text-right text-danger">
                                        <strong>Usuário</strong>
                                    </div> 
                                    <div class="col-sm-4 slidecontainer">
                                        <input class="slider" id="myRange" type="range" name="type_user" min="0" max="1" value="<?php echo $user_type;?>">
                                    </div>
                                    <div class="col-sm-4 text-success">
                                        <strong>Administrador</strong>
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
                                    <div class="col-sm-4 text-right text-danger">
                                        <strong>Inativo</strong>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="range" name="active_user" min="0" max="1" value="<?php echo $user_active;?>">
                                    </div>
                                        <div class="col-sm-4 text-success">
                                    <strong>Ativo</strong>
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
                            <strong>ID do Usuário: <?php echo $user_id;?></strong>
                        </div>
                        <div class="pt-2">
                            <label for="name_user"><strong>Nome:</strong></label>
                            <input class="border border-success" type="text" name="name_user" value="<?php echo $user_name;?>">
                        </div>
                        <div class="pt-2">
                            <label for="email_user"><strong>E-Mail:</strong></label>
                            <input class="border border-success" type="text" name="email_user" value="<?php echo $user_email;?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6 text-center pt-3">
                                <label for="created_user"><strong>Data de criação:</strong></label>
                            </div>
                            <div class="col-md-6 text-center pt-3">
                                <label for="updated_user"><strong>Data da última alteração:</strong></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center pt-3">
                                <p class="bg-success text-white"><strong><?php echo $user_created;?></strong></p>
                            </div>
                            <div class="col-md-6 text-center pt-3">
                                <p class="bg-success text-white"><strong><?php echo $user_updated;?></strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row pt-5">
                    <div class="col-md-5"></div>
                    <div class="col-md-2 d-flex justify-content-center">
                        <button class="btn btn-block btn-success"><strong>Salvar</strong></button>
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