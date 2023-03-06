<!doctype html>
<html lang="pt-br">
    <head>
		<?php include '../template/head_user.php';?>
	</head>
    <body>
        <?php include '../template/menu_user.php';?>
        <div class="container">    
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 pt-4 text-center text-primary  ">
                    <h3>Perfil do Usuário</h3>
                </div>
                <div class="col-sm-3"></div>
                <div>
                    <form action="valida_perfil.php" method="post">
                        <?php
                            include 'class_user.php';
                            $user = new User();
                            $perfil = $user->getUserById(1);
                            echo '<pre>';
                                print_r($perfil);
                            echo '</pre>';

                        ?>
                        <div class="img-responsive">
                            <a href="update_img.php">
                                <img src="../img/users/<?php echo $user;?>/foto-perfil.jpg' " alt="">
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            include '../template/js-bootstrap_user.php' 
        ?>
    </body>
</html>