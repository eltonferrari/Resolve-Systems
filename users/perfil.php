<?php
    require_once "validador_acesso.php";
    include 'class_user.php';
    include 'class_log.php';
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
    $listaU = $listaUsers->getAllUsers();
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
    $logUser = new Log();
    $listaL = new Log();
    $listaLog = $listaL->getLogUserByIdUser($idUser);
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
            <div class="row">
                <div class="col-lg-6 mt-2">
                    <form class="form-inline" method="get" action="perfil.php">
                        <div class="form-group mr-3">
                            <label for="usuarios" class="pr-3">Usuários:</label>
                            <select class="form-control bg-success text-light" id="usuarios" name="usuario">
                                <option value=0>Selecione o usuário</option>
                                <?php 
                                    foreach($listaU as $oneUser) {
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
                    <div class="row pt-5">
                        <div class="col-sm-5">
                            <strong>ID do Usuário: <?php echo $user_id; ?></strong>
                            <input type="text" name="id_user" value="<?= $user_id; ?>">
                            <br />
                            <label class="pt-4" for="name_user"><strong>Nome:</strong></label>
                            <input class="border border-success" type="text" name="name_user" placeholder="Digite seu nome completo" value="<?= $user_name; ?>">
                            <br />
                            <br />
                            <strong>E-Mail do usuário: <span class="bg-success p-1"><?= $user_email; ?></span></strong>
                        </div>
                        <div class="col-sm-5">
                            <div class="row">  
                                <div class="col-md-4 mq-criacao">
                                    <strong>Criação:</strong>
                                </div>
                                <div class="col-md-8">
                                    <span class="bg-success">
                                        <strong><?= $user_created; ?></strong></p>
                                    </span>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="col-md-4">
                                    <strong>Alteração:</strong>
                                </div>
                                <div class="col-md-8">
                                    <span class="bg-success">
                                        <strong><?php echo $user_updated; ?></strong></p>
                                    </span>
                                </div>
                            </div>  
                        </div>
                        <?php
                            $listaL = new Log();
                            $listaLog = $listaL->getLogUserByIdUser($idUser);
                        ?>                        
                        <div class="col-md-2 text-center pt-5">
                            <a href=".bd-example-modal-lg-html" data-toggle="modal" data-target=".bd-example-modal-lg-html">
                                <img src="../img/icones/lista.png" width="40" title="Listar alterações">
                            </a>
                            <div class="modal fade bd-example-modal-lg-html" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg-html">
                                    <div class="modal-content">
                                        <header class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">Listagem de Alterações de usuário</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </header>
                                        <div class="modal-body text-left">
                                            <?php                                                
                                                echo "Usuário: $user_name <br >E-mail: $user_email <br />Ativo desde: $user_created <hr />";
                                                foreach($listaLog as $logsUser) {
                                                    $log_descricao = $logsUser['descricao'];
                                                    $log_created = $logsUser['created_at'];
                                                    echo "$log_created - $log_descricao <hr />";
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