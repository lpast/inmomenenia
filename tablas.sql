--mysql -u past - past -p 
--(contraseña)

--DROP DATABASE IF EXISTS db_inmomenenia;
--CREATE DATABASE db_inmomenenia;

--USE db_inmomenenia;

CREATE TABLE IF NOT EXISTS tbl_inmuebles (
   id int (5) NOT NULL UNIQUE,
   tipo varchar (10) NOT NULL,
   calle varchar (30) NOT NULL,
   portal int (30) NOT NULL,
   piso varchar (10),
   puerta varchar (10),
   cp int (5) NOT NULL,
   localidad varchar (30) NOT NULL,
   metros int (5) NOT NULL,
   num_hab int (5) NOT NULL,
   num_banos int (5) NOT NULL,
   garaje varchar (2) NOT NULL,
   jardin varchar (2) NOT NULL,
   piscina varchar (2) NOT NULL,
   estado varchar (15) NOT NULL,
   titular varchar (150) NOT NULL,
   descripcion varchar (1500) NOT NULL,
   precio decimal (10) NOT NULL,
   imagen varchar (100) NOT NULL,
   fecha_alta DATE NOT NULL,
   id_cliente varchar (10) NOT NULL,
   CONSTRAINT pk_inm_id PRIMARY KEY (id)
);
   ALTER TABLE tbl_inmuebles
   MODIFY id int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS tbl_clientes (
   id varchar (10) NOT NULL UNIQUE,
   tipo varchar (15) NOT NULL,
   nombre varchar (20) NOT NULL,
   apellidos varchar (30) NOT NULL,
   telefono int (9) NOT NULL,
   email varchar (30),
   calle varchar (30) NOT NULL,
   portal int (30) NOT NULL,
   piso varchar (10),
   puerta varchar (10),
   cp int (5) NOT NULL,
   localidad varchar (30) NOT NULL,
   CONSTRAINT pk_cli_id PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS tbl_usuarios (
   id varchar (10) NOT NULL UNIQUE REFERENCES tbl_clientes (id),
   nombre varchar (20) NOT NULL REFERENCES tbl_clientes(nombre),
   apellidos varchar (30) NOT NULL REFERENCES tbl_clientes(apellidos),
   telefono int (9) NOT NULL REFERENCES tbl_clientes(telefono),
   email varchar (30) REFERENCES tbl_clientes(email),
   fecha_alta DATE NOT NULL,
   nom_user varchar (20) NOT NULL,
   pass varchar (5) NOT NULL,
   CONSTRAINT pk_usu_id PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS tbl_passwords (
   id_user varchar (10) NOT NULL UNIQUE REFERENCES tbl_usuarios(id),
   pass varchar (5) NOT NULL REFERENCES tbl_usuarios(pass),
   CONSTRAINT pk_psw_id PRIMARY KEY (id_user)
);

CREATE TABLE IF NOT EXISTS tbl_favoritos (
   id int (10) NOT NULL UNIQUE,
   id_usuario varchar (10) NOT NULL REFERENCES tbl_usuarios(id),
   id_inmueble int (5) NOT NULL REFERENCES tbl_inmuebles(id),
   CONSTRAINT  pk_fav_id PRIMARY KEY (id)
);

ALTER TABLE tbl_favoritos
MODIFY id int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;


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
   id int(20) NOT NULL,
   fecha date NOT NULL,
   hora time NOT NULL,
   motivo varchar(50) NOT NULL,
   lugar varchar(30) NOT NULL,
   id_cliente varchar (10) NOT NULL,
   CONSTRAINT  pk_cit_id PRIMARY KEY (id)
);

ALTER TABLE tbl_citas
MODIFY id int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS tbl_noticias (
   id int(20) NOT NULL,
   titular varchar(30) NOT NULL,
   contenido varchar(1500) NOT NULL,
   imagen varchar(100) NOT NULL,
   fecha date NOT NULL,
   CONSTRAINT  pk_not_id PRIMARY KEY (id)
);

ALTER TABLE tbl_noticias
MODIFY id int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

--alter table tbl_inmuebles ADD CONSTRAINT fk_id FOREIGN KEY (id_cliente) references tbl_clientes(id);

--volcado datos 'tbl_inmuebles' 
INSERT INTO tbl_inmuebles (id, tipo, calle, portal, piso, puerta, cp, localidad, metros, num_hab, num_banos, garaje, jardin, piscina, estado, titular, descripcion, precio, imagen, fecha_alta, id_cliente) VALUES
(001, 'venta', 'Calle Eras Altas', 86, null, null, 50171, 'La Puebla de Alfindén', 120, 3, 2, 'si', 'si', 'no', 'segunda mano', 'Casa en venta','Casa totalmente reformada y equipada, lista para entrar a vivir.', 150.000, 'fachada_0078.png', '2022-09-08', '74859657P'),
(002, 'venta', 'Calle Cortes de Aragón', 63, null, null, 50195, 'La Puebla de Alfindén', 150, 1, 3, 'no', 'no', 'no', 'segunda mano', 'Oportunidad','Casa totalmente reformada y equipada, lista para entrar a vivir.', 99.000, 'fachada_0263.png','2022-09-08', '38693644L'),
(003, 'alquiler', 'Camino Flores', 36, '4', 'B', 50195, 'Pastriz', 90, 1, 1, 'no', 'no', 'no', 'segunda mano', 'Casa  en Pastriz','Casa totalmente reformada y equipada, lista para entrar a vivir.', 350, 'salon_0489.png','2022-06-20', '72036547J'),
(005, 'venta', 'Fueros', 86, null, null, 50171, 'La Puebla de Alfindén', 100, 3, 2, 'si', 'si', 'no', 'segunda mano', 'Oportunidad', 'Casa totalmente reformada y equipada, lista para entrar a vivir.', 350, 'fachada_0890.png','2022-10-02', '87456321N'),
(006, 'venta', 'Avd. de la Ermita', 53, '6', 'B', 50171, 'La Puebla de Alfindén', 134, 3, 3, 'no', 'no', 'no', 'segunda mano', 'Oportunidad', 'Casa totalmente reformada y equipada, lista para entrar a vivir.', 159.000, 'fachada_0533.png','2022-10-10', '20489695S'),
(007, 'venta', 'Calle Almendro', 26, '6', 'A', 50171, 'La Puebla de Alfindén', 125, 2, 1, 'si', 'si', 'no', 'obra nueva', 'Preciosa casa en venta','Preciosa casa para una familia. Construcción terminada hace pocos meses, lista para entrar a vivir.', 189.000, 'salon_0059.png','2022-05-12', '458054786A'),
(004, 'alquiler', 'Avd. Palafox', 37, '8', 'C', 50195, 'Pastriz', 90,  1, 1, 'no', 'no', 'no', 'segunda mano', 'Oportunidad en alquiler', 'Preciosa y acogedora casa totalmente reformada y equipada, ideal para parejas. Lista para entrar a vivir.', 350, 'salon_0078.png','2022-08-05', '404635645C'),
(008, 'alquiler', 'Carretera Zaragoza', 03, null, null, 50195, 'Pastriz', 90, 2, 1, 'si', 'si', 'si', 'nueva','Casa en alquiler','Preciosa y acogedora casa nueva y equipada, ideal para parejas. Lista para entrar a vivir.', 400, 'salon_0103.png','2022-05-08', '403215697C'),
(009, 'alquiler', 'Calle Barrio Nuevo', 89, null, null, 50171, 'La Puebla de Alfindén', 120, 3, 2, 'no', 'no', 'no', 'segunda mano', 'Casa en alquiler', 'Casa totalmente reformada y equipada, lista para entrar a vivir.', 150.000, 'salon_0115.png','2022-10-07', '72146969B'),
(010, 'venta', 'Avd. Santa Ana', 15, '1','A Izq', 50195, 'Pastriz', 134, 2, 2, 'no', 'no', 'no', 'segunda mano', 'Casa en venta','Casa totalmente reformada y equipada, lista para entrar a vivir.', 89.000,'salon_cocina263.png','2022-07-05', '38693644L'),
(011, 'venta', 'Calle Acacia', 78, null, null, 50171, 'La Puebla de Alfindén', 220, 3, 1, 'no', 'si', 'si', 'obra nueva', 'Casa en venta', 'Obra nueva, lista para entrar a vivir.', 150.000, 'salon_7890.png','2022-06-05', '40321567C');

(012, 'venta', 'Sol', 54, '', '', 50171, 'La Puebla de Alfindén', 133, 3, 2, 0, 0, 1,  0, 'Casa en venta', 'Preciosa casa para una familia. Reformada y equipada hace pocos meses, lista para entrar a vivir.', 139.000, 'salon-rojo_0063.jpeg','2022-10-07', '39147258M'),
(013, 'alquiler', 'Carretera Zaragoza',33, '3','', 50195, 'Pastriz', 90,  1, 1, 0, 0, 1, 0,'Casa en alquiler', 'Preciosa y acogedora casa totalmente reformada y equipada, ideal para parejas. Lista para entrar a vivir.', 400, 'fachada_0078.jpg','2022-05-08', '40324786C');

--volcado datos 'tbl_usuarios'
INSERT INTO tbl_usuarios (id, nombre, apellidos, telefono, email, fecha_alta, nom_user, pass) VALUES
('72998257Y', 'Administrador', 'Marco Cornago', 692605415, '', '1986-10-31', 'Administrador', 'admin'),
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

INSERT INTO tbl_passwords (id_user, pass) VALUES
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
INSERT INTO tbl_clientes (id, tipo, nombre, apellidos, telefono, email, calle, portal, piso, puerta, cp, localidad) VALUES
('74859657P','vender', 'Marisa', 'Perez Martínez', 61162263, '','Av. Nueva',123, '9', '', 50195, 'Pastriz'),
('38693644L', 'vender','Teresa', 'Salsero Martínez', 65874114, '','Av. Vieja', 65, '','', 50195, 'Pastriz'),
('72036547J', 'vender', 'Isabel', 'Cornago Lavega', 987456123, 'i_c_lavega@hotmail.es', 'Av. Sol', 57, '3', 'Izq A', 50171, 'La Puebla de Alfindén'),
('20489695S', 'alquilar', 'Antonio', 'Camacho Perez', 692478963,'', 'Av. Teatro', 15, '1','A', 50195, 'Pastriz'),
('40321567C', 'vender', 'Daniel', 'Blazque Franco', 653896574, 'daniel_bf@ematiza.es','Calle San Blas', 41,'','', 50171, 'La Puebla de Alfindén'),
('45805486A', 'comprar', 'Yasmina', 'Marco Monlora', 666547896, 'yas_1986@outlook.com','Av. Platanos', 57, '', '', 50720, 'La Cartuja'),
('47896214H', 'arrendatario', 'Amparo', 'Sánchez Carrillo', 685633215, 'amp_san@yahoo.com', 'C/ industrial', 17, '2','3',50195, 'Pastriz'),
('45007784T', 'comprar', 'José', 'Torrecillas Fernández',612321441, '', 'C/ Tahona' ,5,'','', 50171, 'La Puebla de Alfindén'),
('89532541D', 'comprar', 'Timoteo', 'Torrecillas Carrillo', 611622633, 'ttc_yahoo.es', 'Plaza vieja', 89, '8','9', 50171, 'La Puebla de Alfindén'),
('11478215K', 'alquilar', 'Rubén', 'Segura Romo', 664790808, '', 'Doctor Pareja Yébenes', 8, '3','D', 50171, 'La Puebla de Alfindén'),
('89658231F', 'comprar', 'Delia', 'Sánchez Carrillo', 612321441, '', 'C/ industrial',17, '4','7', 50171, 'La Puebla de Alfindén'),
('69147258M', 'comprar', 'Antonia', 'Medina Soler',654789412, '','C/Teatro', 47, '1','A',50171, 'La Puebla de Alfindén'),
('72146969B', 'alquilar', 'Andres', 'Lopez Panizo', 698475632, 'andres_lopez@medina.es','C/ Doctor Pareja Yében', 68, '3','C', 50171, 'La Puebla de Alfindén'),
('78596875P', 'arrendatario','Pepe', 'Rodriguez Sancho', 976355896, 'pepesano@yahoo.com','Calle Hermita', 36, '4','D',50171, 'La Puebla de Alfindén');

('72998257Y','' ,'2022-01-04', 'Administrador', 'admin');
('0', 'disponible', '', 000000000,'' , '', '')

--volcado datos 'tbl_citas'
INSERT INTO tbl_citas (id, fecha, hora, motivo, lugar, id_cliente) VALUES
(200, '2022-12-12', '11:00:00', 'Ver piso', 'Plaza de la Nava, 5', '40321567C'),
(201, '2023-01-15', '11:22:00', 'Entrega llaves piso','Carretera de la Sierra, 12', '89532541D'),
(202, '2023-08-10', '17:00:00', 'Ver chalet', 'Carretera de la Sierra, 12', '40321567C'),
(203, '2023-01-13', '09:00:00', 'Firma de papeles ático', 'Oficina','45805486A'),
(204, '2023-01-09', '13:00:00', 'Visitar piso', 'Calle rosales, 17', '47896214H'),
(205, '2023-02-16', '11:00:00', 'Ver piso', 'Plaza de la Nava, 5', '47896214H'),
(206, '2023-01-29', '12:22:00', 'Entrega llaves piso', 'C/ Pastriz, 44', '11478215K'),
(207, '2023-01-13', '10:22:00', 'Visitar piso', 'C/ Pastriz, 44', '45007784T'),
(208, '2023-02-28', '10:22:00', 'Visitar piso', 'C/ Almendro 26', '40321567C'),
(209, '2023-01-16', '09:22:00', 'Entrega llaves piso', 'C/ tortola, 44', '89658231F'),
(210, '2023-01-10', '11:22:00', 'Entrega llaves piso', 'C/ tortola, 44', '69147258M'),
(211, '2023-01-13', '11:22:00', 'Entrega llaves piso', 'C/ tortola, 44', '69147258M'),
(212, '2023-02-11', '11:22:00', 'Entrega llaves piso', 'Avd. de la Ermita, 53','40321567C'),
(213, '2023-05-20', '11:00:00', 'Firma de papeles ', 'Oficina', '40321567C');

INSERT INTO tbl_noticias ( id, titular, contenido, imagen, fecha) VALUES
(18, 'Las promotoras te buscan ', 'Las promotoras inmobiliarias se han puesto a vender atención. Una limpieza integral del piso y de las zonas comunes antes de la entrega de las llaves, una botella de vino dispuesta en el recibidor al abrir la puerta, compromiso de respuesta en la gestión de desperfectos en menos de 48 horas, canales de comunicación digitales o trato personalizado son algunas de las atenciones que están recibiendo los nuevos compradores de vivienda. Unos años de crisis y de sequía en las ventas han bastado para que este sector empiece a tener en cuenta a su cliente, antes y después de la compra.', 'noticias1.png',  '2023-01-16'),
(14, 'Banco Santander, su año', 'La entidad financiera que preside Ana Botín enfrenta un año de múltiples desafíos y un objetivo claro: superar los escollos que le han convertido en el pasado ejercicio en el peor valor del sector bancario en el selectivo español, de forma que se vea beneficiado, de igual forma que el resto de las entidades por la subida de tipos, sin merma ante un difícil e incierto ejercicio en el que parte de las claves, vendrán de la mano de las posibles provisiones. El gran desafío de Banco Santander estriba en mejorar sus pobres resultados de 2022 en bolsa, en un año en el que se comportó como el peor valor bancario del Ibex, incluso tras la exclusión de Unicaja. En ese caso su diversificación geográfica le ha jugado una mala pasada, y su debilidad se dejó sentir tanto en su cotización como en las recomendaciones de la mayoría de los analistas, mientras se le sigue atragantando la cota de los 4 euros por acción.', 'noticias4.png', '2023-01-16'),
(17, 'Piratas inmobiliarios', 'inmobiliaria', 'noticias7.png', '2022-12-13'),
(16, 'Nuevo sector estrella en Bolsa', 'El sector inmobiliario centra este año las miradas en el mercado. Tras una década donde ninguna promotora inmobiliaria salía a Bolsa, este año, dos de ellas (Neinor y Aedas) han saltado al parqué; mientras que la histórica Colonial, convertida en Socimi en junio, protagoniza una operación de más de 1.200 millones al lanzar, el pasado 13 de noviembre, una opa sobre su homóloga Axiare.\r\nTodas estas operaciones han puesto en el foco en este tipo de empresas que, tras años fuera de la lista de recomendaciones bursátiles.','noticias4.png',  '2023-01-16'),
(7, 'Acceso a la vivienda', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nont mollit anim id est laborum.', 'noticias3.png', '2022-12-08'),
(4, 'Nuevos pisos', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut soluta commodi, aperiam, sint assumenda, sit deserunt quas, cupiditate reprehenderit cum sunt dolor vitae vel voluptas maxime maiores iste non. Magnam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut soluta commodi, aperiam, sint assumenda, sit deserunt quas, cupiditate reprehenderit cum sunt dolor vitae vel voluptas maxime maiores iste non. Magnam!Lorem ipsum dolor sitres iste non. Magnam!', 'noticias2.png', '2022-11-27'),
(1, 'Black friday inmobiliario', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut soluta commodi, aperiam, sint assumenda, sit deserunt quas, cupiditate reprehenderit cum sunt dolor vitae vel voluptas maxime maiores iste non. Magnam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut soluta commodi, aperiam, sint assumenda, sit deserunt quas, cupiditate reprehenderit cum sunt dolor vitae vel voluptas maxime maiores iste non. Magnam!','noticias5.png', '2022-10-28');



--volcado datos 'tbl_empleados'
INSERT INTO tbl_empleados (id, nombre, apellidos, direccion, telefono, fecha_alta, nom_user) VALUES
('72998257Y', 'Administrador', 'Marco Cornago', 'San Blas, 41', 692605415, '1986-10-31', 'admin');

INSERT INTO tbl_favoritos (id, id_usuario, id_inmueble ) VALUES
(001,'47896214H', 006);

ALTER TABLE tbl_inmuebles
   ADD CONSTRAINT fk_cli_id FOREIGN KEY (id_cliente) REFERENCES tbl_clientes (id);

ALTER TABLE tbl_clientes
   ADD CONSTRAINT fk_usu_id FOREIGN KEY (id) REFERENCES tbl_usuarios (id);

ALTER TABLE tbl_usuarios
   ADD CONSTRAINT fk_cli_id_us FOREIGN KEY (id) REFERENCES tbl_clientes (id);

ALTER TABLE tbl_passwords
   ADD CONSTRAINT fk_usu_id_us FOREIGN KEY (id_user) REFERENCES tbl_usuarios (id);

ALTER TABLE tbl_favoritos
   ADD CONSTRAINT fk_inm_id_inm FOREIGN KEY (id_inmueble) REFERENCES tbl_inmuebles (id);

ALTER TABLE tbl_favoritos
   ADD CONSTRAINT fk_us_id_us FOREIGN KEY (id_usuario) REFERENCES tbl_usuarios (id);
