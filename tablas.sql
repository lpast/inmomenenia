mysql -u past - past -p
(contraseña)

DROP DATABASE IF EXISTS db_inmomenenia;
CREATE DATABASE db_inmomenenia;

USE MENENIA;

 CREATE TABLE tbl_clientes (
 id int (5) NOT NULL UNIQUE,
 tipo varchar (10) NOT NULL,
 nombre varchar (20) NOT NULL,
 apellidos varchar (30) NOT NULL,
 direccion varchar (30) NOT NULL,
 telefono int (9) NOT NULL,
 nom_user varchar (20) NOT NULL,
 pass varchar (5) NOT NULL,
 CONSTRAINT pk_cli_id PRIMARY KEY (id)
 );


 CREATE TABLE tbl_inmuebles (
 id int (5) NOT NULL UNIQUE,
 tipo varchar (10) NOT NULL,
 disponibilidad varchar (2) NOT NULL,
 direccion varchar (30) NOT NULL,
 cp int (5) NOT NULL,
 metros int (5) NOT NULL,
 num_hab int (5) NOT NULL,
 garaje varchar (2) NOT NULL,
 descripcion varchar (1500) NOT NULL,
 precio int (10) NOT NULL,
 imagen varchar (100) NOT NULL,
 fecha_alta DATE NOT NULL,
 id_cliente varchar (100) NOT NULL,
 CONSTRAINT  pk_inm_id PRIMARY KEY (id)
 );


 CREATE TABLE tbl_empleados (
 id int (5) NOT NULL UNIQUE,
 nombre varchar (20) NOT NULL,
 apellidos varchar (30) NOT NULL,
 direccion varchar (30) NOT NULL,
 telefono int (9) NOT NULL,
 fecha_alta DATE NOT NULL,
 nom_user varchar (20) NOT NULL,
 pass varchar (5) NOT NULL,
 CONSTRAINT pk_cli_id PRIMARY KEY (id)
 );

********************************************************************************************************
alter table tbl_inmuebles ADD CONSTRAINT fk_id FOREIGN KEY (id_cliente) references tbl_clientes(id);
****************************************************************************************************
 //volcado datos 'tbl_clientes' 
INSERT INTO tbl_clientes (id, tipo, nombre, apellidos, direccion, telefono, nom_user, pass) VALUES
(0078,'vender', 'Marisa', 'Perez Martínez', 'Av. Nueva, 123', 61162263, 'marisapm45', 'fg7t9'),
(0386,'vender', 'Teresa', 'Salsero Martínez', 'Av. Vieja, 65', 65874114, 'tete78', 'r7gl3'),
(0720,'vender', 'Isabel', 'Cornago Lavega', 'Av. Sol 57', 987456123, 'isa_c', 'i8i3c'),
(0489,'vender', 'Antonio', 'Camacho Perez', 'Av. Teatro, 15', 692478963, 'ant_oi', '789li'),
(0321,'comprar', 'Daniel', 'Blazque Franco', 'Calle San Blas 41', 653896574, 'dani_bl', '44abr'),
(0580,'comprar', 'Yasmina', 'Marco Monlora', 'Av. Platanos, 57', 666547896, 'yas82', 'rub78'),
(0103,'vender', 'Amparo', 'Sánchez Carrillo', 'C/ industrial, 17', 612321441, 'amp', 'amp79'),
(0017,'vender', 'José', 'Torrecillas Fernández', 'C/ Tahona ,5', 685633215, 'jose', '9b680'),
(0890, 'vender', 'Timoteo', 'Torrecillas Carrillo', 'Plaza vieja, 89', 611622633, 'tim_78', 'op789'),
(0115, 'vender', 'Rubén', 'Segura Romo', 'C/ Doctor Pareja Yébenes, 8', 664790808, 'ruben', '8b925'),
(0533, 'vender', 'Delia', 'Sánchez Carrillo', 'C/ industrial, 17', 612321441, 'delia', '6bc5e'),
(0263, 'vender', 'Antonia', 'Medina Soler','C/Teatro 47 1a', 654789412,'toni', '6g7rt'),
(0740, 'comprar', 'Andres', 'Lopez Panizo', 'C/ Doctor Pareja Yében, 68 3C', 698475632, 'and', '784ñl');


//volcado datos 'tbl_inmuebles'
INSERT INTO tbl_inmuebles (id, tipo, disponibilidad, direccion, cp, metros, num_hab, garaje, descripcion, precio, imagen, fecha_alta, id_cliente ) VALUES
(0115, 'venta','si', 'Camino Duques, 15', '50171','134', 2,'si','Casa totalmente reformada y equipada, lista para entrar a vivir.', '89.000', './img_inmuebles/salon_0115.jpeg',02/05/2022, 0694),
(0078, 'venta','si', 'Mayor 78', '50171','220', 3, 'si', 'Casa totalmente reformada y equipada, lista para entrar a vivir.', '150.000', './img_inmuebles/fachada_0078.jpeg',05/07/2022, 0331),
(0890, 'venta','si', 'Aragón, 54', '50171','134', 3,'si', 'Preciosa casa para una familia. Reformada y equipada hace pocos meses, lista para entrar a vivir.', '139.000', './img_inmuebles/fachada_0890.png',07/10/2022, 696),
(0720, 'venta','si', 'Reyes Catolicos, 26', '50171','125', 2, 'si', 'Preciosa casa para una familia. Reformada y equipada hace pocos meses, lista para entrar a vivir.', '189.000', './img_inmuebles/7.png',12/05/2022, 642),
(0103, 'alquiler','si', 'Carretera Zaragoza, 03', '50195', '90',  1, 'si', 'Preciosa y acogedora casa totalmente reformada y equipada, ideal para parejas. Lista para entrar a vivir.', 400, './img_inmuebles/fachada_0103.png',08/05/2022, 603),
(0489, 'alquiler','si', 'Eras Altas, 89', '50171','160', 1, 'si', 'Casa totalmente reformada y equipada, lista para entrar a vivir.', '350', './img_inmuebles/fachada_0489.png',02/05/2022, 0587),
(0386, 'venta','si', 'Fueros, 86', '50195','100', 1, 'si', 'Casa totalmente reformada y equipada, lista para entrar a vivir.', '350', './img_inmuebles/fachada_0386.jpg',02/05/2022, 0496),
(0533, 'venta','si', 'Hermita, 53', '50195','134', 3, 'si', 'Casa totalmente reformada y equipada, lista para entrar a vivir.', '1159.000', './img_inmuebles/fachada_0533',10/10/2022, 0312),
(0263, 'venta','si', 'Pastor, 63', '50171','150', 1, 'no', 'Casa totalmente reformada y equipada, lista para entrar a vivir.', '99.000', './img_inmuebles/fachada_0263',09/12/2022, 0321);


//volcado datos 'tbl_empleados'
INSERT INTO tbl_empleados (id, nombre, apellidos, direccion, telefono, fecha_alta, nom_user, pass) VALUES
(001, 'Administrador', 'Marco Cornago', 'san blas', 963578965, 10/31/2000, 'administrador','admin');

INSERT INTO tbl_clientes (id, tipo, nombre, apellidos, direccion, telefono, nom_user, pass) VALUES
(001, 'admin', 'Administrador', 'San Blas', 963578965, 10/31/2000, 'administrador','admin');


