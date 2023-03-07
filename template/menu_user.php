<nav class="navbar navbar-expand-md navbar-light bg-light">
    <!-- LOGO -->
    <a href="index.php" class="navbar-brand">
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
        <?php
            if(!($_SESSION['loged'] == true) ) {
        ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-primary btn-sm" href="../users/login.php">Login</a>
                    </li>
                </ul>
        <?php
            } 
            if (isset($_SESSION['home'])) {
                if($_SESSION['loged'] == true && $_SESSION['home'] == true) {
                    ?>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <?php $_SESSION['home'] == false; ?>
                                    <a class="btn btn-outline-primary btn-sm" href="../users/register.php">Criar novo usuário</a>
                                </li>
                            </ul>
                    <?php
                }
            }            
        ?>
    </div>
</nav>