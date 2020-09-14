
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

    function setPedido($link, $id) {

		

		// Validar Formulário:

        if (strlen($_POST['nome']) < 3)
            print "Insira o titulo.<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else 
             (strlen($_POST['preco']) < 0);

        else (strlen($_POST['descricao']) < 3)


        else (strlen($_POST['categoria']) == 0)
            
       
			$query = "INSERT INTO menu (nome, preco, descricao, categoria, imagem, idutilizador) VALUES ('" . $_POST['nome'] . "', " . $_POST['preco'] . ", '" . $_POST['descricao'] . "', '" . $_POST['categoria'] . "', '$novo_nome', '$id')";

            $result = mysqli_query($link, $query) or die ('Não foi possivel adicionar um novo menu');

            return true;
        }     
    }
    
    
	if(isset($_POST['enviar']))
	{
	   $SqlInserirVenda = mysqli_query($link, "insert into venda(valorTotal) Values('$Total')");
	   $IdVenda = mysqli_insert_id($link);

	   foreach($_SESSION['listaproduto'] as $ProdInsert => $quantidade):
	  	$SqlInserirItens = mysqli_query("Insert into pedido(Idpedido, Idutilizador, menu, quantidades, datahora, estado, total) Values('$IdVenda','$ProdInsert','$quantidade')");
	   endforeach;
	   echo "<script>alert('Venda Concluída')</script>";
	}
?>