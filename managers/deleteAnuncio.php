<?php
	include('database.php');
    include('man_Anuncio.php');
    include('session.php');


	echo "entrei"

	$idAnuncio = $_GET['id'];
	$bd = new BD();
    $anuncio = new Anuncio();
    $link = $bd->abreLigacao();
	$item = $anuncio->getAnuncio($link, $idAnuncio);
	

	if ($item->idUtilizador == $id_session) {
		$imagemPath = '../img/upload/' . $item->imagem; 
		echo "nem valeu"
		if ($anuncio->deleteAnuncio($link, $session)) {
			if (file_exists($imagemPath)) {
				unlink($imagemPath);
				header('location: ../views/listarAnuncios.php');
				echo "Apagado"
			}
			echo "nao funciona"
		} else {
			echo "null"
		}
	}


	

?>