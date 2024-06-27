<?php
    function getUserData($userId) {
     $conn = new mysqli("localhost", "root", "", "test_db");

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);

        }
        
        //USAR TRY Y CATCH PARA DAR UNA RESPUESTA SI HAY UN PROBLEMA
        try{

            //USAR CONSULTAS PREPARADAS PARA EVITAR ATAQUES DE INYECCIÓN 
            $sql = "SELECT * FROM users WHERE id = ?";

            //PREPARAMOS LA CONSULTA Y LE APLICAMOS UN FILTRO
            $conulta = $conn->prepare($sql);
            $conulta->bind_param("i", $userId); //PREPARAMOS LOS DATOS DE LA CONSULTA PARA QUE ? SOLO ADMITA VALORES ENTEROS, Y QUE PROVENGAN DE $userId
            $consulta->execute();
            
            $result = $consulta->get_result();

        }
        catch(Exception $e){
            echo "Error en la colsulta SQL";
            echo "Messaje; ". $e->getMessage();
        }

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();

        } else {
        return null;
    
        }
        $conn->close();
    }

$userData = getUserData(1);
print_r($userData);
?>