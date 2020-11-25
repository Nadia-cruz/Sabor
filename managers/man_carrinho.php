<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root", "bd");
    include("utilizador.php");
    include("session.php");

    if(isset($_POST['enviar']))
    {

        foreach($_SESSION['carrinho'] as $keys => $values){

            // ir buscar o id utilizador na sessão
            $Idutilizador = $_SESSION["idutilizador"];

            $idmenu=$values["idmenu_"];
            $quantidades=$values["quantidade_"];
            date_default_timezone_set("Europe/Lisbon"); // configura o time zone
            $datahora= date('Y-m-d H:i:s');
            $estado="pendente";
            $total = $values["quantidade_"] * $values["preco_"];

            $query = "Insert into pedido(Idutilizador,menu,quantidades,datahora,estado, total)
                    Values('$Idutilizador','$idmenu','$quantidades','$datahora','$estado', '$total')";

            mysqli_query($link, $query) or  die(mysqli_error($link));
        }

        $_SESSION['carrinho'] = array();
        echo "<script>alert('Pedido Concluído')</script>";    
        header("Location: ../views/pedidos-cliente.php");
    }

?>