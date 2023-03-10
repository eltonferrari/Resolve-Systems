<?php
    require_once "validador_acesso.php";
    include 'class_user.php';
    $buscaPerfil = new User();
    $name = '%'.$_GET['buscar'].'%';
    $busca = $buscaPerfil->getUserByName($name);
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
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center text-success">
                    <h3>Usuários</h3>
                </div>
                <div class="col-md-4"></div>
            </div>    
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <?php
                        foreach($busca as $user) {
                    ?>
                            <div class="row mt-5">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="text-center border border-success pt-1">
                                        <h6><?php echo $user['name']; ?></h6>
                                    </div>
                                    <div class="text-center">
                                        <?php echo '(' . $user['email'] . ')'; ?>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <a href="perfil.php?usuario=<?= $user['iduser']?>">
                                        <img src="../img/icones/seta_direita.png" width="40">
                                    </a>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <?php
            include '../template/js-bootstrap_user.php' 
        ?>
    </body>
</html>







