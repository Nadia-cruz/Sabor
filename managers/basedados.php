<?php
/**
 * Description of BD
 *
 * @author  Nádia Cruz e Vitalia Santos 
 */
class BD extends PDO { 

    private $_error = null;

    /**
     * Construtor
     */
    public function __construct() {
    }
   
    /**
    * Mostra o erro.
    *
    * @return string Devolve o erro.
    */
    public function getError() {
        return $this->_error;
    }
    
    /**
    * Fecha a ligação à base de dados quando o objeto é destruido
    */
    public function __destruct() {
        $this->conn = null;
    }

    function abreLigacao() {

        $user = 'root';
        $password = 'root';
        $db = 'bd';
        $host = 'localhost';
        $port = 3306;

        $link = mysqli_connect(
            $host,
            $user,
            $password,
            $db,
            $port
        ) or die("Não foi possível conectar ao servidor.");
        
        return $link;
     }
     
     

    function fechaLigacao($link) {
        mysqli_close($link);
    }

}