<?php
    session_start();

    if (isset($_POST['Validar'])) {
        include("../managers/basedados.php");
        include("../managers/utilizador.php");

        $bd = new BD();
        $link = $bd->abreLigacao();

        $utilizador = new Utilizador();

        if ($utilizador->login($link)) {
            //$_SESSION[$this->GetLoginSessionVar()] = $username;         
            header("location: home.php");
        } else {
            print ("<div class='alert alert-danger'>
                      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                      <strong>Erro de autenticação!</strong> Verifique se o Login e a Password estão corretos.
                      </div>");
        }

        $bd->fechaLigacao($link);
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Sabor de nos Terra</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.ico">

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

        <div class="classynav">
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


                    <center>
                        <div class="card">
                            <article class="card-body" style="align-content: center">
                                <form method="POST">
                                    <h2 class="form-title">Entre na sua conta</br></h2>
                                    <div class="form-group">
                                        <input name="username" class="form-control" placeholder="Username" type="text">
                                    </div> <!-- form-group// -->
                                    <div class="form-group">
                                        <input name="password" class="form-control" placeholder="******"
                                            type="password">
                                    </div> <!-- form-group// -->
                                    <div class="form-group">
                                        <button type="submit" name="Validar" class="akame-btn"> Login </button>
                                    </div> <!-- form-group// -->
                                    <!-- .row// -->
                                </form>

                                <p>Não é registrado? <a href="register.php">Crea a sua conta</a></p>
                            </article>
                        </div>
                    </center>


            </div> <!-- card.// -->

            </aside> <!-- col.// -->



        </div> <!-- row.// -->
       

    </div>

    </div>
    <!--container end.//-->

</body>

</html>