<?php
/**
 * Description of Utilizador
 *
 * @author  Nádia Cruz e Vitalia Santos
 */
class Utilizador {


    function inserirUtilizador($link) {

        // Validar Formulário:

        if (strlen($_POST['nome']) < 3)
            print "Insira o seu nome<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (strlen($_POST['username']) < 3)
            print "Introduza o username correto<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        
        else if (strlen($_POST['password']) < 3) 
            print "Introduza a sua password<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
           
        else if ($_POST['password'] != $_POST['password2'])
            print "Passwords não são equivalentes<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            print "Por favor introduz um email válido<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (strlen($_POST['telefone']) < 3 || strlen($_POST['telefone']) > 9)
            print "Introduz o seu numero de telefone válido<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (strlen($_POST['endereco']) < 6)
            print "Introduza o endereco correto<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
       
        else {
           
            
            $query = "INSERT INTO utilizador (nome, telefone, email, endereco, password, username, tipo, estado) 
            VALUES ('" . $_POST['nome'] . "', " . $_POST['telefone'] . ", '" . $_POST['email'] . "', '" . $_POST['endereco'] . "','" . $_POST['password'] . "', '" . $_POST['username'] . "', 'cliente','aprovado')";

            $result = mysqli_query($link, $query) or die ("Query falhou: Não foi possivel criar um novo usuário");

            $_SESSION['idutilizador'] = mysqli_insert_id($link);
           
        
            return true;
        }     
        
    }

    function login($link) {
        $query = "SELECT idutilizador, username, tipo FROM utilizador WHERE username = '". filter_var($_POST['username'], FILTER_SANITIZE_STRING) . "' AND password = '". filter_var($_POST['password'], FILTER_SANITIZE_STRING) ."'";
        $result = mysqli_query($link, $query) or die("Query falhou: login");
        
       // $utilizadores = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (mysqli_num_rows($result) > 0) {
            session_start();
            $obj = mysqli_fetch_object($result);
            $_SESSION['idutilizador'] = $obj->idutilizador;
            $_SESSION['username'] = $obj->username;
            $_SESSION['tipo'] = $obj->tipo;
            mysqli_free_result($result);
            return true;
        } else {
            return false;
        }
    }
    /* function getutilizador($link, $idutilizador) {
        $query = "SELECT username, nome, telefone, endereco, email  FROM utilizador WHERE idutilizador='$idutilizador'";
		$result = mysqli_query($link, $query) or die ("Query falhou: login");

		if (mysqli_num_rows($result) > 0) {
        	$anuncio  = mysqli_fetch_object($result);
        	mysqli_free_result($result);
        	return $anuncio;
        } 
        return NULL;
    }*/

      
   /* function alteraFormQueryUtilizador($link) {
        // Validar Formulário:

        if (strlen($_POST['Nome']) < 3)
            print "Please fill in the Name field<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (strlen($_POST['Login']) < 3)
            print "Please fill in the Login field<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (strlen($_POST['Password']) < 3)
            print "Please fill in the Password field<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if ($_POST['Password'] != $_POST['confirmacaoPassword'])
            print "Passwords do not match<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL))
            print "Please enter a valid email address<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (strlen($_POST['Telefone']) < 3)
            print "Please fill in the Phone field<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else if (strlen($_POST['endereco']) < 9)
            print "Please fill in the endereco field<br/><br/><input type='button' value='Voltar' Onclick='Javascript:history.back()'>";
        else {
            // md5($_POST['Password'])
            /* Fazendoa query SQL 
            $query = "update utilizador set nome='" . $_POST['Nome'] . "',username='" . $_POST['Login'] 
            . "',password='" . $_POST['Password'] . "',email='" . $_POST['Email'] 
            . "',telefone='" . $_POST['Telefone'] . "',endereco'" . $_POST['Endereco'] 
            . "' where idUtilizador=" . $_SESSION['idUtilizador'] . ";";

            $result = mysqli_query($link, $query) or die(mysqli_error($link) . "Query falhou: alteraFormQueryUtilizador");
            print("Changed Data.<br/>");
            /* Fechandoa conexão 
            return $result;
        }
        return false;
    }*/

    //put your code here
    /*function listarUtilizador($link) {

        $query = "SELECT Nome, Telefone, Email, Endereco, password, Login,  idTipoUtilzador,  idEstado FROM utilizador";
        $result = mysqli_query($link, $query) or die("Query falhou: listarUtilizador");
        /* Mostrando os resultados em HTML*  

        // Mostrar o Nome, Telefone, Morada, Email, Login, idAnuncio, idTipoUtilzador, e idEstado em uma tabela
        print "<table class='table table-striped'><thead><tr><th>Nome</th><th>Telefone</th><th>Localizacao</th><th>Morada</th><th>Email</th><th>Password</th><th>Anuncio</th><th>Tipo de Utilizador</th><th>Estado</th></tr></thead>";
        while ($row = mysqli_fetch_array($result)) {
            print("  <tr><td>" . $row["Nome"] . "</td><td>" . $row["Telefone"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Endereco"] . "</td><td>" . $row["Password"] . "</td><td>" . $row["idAnuncio"] . "</td><td>" . $row["idTipoUtilizador"] . "</td><td>" . $row["IdEstado"] . "</td></tr>");
        }
        print"</table>";
        mysqli_free_result($result);
    }*/ 

    /*function listaAlterarUtilizador($link) {
        /* Fazendo a query SQL *
        $query = "SELECT idutilizador, nome FROM utilizador";
         $result = mysqli_query($link, $query) or die("Query falhou: listaAlterarUtilizador");
        /* Mostrando os resultados em HTML *
        while ($row = mysqli_fetch_array($result)) {
            print("<p><a href='alteraForm.php?id=" . $row["idutilizador"] . "'>" . $row["Nome"] . "</a></p>");
        }
        mysqli_free_result($result);
        /* Fechando a conexão *
    }

    function listaRemoverutilizador($link) {
        /* Fazendo a query SQL *
        $query = "SELECT idutilizador, nome FROM utilizador";
        $result = mysqli_query($link, $query) or die("Query falhou: listaRemoverutilizador");
        /* Mostrando os resultados em HTML *
        while ($row = mysqli_fetch_array($result)) {
            print("<p><a href='removeutilizador.php?id=" . $row["idutilizador"] . "'>" . $row["Nome"] . "</a></p>");
        }
        mysqli_free_result($result);
        /* Fechando a conexão *
    }

    function removerutilizador($link) {
        $query = "SELECT * FROM utilizador where idutilizador=" . $_GET['id'];
        $result = mysqli_query($link, $query) or die("Query falhou: removerutilizador");
        /* Mostrando os resultados em HTML *
        print("<p>Do you want to remove the next user?</p>");
        while ($row = mysqli_fetch_array($result)) {

            print "<p>Name: " . $row['Nome'] . "</p>";
            print "<p>Login: " . $row['Login'] . "</p>";
            print "<p>Email: " . $row['Email'] . "</p>";
            print "<p>Telefone: " . $row['Telefone'] . "</p>";
            print "<p>Endereco: " . $row['Endereco'] . "</p>";
        }
        mysqli_free_result($result);
        /* Fechando a conexão *
    }

    function removerutilizadorQuery($link) {
        $query = "delete from utilizador where idutilizador=" . $_GET['id'] . ";";
        $result = mysqli_query($link, $query) or die("Query falhou: removerutilizadorQuery");
        print("User Removed.");
        /* Fechando a conexão *
    }*/

  

   

}
