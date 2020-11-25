
<?php
include ('basedados.php');
if (isset($_GET['deleteID'])) {
    $idpedido = $_GET['deleteID'];
    $bd = new BD();
    $link = $bd->abreLigacao();
	$sql="DELETE FROM pedido WHERE Idpedido=?";
    $Pedidos=mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($Pedidos, $sql)) //verifica se ha erros na preparacao do statment
    {
        header("Location: ../views/pedidos-cliente.php?error=sqlerror");
        exit();
    } else //se nao houver erros enviamos os paramentros (s - string, i - int, etc) para verificar o user
    {
        mysqli_stmt_bind_param($Pedidos, "i", $idpedido); //atribui valores
        mysqli_stmt_execute($Pedidos); //executa
        header("Location: ../views/pedidos-cliente.php?success");
    }
}

if (isset($_GET['deleteID'])) {
    $idpedido = $_GET['deleteID'];
    $bd = new BD();
    $link = $bd->abreLigacao();
	$sql="DELETE FROM pedido WHERE Idpedido=?";
    $Pedidos=mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($Pedidos, $sql)) //verifica se ha erros na preparacao do statment
        {
            header("Location: ../views/pedidos-admin.php?error=sqlerror");
            exit();
        } else //se nao houver erros enviamos os paramentros (s - string, i - int, etc) para verificar o user
    {
        mysqli_stmt_bind_param($Pedidos, "i", $idpedido); //atribui valores
        mysqli_stmt_execute($Pedidos); //executa
        header("Location: ../views/pedidos-admin.php?success");
    }

}