



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Anúncio</title>

        <!-- Favicon -->
        <link rel="icon" href="../img/core-img/favicon.ico" >

        <!-- Stylesheet -->
        <link rel="stylesheet" href="../style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <style>

            .card {
                width: 600px;
                position: relative;
                margin-left: 31%;
            }

            .form-group {

            }

            .dropbtn {
                background-color: white;
                color: black;
                padding: 16px;
                font-size: 14px;
                border: none;
                width: 120px;
            }

            .dropdown {
                position: relative;
                margin-left: 270%;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: white;
                min-width: 80px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                font-size: 10px;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {background-color: gold;}

            .dropdown:hover .dropdown-content {display: block;}

            .dropdown:hover .dropbtn {background-color: gold;}

        </style>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    
        <!-- Preloader -->


    <div class="container">


        <nav class="nav nav-tabs">
            <div class=" navbar container-fluid">
                <div class="navbar-header">
                    <a class="nav-brand" href="home.php"><img src="../img/core-img/logo.png" alt="" width="110"></a>
                </div>
                <div class="classynav" id="navbar" >
                    <div class="dropdown">
                        <button type="button" class="dropbtn">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Minha conta
                        </button>
                        <div class="dropdown-content">
                            <a class="navbar-brand" href="listarAnuncios.php" <?php if($_SESSION['tipo'] == 'Cliente') echo 'hidden'; ?> > Meus Anúncios </a>  
                            <a class="navbar-brand" href="chatlist.php"> Chat </a>
                            <a class="navbar-brand" href="perfil.php"> Editar perfil </a>
                            <a class="navbar-brand" href="../index.php"> Sair </a>
                        </div>
                    </div>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <div class="book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                        <a href="anuncio.php" class="btn akame-btn">Anunciar</a>
                    </div>
                </ul>
            </div>
        </nav>
<?php

    include("../managers/database.php");
    include("../managers/man_pedido.php");
    include("../managers/session.php");
        
    $bd = new BD();
    $link = $bd->abreLigacao();
    $pedidos = new Pedido();

   if (isset($_GET['idItem'])) {
        $id = $_GET['idItem'];
        $item = $pedidos->getmenu($link, $id);
        $imagemPath = '../img/upload/' . $item->imagem; 
        if ($anuncio->deletePedido($link, $id)) {
            if (file_exists($imagemPath)) {
                unlink($imagemPath);
            }
        }      
    } 

    $pedidos_list = $anuncio->listPedidoFromUtilizador($link, $id_session);

    $directory = "../img/upload/";
          
    foreach ($pedido_list as $item) {
    	$image = $item->imagem;
    	if($image == '') {
        	$image = 'animais.png';
        }
       
    
?>

<!-- <a href="description.php?id=<?php echo $item->idAnuncio ?>"> -->
<div class="card" id="listCard">
<div class="row">
   	<div class="col-6">
    	<img src="<?php echo $directory . $image; ?>">
    </div>
    <div class="col-6">
        <h4 class="titulo"><?php echo $item->titulo ?></h4>
    	<p><?php echo $item->data ?></p>
        <h6><?php echo $item->preco . '$00' ?></h6>
        <form method='GET' id='anuncio<?= $item->idAnuncio ?>'> 
            <input type="hidden" name="idItem" value="<?= $item->idAnuncio ?>" />
            <button type="button" onclick="document.getElementById('anuncio<?= $item->idAnuncio ?>').submit()" class="btn btn-danger">Apagar</button>
        </form>                    
    </div>
</div>
</div>
<!-- </a> -->
	<?php 
	} 
	$bd->fechaLigacao($link); 
	?>
</div>
</body>
</html>