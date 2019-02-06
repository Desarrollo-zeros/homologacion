/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50641
 Source Host           : localhost:3306
 Source Schema         : proyect_pensum

 Target Server Type    : MySQL
 Target Server Version : 50641
 File Encoding         : 65001

 Date: 02/11/2018 12:58:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for careers
-- ----------------------------
DROP TABLE IF EXISTS `careers`;
CREATE TABLE `careers`  (
  `career_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`career_id`) USING BTREE,
  INDEX `faculty_id`(`faculty_id`) USING BTREE,
  CONSTRAINT `careers_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `facultys` (`faculty_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of careers
-- ----------------------------
INSERT INTO `careers` VALUES (1, '1', 'Ingenieria en sistemas', 1);

-- ----------------------------
-- Table structure for equivalences
-- ----------------------------
DROP TABLE IF EXISTS `equivalences`;
CREATE TABLE `equivalences`  (
  `equivalence_id` int(11) NOT NULL AUTO_INCREMENT,
  `equivalence_prev_id` int(11) NOT NULL,
  `equivalence_new_id` int(11) NOT NULL,
  PRIMARY KEY (`equivalence_id`) USING BTREE,
  UNIQUE INDEX `matters`(`equivalence_prev_id`, `equivalence_new_id`) USING BTREE,
  INDEX `equivalence_new_id`(`equivalence_new_id`) USING BTREE,
  CONSTRAINT `equivalences_ibfk_1` FOREIGN KEY (`equivalence_prev_id`) REFERENCES `matters` (`matter_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `equivalences_ibfk_2` FOREIGN KEY (`equivalence_new_id`) REFERENCES `matters` (`matter_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of equivalences
-- ----------------------------
INSERT INTO `equivalences` VALUES (1, 1, 55);
INSERT INTO `equivalences` VALUES (2, 1, 58);
INSERT INTO `equivalences` VALUES (3, 2, 59);
INSERT INTO `equivalences` VALUES (4, 3, 60);
INSERT INTO `equivalences` VALUES (5, 4, 61);
INSERT INTO `equivalences` VALUES (6, 5, 65);
INSERT INTO `equivalences` VALUES (7, 6, 62);
INSERT INTO `equivalences` VALUES (8, 7, 67);
INSERT INTO `equivalences` VALUES (9, 8, 64);
INSERT INTO `equivalences` VALUES (10, 9, 75);
INSERT INTO `equivalences` VALUES (11, 10, 63);
INSERT INTO `equivalences` VALUES (12, 11, 68);
INSERT INTO `equivalences` VALUES (13, 12, 74);
INSERT INTO `equivalences` VALUES (14, 13, 69);
INSERT INTO `equivalences` VALUES (15, 14, 70);
INSERT INTO `equivalences` VALUES (16, 15, 55);
INSERT INTO `equivalences` VALUES (17, 16, 76);
INSERT INTO `equivalences` VALUES (18, 17, 83);
INSERT INTO `equivalences` VALUES (19, 18, 81);
INSERT INTO `equivalences` VALUES (20, 19, 97);
INSERT INTO `equivalences` VALUES (21, 20, 78);
INSERT INTO `equivalences` VALUES (22, 21, 89);
INSERT INTO `equivalences` VALUES (23, 22, 82);
INSERT INTO `equivalences` VALUES (24, 23, 73);
INSERT INTO `equivalences` VALUES (25, 24, 72);
INSERT INTO `equivalences` VALUES (26, 25, 77);
INSERT INTO `equivalences` VALUES (27, 26, 84);
INSERT INTO `equivalences` VALUES (28, 27, 88);
INSERT INTO `equivalences` VALUES (29, 28, 80);
INSERT INTO `equivalences` VALUES (30, 29, 90);
INSERT INTO `equivalences` VALUES (31, 30, 94);
INSERT INTO `equivalences` VALUES (32, 32, 79);
INSERT INTO `equivalences` VALUES (33, 33, 105);
INSERT INTO `equivalences` VALUES (34, 34, 86);
INSERT INTO `equivalences` VALUES (35, 35, 96);
INSERT INTO `equivalences` VALUES (36, 36, 87);
INSERT INTO `equivalences` VALUES (37, 37, 93);
INSERT INTO `equivalences` VALUES (38, 38, 101);
INSERT INTO `equivalences` VALUES (39, 39, 92);
INSERT INTO `equivalences` VALUES (40, 40, 91);
INSERT INTO `equivalences` VALUES (41, 41, 100);
INSERT INTO `equivalences` VALUES (42, 42, 103);
INSERT INTO `equivalences` VALUES (43, 43, 114);
INSERT INTO `equivalences` VALUES (44, 44, 119);
INSERT INTO `equivalences` VALUES (45, 45, 110);
INSERT INTO `equivalences` VALUES (46, 46, 99);
INSERT INTO `equivalences` VALUES (47, 47, 102);
INSERT INTO `equivalences` VALUES (48, 48, 85);
INSERT INTO `equivalences` VALUES (49, 49, 106);
INSERT INTO `equivalences` VALUES (50, 50, 111);
INSERT INTO `equivalences` VALUES (53, 51, 113);
INSERT INTO `equivalences` VALUES (54, 52, 104);
INSERT INTO `equivalences` VALUES (55, 53, 115);
INSERT INTO `equivalences` VALUES (56, 54, 118);
INSERT INTO `equivalences` VALUES (51, 120, 112);
INSERT INTO `equivalences` VALUES (52, 121, 116);

-- ----------------------------
-- Table structure for facultys
-- ----------------------------
DROP TABLE IF EXISTS `facultys`;
CREATE TABLE `facultys`  (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`faculty_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of facultys
-- ----------------------------
INSERT INTO `facultys` VALUES (1, '1', 'facultad de ingenieria');

-- ----------------------------
-- Table structure for matters
-- ----------------------------
DROP TABLE IF EXISTS `matters`;
CREATE TABLE `matters`  (
  `matter_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_numbers` int(11) NULL DEFAULT NULL,
  `requirements_credit` int(11) NULL DEFAULT NULL,
  `semester` int(11) NOT NULL,
  `pensum_id` int(11) NOT NULL,
  PRIMARY KEY (`matter_id`) USING BTREE,
  INDEX `pensum_id`(`pensum_id`) USING BTREE,
  CONSTRAINT `matters_ibfk_1` FOREIGN KEY (`pensum_id`) REFERENCES `pensums` (`pensum_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 128 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of matters
-- ----------------------------
INSERT INTO `matters` VALUES (1, 'FC406', 'INTRODUCCION A LA INGENIERIA DE SISTEMAS', 4, 0, 1, 4);
INSERT INTO `matters` VALUES (2, 'UPC08', 'ACTIVIDAD DEPORTIVA', 1, 0, 1, 4);
INSERT INTO `matters` VALUES (3, 'MT302B', 'CALCULO DIFERENCIAL', 4, 0, 1, 4);
INSERT INTO `matters` VALUES (4, 'UPC01', 'CATEDRA UPECISTA', 1, 0, 1, 4);
INSERT INTO `matters` VALUES (5, 'HM301', 'HUMANIDADES I', 3, 0, 1, 4);
INSERT INTO `matters` VALUES (6, 'UPC04', 'LENGUA EXTRANJERA-GRAMATICA', 2, 0, 1, 4);
INSERT INTO `matters` VALUES (7, 'MT310B', 'LOGICA, CONJUNTOS Y GRAFOS', 3, 0, 1, 4);
INSERT INTO `matters` VALUES (8, 'PG312', 'TECNICAS DE AUTOAPRENDIZAJE', 2, 0, 1, 4);
INSERT INTO `matters` VALUES (9, 'UPC09', 'ACTIVIDAD CULTURAL', 1, 0, 2, 4);
INSERT INTO `matters` VALUES (10, 'MT301B', 'ALGEBRA LINEAL', 3, 0, 2, 4);
INSERT INTO `matters` VALUES (11, 'MT303B', 'CALCULO INTEGRAL', 3, 0, 2, 4);
INSERT INTO `matters` VALUES (12, 'HM302', 'HUMANIDADES II', 3, 0, 2, 4);
INSERT INTO `matters` VALUES (13, 'UPC05', 'LENGUA EXTRANJERA-LECTURA', 2, 0, 2, 4);
INSERT INTO `matters` VALUES (14, 'FS314', 'MECANICA', 4, 0, 2, 4);
INSERT INTO `matters` VALUES (15, 'SS401', 'PROGRAMACION DE COMPUTADORES I', 4, 0, 2, 4);
INSERT INTO `matters` VALUES (16, 'MT304B', 'CALCULO MULTIVARIABLE', 4, 0, 3, 4);
INSERT INTO `matters` VALUES (17, 'FS311', 'ELECTROMAGNETISMO', 4, 0, 3, 4);
INSERT INTO `matters` VALUES (18, 'MT307B', 'ESTADISTICA DESCRIPTIVA E INFERENCIAL', 4, 0, 3, 4);
INSERT INTO `matters` VALUES (19, 'AE101', 'FUNDAMENTOS DE ADMINISTRACION', 3, 0, 3, 4);
INSERT INTO `matters` VALUES (20, 'SS402', 'PROGRAMACION DE COMPUTADORES II', 4, 0, 3, 4);
INSERT INTO `matters` VALUES (21, 'ING301', 'METODOLOGIA DE LA INVESTIGACION', 2, 0, 4, 4);
INSERT INTO `matters` VALUES (22, 'MT305B', 'ECUACIONES DIFERENCIALES ORDINARIAS', 3, 0, 4, 4);
INSERT INTO `matters` VALUES (23, 'SS406', 'ESTRUCTURA DE DATOS', 4, 0, 4, 4);
INSERT INTO `matters` VALUES (24, 'UPC06', 'LENGUA EXTRANJERA-ESCRITURA', 2, 0, 4, 4);
INSERT INTO `matters` VALUES (25, 'FS315', 'ONDAS', 4, 0, 4, 4);
INSERT INTO `matters` VALUES (26, 'SS404', 'PROGRAMACION DE COMPUTADORES III', 4, 0, 4, 4);
INSERT INTO `matters` VALUES (27, 'SS428', 'ARQUITECTURA DE COMPUTADORES', 3, 0, 5, 4);
INSERT INTO `matters` VALUES (28, 'SS426', 'BASES DE DATOS I', 4, 0, 5, 4);
INSERT INTO `matters` VALUES (29, 'SS400', 'PROGRAMACION BAJO WEB', 4, 0, 5, 4);
INSERT INTO `matters` VALUES (30, 'ING302', 'SEMINARIO DE INVESTIGACION', 2, 0, 5, 4);
INSERT INTO `matters` VALUES (31, 'MT306B', 'FUNCIONES ESPECIALES Y ECUACIONES DIFERENCIALES', 4, 0, 5, 4);
INSERT INTO `matters` VALUES (32, 'UPC07', 'LENGUA EXTRANJERA CONVERSACION', 2, 0, 5, 4);
INSERT INTO `matters` VALUES (33, 'SS427', 'BASES DE DATOS II', 4, 0, 6, 4);
INSERT INTO `matters` VALUES (34, 'SS444-A', 'INGENIERIA DEL SOFTWARE I', 4, 0, 6, 4);
INSERT INTO `matters` VALUES (35, 'SS438', 'SISTEMAS OPERATIVOS', 4, 0, 6, 4);
INSERT INTO `matters` VALUES (36, 'MT309B', 'ANALISIS NUMERICO', 3, 0, 6, 4);
INSERT INTO `matters` VALUES (37, 'HM305', 'CULTURAS INTERNACIONALES', 2, 85, 6, 4);
INSERT INTO `matters` VALUES (38, 'CP101', 'FUNDAMENTOS CONTABLES', 3, 0, 6, 4);
INSERT INTO `matters` VALUES (39, 'SS445-A', 'INGENIERIA DEL SOFTWARE II', 4, 0, 7, 4);
INSERT INTO `matters` VALUES (40, 'SS430', 'MODELOS Y SIMULACION', 4, 0, 7, 4);
INSERT INTO `matters` VALUES (41, 'SS428-A', 'REDES Y COMUNICACIONES', 4, 0, 7, 4);
INSERT INTO `matters` VALUES (42, 'AI420', 'INGENIERIA ECONOMICA', 2, 0, 7, 4);
INSERT INTO `matters` VALUES (43, 'MT318B', 'PROGRAMACION LINEAL', 3, 0, 7, 4);
INSERT INTO `matters` VALUES (44, 'FC403', 'DISEÑO EXPERIMENTAL', 2, 0, 8, 4);
INSERT INTO `matters` VALUES (45, 'SS430-A', 'AUDITORIA DE SISTEMAS', 4, 0, 8, 4);
INSERT INTO `matters` VALUES (46, 'SS429-A', 'INTELIGENCIA ARTIFICIAL', 4, 0, 8, 4);
INSERT INTO `matters` VALUES (47, 'SS424', 'COMPUTACION GRAFICA', 3, 0, 8, 4);
INSERT INTO `matters` VALUES (48, 'AI432', 'INVESTIGACION DE OPERACIONES (SISTEMAS)', 3, 0, 8, 4);
INSERT INTO `matters` VALUES (49, 'SS-ELECTIVA AI', 'ELECTIVA AI', 4, 0, 9, 4);
INSERT INTO `matters` VALUES (50, 'SS-ELECTIVA BI', 'ELECTIVA BI', 4, 0, 9, 4);
INSERT INTO `matters` VALUES (51, 'SS556', 'LEGISLACION DE SISTEMAS', 2, 0, 9, 4);
INSERT INTO `matters` VALUES (52, 'EC114', 'FORMULACION Y EVALUACION DE PROYECTOS', 3, 0, 9, 4);
INSERT INTO `matters` VALUES (53, 'SS447', 'PROYECTO DE GRADO I', 2, 120, 9, 4);
INSERT INTO `matters` VALUES (54, 'SS449', 'PROYECTO DE GRADO II', 2, 0, 10, 4);
INSERT INTO `matters` VALUES (55, 'SS407', 'ALGORITMOS Y FUNDAMENTOS DE PROGRAMACION .\r\n', 3, 0, 1, 6);
INSERT INTO `matters` VALUES (58, 'SS105', 'INTRODUCCION A LA INGENIERIA DE SISTEMAS', 2, 0, 1, 6);
INSERT INTO `matters` VALUES (59, 'UPC08', 'ACTIVIDAD DEPORTIVA\r\n', 1, 0, 1, 6);
INSERT INTO `matters` VALUES (60, 'MT104', 'CALCULO DIFERENCIAL', 3, 0, 1, 6);
INSERT INTO `matters` VALUES (61, 'UPC01', 'CATEDRA UPECISTA', 1, 0, 1, 6);
INSERT INTO `matters` VALUES (62, 'UPC04', 'LENGUA EXTRANJERA-GRAMATICA', 2, 0, 1, 6);
INSERT INTO `matters` VALUES (63, 'MT301B', 'ALGEBRA LINEAL', 3, 0, 1, 6);
INSERT INTO `matters` VALUES (64, 'PG102', 'COMUNICACIÓN ORAL Y ESCRITA l', 1, 0, 1, 6);
INSERT INTO `matters` VALUES (65, 'HM201', 'HUMANIDADES I', 2, 0, 2, 6);
INSERT INTO `matters` VALUES (66, 'PG200', 'COMUNICACIÓN ORAL Y ESCRITA ll', 2, 0, 2, 6);
INSERT INTO `matters` VALUES (67, 'MT203', 'MATEMATICA DISCRETA', 3, 0, 2, 6);
INSERT INTO `matters` VALUES (68, 'MT303B', 'CALCULO INTEGRAL', 3, 0, 2, 6);
INSERT INTO `matters` VALUES (69, 'UPC05', 'LENGUA EXTRANJERA-LECTURA', 2, 0, 2, 6);
INSERT INTO `matters` VALUES (70, 'FS202', 'MECANICA', 3, 0, 2, 6);
INSERT INTO `matters` VALUES (71, 'SS200', 'PROGRAMACION DE COMPUTADORES I', 3, 0, 2, 6);
INSERT INTO `matters` VALUES (72, 'UPC06', 'LENGUA EXTRANJERA-ESCRITURA', 2, 0, 3, 6);
INSERT INTO `matters` VALUES (73, 'SS301', 'ESTRUCTURA DE DATOS', 3, 0, 3, 6);
INSERT INTO `matters` VALUES (74, 'HM202', 'HUMANIDADES II', 2, 0, 3, 6);
INSERT INTO `matters` VALUES (75, 'UPC09', 'ACTIVIDAD CULTURAL\r\n', 1, 0, 3, 6);
INSERT INTO `matters` VALUES (76, 'MT331', 'CALCULO MULTIVARIABLE', 3, 0, 3, 6);
INSERT INTO `matters` VALUES (77, 'FS329', 'ONDAS', 4, 0, 3, 6);
INSERT INTO `matters` VALUES (78, 'SS300', 'PROGRAMACION DE COMPUTADORES II', 4, 0, 3, 6);
INSERT INTO `matters` VALUES (79, 'UPC07', 'LENGUA EXTRANJERA CONVERSACION', 2, 0, 4, 6);
INSERT INTO `matters` VALUES (80, 'SS463', 'BASES DE DATOS', 3, 0, 4, 6);
INSERT INTO `matters` VALUES (81, 'MT403', 'ESTADISTICA DESCRIPTIVA E INFERENCIAL', 3, 0, 4, 6);
INSERT INTO `matters` VALUES (82, 'MT402', 'ECUACIONES DIFERENCIALES ORDINARIAS \r\n', 3, 0, 4, 6);
INSERT INTO `matters` VALUES (83, 'FS400', 'ELECTROMAGNETISMO', 3, 0, 4, 6);
INSERT INTO `matters` VALUES (84, 'SS462', 'PROGRAMACION DE COMPUTADORES III', 3, 0, 4, 6);
INSERT INTO `matters` VALUES (85, 'AI432\r\n', 'INVESTIGACION DE OPERACIONES (SISTEMAS)', 3, 0, 5, 6);
INSERT INTO `matters` VALUES (86, 'SS502', 'INGENIERIA DEL SOFTWARE I', 3, 0, 5, 6);
INSERT INTO `matters` VALUES (87, 'MT309B', 'ANALISIS NUMERICO', 3, 0, 5, 6);
INSERT INTO `matters` VALUES (88, 'SS500', 'ARQUITECTURA DE COMPUTADORES', 3, 0, 5, 6);
INSERT INTO `matters` VALUES (89, 'ING301', 'METODOLOGIA DE LA INVESTIGACION', 2, 0, 5, 6);
INSERT INTO `matters` VALUES (90, 'SS501', 'PROGRAMACION BAJO WEB', 3, 0, 5, 6);
INSERT INTO `matters` VALUES (91, 'SS601', 'MODELOS Y SIMULACION\r\n', 3, 0, 6, 6);
INSERT INTO `matters` VALUES (92, 'SS602', 'INGENIERIA DEL SOFTWARE II\r\n\r\n', 3, 0, 6, 6);
INSERT INTO `matters` VALUES (93, 'UPC10', 'CATEDRA DE NEGOCIOS INTERNACIONALES', 2, 85, 6, 6);
INSERT INTO `matters` VALUES (94, 'ING302', 'SEMINARIO DE INVESTIGACION', 2, 0, 6, 6);
INSERT INTO `matters` VALUES (96, 'SS600', 'SISTEMAS OPERATIVOS', 3, 0, 6, 6);
INSERT INTO `matters` VALUES (97, 'AE014', 'FUNDAMENTOS DE ADMINISTRACION', 2, 0, 6, 6);
INSERT INTO `matters` VALUES (99, 'SS702', 'INTELIGENCIA ARTIFICIAL', 3, 0, 7, 6);
INSERT INTO `matters` VALUES (100, 'SS701', 'REDES Y COMUNICACIONES\r\n\r\n', 3, 0, 7, 6);
INSERT INTO `matters` VALUES (101, '101', 'ELECTIVA CIENCIAS ADM, ECONOMICAS Y CONTABLES\r\n', 2, 0, 7, 6);
INSERT INTO `matters` VALUES (102, 'SS704', 'COMPUTACION GRAFICA', 3, 0, 7, 6);
INSERT INTO `matters` VALUES (103, 'AI700', 'INGENIERIA ECONOMICA', 3, 0, 7, 6);
INSERT INTO `matters` VALUES (104, 'FC407', 'FORMULACION Y EVALUACION DE PROYECTOS', 3, 0, 8, 6);
INSERT INTO `matters` VALUES (105, 'SS802', 'BASE DE DATOS AVANZADAS', 3, 0, 8, 6);
INSERT INTO `matters` VALUES (106, 'SS801', 'ELECTIVA PROFUNDIZACION l', 3, 0, 8, 6);
INSERT INTO `matters` VALUES (110, 'SS902', 'AUDITORIA DE SISTEMAS', 3, 0, 9, 6);
INSERT INTO `matters` VALUES (111, 'SS901', 'ELECTIVA PROFUNDIZACION ll', 3, 0, 9, 6);
INSERT INTO `matters` VALUES (112, 'SS904', 'ELECTIVA PROFUNDIZACION lll', 3, 0, 9, 6);
INSERT INTO `matters` VALUES (113, 'SS556', 'LEGISLACION DE SISTEMAS', 2, 0, 9, 6);
INSERT INTO `matters` VALUES (114, 'SS900', 'ELECTIVA BASICA DE INGENIERIA I', 3, 0, 9, 6);
INSERT INTO `matters` VALUES (115, 'SS903', 'PROYECTO DE GRADO I', 3, 120, 9, 6);
INSERT INTO `matters` VALUES (116, 'SS110', 'ELECTIVA PROFUNDIZACION IV', 3, 0, 10, 6);
INSERT INTO `matters` VALUES (117, 'SS111', 'ELECTIVA PROFUNDIZACION V', 3, 0, 10, 6);
INSERT INTO `matters` VALUES (118, 'SS113', 'PROYECTO DE GRADO II', 8, 0, 10, 6);
INSERT INTO `matters` VALUES (119, 'XXX12', 'ELECTIVA BASICA DE INGENIERIA II', 3, 0, 9, 6);
INSERT INTO `matters` VALUES (120, 'SS-ELECTIVA AII', 'ELECTIVA AII', 4, 0, 10, 4);
INSERT INTO `matters` VALUES (121, 'SS-ELECTIVA BII', 'ELECTIVA BII', 4, 0, 10, 4);
INSERT INTO `matters` VALUES (122, 'SS603', 'PROGRAMACION MOVIL', 3, 0, 6, 6);
INSERT INTO `matters` VALUES (123, 'SS703', 'SISTEMA DE INFORMACION', 3, 0, 7, 6);
INSERT INTO `matters` VALUES (124, 'SS805', 'ELECTIVA GESTION AMBIENTAL', 3, 0, 8, 6);
INSERT INTO `matters` VALUES (125, 'SS803', 'GESTION DE PROYECTOS TI', 3, 0, 8, 6);
INSERT INTO `matters` VALUES (126, 'SS804', 'SEGURIDAD INFORMATICA', 3, 0, 8, 6);
INSERT INTO `matters` VALUES (127, 'SS112', ' ETICA PROFESIONAL', 2, 0, 9, 6);

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `space` int(11) NOT NULL,
  `url` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `roles_id` int(11) NOT NULL,
  `function` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `video` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `father` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `by_order` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`menu_id`) USING BTREE,
  INDEX `roles_id`(`roles_id`) USING BTREE,
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, '¿Como funciona?', 1, 0, '#help', 0, 'null', '', 'index', '1', NULL, 1);
INSERT INTO `menu` VALUES (2, '¿Que puedo ver?', 1, 0, '#', 0, 'null', 'KxlIYwQH6IY', 'index', '2', NULL, 1);
INSERT INTO `menu` VALUES (3, 'Noticias', 1, 0, '#who-we-are', 0, 'null', '', 'index', '3', NULL, 1);
INSERT INTO `menu` VALUES (4, 'Solicita Tu Cuenta', 1, 5, '#', 0, 'null', '', 'offline', '4', NULL, 1);
INSERT INTO `menu` VALUES (5, 'Iniciar Sesíon', 1, 0, '#', 0, 'modalLogin()', '', 'offline', '5', NULL, 1);
INSERT INTO `menu` VALUES (6, 'Cerra Sesíon', 1, 0, 'Proyect/destroy_session', 1, 'null', '', 'online', '5', NULL, 1);
INSERT INTO `menu` VALUES (7, 'Inicio', 2, 0, 'Dashboard/', 1, 'null', '', 'panel', '1', 'icon-home', 1);
INSERT INTO `menu` VALUES (8, 'Ver Malla academica', 2, 0, '#', 1, 'viewCesh()', '', 'panel-1', '2', 'icon-page', 1);
INSERT INTO `menu` VALUES (9, 'Modificar Informacion personal', 2, 0, '#', 1, 'modiI()', '', 'panel-1', '3', 'icon-form', 1);
INSERT INTO `menu` VALUES (10, 'Cerra Sesíon', 2, 0, 'Dashboard/destroy_session', 1, 'null', '', 'panel', '5', 'icon-close', 1);
INSERT INTO `menu` VALUES (11, 'Panel', 1, 0, 'Dashboard/', 1, 'null', '', 'online', '4', NULL, 1);

-- ----------------------------
-- Table structure for notes
-- ----------------------------
DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes`  (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `matter_id` int(11) NOT NULL,
  `note` float(5, 2) NOT NULL,
  PRIMARY KEY (`note_id`) USING BTREE,
  INDEX `student_id`(`student_id`) USING BTREE,
  INDEX `notes_ibfk_1`(`matter_id`) USING BTREE,
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`matter_id`) REFERENCES `matters` (`matter_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 79 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of notes
-- ----------------------------
INSERT INTO `notes` VALUES (1, 1, 42, 2.40);
INSERT INTO `notes` VALUES (2, 1, 23, 2.60);
INSERT INTO `notes` VALUES (3, 1, 25, 2.70);
INSERT INTO `notes` VALUES (4, 1, 28, 3.90);
INSERT INTO `notes` VALUES (5, 1, 16, 3.40);
INSERT INTO `notes` VALUES (6, 1, 14, 3.00);
INSERT INTO `notes` VALUES (7, 1, 10, 2.10);
INSERT INTO `notes` VALUES (8, 1, 9, 3.80);
INSERT INTO `notes` VALUES (9, 1, 16, 1.90);
INSERT INTO `notes` VALUES (10, 1, 20, 3.00);
INSERT INTO `notes` VALUES (11, 1, 30, 3.70);
INSERT INTO `notes` VALUES (12, 1, 13, 3.20);
INSERT INTO `notes` VALUES (13, 1, 24, 3.40);
INSERT INTO `notes` VALUES (14, 1, 23, 3.50);
INSERT INTO `notes` VALUES (15, 1, 29, 4.30);
INSERT INTO `notes` VALUES (16, 1, 10, 3.20);
INSERT INTO `notes` VALUES (17, 1, 16, 2.70);
INSERT INTO `notes` VALUES (18, 1, 33, 4.90);
INSERT INTO `notes` VALUES (19, 1, 42, 3.10);
INSERT INTO `notes` VALUES (20, 1, 25, 3.00);
INSERT INTO `notes` VALUES (21, 1, 32, 4.00);
INSERT INTO `notes` VALUES (22, 1, 18, 2.60);
INSERT INTO `notes` VALUES (23, 1, 8, 4.30);
INSERT INTO `notes` VALUES (24, 1, 7, 2.50);
INSERT INTO `notes` VALUES (25, 1, 6, 2.50);
INSERT INTO `notes` VALUES (26, 1, 1, 3.50);
INSERT INTO `notes` VALUES (27, 1, 19, 3.70);
INSERT INTO `notes` VALUES (28, 1, 6, 4.00);
INSERT INTO `notes` VALUES (29, 1, 7, 3.20);
INSERT INTO `notes` VALUES (30, 1, 12, 4.50);
INSERT INTO `notes` VALUES (31, 1, 11, 3.00);
INSERT INTO `notes` VALUES (32, 1, 21, 4.10);
INSERT INTO `notes` VALUES (33, 1, 15, 3.40);
INSERT INTO `notes` VALUES (34, 1, 5, 3.50);
INSERT INTO `notes` VALUES (35, 1, 4, 4.40);
INSERT INTO `notes` VALUES (36, 1, 3, 3.20);
INSERT INTO `notes` VALUES (37, 1, 2, 4.40);
INSERT INTO `notes` VALUES (38, 1, 17, 3.00);
INSERT INTO `notes` VALUES (39, 1, 38, 3.50);
INSERT INTO `notes` VALUES (40, 1, 26, 3.40);
INSERT INTO `notes` VALUES (41, 1, 34, 3.20);
INSERT INTO `notes` VALUES (42, 2, 3, 4.10);
INSERT INTO `notes` VALUES (43, 2, 7, 3.50);
INSERT INTO `notes` VALUES (44, 2, 8, 4.70);
INSERT INTO `notes` VALUES (45, 2, 1, 4.00);
INSERT INTO `notes` VALUES (46, 2, 2, 4.70);
INSERT INTO `notes` VALUES (47, 2, 4, 4.60);
INSERT INTO `notes` VALUES (48, 2, 6, 5.00);
INSERT INTO `notes` VALUES (49, 2, 25, 3.40);
INSERT INTO `notes` VALUES (50, 2, 22, 3.00);
INSERT INTO `notes` VALUES (51, 2, 23, 4.00);
INSERT INTO `notes` VALUES (52, 2, 17, 3.30);
INSERT INTO `notes` VALUES (53, 2, 24, 4.50);
INSERT INTO `notes` VALUES (54, 2, 19, 4.90);
INSERT INTO `notes` VALUES (55, 2, 20, 3.40);
INSERT INTO `notes` VALUES (56, 2, 18, 3.60);
INSERT INTO `notes` VALUES (57, 2, 16, 3.10);
INSERT INTO `notes` VALUES (58, 2, 33, 3.00);
INSERT INTO `notes` VALUES (59, 2, 35, 2.80);
INSERT INTO `notes` VALUES (60, 2, 34, 3.90);
INSERT INTO `notes` VALUES (61, 2, 38, 3.80);
INSERT INTO `notes` VALUES (62, 2, 31, 2.90);
INSERT INTO `notes` VALUES (63, 2, 28, 3.30);
INSERT INTO `notes` VALUES (64, 2, 30, 4.70);
INSERT INTO `notes` VALUES (65, 2, 44, 2.80);
INSERT INTO `notes` VALUES (66, 2, 27, 4.20);
INSERT INTO `notes` VALUES (67, 2, 29, 3.60);
INSERT INTO `notes` VALUES (68, 2, 21, 4.90);
INSERT INTO `notes` VALUES (69, 2, 26, 3.10);
INSERT INTO `notes` VALUES (70, 2, 5, 3.70);
INSERT INTO `notes` VALUES (71, 2, 11, 4.60);
INSERT INTO `notes` VALUES (72, 2, 15, 4.80);
INSERT INTO `notes` VALUES (73, 2, 14, 4.20);
INSERT INTO `notes` VALUES (74, 2, 13, 4.30);
INSERT INTO `notes` VALUES (75, 2, 12, 4.10);
INSERT INTO `notes` VALUES (76, 2, 32, 4.10);
INSERT INTO `notes` VALUES (77, 2, 9, 4.90);
INSERT INTO `notes` VALUES (78, 2, 10, 4.80);

-- ----------------------------
-- Table structure for pensums
-- ----------------------------
DROP TABLE IF EXISTS `pensums`;
CREATE TABLE `pensums`  (
  `pensum_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `create_date` date NOT NULL,
  `credit_numbers` int(11) NOT NULL,
  `detail` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` int(1) NULL DEFAULT NULL,
  `career_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`pensum_id`) USING BTREE,
  INDEX `career_id`(`career_id`) USING BTREE,
  CONSTRAINT `pensums_ibfk_1` FOREIGN KEY (`career_id`) REFERENCES `careers` (`career_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pensums
-- ----------------------------
INSERT INTO `pensums` VALUES (4, 'V-0402-IS-D-04', '2018-09-29', 175, '1', 1, 1, NULL);
INSERT INTO `pensums` VALUES (6, 'V-0402-IS-D-06', '2018-09-29', 171, '1', 2, 1, NULL);

-- ----------------------------
-- Table structure for persons
-- ----------------------------
DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons`  (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `document` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `first_name` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `second_name` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `first_surname` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `second_surname` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`person_id`) USING BTREE,
  INDEX `person_users_id`(`user_id`) USING BTREE,
  CONSTRAINT `person_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of persons
-- ----------------------------
INSERT INTO `persons` VALUES (1, '1063969856', 'Carlos', 'Andrés', 'Castilla ', 'García', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEkAAABJCAYAAABxcwvcAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDoxNjA4MDE4Zi04M2Q3LTRmMDItYTFhOC05NDUwODhmMDEwMjgiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MkM3MjIzN0Y3MTE2MTFFNkFGM0NFRDU4M0I5NTA2QjYiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MkM3MjIzN0U3MTE2MTFFNkFGM0NFRDU4M0I5NTA2QjYiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDozZTg3M2VhMi01NjA4LTRlZGEtYWE3Ny03ZTNjYjU1ODUyNjUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MTYwODAxOGYtODNkNy00ZjAyLWExYTgtOTQ1MDg4ZjAxMDI4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', 1, '2018-09-29 14:25:18', '2018-10-01 15:53:21');
INSERT INTO `persons` VALUES (2, '1067721000', 'Ivan', 'Alfredo', 'Sandoval', 'Picalua', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQ4AAAEOCAYAAAB4sfmlAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDoxNjA4MDE4Zi04M2Q3LTRmMDItYTFhOC05NDUwODhmMDEwMjgiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6M0YzMkM4Mjc3MTMyMTFFNjgyQTlDQUYwQTNDQTY0ODIiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6M0YzMkM4MjY3MTMyMTFFNjgyQTlDQUYwQTNDQTY0ODIiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDplMjE2ZjA0ZC1iMGJhLTRhMDAtYmU2Ni0wZDEzYjUzNTZlYjQiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MTYwODAxOGYtODNkNy00ZjAyLWExYTgtOTQ1MDg4ZjAxMDI4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', 2, NULL, '2018-10-01 16:05:12');

-- ----------------------------
-- Table structure for request_account
-- ----------------------------
DROP TABLE IF EXISTS `request_account`;
CREATE TABLE `request_account`  (
  `rq_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `document` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `career_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`rq_id`) USING BTREE,
  INDEX `career_id`(`career_id`) USING BTREE,
  CONSTRAINT `request_account_ibfk_1` FOREIGN KEY (`career_id`) REFERENCES `careers` (`career_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for requirements
-- ----------------------------
DROP TABLE IF EXISTS `requirements`;
CREATE TABLE `requirements`  (
  `requirement_id` int(11) NOT NULL AUTO_INCREMENT,
  `requirement_present_id` int(11) NOT NULL,
  `requirement_new_id` int(11) NOT NULL,
  PRIMARY KEY (`requirement_id`) USING BTREE,
  UNIQUE INDEX `matters`(`requirement_present_id`, `requirement_new_id`) USING BTREE,
  INDEX `requirement_new_id`(`requirement_new_id`) USING BTREE,
  CONSTRAINT `requirements_ibfk_1` FOREIGN KEY (`requirement_present_id`) REFERENCES `matters` (`matter_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `requirements_ibfk_2` FOREIGN KEY (`requirement_new_id`) REFERENCES `matters` (`matter_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of requirements
-- ----------------------------
INSERT INTO `requirements` VALUES (49, 1, 55);
INSERT INTO `requirements` VALUES (50, 1, 58);
INSERT INTO `requirements` VALUES (51, 2, 59);
INSERT INTO `requirements` VALUES (1, 3, 60);
INSERT INTO `requirements` VALUES (2, 4, 61);
INSERT INTO `requirements` VALUES (6, 5, 65);
INSERT INTO `requirements` VALUES (3, 6, 62);
INSERT INTO `requirements` VALUES (8, 7, 67);
INSERT INTO `requirements` VALUES (5, 8, 64);
INSERT INTO `requirements` VALUES (16, 9, 75);
INSERT INTO `requirements` VALUES (4, 10, 63);
INSERT INTO `requirements` VALUES (9, 11, 68);
INSERT INTO `requirements` VALUES (15, 12, 74);
INSERT INTO `requirements` VALUES (10, 13, 69);
INSERT INTO `requirements` VALUES (11, 14, 70);
INSERT INTO `requirements` VALUES (12, 15, 71);
INSERT INTO `requirements` VALUES (17, 16, 76);
INSERT INTO `requirements` VALUES (24, 17, 83);
INSERT INTO `requirements` VALUES (22, 18, 81);
INSERT INTO `requirements` VALUES (36, 19, 97);
INSERT INTO `requirements` VALUES (19, 20, 78);
INSERT INTO `requirements` VALUES (30, 21, 89);
INSERT INTO `requirements` VALUES (23, 22, 82);
INSERT INTO `requirements` VALUES (14, 23, 73);
INSERT INTO `requirements` VALUES (13, 24, 72);
INSERT INTO `requirements` VALUES (18, 25, 77);
INSERT INTO `requirements` VALUES (25, 26, 84);
INSERT INTO `requirements` VALUES (29, 27, 88);
INSERT INTO `requirements` VALUES (21, 28, 80);
INSERT INTO `requirements` VALUES (31, 29, 90);
INSERT INTO `requirements` VALUES (35, 30, 94);
INSERT INTO `requirements` VALUES (20, 32, 79);
INSERT INTO `requirements` VALUES (42, 33, 105);
INSERT INTO `requirements` VALUES (27, 34, 86);
INSERT INTO `requirements` VALUES (52, 35, 96);
INSERT INTO `requirements` VALUES (28, 36, 87);
INSERT INTO `requirements` VALUES (34, 37, 93);
INSERT INTO `requirements` VALUES (39, 38, 101);
INSERT INTO `requirements` VALUES (33, 39, 92);
INSERT INTO `requirements` VALUES (32, 40, 91);
INSERT INTO `requirements` VALUES (38, 41, 100);
INSERT INTO `requirements` VALUES (53, 42, 103);
INSERT INTO `requirements` VALUES (44, 45, 110);
INSERT INTO `requirements` VALUES (37, 46, 99);
INSERT INTO `requirements` VALUES (40, 47, 102);
INSERT INTO `requirements` VALUES (26, 48, 85);
INSERT INTO `requirements` VALUES (43, 49, 106);
INSERT INTO `requirements` VALUES (45, 50, 111);
INSERT INTO `requirements` VALUES (46, 51, 113);
INSERT INTO `requirements` VALUES (41, 52, 104);
INSERT INTO `requirements` VALUES (47, 53, 115);
INSERT INTO `requirements` VALUES (48, 54, 104);
INSERT INTO `requirements` VALUES (54, 90, 122);
INSERT INTO `requirements` VALUES (55, 92, 123);
INSERT INTO `requirements` VALUES (57, 100, 125);
INSERT INTO `requirements` VALUES (56, 123, 124);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `roles_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`roles_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (0, 'visitante');
INSERT INTO `roles` VALUES (1, 'Alumno');
INSERT INTO `roles` VALUES (2, 'Docente');
INSERT INTO `roles` VALUES (3, 'Jefe departamento');
INSERT INTO `roles` VALUES (4, 'Decano');
INSERT INTO `roles` VALUES (5, 'administrador');

-- ----------------------------
-- Table structure for section
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section`  (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `by_order` int(255) NULL DEFAULT NULL,
  `status` int(255) NULL DEFAULT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`section_id`) USING BTREE,
  INDEX `roles_id`(`roles_id`) USING BTREE,
  CONSTRAINT `section_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES (1, 'counts-alumno', 1, 1, 1);
INSERT INTO `section` VALUES (2, 'header-theme-alumno', 2, 1, 1);
INSERT INTO `section` VALUES (3, 'modals-alumno', 3, 1, 1);
INSERT INTO `section` VALUES (4, 'reporte-alumno', 4, 1, 1);

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `student_id` int(1) NOT NULL AUTO_INCREMENT,
  `semester` int(11) NOT NULL,
  `pondered` double(8, 2) NOT NULL,
  `person_id` int(11) NOT NULL,
  `pensum_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`student_id`) USING BTREE,
  INDEX `pensum_id`(`pensum_id`) USING BTREE,
  INDEX `person_id`(`person_id`) USING BTREE,
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`pensum_id`) REFERENCES `pensums` (`pensum_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `students_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `persons` (`person_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (1, 6, 3.30, 1, 4, NULL, '2018-09-29 15:31:15');
INSERT INTO `students` VALUES (2, 6, 3.80, 2, 4, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `roles_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `roles_id`(`roles_id`) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '1063969856', '740342ff15876cb51de96a4bedafa61ae003496e78048ab0d52ffb909fdecd76', 'candrescastilla@unicesar.edu.co', 1, '', 1, '2018-09-25 00:12:17', '2018-10-19 20:28:14');
INSERT INTO `users` VALUES (2, '1067721000', '9693fd865a3102ba03054fdce133cf681fa509347056cca3e5f58e8d4249e4cc', 'sansandoval91@gmail.com', 1, '32323265363562306336613233393536', 1, NULL, '2018-10-01 17:08:24');

-- ----------------------------
-- Procedure structure for Selecciona
-- ----------------------------
DROP PROCEDURE IF EXISTS `Selecciona`;
delimiter ;;
CREATE PROCEDURE `Selecciona`(user_id int(11))
BEGIN

DECLARE c1 cursor for SELECT m.code, n.note, m.name FROM matters m
INNER JOIN notes n on  n.matter_id = m.matter_id
INNER JOIN students s on s.student_id = n.student_id
INNER JOIN persons p on p.person_id = s.person_id
WHERE p.user_id = 1 and n.note;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
