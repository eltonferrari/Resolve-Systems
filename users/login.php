<?php
    session_start();
    $_SESSION['loged'] = true;
    $_SESSION['home'] = false;
?>
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
                <div class="card-login col-sm-6 pt-4">
                    <div class="card">
                        <div class="card-header">
                            Login - Acesso às páginas seguras
                        </div>
                        <div class="card-body">
                            <form action="valida_login.php" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                                </div>
                                <?php
                                    if (isset($_GET['user']) && $_GET['user'] == "no") {
                                ?>
                                    <div class="text-danger text-center">
                                        Usuário e/ou senha inválido(s).
                                    </div>
                                <?php
                                    }
                                    if (isset($_GET['login']) && $_GET['login'] == 0) {
                                ?>
                                        <div class="text-danger text-center">
                                            Faça login para ter acesso às páginas seguras.
                                        </div>
                                <?php                                            
                                    }
                                ?>
                                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <?php
            include '../template/js-bootstrap_user.php' 
        ?>
    </body>
</html>