<?php
    require_once "validador_acesso.php";
    include 'class_user.php';
    include 'class_log.php';
    date_default_timezone_set('America/Sao_Paulo');
    $idUser = null;
    if (isset($_GET['usuario'])) {
        if($_GET['usuario'] != 0) {
            $idUser = $_GET['usuario'];
        } else {
            $idUser = $_SESSION['iduser'];
        }
    } else {
        $idUser = $_SESSION['iduser'];
    }    
    $_SESSION['home'] = true;    
    $user = new User();
    $listaUsers = new User();
    $visible = new User();
    $visible = $visible->getUserById($_SESSION['iduser']);
    foreach($visible as $ver) {
        $tipo = $ver['type'];
    }
    $listaUsers = $listaUsers->getAllUsers();
    $user = $user->getUserById($idUser);
    foreach($user as $pessoa) {
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
    $logUser = new Log();
    $listaLog = new Log();
    $listaLog = $listaLog->getLogUserByIdUser($idUser);
?>
<!doctype html>
<html lang="pt-br">
    <head>
		<?php include '../template/head_user.php';?>
	</head>
    <body>
        <?php include '../template/menu_user.php';?>
        <div class="container">
            <div class="text-center text-primary pb-3">
                <h3>Perfil do Usuário</h3>
            </div>
            <?php
                if($tipo == 1) {
            ?>
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <form class="form-inline" method="get" action="perfil.php">
                                <div class="form-group mr-3">
                                    <label for="usuarios" class="pr-3">Usuários:</label>
                                    <select class="form-control bg-success text-light" id="usuarios" name="usuario">
                                        <option value=0>Selecione o usuário</option>
                                        <?php 
                                            foreach($listaUsers as $oneUser) {
                                        ?>
                                                <option value="<?= $oneUser['iduser']; ?>"><?= $oneUser['email']; ?></option>
                                        <?php    
                                            }
                                        ?>
                                    </select>
                                    <div class="form-group ml-3">
                                        <button type="submit" class="btn btn-success">Abrir perfil</button>
                                    </div>
                                </div>                        
                            </form>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <form class="form-inline" method="get" action="busca_perfil.php">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Pesquisar por nome" name="buscar">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">Pesquisar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                }
            ?>
            <div class="text-center text-primary pb-3">
                <?php
                    if(isset($_SESSION['msg_name'])) {
                ?>
                        <div class="text-center text-danger pb-1">
                            <h6><?= $_SESSION['msg_name'] ?></h6>
                            <?php $logUser->addLogUser($idUser, $_SESSION['msg_name']);?>
                        </div>            
                <?php
                        unset($_SESSION['msg_name']);
                    }
                ?>
                <?php
                    if(isset($_SESSION['msg_type'])) {
                ?>
                        <div class="text-center text-danger pb-1">
                            <h6><?= $_SESSION['msg_type'] ?></h6>
                            <?php $logUser->addLogUser($idUser, $_SESSION['msg_type']);?>
                        </div>            
                <?php
                        unset($_SESSION['msg_type']);
                    }
                ?><?php
                    if(isset($_SESSION['msg_active'])) {
                ?>
                        <div class="text-center text-danger">
                            <h6><?= $_SESSION['msg_active']?></h6>
                            <?php $logUser->addLogUser($idUser, $_SESSION['msg_active']);?>
                        </div>            
                <?php
                        unset($_SESSION['msg_active']);
                    }
                ?>
            </div>
            <div class="pt-1"> 
                <form action="valida_perfil.php" method="post">
                    <?php
                        if($tipo == 1) {
                    ?>
                            <div class="row d-flex justify-content-center pb-3">
                                <div class="text-right text-danger pr-3 pl-1">
                                    <strong>Usuário</strong>
                                </div> 
                                <div class="pr-3">
                                    <input type="range" name="type_user" min="0" max="1" value="<?= $user_type; ?>">                                                                                            
                                </div>
                                <div class="text-success">
                                    <strong>Admin</strong>
                                </div>                
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="text-right text-danger pr-3">
                                    <strong>Inativo</strong>
                                </div>
                                <div class="pr-3">
                                    <input type="range" name="active_user" min="0" max="1" value="<?= $user_active; ?>">
                                </div>
                                <div class="text-success">
                                    <strong>Ativo</strong>
                                </div>
                            </div>
                    <?php 
                        } else {
                    ?>
                            <input type="hidden" name="type_user" value="<?= $user_type; ?>">
                            <input type="hidden" name="active_user" value="<?= $user_active; ?>">
                    <?php
                        }
                    ?>   
                    <div class="row pt-5">
                        <div class="col-sm-5">
                            <strong>ID do Usuário: <?php echo $user_id; ?></strong>
                            <input type="hidden" name="id_user" value="<?= $user_id; ?>">
                            <br />
                            <label class="pt-4" for="name_user"><strong>Nome:</strong></label>
                            <input class="border border-success" type="text" name="name_user" placeholder="Digite seu nome completo" value="<?= $user_name; ?>">
                            <br />
                            <br />
                            <strong>E-Mail do usuário: <span class="bg-success p-1"><?= $user_email; ?></span></strong>
                        </div>
                        <div class="col-sm-5">
                            <div class="row">  
                                <div class="col-md-3">
                                    <strong>Criação:</strong>
                                </div>
                                <div class="col-md-9">
                                    <strong class="bg-success p-1"><?= date('d/m/Y', strtotime($user_created)); ?></strong>
                                    <strong>às</strong>
                                    <strong class="bg-success p-1"><?= date('H:i:s', strtotime($user_created)); ?></strong>                                </div>
                            </div>
                            <br />
                            <div class="row">  
                                <div class="col-md-3">
                                    <strong>Alteração:</strong>
                                </div>
                                <div class="col-md-9">
                                    <strong class="bg-success p-1"><?= date('d/m/Y', strtotime($user_updated)); ?></strong>
                                    <strong>às</strong>
                                    <strong class="bg-success p-1"><?= date('H:i:s', strtotime($user_updated)); ?></strong>
                                    <?php 
                                        $user_date = implode("-",array_reverse(explode("/",date('d/m/Y'))));
                                        $user_time = date('H:i:s');
                                        $user_update = $user_date . " " . $user_time;
                                    ?>
                                    <input type="hidden" name="updated_user" value="<?= $user_update; ?>">

                                </div>
                            </div>  
                        </div>
                        <div class="col-md-2 text-center pt-5">
                            <a href=".bd-example-modal-lg-html" data-toggle="modal" data-target=".bd-example-modal-lg-html">
                                <img src="../img/icones/lista.png" width="40" title="Listar alterações">
                            </a>
                            <div class="modal fade bd-example-modal-lg-html" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg-html">
                                    <div class="modal-content">
                                        <header class="modal-header">
                                            <h4 class="modal-title text-success" id="exampleModalLongTitle">Listagem de alterações de usuário</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </header>
                                        <div class="modal-body text-left">
                                            <p class="text-success"><strong>Usuário: </strong><strong class="text-dark"><?= $user_name ?></strong><br /></p>
                                            <p class="text-success"><strong>E-mail: </strong><strong class="text-dark"><?= $user_email ?></strong><br /></p>
                                            <p class="text-success"><strong>Ativo desde: </strong><strong class="text-dark"><?= $user_created ?></strong></p><hr />
                                            <?php
                                                foreach($listaLog as $logsUser) {
                                                    $log_descricao = $logsUser['descricao'];
                                                    $log_created = $logsUser['created_at'];
                                            ?>
                                                    <strong>
                                                        <?= date('d/m/Y', strtotime($log_created)); ?>
                                                         às 
                                                        <?= date('H:i:s', strtotime($log_created)); ?></strong>
                                                         - 
                                                        <?= $log_descricao ?>
                                                        <hr />
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <footer class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3 mb-5">
                        <button class="btn btn-large btn-success"><strong>Salvar</strong></button>
                    </div>
                </form>
            </div>
        </div>
        <?php
            include '../template/js-bootstrap_user.php' 
        ?>
    </body>
</html>