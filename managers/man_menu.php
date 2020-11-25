<?php


class Menu {
	
	function getCategorias($link) {
		$query = "SELECT categoria FROM categoria";
		$result = mysqli_query($link, $query) or die("Query falhou: listar categorias");
        
        if (mysqli_num_rows($result) > 0) {
        	while ($row = mysqli_fetch_array($result)) {
				$categorias[] = $row[0];
        	}
			mysqli_free_result($result);
        	return $categorias;
		}
        return [];
	}

	function setMenu($link, $id) {

		$fileInfo = pathinfo($_FILES["imagem"]["name"]);
		$allowedfileExtensions = array('jpg', 'png');

		// Validar Formulário:

        if (strlen($_POST['nome']) < 3)
            print "Insira o titulo.<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (strlen($_POST['preco']) < 0)
            print "Introduza um valor para o anúncio.<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (strlen($_POST['descricao']) < 3) 
            print "Introduza uma breve descrição.<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (strlen($_POST['categoria']) == 0)
            print "Escolha a categoria<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if ($_FILES['imagem']['name'] != "" && !in_array($fileInfo['extension'], $allowedfileExtensions))
        	print "Insira um arquivo de imagem válido";
        else {

        	// Upload imagem
        	if ($_FILES['imagem']['name'] == "") {
        		$novo_nome = NULL;
        	} else {
        		$novo_nome = $fileInfo['filename'] ."_". time() . "." . $fileInfo['extension'];
       			$diretorio = "../img/upload/";
       			move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome); // efectua upload
			}

			$query = "INSERT INTO menu (nome, preco, descricao, categoria, imagem, idutilizador) VALUES ('" . $_POST['nome'] . "', " . $_POST['preco'] . ", '" . $_POST['descricao'] . "', '" . $_POST['categoria'] . "', '$novo_nome', '$id')";

			print($query);

            $result = mysqli_query($link, $query) or die ('Não foi possivel adicionar um novo menu');

            return true;
        }     
	}

	function listAllMenu($link) {
		$query = "SELECT idmenu, nome, preco, descricao, imagem,  categoria FROM menu";
		$result = mysqli_query($link, $query) or die ('Não foi possivel listar  todos os meus');

		if (mysqli_num_rows($result) > 0) {
        	while ($row = mysqli_fetch_object($result)) {
        		$anuncios[] = $row;
        	}
        	mysqli_free_result($result);
        	return $anuncios;
        } 
        return [];
	}

	function listMenuFromText($link, $text) {
		$query = "SELECT nome, preco, descricao, imagem,  categoria  FROM menu WHERE titulo='$text' OR descricao='$text'";
		$result = mysqli_query($link, $query) or die ('Não foi possivel encontrar a descrição menu');

		if (mysqli_num_rows($result) > 0) {
        	while ($row = mysqli_fetch_object($result)) {
        		$menu[] = $row;
        	}
        	mysqli_free_result($result);
        	return $menu;
		} 

        return [];
	}

	function listMenuFromCategoria($link, $categoria) {
		$query = "SELECT nome, preco, descricao, imagem, categoria FROM menu WHERE categoria='$categoria'";
		$result = mysqli_query($link, $query) or die("Não foi possivel listar menu a partir da categoria '$categoria'");

		if (mysqli_num_rows($result) > 0) {
        	while ($row = mysqli_fetch_object($result)) {
        		$menu[] = $row;
        	}
        	mysqli_free_result($result);
        	return $menu;
		} 

        return [];
	}

	function getMenu($link, $id) {
		$query = "SELECT  nome, preco, descricao, imagem,  categoria   FROM menu WHERE idmenu='$id'";
		$result = mysqli_query($link, $query) or die ('Não foi possivel get menu ');
		if (mysqli_num_rows($result) > 0) {
        	$menu = mysqli_fetch_object($result);
        	mysqli_free_result($result);
        	return $menu;
        } 
        return NULL;
	}

    /*function deleteMenu($link, $id) {
        $query = "DELETE FROM menu WHERE idmenu='$id'";
        $result = mysqli_query($link, $query) or die ('Não foi possivel deletar menu');
        return true;
    }*/

}
