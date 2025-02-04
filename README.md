*---------------------------------------*
PRUEBA TÉCNICA PHP
Eric de Sojo
----------------------------------------

//////////////////////////////////////////
----------------------------------------
ANTES DE EMPEZAR
----------------------------------------

LAS BASES DE DATOS DE CADA EJERCICIO SON INDEPENDIENTES, SE DEBE USAR UNA DB POR CADA EJERCICIO, NO TABLAS.
DEBE COPIAR TODA LA CARPETA DEL REPOSITORIO A LA RUTA Laragon/www LA CARPETA DEBE ESTAR DESCOMPRIMIDA.

//////////////////////////////////////////


REQUISITOS PARA EJECUTAR EL EJERCICIO 1:
----------------------------------------

- LOCALHOST - Ej: Laragon https://laragon.org/ 

PASOS A SEGUIR:
----------------------------------------
1. Importe la base de datos a su LOCALHOST o cree una, podra modificar el nombre de la DB en las líneas 16.
2. Introduzca las credenciales del usuario para acceder a las DB del LOCALHOST, lo puede hacer en las líneas 14 y 15, de dentro del archivo Prueba de nivel 1 > index.php.
3. Ponga el código en la raíz www del LOCALHOST, y ejecútelo, después abra la ruta del archivo en su navegador.

El programa debería imprimir si la conexión es exitosa, en caso contrario, devuelve el error.

----------------------------------------
REQUISITOS PARA EJECUTAR EL EJERCICIO 2:
----------------------------------------

- LOCALHOST - Ej: Laragon https://laragon.org/ 
- APLICACIÓN PARA SEGUIR LAS SOLICITUDES DE LA API - Ej: POSTMAN https://www.postman.com/downloads/?utm_source=postman-home

PASOS A SEGUIR:
1. Copie la configuración de .env.example a .env, puede usar la comande de terminal BASH "cp .env.example .env" sin usar "
2. Importe la base de datos a su LOCALHOST o cree una. En caso de querer cambiar las credenciales de acceso a la DB o la misma DB, lo puede hacer en el archivo .env, en las lineas 14 15 y 16
3. Instale POSTMAN o un similar

GUIA DE USO:
-Hay que tener en cuenta de que la API se accede desde una subcarpeta, la cual contiene todos los proyectos, por eso las rutas tendrán que contener la carpeta PUBLIC. EJ; http://pruebatecnicaphp.test/prueba_de_nivel_2/public/api/orders
-Para poder hacer un GET de todas las orders de la DB, se tiene que poner la siguiente ruta en POSTMAN, o en su navegador. EJ:http://pruebatecnicaphp.test/prueba_de_nivel_2/public/api/orders
-Para poder hacer un GET de un solo order, se tiene que poner la siguiente ruta en POSTMAN, o en su navegador, indicando el ID del order que se desea listar. EJ:http://pruebatecnicaphp.test/prueba_de_nivel_2/public/api/orders/1
-Para poder añadir elementos a la DB, se tiene que abirir POSTMAN, y seleccionar el metodo POST, poner los datos en formato JSON en la parte "body/raw", y poner la siguiente ruta y enviar la consulta. EJ:http://pruebatecnicaphp.test/prueba_de_nivel_2/public/api/orders
    Ejemplo de datos a enviar:

    {
        "customer_name": "NOMBRE",
        "customer_email": "correo@gmail.com",
        "product": "PRODUCTO",
        "quantity": 10,
        "total_price": "297.10",
        "status": "pending"
    }

-Para poder modificar un elemento, se tiene que abirir POSTMAN, y seleccionar el metodo PUT, poner los datos en formato JSON en la parte "body/raw", y poner la siguiente ruta y enviar la consulta indicando el id que se desea modificar. EJ:http://pruebatecnicaphp.test/prueba_de_nivel_2/public/api/orders/1
    Ejemplo de datos a modificar, puede modificar solo los campos necesarios:

    {
        "customer_name": "NOMBRE",
        "customer_email": "correo@gmail.com",
        "product": "PRODUCTO",
        "quantity": 10,
        "total_price": "297.10",
        "status": "pending"
    }

-Para poder eliminar un order se tiene que abirir POSTMAN, y seleccionar el metodo DELETE, y poner la siguiente ruta y enviar la consulta indicando el id que se desea modificar. EJ:http://pruebatecnicaphp.test/prueba_de_nivel_2/public/api/orders/1

----------------------------------------
REQUISITOS PARA EJECUTAR EL EJERCICIO 3:
----------------------------------------

- LOCALHOST - Ej: Laragon https://laragon.org/ 
- APLICACIÓN PARA SEGUIR LAS SOLICITUDES DE LA API - Ej: POSTMAN https://www.postman.com/downloads/?utm_source=postman-home

PASOS A SEGUIR:
1. Inicie laragon

GUIA DE USO:
-Abra el navegador y rellene el formulario, tambien puede usar postman o silimares para enviar la ciudad por URL y ver la respuesta una respuesta en formato html
