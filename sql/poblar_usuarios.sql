CREATE OR REPLACE FUNCTION add_user (id_user int, name_user_v varchar, rut_v varchar, age_v integer, direccion_v varchar, es_personal boolean)
RETURNS void AS
$$ /* https://www.postgresqltutorial.com/plpgsql-variables/ */
DECLARE /* aquí declaro las variables */
    idmax int;
    primera_letra char(1) := LOWER(LEFT(name_user_v, 1)); /*tomo la primera letra del nombre*/
    numeros_rut char(5) := LEFT(rut_v, 5); /*cinco primeros numeros del rut*/
    contrasena_v varchar(20) :=  CONCAT(primera_letra, numeros_rut);
    /* Por ejemplo, mi contraseña sería c20442, la primera letra de mi nombre en minúsculas, los 
    primeros 5 dígitos de mi rut*/
BEGIN

    IF (es_personal) THEN
        SELECT INTO idmax MAX(id) FROM users;
        INSERT INTO usuarios VALUES (idmax+1, rut_v, name_user_v, age_v);
        INSERT INTO users VALUES (idmax+1, name_user_v, rut_v, age_v, direccion_v, contrasena_v);
    ELSE
        IF id_user NOT IN (SELECT id FROM Users) THEN 
            INSERT INTO users VALUES (id_user, name_user_v, rut_v, age_v, direccion_v, contrasena_v);
        END IF;
    END IF;
    
END
$$ language plpgsql

/*Para correrlo sería SELECT add_user('Ana Laura Gómez', '20387934-4', 20, "Manuel Flores 290, Las Condes, Santiago");*/