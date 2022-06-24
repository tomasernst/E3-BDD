CREATE TABLE IF NOT EXISTS Vuelo (
    vuelo_id         integer,
    fecha_salida     varchar(30),
    fecha_llegada    varchar(30),
    a_salida         integer,
    a_llegada        integer,
    codigo_aeronave  integer,
    estado           varchar(20),
    altitud          float,
    velocidad        float,
    ruta_id          integer,
    nombre_compania  varchar(50),
    valor            integer
);

CREATE TABLE IF NOT EXISTS Personal (
    personal_id      integer,
    nombre           varchar(40),
    fecha_nacimiento varchar(20),
    pasaporte        varchar(20),
    rol              varchar(30),
    calificacion     integer,
    vuelo_id         integer,
    codigo_compania  varchar(20)
);