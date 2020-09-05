
<?php

session_start();
$con = mysqli_connect("localhost","root","root","bd");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
$status="";
if (isset($_POST['idmenu']) && $_POST['idmenu']!=""){
$id = $_POST['idmenu'];
$result = mysqli_query($con,"SELECT * FROM 'menu' WHERE 'idmenu'='$id'");
$row = mysqli_fetch_assoc($result);
$nome = $row['menu'];
$id = $row['idmenu'];
$preco = $row['preco'];
$imagem = $row['imagem'];

$cartArray = array(
	$id=>array(
	'menu'=>$nome,
	'idmenu'=>$id,
	'preco'=>$preco,
	'quantidades'=>1,
	'imagem'=>$imagem)
);

if(empty($_SESSION["carrinho"])) {
	$_SESSION["carrinho"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["carrinho"]);
	if(in_array($id,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["carrinho"] = array_merge($_SESSION["carrinho"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<html>
<head>
<title>Demo Simple Shopping Cart using PHP and MySQL - AllPHPTricks.com</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Demo Simple Shopping Cart using PHP and MySQL</h2>   

<?php
if(!empty($_SESSION["carrinho"])) {
$cart_count = count(array_keys($_SESSION["carrinho"]));
?>
<div class="cart_div">
<a href="../carrinho.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}

$result = mysqli_query($con,"SELECT * FROM 'menu'");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='id' value=".$row['idmenu']." />
			  <div class='imagem'><img src='".$row['imagem']."' /></div>
			  <div class='menu'>".$row['menu']."</div>
		   	  <div class='preco'>$".$row['preco']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>



   