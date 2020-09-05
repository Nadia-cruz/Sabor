

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
        <link rel="apple-touch-icon" href="../apple-touch-icon.png">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/fontAwesome.css">
        <link rel="stylesheet" href="../css/hero-slider.css">
        <link rel="stylesheet" href="../css/owl-carousel.css">
        <link rel="stylesheet" href="../css/templatemo-style.css">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../css/pedido.css">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="js/admin.js"></script>
        
        <style>
            #rowContainer {
                display: flex;
                flex-wrap: wrap;
                align-content: stretch;
                align-items: baseline;
            }

            #rowItem {
                margin-top: 30px;
                
            }
        </style>
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
                        <li><a href="adicionarmeu.php"<?php if($tipo_session == 'Cliente') echo 'hidden'; ?>>Adicionar Menu</a></li>
                        <li><a href="#"<?php if($tipo_session == '2') echo 'hidden'; ?>>Lista de pedidos</a></li>
                        <li><a href="menu.php">Menus</a></li>
                        <li><a href="test.php"<?php if($tipo_session == 'admin') echo 'hidden'; ?>>Meus pedidos</a></li>
                        <li><a href="pedido.php"<?php if($tipo_session == 'admin') echo 'hidden'; ?>>Efetuar pedidos</a></li>
                        <li><a href="../managers/logout.php">Sair</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->