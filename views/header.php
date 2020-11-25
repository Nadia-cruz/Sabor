<?php
    include("../managers/session.php"); 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--
Victory Template
http://www.templatemo.com/tm-507-victory
-->
        <title>Sabor de nos Terra</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        
        

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/fontAwesome.css">
        <link rel="stylesheet" href="../css/hero-slider.css">
        <link rel="stylesheet" href="../css/owl-carousel.css">
        <link rel="stylesheet" href="../css/templatemo-style.css">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../css/pedido.css">
        

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="js/admin.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

        <script>

            // https://datatables.net/examples/styling/bootstrap4
            $( document ).ready(function() {
              //  console.log( "document loaded" );
                $('#pedidos_admin_table').DataTable();
                $('#pedidos_cliente_table').DataTable();
            });
        </script>
        
    </head>

<body>
    <div class="header">
        <div class="container">
           <a class="nav-brand" href="home.php"><img src="../img/logo2.png" alt="" width="110"></a>
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <?php 
                            if ($tipo_session == 'admin') {
                        ?>
                        <li><a href="adicionarmeu.php">Adicionar Menu</a></li>
                        <li><a href="pedidos-admin.php">Pedidos</a></li>
                        <?php
                            } else {
                        ?>
                        <li><a href="pedidos-cliente.php">Meus pedidos</a></li>
                        <?php 
                            }        
                        ?>
                        <li><a href="dados.php">Meus Dados</a></li>
                        <li style="display: <?php if ($tipo_session == 'admin') echo "none"?>;"><a href="carrinho.php"><i class="fa fa-shopping-cart" style="font-size:20px"><span></i></a></li>
                        <li><a href="../managers/logout.php"><i class="fa fa-sign-out" aria-hidden="true" style="font-size:20px">Sair</i></a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->