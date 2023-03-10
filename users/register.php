<?php
    require_once "validador_acesso.php";
    $_SESSION['loged'] = true;
    $_SESSION['home'] = false;
    include 'class_user.php';
    $user1 = new User;
?>
<!doctype html>
<html lang="pt-br">
    <head>
		<?php include '../template/head_user.php';?>
	</head>
    <body>
        <?php include '../template/menu_user.php';?>
        <div class="container">
            <?php 
                if (isset($_GET['register']) && $_GET['register'] == "erro2") {
                    $user = $_GET['user'];
            ?>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6 pt-4">
                            <div class="text-center text-primary">
                                <h5><?php echo $user; ?></h5>
                            </div>
                            <div class="text-center text-danger">
                                <h5>Usuário já cadastrado..!</h5>
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
            <?php 
                } 
                if(isset($_GET['register']) && $_GET['register'] == "cadastrado"){
                    $user = $_GET['user'];
            ?>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6 pt-4">
                            <div class="text-center text-primary">
                                <h5>
                                    <?php 
                                        echo "Usuário<br /> $user<br /> cadastrado com sucesso"; 
                                        $array_users = $user1->getUserByEmail($user);
                                        $id_pessoa = null;
                                        foreach($array_users as $pessoa) {
                                            $id_pessoa = $pessoa['iduser'];
                                        }
                                        $_SESSION['iduser'] = $id_pessoa;
                                    ?>
                                </h5>
                                <form action="perfil.php" method="post">
                                    <button class="btn btn-large btn-primary" type="submit">
                                        Ir para perfil de <?php echo $user; ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
            <?php        
                }
            ?>
                <div class="row">
                <div class="col-sm-3"></div>
                <div class="card-login col-sm-6 pt-4">
                    <div class="card">
                        <div class="card-header">
                            Registrar - Acesso apenas para Administradores
                        </div>
                        <div class="card-body">
                            <form action="valida_register.php" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                                </div>
                                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>

        <?php 
            include '../template/js-bootstrap_user.php';
        ?>
    </body>
</html>