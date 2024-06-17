<?php
//CREAR CONEXION A UNA BASED DEDATOS USANDO UN MODELO SINGLETON


//Crear la clase de conexion de la DB
class Database {

    private static $instance = null;
    private $connection;

    private function __construct() {
        //Indicamos las credenciales para una conexion a un db
        $host = 'localhost';
        $username = 'root'; //Nombre de usuario de la DB
        $psswd = ''; //Contraseña del usuario de la DB
        $db = 'db'; //Nombre de la DB
        $port = 3306;

        //Usamos un metodo try y catch para controlar los errores
        try{
            $this->connection = new PDO("mysql:host=$host; port=$port; dbname=$db; port", $username , $psswd);
            echo "Conexion exitosa";
        }
       
        //Usamos catch para poder capturar los errores de PDO
        catch(PDOException $PDOerror){
            //En caso de error lo imrimiremos por pantalla conel mesaje de error
            echo "Erro en la conexion mensaje: " . $PDOerror->getMessage();
        }

       
    }

    public static function getInstance() {
        //Verifica si la instancia no existe y crea una nueva instancia, luejo develve la instancia activa
        if(self::$instance == null){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
   
   
    return $this->connection;
    }

    private function __clone() { }
    public function __wakeup() { }
    
}

$db = Database::getInstance();
?>