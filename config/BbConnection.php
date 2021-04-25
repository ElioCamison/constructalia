<?php
class BbConnection extends PDO
{

    public function __construct($dsn, $user = "root", $pwd = "")
    {
        parent::__construct($dsn, $user, $pwd);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    //De esta manera no tendremos que instanciar la clase
    static function getConnection()
    {
        $conn = null;
        try {
            $conn = new BbConnection('mysql:host=localhost;dbname=constructalia', 'root', '');
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
        return $conn;
    }

    // Pasamos el argumento por referencia para que cambie el valor,
    // si lo pasaramos sin & sólo cambiaría el valor dentro de la función
    static function closeConnection(&$conn)
    {
        $conn = null;
    }
}