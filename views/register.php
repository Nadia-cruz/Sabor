<?php
    session_start();

    if (isset($_POST['Validar'])) {
        include("../managers/basedados.php");
        include("../managers/utilizador.php");

        $bd = new BD();
        $link = $bd->abreLigacao();

        $utilizador = new Utilizador();

        if ($utilizador->inserirUtilizador($link)) {
            // $_SESSION['Login'] = filter_var($_POST['Login'], FILTER_SANITIZE_STRING);
            header("location: home.php");
        } else {
            print ("<div class='alert alert-danger'>
                      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                      <strong>Erro de autenticação!</strong> Verifique se os dados estão corretos.
                      </div>");
        }

        $bd->fechaLigacao($link);
    }
  
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Sabor de nos Terra</title>

        <!-- Favicon -->
        <link rel="icon" href="../img/core-img/favicon.ico" >

        <!-- Stylesheet -->
        <link rel="stylesheet" href="../style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <!-- Preloader -->


    <div class="container">

        <div class="classynav" > 
            <div class="main-header-area">
                <div class="classy-nav-container breakpoint-off">
                    <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="akameNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="../index.php"><img src="../img/logo2.png" alt="" width="110"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                    </nav>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row text-center">

            <aside class="col-sm-4 text-center">

                <center><div class="card" >
                    <article class="card-body" style="align-content: center">
                        <form method="POST">
                            <h2 class="form-title">Cria a sua conta</br></h2>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nome" placeholder="O seu nome e apelido"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="O seu Email"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="telefone" placeholder="O seu numero de telefone"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="endereco" placeholder="Seu Endereço"/>
                                
                            </div>
                            
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password"/>
                                <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password2" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="Validar" class="akame-btn"> Sign Up </button>
                            </div>
                        </form>
                        <p>Ja se encontra Registrado? <a href="login.php">Faz o teu Login!</a></p> 
                    </article>
                </center></div>
            </aside>
            </div>  
        </div>
    </div>
    <!--container end.//-->
    
</body>
</html>

