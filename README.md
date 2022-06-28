# Entrega 3 - Bases de datos  
## Grupos 7 y 122

### Login:

Al momento de presionar el botón de ```importar usuarios```, se crean tres tipos de usuario, donde
el procedimiento para crear los nombres de usuario y las contraseñas se describen a continuación:

* **Admin DGAC**: Se crea solo un usuario, donde el username es ```DGAC``` y la contraseña es ```admin```.
* **Compañía aérea**: Se crea un usuario para cada compañía aérea, donde el nombre es el nombre de la compañía y la clave es un string aleatorio a partir del código de la compañía.
    * Ejemplo 1:\
        Username: ```LATAM ARGENTINA```\
        Contraseña: ```MLA```
    * Ejemplo 2:\
        Username: ```IBERIA```\
        Contraseña: ```EIB```

* **Pasajero**: Se crea un usuario en el que el username es el pasaporte y la contraseña es el pasaporte, seguido por las primeras 4 letras de su nombre.
    * Ejemplo 1:\
        Username: ```J46610530```\
        Contraseña: ```J46610530Andr```
    * Ejemplo 2:\
        Username: ```V03976673```\
        Contraseña: ```V03976673Mark```

La importación de usuarios se produce en el archivo ```importar_usuarios.php```, donde inicialmente cada vez que se apretaba el botón se borraban todos los usuarios de la tabla e importaba nuevamente todos los usuarios con las claves randomizadas, pero por propósitos de esta entrega, se eliminó la eliminación de datos para así poder entregar un usuarios de ejemplo para la corrección. Para más fácil comprensión se puede revisar el final del archivo de ```importar_usuarios.php```.  

Al tratar de entrar con una contraseña incorrecta tenemos el error de que se entra a una pestaña en blanco con el path: ```https://codd.ing.puc.cl/~grupo7/logs/login_validation.php```, para arreglar esto se tiene que ir atrás en el navegador e ingresar alguna contraseña (o usuario) correcta.  

### Notas:

* En la pestaña pasajero, para poder ver algún ejemplo de vuelo posible en la busqueda con dropdown, proponemos los siguientes ejemplos:
    * Ejemplo 1:\
        Aeródromo origen: ```39```\
        Aeródromo destino: ```61```\
        Fecha despegue: ```25-05-22 10:44```
    * Ejemplo 2:\
        Aeródromo origen: ```67```\
        Aeródromo destino: ```59```\
        Fecha despegue: ```25-06-22 15:34```

* En la pestaña compañía, para poder ver algún ejemplo, proponemos las siguientes fechas:
    * Ejemplo 1:\
        Fecha mínima: ```2022-04-07```\
        fecha máxima: ```2022-06-25```

En la pestaña de compañías se agregó la funcionalidad de enviar propuestas de vuelo al DGAC, las que quedarán en estado pendiente.



### No implementado:

Para facilitar la corrección, podemos decir que no se implementó el procedimiento almacenado del botón de reserva de la pestaña de pasajero (Existe el botón en sí, pero no hace nada).
