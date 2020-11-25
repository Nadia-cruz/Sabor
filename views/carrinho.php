
<?php 

session_start();
$connect = mysqli_connect("localhost", "root", "root", "bd");
include("utilizador.php");
include("session.php");


if(isset($_POST["add_ao_carrinho"]))
{ 

	if(isset($_SESSION["carrinho"]))
	{

		$item_array_id = array_column($_SESSION["carrinho"], "idmenu_");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["carrinho"]);
			$item_array = array(
				'idmenu_' 	=>	$_GET["id"],
				'nome_'		=>	$_POST["hidden_nome"],
				'preco_'		=>	$_POST["hidden_preco"],
				'quantidade_'=>	$_POST["quantity"]
			);
			$_SESSION["carrinho"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Menu já foi adicionado")</script>';
		}
	}
	else
	{
		$item_array = array(
			'idmenu_'			=>	$_GET["id"],
			'nome_'			=>	$_POST["hidden_nome"],
			'preco_'		=>	$_POST["hidden_preco"],
			'quantidade_'		=>	$_POST["quantity"]
		);
		$_SESSION["carrinho"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["carrinho"] as $keys => $values)
		{
			if($values["idmenu"] == $_GET["id"])
			{
				unset($_SESSION["carrinho"][$keys]);
				echo '<script>alert("Menu removido")</script>';
				echo '<script>window.location="carrinho.php"</script>';
			}
		}
	}
}

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
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
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
					    <li><a href="home.php">Página Inicial</a></li>
                        <li><a href="pedidos-cliente.php">Meus Pedidos</a></li>
                        <li><a href="../managers/logout.php"><i class="fa fa-sign-out" aria-hidden="true" style="font-size:20px">Sair</i></a><?=$_SESSION['nome'];?></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->


<!DOCTYPE html>
<html>
	<head>
		<title> Menu - sabor de nos terra </title>
		
	</head>
	<body>
		<br />
		<div class ="container">
			<br />
			<br />
			<br />
			    <center><h2> Carrinho </h2></center>
			<br /><br />
			<?php
				$query = "SELECT * FROM menu ORDER BY idmenu ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
	
				?>
			
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Detalhes do pedido</h3>
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th width="20%">Nome do menu</th>
						<th width="10%">Quantidade</th>
						<th width="20%">Preço</th>
						<th width="15%">Total</th>
						<th width="10%">Acção</th>
					</tr>
					<?php
					if(!empty(array_column($_SESSION["carrinho"], "idmenu_")))
					{
						$total = 0;
						foreach($_SESSION["carrinho"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["nome_"]; ?></td>
						<td align="center"><?php echo $values["quantidade_"]; ?></td>
						<td align="center">$ <?php echo $values["preco_"]; ?></td>
						<td  align="center">$ <?php echo number_format($values["quantidade_"] * $values["preco_"], 2);?></td>
						<td  align="center"><a href="carrinho.php?action=delete&id=<?php echo $values["idmenu"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["quantidade_"] * $values["preco_"]);
						}
					?>
					<tr>
						<form action="../managers/man_carrinho.php" enctype ="multipart/form-data" method="post">
							<td colspan="3" align="right">Total</td>
							<td  align="center">$ <?php echo number_format($total, 2); ?></td>
							<td  align="center">
								<input class="btn btn-outline-light text-dark" type="submit" name="enviar" value="Finalizar Pedido" /> 
							</td>
						</form>
					</tr>
					<?php
					}
					?>
						
				</table>
			
        </div>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>

