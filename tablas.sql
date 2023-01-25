--mysql -u past - past -p 
--(contraseña)

--DROP DATABASE IF EXISTS db_inmomenenia;
--CREATE DATABASE db_inmomenenia;

--USE MENENIA;
CREATE TABLE IF NOT EXISTS tbl_inmuebles (
    id int (5) NOT NULL UNIQUE,
    tipo varchar (10) NOT NULL,
    direccion varchar (30) NOT NULL,
    cp int (5) NOT NULL,
    localidad varchar (30) NOT NULL,
    metros int (5) NOT NULL,
    num_hab int (5) NOT NULL,
    num_baños int (5) NOT NULL,
    garaje boolean,
    jardin boolean ,
    piscina boolean,
    estado boolean,
    descripcion varchar (1500) NOT NULL,
    precio decimal (10) NOT NULL,
    imagen varchar (100) NOT NULL,
    fecha_alta DATE NOT NULL,
    id_cliente varchar (10) NOT NULL,
    CONSTRAINT  pk_inm_id PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS tbl_usuarios (
   id varchar (10) NOT NULL UNIQUE,
   nombre varchar (20) NOT NULL,
   apellidos varchar (30) NOT NULL,
   telefono int (9) NOT NULL,
   email varchar (30),
   fecha_alta DATE NOT NULL,
   nom_user varchar (20) NOT NULL,
   pass varchar (5) NOT NULL,
   CONSTRAINT pk_usu_id PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS tbl_passwords (
  id varchar (10) NOT NULL UNIQUE,
  pass varchar (5) NOT NULL,
  CONSTRAINT pk_psw_id PRIMARY KEY (id)
);


 CREATE TABLE IF NOT EXISTS tbl_clientes (
    id varchar (10) NOT NULL UNIQUE,
    tipo varchar (10) NOT NULL,
    nombre varchar (20) NOT NULL,
    apellidos varchar (30) NOT NULL,
    telefono int (9) NOT NULL,
    email varchar (30),
    direccion varchar (30) NOT NULL,
    CONSTRAINT pk_cli_id PRIMARY KEY (id)
 );

  CREATE TABLE IF NOT EXISTS tbl_empleados (
    id varchar (9) NOT NULL UNIQUE,
    nombre varchar (20) NOT NULL,
    apellidos varchar (30) NOT NULL,
    direccion varchar (30) NOT NULL,
    telefono int (9) NOT NULL,
    email varchar (30),
    fecha_alta DATE NOT NULL,
    nom_user varchar (20) NOT NULL,
    CONSTRAINT pk_emp_id PRIMARY KEY (id)
 );
 
CREATE TABLE IF NOT EXISTS tbl_citas (
   id int(20) unsigned NOT NULL,
   fecha date NOT NULL,
   hora time NOT NULL,
   motivo varchar(50) NOT NULL,
   lugar varchar(30) NOT NULL,
   id_cliente bigint(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS tbl_noticias (
   id int(20) NOT NULL,
   titular varchar(30) NOT NULL,
   contenido varchar(1500) NOT NULL,
   imagen varchar(100) NOT NULL,
   fecha date NOT NULL
);

--alter table tbl_inmuebles ADD CONSTRAINT fk_id FOREIGN KEY (id_cliente) references tbl_clientes(id);

--volcado datos 'tbl_inmuebles' 
INSERT INTO tbl_inmuebles (id, tipo, direccion, cp, localidad, metros, num_hab, num_baños, garaje, jardin, piscina, estado, descripcion, precio, imagen, fecha_alta, id_cliente) VALUES
(0589, 'alquiler', 'Eras Altas 86', 50171, 'La Puebla de Alfindén', 120, 3, 2, 0, 0, 1, 0, 'Casa totalmente reformada y equipada, lista para entrar a vivir.', 150.000, 'fachada_0078.jpeg', '2022-09-08', '74859657P'),
(0263, 'venta', 'Pastor 63', 50195, 'La Puebla de Alfindén', 150, 1, 3, 1, 0, 0, 1, 'Casa totalmente reformada y equipada, lista para entrar a vivir.', 99.000, 'fachada_0263.jpg','2022-09-08', '38693644L'),
(0115, 'venta', 'Camino Flores 36', 50195, 'Pastriz', 90, 1, 1, 0, 0, 1, 0, 'Casa totalmente reformada y equipada, lista para entrar a vivir.', 350, 'fachada_0489.jpeg','2022-06-20', '72036547J'),
(0386, 'venta', 'Fueros 86', 50171,  'La Puebla de Alfindén', 100, 3, 2, 0, 1, 1, 1, 'Casa totalmente reformada y equipada, lista para entrar a vivir.', 350, 'fachada_0386.jpg','2022-10-02', '87456321N'),
(0533, 'venta', 'Hermita 53', 50171, 'La Puebla de Alfindén', 134, 3, 3, 1, 0, 0, 1, 'Casa totalmente reformada y equipada, lista para entrar a vivir.', 1159.000, 'fachada_0533.jpg','2022-10-10', '20489695S'),
(0720, 'venta', 'Reyes Catolicos 26', 50171, 'La Puebla de Alfindén', 125, 2, 1, 0, 1, 0, 0,'Preciosa casa para una familia. Construcción terminada hace pocos meses, lista para entrar a vivir.', 189.000, 'sala_estar_0890.jpg','2022-05-12', '458054786A'),
(0545, 'alquiler', 'Rio Ebro 37', 50195, 'Pastriz', 90,  1, true, 1, 1, 1, 1,'Preciosa y acogedora casa totalmente reformada y equipada, ideal para parejas. Lista para entrar a vivir.', 350, 'fachada_0078.jpg','2022-08-05', '404635645C'),
(0103, 'alquiler', 'Carretera Zaragoza 03', 50195, 'Pastriz', 90,  1, 1, 0, 0, 1, 0,'Preciosa y acogedora casa totalmente reformada y equipada, ideal para parejas. Lista para entrar a vivir.', 400, 'salon_0147.png','2022-05-08', '403215697C'),
(0489, 'alquiler', 'Eras Altas 89', 50171, 'La Puebla de Alfindén', 120, 3, 2, 0, 0, 1,  0, 'Casa totalmente reformada y equipada, lista para entrar a vivir.', 150.000, 'inmueble-58.jpeg','2022-10-07', '72146969B'),
(0415, 'venta', 'Camino Duques 15', 50195, 'Pastriz', 134, 2, 2, 0, 0, 0, 1,'Casa totalmente reformada y equipada, lista para entrar a vivir.', 89.000,'hab-juvenil-2_0720.jpg','2022-07-05', '38693644L'),
(0078, 'venta', 'Mayor 78', 50171, 'La Puebla de Alfindén', 220, 3, 1, 0, 0, 1, 1, 'Casa totalmente reformada y equipada, lista para entrar a vivir.', 150.000, 'sala_estar_0890.jpg','2022-06-05', '40321567C'),
(0890, 'venta', 'Aragón 54', 50171, 'La Puebla de Alfindén', 133, 3, 2, 0, 0, 1,  0, 'Preciosa casa para una familia. Reformada y equipada hace pocos meses, lista para entrar a vivir.', 139.000, 'salon-rojo_0063.jpeg','2022-10-07', '39147258M'),
(0113, 'alquiler', 'Carretera Zaragoza 03', 50195, 'Pastriz', 90,  1, 1, 0, 0, 1, 0, 'Preciosa y acogedora casa totalmente reformada y equipada, ideal para parejas. Lista para entrar a vivir.', 400, 'fachada_0078.jpg','2022-05-08', '40324786C');

--volcado datos 'tbl_usuarios'
INSERT INTO tbl_usuarios (id, nombre, apellidos, telefono, email, fecha_alta, nom_user, pass) VALUES
('72998257Y', 'Administrador', 'Marco Cornago', 692605415, '', '1986-10-31', 'Administrador', 'administrador');
('74859657P', 'Marisa', 'Perez Martínez', 61162263, '','2022-12-12', 'marisapm45', 'fg7t9'),
('72149369B', 'Andrés', 'Lopez Panizo', 698475632, 'andres_lopez@medina.es','2022-10-07', 'and', '784ñl'),
('78996587P', 'Pepa', 'Antonia Peralta', 647847151,'pepaperal@yahoo.es', '2019-12-12', 'pepaperal', 'pepap'),
('38693644L', 'Teresa', 'Salsero Martínez', 65874114, '','2022-12-12', 'tete78', 'r7gl3'),
('72036547J', 'Isabel', 'Cornago Lavega', 987456123, 'i_c_lavega@hotmail.es', '2022-02-02', 'isa_c', 'i8i3c'),
('20489695S', 'Antonio', 'Camacho Perez', 692478963,'','2022-08-13', 'ant_oi', '789li'),
('40321567C', 'Daniel', 'Blazque Franco', 653896574, 'daniel_bf@ematiza.es','2019-04-04', 'dani_bl', '44abr'),
('45805486A', 'Yasmina', 'Marco Monlora', 666547896, 'yas_1986@outlook.com','2021-10-10', 'yas82', 'rub78'),
('47896214H', 'Amparo', 'Sánchez Carrillo', 685633215, 'amp_san@yahoo.com','2020-06-03', 'amp', 'amp79'),
('45007784T', 'José', 'Torrecillas Fernández', 612321441, '', '2022-11-30', 'jose', '9b680'),
('89532541D', 'Timoteo', 'Torrecillas Carrillo', 611622633, 'ttc_yahoo.es','2021-11-30','tim_78', 'op789'),
('11478215K', 'Rubén', 'Segura Romo', 664790808, '', '2022-06-30', 'ruben', '8b925'),
('89658231F', 'Delia', 'Sánchez Carrillo', 612321441, '', '2023-01-15', 'delia', '6bc5e'),
('69147258M', 'Antonia', 'Medina Soler', 654789412, '','2022-03-06', 'toni', '6g7rt');

INSERT INTO tbl_passwords (id, pass) VALUES
('74859657P', 'fg7t9'),
('72149369B', '784ñl'),
('78996587P', 'pepap'),
('38693644L', 'r7gl3'),
('72036547J', 'i8i3c'),
('20489695S', '789li'),
('40321567C', '44abr'),
('45805486A', 'rub78'),
('47896214H', 'amp79'),
('45007784T', '9b680'),
('89532541D', 'op789'),
('11478215K', '8b925'),
('89658231F', '6bc5e'),
('69147258M', '6g7rt');

--volcado datos 'tbl_clientes' 
INSERT INTO tbl_clientes (id, tipo, nombre, apellidos, telefono, email, direccion) VALUES
('74859657P', 'vender', 'Marisa', 'Perez Martínez', 61162263, '','Av. Nueva, 123'),
('38693644L', 'vender','Teresa', 'Salsero Martínez', 65874114, '','Av. Vieja, 65'),
('72036547J', 'vender', 'Isabel', 'Cornago Lavega', 987456123, 'i_c_lavega@hotmail.es', 'Av. Sol 57'),
('20489695S', 'vender', 'Antonio', 'Camacho Perez', 692478963,'', 'Av. Teatro, 15'),
('40321567C', 'vender', 'Daniel', 'Blazque Franco', 653896574, 'daniel_bf@ematiza.es','Calle San Blas 41'),
('45805486A', 'comprar', 'Yasmina', 'Marco Monlora', 666547896, 'yas_1986@outlook.com','Av. Platanos, 57'),
('47896214H', 'comprar', 'Amparo', 'Sánchez Carrillo', 685633215, 'amp_san@yahoo.com', 'C/ industrial, 17'),
('45007784T', 'comprar', 'José', 'Torrecillas Fernández',612321441, '', 'C/ Tahona ,5'),
('89532541D', 'comprar', 'Timoteo', 'Torrecillas Carrillo', 611622633, 'ttc_yahoo.es', 'Plaza vieja, 89'),
('11478215K', 'comprar', 'Rubén', 'Segura Romo', 664790808, '', 'Doctor Pareja Yébenes, 8'),
('89658231F', 'comprar', 'Delia', 'Sánchez Carrillo', 612321441, '', 'C/ industrial, 17'),
('69147258M', 'comprar', 'Antonia', 'Medina Soler',654789412, '','C/Teatro 47 1a'),
('72146969B', 'vender', 'Andres', 'Lopez Panizo', 698475632, 'andres_lopez@medina.es','C/ Doctor Pareja Yében, 68 3C'),
('78596875P', 'vender','Pepe', 'Rodriguez Sancho', 976355896, 'pepesano@yahoo.com','Calle Hermita, 36');

('72998257Y','' ,'2022-01-04', 'Administrador', 'admin');
('0', 'disponible', '', 000000000,'' , '', '')

--volcado datos 'tbl_citas'
INSERT INTO tbl_citas (id, fecha, hora, motivo, lugar, id_cliente) VALUES
(215, '2022-12-12', '11:00:00', 'Ver piso', 'Plaza de la Nava, 5', 0115),
(011, '2023-01-15', '11:22:00', 'Entrega llaves piso', 'C/ tortola, 44', 0103),
(0315, '2023-08-10', '17:00:00', 'Ver chalet', 'Carretera de la Sierra, 12', 0489),
(0116, '2023-01-13', '09:00:00', 'Firma de papeles ático', 'Oficina',0103),
(200, '2023-01-09', '13:00:00', 'Visitar piso', 'Calle rosales, 17', 0580),
(210, '2023-02-16', '11:00:00', 'Ver piso', 'Plaza de la Nava, 5', 0115),
(110, '2023-01-29', '12:22:00', 'Entrega llaves piso', 'C/ Pastriz, 44', 0023),
(112, '2023-01-13', '10:22:00', 'Visitar piso', 'C/ Pastriz, 44', 103),
(111, '2023-02-28', '10:22:00', 'Visitar piso', 'C/ Pastriz, 44', 0263),
(32, '2023-01-16', '09:22:00', 'Entrega llaves piso', 'C/ tortola, 44', 0321),
(56, '2023-01-10', '11:22:00', 'Entrega llaves piso', 'C/ tortola, 44', 0533),
(18, '2023-01-13', '11:22:00', 'Entrega llaves piso', 'C/ tortola, 44', 0890),
(63, '2023-02-11', '11:22:00', 'Entrega llaves piso', 'C/ tortola, 44', 0017),
(045, '2023-05-20', '11:00:00', 'Firma de papeles ', 'Oficina', 0115);

INSERT INTO tbl_noticias ( id, titular, contenido, imagen, fecha) VALUES
(1, 'Black friday inmobiliario', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut soluta commodi, aperiam, sint assumenda, sit deserunt quas, cupiditate reprehenderit cum sunt dolor vitae vel voluptas maxime maiores iste non. Magnam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut soluta commodi, aperiam, sint assumenda, sit deserunt quas, cupiditate reprehenderit cum sunt dolor vitae vel voluptas maxime maiores iste non. Magnam!','cocina_0386.jpg', '2022-10-28'),
(4, 'Nuevos pisos', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut soluta commodi, aperiam, sint assumenda, sit deserunt quas, cupiditate reprehenderit cum sunt dolor vitae vel voluptas maxime maiores iste non. Magnam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut soluta commodi, aperiam, sint assumenda, sit deserunt quas, cupiditate reprehenderit cum sunt dolor vitae vel voluptas maxime maiores iste non. Magnam!Lorem ipsum dolor sitres iste non. Magnam!', '4.png', '2022-11-27'),
(7, 'Acceso a la vivienda', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nont mollit anim id est laborum.', '6.png', '2022-12-08'),
(16, 'Nuevo sector estrella en Bolsa', 'El sector inmobiliario centra este año las miradas en el mercado. Tras una década donde ninguna promotora inmobiliaria salía a Bolsa, este año, dos de ellas (Neinor y Aedas) han saltado al parqué; mientras que la histórica Colonial, convertida en Socimi en junio, protagoniza una operación de más de 1.200 millones al lanzar, el pasado 13 de noviembre, una opa sobre su homóloga Axiare.\r\nTodas estas operaciones han puesto en el foco en este tipo de empresas que, tras años fuera de la lista de recomendaciones bursátiles.','noticias 1.jpg',  '2023-01-16'),
(17, 'Piratas inmobiliarios', 'inmobiliaria', '/17.png', '2022-12-13'),
(18, 'Las promotoras te buscan ', 'Las promotoras inmobiliarias se han puesto a vender atención. Una limpieza integral del piso y de las zonas comunes antes de la entrega de las llaves, una botella de vino dispuesta en el recibidor al abrir la puerta, compromiso de respuesta en la gestión de desperfectos en menos de 48 horas, canales de comunicación digitales o trato personalizado son algunas de las atenciones que están recibiendo los nuevos compradores de vivienda. Unos años de crisis y de sequía en las ventas han bastado para que este sector empiece a tener en cuenta a su cliente, antes y después de la compra.', 'cocina_0386.jpg',  '2023-01-16');

--volcado datos 'tbl_empleados'
INSERT INTO tbl_empleados (id, nombre, apellidos, direccion, telefono, fecha_alta, nom_user) VALUES
('72998257Y', 'Administrador', 'Marco Cornago', 'San Blas, 41', 692605415, '1986-10-31', 'administrador');
