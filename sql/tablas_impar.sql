CREATE TABLE IF NOT EXISTS Vuelo (
    vuelo_id         integer,
    fecha_salida     varchar(30),
    fecha_llegada    varchar(30),
    a_salida         integer,
    a_llegada        integer,
    codigo_aeronave  varchar(20),
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

CREATE TABLE IF NOT EXISTS Compania (
    codigo_compania varchar(20),
    nombre_compania varchar(60)
);

CREATE TABLE IF NOT EXISTS Aerodromo (
    aerodromo_id     integer,
    nombre_aerodromo varchar(60),
    ICAO             varchar(10),
    IATA             varchar(10),
    latitud          float,
    longitud         float,
    ciudad           varchar(30),
    pais             varchar(20)
);

CREATE TABLE IF NOT EXISTS Aeronave (
    codigo_aeronave varchar(20),
    nombre_aeronave varchar(20),
    modelo          varchar(20),
    peso            float
);

CREATE TABLE IF NOT EXISTS Ruta (
    ruta_id     integer
    nombre_ruta varchar(30)
);

CREATE TABLE IF NOT EXISTS Punto (
    nombre_punto varchar(20),
    ruta_id      integer,
    cardinalidad integer,
    latitud      varchar(10),
    longitud     varchar(10)
);

CREATE TABLE IF NOT EXISTS Reserva (
    reserva_id          integer,
    codigo_reserva      integer,
    pasaporte_comprador varchar(20),
    vuelo_id            integer
);

CREATE TABLE IF NOT EXISTS Ticket (
    reserva_id         integer,
    ticket_id          integer,
    vuelo_id           integer,
    numero_asiento     integer,
    clase              varchar(20),
    comida_maleta      varchar(10),
    pasaporte_pasajero varchar(20)
);

CREATE TABLE IF NOT EXISTS Pasajero (
    pasaporte_pasajero varchar(20),
    nombre_pasajero    varchar(30),
    fecha_nacimiento   date,
    nacionalidad       varchar(30)
);