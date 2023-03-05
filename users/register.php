<!doctype html>
<html lang="pt-br">
	<head>
		<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- COMPATIBILIDADE COM HTML5 -->
        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="..//css//Bootstrap4//css//bootstrap.min.css">

        <!-- NORMALIZE CSS -->
        <link rel="stylesheet" type="text/css" href="..//css//normalize.css">

        <!-- CSS CUSTOMIZADO -->
        <link rel="stylesheet" type="text/css" href="..//css//style.css">

        <title>RSI - Registrar</title>
	</head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <!-- LOGO -->
            <a href="../index.php" class="navbar-brand">
                <img src="../img/logos/logo.png" width="140">
            </a>
            <!-- MENU HAMBURGUER -->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- NAVEGAÇÃO -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../institucional.php">Institucional</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                            O que fazemos?
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../tecnologias.php">Tecnologias</a>
                            <a class="dropdown-item" href="../portfolio.php">Portfólio</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contato.php">Contato</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-primary btn-sm" href="../users/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
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
                                    ?>
                                </h5>
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
                                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="senha" class="form-control" placeholder="Senha">
                                </div>
                                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="..//css//Bootstrap4//js//bootstrap.min.js"></script>
    </body>
</html>