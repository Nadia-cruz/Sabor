 
<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["carrinho"])) {
	foreach($_SESSION["carrinho"] as $key => $value) {
		if($_POST["idmenu"] == $key){
		unset($_SESSION["carrinho"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["carrinho"]))
		unset($_SESSION["carrinho"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["carrinho"] as &$value){
    if($value['idmenu'] === $_POST["idmenu"]){
        $value['quantidade'] = $_POST["quantidade"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html>
<head>
<title>Demo Shopping Cart - AllPHPTricks.com</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Demo Shopping Cart</h2>   

<?php
if(!empty($_SESSION["carrinho"])) {
$cart_count = count(array_keys($_SESSION["carrinho"]));
?>
<div class="cart_div">
<a href="carrinho.php">
<img src="cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["carrinho"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>Nome do menu</td>
<td>Quantidade</td>
<td>Preço unitario</td>
<td>Total </td>
</tr>	
<?php		
foreach ($_SESSION["carrinho"] as $product){
?>
<tr>
<td><img src='<?php echo $product["imagem"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='idmenu' value="<?php echo $product["idmenu"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='idmenu' value="<?php echo $product["idmenu"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantidade' class='quantidade' onChange="this.form.submit()">
<option <?php if($product["quantidade"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantidade"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantidade"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantidade"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantidade"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "€".$product["preco"]; ?></td>
<td><?php echo "€".$product["preco"]*$product["quantidade"]; ?></td>
</tr>
<?php
$total_preco += ($product["preco"]*$product["quantidade"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "€".$total_preco; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>






?>



