# Entrega 3 - Bases de datos  
## Grupos 7 y 122

### Login:

Al momento de presionar el botón de ```importar usuarios```, se crean tres tipos de usuario, donde
el procedimiento para crear los nombres de usuario y las contraseñas se describen a continuación:

* **Admin DGAC**: Se crea solo un usuario, donde el username es ```DGAC``` y la contraseña es ```admin```.
* **Compañía aérea**: Se crea un usuario para cada compañía aérea, donde el nombre es el nombre de la compañía y la clave es un string aleatorio a partir del código de la compañía.
    * Ejemplo:\
        Username: ```IBERIA```\
        Contraseña: ```BEI```
* **Pasajero**: Se crea un usuario en el que el username es el pasaporte y la contraseña es el pasaporte, seguido por las primeras 4 letras de su nombre.
    * Ejemplo:\
        Username: ```J46610530```\
        Contraseña: ```J46610530Andr```

