-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 04:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `captair`
--

-- --------------------------------------------------------

--
-- Table structure for table `capteurs`
--

CREATE TABLE `capteurs` (
  `id` text NOT NULL,
  `status` int(11) NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metro_line`
--

CREATE TABLE `metro_line` (
  `id_sql` int(11) NOT NULL,
  `ID` varchar(4) NOT NULL,
  `lien_logo` text NOT NULL,
  `hex_color` varchar(6) NOT NULL,
  `light_hex` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metro_line`
--

INSERT INTO `metro_line` (`id_sql`, `ID`, `lien_logo`, `hex_color`, `light_hex`) VALUES
(1, '14', 'https://upload.wikimedia.org/wikipedia/commons/9/93/Paris_transit_icons_-_M%C3%A9tro_14.svg', '62259D', 'E9DAF6'),
(2, '1', 'https://upload.wikimedia.org/wikipedia/commons/3/30/Paris_transit_icons_-_M%C3%A9tro_1.svg', 'FFCD00', 'FFF0B6'),
(4, '13', 'https://upload.wikimedia.org/wikipedia/commons/a/a9/Paris_transit_icons_-_M%C3%A9tro_13.svg', '6EC4E8', 'CBEAF7'),
(5, '12', 'https://upload.wikimedia.org/wikipedia/commons/3/3f/Paris_transit_icons_-_M%C3%A9tro_12.svg', '007852', '99c9ba'),
(6, '7bis', 'https://upload.wikimedia.org/wikipedia/commons/a/ad/Paris_transit_icons_-_M%C3%A9tro_7bis.svg', '82DC73', 'DCF5D7'),
(7, '6', 'https://upload.wikimedia.org/wikipedia/commons/6/6f/Paris_transit_icons_-_M%C3%A9tro_6.svg', '82DC73', 'DCF5D7'),
(8, '5', 'https://upload.wikimedia.org/wikipedia/commons/5/54/Paris_transit_icons_-_M%C3%A9tro_5.svg', 'FF5A00', 'FFC4A4'),
(9, '2', 'https://upload.wikimedia.org/wikipedia/commons/d/da/Paris_transit_icons_-_M%C3%A9tro_2.svg', '0055C8', 'A6CBFF'),
(10, '3', 'https://upload.wikimedia.org/wikipedia/commons/0/01/Paris_transit_icons_-_M%C3%A9tro_3.svg', '6E6E00', 'c5c599'),
(11, '4', 'https://upload.wikimedia.org/wikipedia/commons/7/76/Paris_transit_icons_-_M%C3%A9tro_4.svg', 'CF009E', 'FFBFF0'),
(12, '7', 'https://upload.wikimedia.org/wikipedia/commons/2/21/Paris_transit_icons_-_M%C3%A9tro_7.svg', 'FA9ABA', 'FEE9F0'),
(13, '8', 'https://upload.wikimedia.org/wikipedia/commons/e/e8/Paris_transit_icons_-_M%C3%A9tro_8.svg', 'E19BDF', 'F9EAF8'),
(14, '9', 'https://upload.wikimedia.org/wikipedia/commons/1/10/Paris_transit_icons_-_M%C3%A9tro_9.svg', 'B6BD00', 'E9EBB2'),
(15, '10', 'https://upload.wikimedia.org/wikipedia/commons/2/24/Paris_transit_icons_-_M%C3%A9tro_10.svg', 'C9910D', 'FAE4B0'),
(16, '11', 'https://upload.wikimedia.org/wikipedia/commons/c/c1/Paris_transit_icons_-_M%C3%A9tro_11.svg', '704B1C', 'F4E7D4'),
(17, '3bis', 'https://upload.wikimedia.org/wikipedia/commons/4/49/Paris_transit_icons_-_M%C3%A9tro_3bis.svg', '6EC4E8', 'CBEAF7');

-- --------------------------------------------------------

--
-- Table structure for table `onetimepasses`
--

CREATE TABLE `onetimepasses` (
  `id` int(11) NOT NULL,
  `token` varchar(36) NOT NULL,
  `utilisation` int(11) NOT NULL,
  `creation_time` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onetimepasses`
--

INSERT INTO `onetimepasses` (`id`, `token`, `utilisation`, `creation_time`, `account_id`) VALUES
(9, 'UNLkJJUyur1vChVk2pem0Phmqetg3J', 1, 8, 23),
(23, '9jtrhoJBtAlpHIcPX9TIr37saeUI3s', 0, 1667904102, 25),
(24, 'K6UIgIJIgiz30wp4tRMLDDKAxfATs8', 0, 1667904937, 26),
(25, 'He8SesYYKdo1IoVjTzUxwQjDzHKbav', 0, 1667905011, 27),
(26, 'NthU3o30vTgAfmrpWO5sd0RZ01mnLB', 0, 1667905078, 28),
(27, 'w8GgmIge3QbvyEOT4Ucad5TWwgz2zE', 0, 1667905146, 29),
(28, 'gI00qgRHil8NsVvzHAD6LfaRMYLuAF', 0, 1667905195, 30),
(30, 'Dty6pnDJYAdI2Aj5LgMVJVdyW1seZ9', 0, 1667905407, 32),
(31, 'arpjLX1RdPn9mDWymIuBWX84JxWrbT', 0, 1667905578, 33),
(32, 'Lk24P79FAN4dHwhkUZkRCBD2YRTXkH', 0, 1667920640, 31),
(33, 'AaFmrDrmYxbFeScvVppde9D6Nr1Ksr', 0, 1667920714, 34),
(35, 'XehQzxWIzBPmT08zZr7IlrKE9rjDRI', 0, 1668780013, 35),
(36, 'GbKrtcaUKJzoG7j0HBjXECXnOjTubc', 0, 1668780037, 1),
(37, 'uHXi7F9j0Bz0QtWLKicTuMV3LC2MTL', 1, 1669713528, 19);

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `ligne` varchar(5) NOT NULL,
  `nom` text NOT NULL,
  `ordre` int(11) NOT NULL,
  `branche` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `ligne`, `nom`, `ordre`, `branche`) VALUES
(1170, '1', 'GARE DE LYON', 19, ''),
(1171, '14', 'GARE DE LYON', 5, ''),
(1172, '2', 'BELLEVILLE', 19, ''),
(1173, '11', 'BELLEVILLE', 0, ''),
(1174, '3', 'OPERA', 12, ''),
(1175, '7', 'OPERA', 0, ''),
(1176, '8', 'OPERA', 0, ''),
(1177, '1', 'SAINT-MANDE-TOURELLE', 23, ''),
(1178, '5', 'HOCHE', 4, ''),
(1179, '6', 'BERCY', 23, ''),
(1180, '14', 'BERCY', 4, ''),
(1181, '6', 'DAUMESNIL', 25, ''),
(1182, '8', 'DAUMESNIL', 0, ''),
(1183, '13', 'SAINT-DENIS-UNIVERSITE', 0, ''),
(1184, '8', 'BALARD', 0, ''),
(1185, '3', 'PEREIRE', 5, ''),
(1186, '10', 'CHARLES MICHELS', 10, ''),
(1187, '2', 'COLONEL FABIEN', 18, ''),
(1188, '6', 'GLACIERE', 17, ''),
(1189, '8', 'RICHELIEU-DROUOT', 0, ''),
(1190, '9', 'RICHELIEU-DROUOT', 21, ''),
(1191, '2', 'MENILMONTANT', 21, ''),
(1192, '13', 'LES COURTILLES', 0, ''),
(1193, '13', 'PORTE DE SAINT-OUEN', 0, ''),
(1194, '7bis', 'PLACE DES FETES', 6, ''),
(1195, '11', 'PLACE DES FETES', 0, ''),
(1196, '11', 'PYRENEES', 0, ''),
(1197, '11', 'GONCOURT', 0, ''),
(1198, '8', 'FAIDHERBE-CHALIGNY', 0, ''),
(1199, '2', 'BLANCHE', 10, ''),
(1200, '8', 'CHARENTON-ECOLES', 0, ''),
(1201, '9', 'SAINT-AMBROISE', 27, ''),
(1202, '11', 'RAMBUTEAU', 0, ''),
(1203, '6', 'DUPLEIX', 7, ''),
(1204, '1', 'LOUVRE', 14, ''),
(1205, '7', 'CADET', 0, ''),
(1206, '6', 'QUAI DE LA GARE', 22, ''),
(1207, '4', 'ETIENNE MARCEL', 11, ''),
(1208, '8', 'MAISONS-ALFORT-STADE', 0, ''),
(1209, '8', 'CRETEIL-L\'ECHAT', 0, ''),
(1210, '9', 'IENA', 13, ''),
(1211, '6', 'CAMBRONNE', 9, ''),
(1212, '9', 'EXELMANS', 5, ''),
(1213, '6', 'BEL AIR', 26, ''),
(1214, '6', 'CORVISART', 18, ''),
(1215, '9', 'BUZENVAL', 32, ''),
(1216, '12', 'RUE DU BAC', 0, ''),
(1217, '8', 'MAISONS-ALFORT-LES JUILLIOTTES', 0, ''),
(1218, '10', 'MAUBERT-MUTUALITE', 21, ''),
(1219, '2', 'PHILIPPE AUGUSTE', 23, ''),
(1220, '6', 'SEVRES-LECOURBE', 10, ''),
(1221, '2', 'MONCEAU', 6, ''),
(1222, '10', 'CARDINAL LEMOINE', 22, ''),
(1223, '12', 'RENNES', 0, ''),
(1224, '10', 'VANEAU', 15, ''),
(1225, '6', 'KLEBER', 2, ''),
(1226, '7bis', 'BOTZARIS', 5, ''),
(1227, '7bis', 'BOLIVAR', 3, ''),
(1228, '10', 'EGLISE D\'AUTEUIL', 7, 'A'),
(1229, '4', 'MONTPARNASSE-BIENVENUE', 20, ''),
(1230, '6', 'MONTPARNASSE-BIENVENUE', 12, ''),
(1231, '12', 'MONTPARNASSE-BIENVENUE', 0, ''),
(1232, '13', 'MONTPARNASSE-BIENVENUE', 0, ''),
(1233, '4', 'LES HALLES', 12, ''),
(1234, '5', 'PLACE D\'ITALIE', 22, ''),
(1235, '6', 'PLACE D\'ITALIE', 19, ''),
(1236, '7', 'PLACE D\'ITALIE', 0, ''),
(1237, '4', 'STRASBOURG-SAINT-DENIS', 9, ''),
(1238, '8', 'STRASBOURG-SAINT-DENIS', 0, ''),
(1239, '9', 'STRASBOURG-SAINT-DENIS', 24, ''),
(1240, '4', 'CHATEAU ROUGE', 4, ''),
(1241, '4', 'PORTE DE CLIGNANCOURT', 1, ''),
(1242, '1', 'PORTE DE VINCENNES', 22, ''),
(1243, '8', 'MADELEINE', 0, ''),
(1244, '12', 'MADELEINE', 0, ''),
(1245, '14', 'MADELEINE', 8, ''),
(1246, '13', 'PORTE DE CLICHY', 0, ''),
(1247, '14', 'PORTE DE CLICHY', 11, ''),
(1248, '2', 'PLACE CLICHY', 9, ''),
(1249, '13', 'PLACE CLICHY', 0, ''),
(1250, '6', 'LA MOTTE-PICQUET-GRENELLE', 8, ''),
(1251, '8', 'LA MOTTE-PICQUET-GRENELLE', 0, ''),
(1252, '10', 'LA MOTTE-PICQUET-GRENELLE', 12, ''),
(1253, '2', 'LA CHAPELLE', 15, ''),
(1254, '4', 'MAIRIE DE MONTROUGE', 27, ''),
(1255, '7', 'CHAUSSEE D\'ANTIN-LA FAYETTE', 0, ''),
(1256, '9', 'CHAUSSEE D\'ANTIN-LA FAYETTE', 20, ''),
(1257, '4', 'PORTE D\'ORLEANS', 26, ''),
(1258, '1', 'PORTE MAILLOT', 5, ''),
(1259, '2', 'JAURES', 17, ''),
(1260, '5', 'JAURES', 8, ''),
(1261, '7bis', 'JAURES', 2, ''),
(1262, '3', 'GALLIENI', 26, ''),
(1263, '1', 'CHATEAU DE VINCENNES', 25, ''),
(1264, '3', 'REAUMUR-SEBASTOPOL', 17, ''),
(1265, '4', 'REAUMUR-SEBASTOPOL', 10, ''),
(1266, '9', 'PONT DE SEVRES', 1, ''),
(1267, '13', 'PORTE DE VANVES', 0, ''),
(1268, '10', 'SEVRES-BABYLONE', 16, ''),
(1269, '12', 'SEVRES-BABYLONE', 0, ''),
(1270, '5', 'PORTE DE PANTIN', 5, ''),
(1271, '9', 'PORTE DE MONTREUIL', 34, ''),
(1272, '9', 'LA MUETTE', 10, ''),
(1273, '14', 'COUR SAINT-EMILION', 3, ''),
(1274, '7', 'JUSSIEU', 0, ''),
(1275, '10', 'JUSSIEU', 23, ''),
(1276, '12', 'MAIRIE D\'ISSY', 0, ''),
(1277, '5', 'EGLISE DE PANTIN', 3, ''),
(1278, '8', 'BONNE NOUVELLE', 0, ''),
(1279, '9', 'BONNE NOUVELLE', 23, ''),
(1280, '6', 'CHEVALERET', 21, ''),
(1281, '9', 'CHARONNE', 29, ''),
(1282, '9', 'ALMA-MARCEAU', 14, ''),
(1283, '8', 'CRETEIL-UNIVERSITE', 0, ''),
(1284, '7', 'POISSONNIERE', 0, ''),
(1285, '7', 'TOLBIAC', 0, ''),
(1286, '8', 'ECOLE VETERINAIRE DE MAISONS-ALFORT', 0, ''),
(1287, '3', 'SENTIER', 16, ''),
(1288, '8', 'COMMERCE', 0, ''),
(1289, '13', 'PERNETY', 0, ''),
(1290, '7', 'VILLEJUIF-LEO LAGRANGE', 0, ''),
(1291, '9', 'SAINT-PHILIPPE-DU-ROULE', 16, ''),
(1292, '12', 'NOTRE-DAME-DE-LORETTE', 0, ''),
(1293, '6', 'DUGOMMIER', 24, ''),
(1294, '5', 'SAINT-MARCEL', 20, ''),
(1295, '7', 'PORTE DE CHOISY', 0, ''),
(1296, '7', 'RIQUET', 0, ''),
(1297, '5', 'RICHARD LENOIR', 15, ''),
(1298, '13', 'CARREFOUR PLEYEL', 0, ''),
(1299, '8', 'PORTE DE CHARENTON', 0, ''),
(1300, '6', 'EDGAR QUINET', 13, ''),
(1301, '2', 'AVRON', 25, ''),
(1302, '7', 'PORTE D\'IVRY', 0, ''),
(1303, '7', 'PONT NEUF', 0, ''),
(1304, '4', 'MOUTON-DUVERNET', 24, ''),
(1305, '7', 'PONT MARIE', 0, ''),
(1306, '7', 'PIERRE CURIE', 0, ''),
(1307, '8', 'FILLES DU CALVAIRE', 0, ''),
(1308, '8', 'CHEMIN VERT', 0, ''),
(1309, '6', 'PICPUS', 27, ''),
(1310, '3', 'TEMPLE', 19, ''),
(1311, '5', 'QUAI DE LA RAPEE', 18, ''),
(1312, '7bis', 'DANUBE', 8, ''),
(1313, '7bis', 'PRE-SAINT-GERVAIS', 7, ''),
(1314, '14', 'BIBLIOTHEQUE', 2, ''),
(1315, '1', 'CHATELET', 15, ''),
(1316, '4', 'CHATELET', 13, ''),
(1317, '7', 'CHATELET', 0, ''),
(1318, '11', 'CHATELET', 0, ''),
(1319, '14', 'CHATELET', 6, ''),
(1320, '5', 'BOBIGNY-PABLO PICASSO', 1, ''),
(1321, '5', 'GARE D\'AUSTERLITZ', 19, ''),
(1322, '10', 'GARE D\'AUSTERLITZ', 30, ''),
(1323, '3', 'HAVRE-CAUMARTIN', 11, ''),
(1324, '9', 'HAVRE-CAUMARTIN', 19, ''),
(1325, '7', 'AUBERVILLIERS-PANTIN-QUATRE CHEMINS', 0, ''),
(1326, '6', 'TROCADERO', 4, ''),
(1327, '9', 'TROCADERO', 12, ''),
(1328, '14', 'OLYMPIADES', 1, ''),
(1329, '2', 'STALINGRAD', 16, ''),
(1330, '5', 'STALINGRAD', 9, ''),
(1331, '7', 'STALINGRAD', 0, ''),
(1332, '7', 'LA COURNEUVE-8 MAI 1945', 0, ''),
(1333, '1', 'PONT DE NEUILLY', 3, ''),
(1334, '3', 'GAMBETTA', 24, ''),
(1335, '3bis', 'GAMBETTA', 4, ''),
(1336, '1', 'ESPLANADE DE LA DEFENSE', 2, ''),
(1337, '1', 'SAINT-PAUL', 17, ''),
(1338, '1', 'CHARLES DE GAULLE-ETOILE', 7, ''),
(1339, '2', 'CHARLES DE GAULLE-ETOILE', 3, ''),
(1340, '6', 'CHARLES DE GAULLE-ETOILE', 1, ''),
(1341, '1', 'LES SABLONS', 4, ''),
(1342, '13', 'GABRIEL PERI', 0, ''),
(1343, '4', 'SAINT-MICHEL', 15, ''),
(1344, '9', 'CROIX DE CHAVAUX', 36, ''),
(1345, '9', 'MIROMESNIL', 17, ''),
(1346, '13', 'MIROMESNIL', 0, ''),
(1347, '7', 'CRIMEE', 0, ''),
(1348, '8', 'INVALIDES', 0, ''),
(1349, '13', 'INVALIDES', 0, ''),
(1350, '2', 'PERE LACHAISE', 22, ''),
(1351, '3', 'PERE LACHAISE', 23, ''),
(1352, '9', 'VOLTAIRE', 28, ''),
(1353, '13', 'SAINT-DENIS-PORTE DE PARIS', 0, ''),
(1354, '12', 'PORTE DE VERSAILLES', 0, ''),
(1355, '9', 'ROBESPIERRE', 35, ''),
(1356, '10', 'DUROC', 14, ''),
(1357, '13', 'DUROC', 0, ''),
(1358, '12', 'VAUGIRARD', 0, ''),
(1359, '9', 'RUE DE LA POMPE', 11, ''),
(1360, '12', 'MARX DORMOY', 0, ''),
(1361, '4', 'SAINT-GERMAIN DES PRES', 17, ''),
(1362, '5', 'BOBIGNY-PANTIN-RAYMOND QUENEAU', 2, ''),
(1363, '8', 'BOUCICAUT', 0, ''),
(1364, '2', 'COURONNES', 20, ''),
(1365, '8', 'CRETEIL-POINTE DU LAC', 0, ''),
(1366, '2', 'PORTE DAUPHINE', 1, ''),
(1367, '3', 'SAINT-MAUR', 22, ''),
(1368, '12', 'FRONT POPULAIRE', 0, ''),
(1369, '12', 'PORTE DE LA CHAPELLE', 0, ''),
(1370, '7', 'PLACE MONGE', 0, ''),
(1371, '9', 'RUE DES BOULETS', 30, ''),
(1372, '5', 'JACQUES BONSERGENT', 12, ''),
(1373, '12', 'VOLONTAIRES', 0, ''),
(1374, '3', 'BOURSE', 14, ''),
(1375, '7', 'CORENTIN CARIOU', 0, ''),
(1376, '8', 'LOURMEL', 0, ''),
(1377, '2', 'ROME', 8, ''),
(1378, '7', 'LE PELETIER', 0, ''),
(1379, '13', 'GAITE', 0, ''),
(1380, '11', 'TELEGRAPHE', 0, ''),
(1381, '4', 'SAINT-SULPICE', 18, ''),
(1382, '7', 'LOUIS BLANC', 0, ''),
(1383, '7bis', 'LOUIS BLANC', 1, ''),
(1384, '13', 'BROCHANT', 0, ''),
(1385, '3', 'WAGRAM', 6, ''),
(1386, '9', 'JASMIN', 8, ''),
(1387, '12', 'SOLFERINO', 0, ''),
(1388, '13', 'SAINT-FRANCOIS-XAVIER', 0, ''),
(1389, '3', 'QUATRE-SEPTEMBRE', 13, ''),
(1390, '13', 'LIEGE', 0, ''),
(1391, '8', 'MONTGALLET', 0, ''),
(1392, '10', 'AVENUE EMILE ZOLA', 11, ''),
(1393, '10', 'MIRABEAU', 8, 'B'),
(1394, '12', 'FALGUIERE', 0, ''),
(1395, '10', 'CHARDON-LAGACHE', 6, 'B'),
(1396, '3', 'REPUBLIQUE', 20, ''),
(1397, '5', 'REPUBLIQUE', 13, ''),
(1398, '8', 'REPUBLIQUE', 0, ''),
(1399, '9', 'REPUBLIQUE', 25, ''),
(1400, '11', 'REPUBLIQUE', 0, ''),
(1401, '1', 'LA DEFENSE', 1, ''),
(1402, '1', 'HOTEL DE VILLE', 16, ''),
(1403, '11', 'HOTEL DE VILLE', 0, ''),
(1404, '7', 'VILLEJUIF-LOUIS ARAGON', 0, ''),
(1405, '1', 'PALAIS-ROYAL', 13, ''),
(1406, '7', 'PALAIS-ROYAL', 0, ''),
(1407, '13', 'BASILIQUE DE SAINT-DENIS', 0, ''),
(1408, '13', 'PLAISANCE', 0, ''),
(1409, '4', 'ODEON', 16, ''),
(1410, '10', 'ODEON', 18, ''),
(1411, '1', 'CONCORDE', 11, ''),
(1412, '8', 'CONCORDE', 0, ''),
(1413, '12', 'CONCORDE', 0, ''),
(1414, '8', 'CRETEIL-PREFECTURE', 0, ''),
(1415, '5', 'LAUMIERE', 7, ''),
(1416, '5', 'OBERKAMPF', 14, ''),
(1417, '9', 'OBERKAMPF', 26, ''),
(1418, '7', 'FORT D\'AUBERVILLIERS', 0, ''),
(1419, '4', 'ALESIA', 25, ''),
(1420, '3', 'PORTE DE BAGNOLET', 25, ''),
(1421, '6', 'PASTEUR', 11, ''),
(1422, '12', 'PASTEUR', 0, ''),
(1423, '11', 'MAIRIE DES LILAS', 0, ''),
(1424, '5', 'OURCQ', 6, ''),
(1425, '8', 'ECOLE MILITAIRE', 0, ''),
(1426, '2', 'VICTOR HUGO', 2, ''),
(1427, '7', 'PORTE DE LA VILLETTE', 0, ''),
(1428, '10', 'BOULOGNE-JEAN JAURES', 2, ''),
(1429, '8', 'LEDRU-ROLLIN', 0, ''),
(1430, '2', 'ALEXANDRE DUMAS', 24, ''),
(1431, '4', 'SAINT-PLACIDE', 19, ''),
(1432, '3', 'LOUISE MICHEL', 3, ''),
(1433, '7', 'CENSIER-DAUBENTON', 0, ''),
(1434, '13', 'MALAKOFF-PLATEAU DE VANVES', 0, ''),
(1435, '13', 'GUY MOQUET', 0, ''),
(1436, '10', 'BOULOGNE-PONT DE SAINT-CLOUD', 1, ''),
(1437, '1', 'ARGENTINE', 6, ''),
(1438, '4', 'SIMPLON', 2, ''),
(1439, '9', 'SAINT-AUGUSTIN', 18, ''),
(1440, '8', 'PORTE DOREE', 0, ''),
(1441, '1', 'CHAMPS-ELYSEES-CLEMENCEAU', 10, ''),
(1442, '13', 'CHAMPS-ELYSEES-CLEMENCEAU', 0, ''),
(1443, '13', 'LES AGNETTES', 0, ''),
(1444, '1', 'TUILERIES', 12, ''),
(1445, '13', 'LA FOURCHE', 0, ''),
(1446, '12', 'ABBESSES', 0, ''),
(1447, '3', 'MALESHERBES', 7, ''),
(1448, '10', 'CLUNY LA SORBONNE', 20, ''),
(1449, '4', 'RASPAIL', 22, ''),
(1450, '6', 'RASPAIL', 14, ''),
(1451, '6', 'BOISSIERE', 3, ''),
(1452, '10', 'MABILLON', 17, ''),
(1453, '8', 'SAINT-SEBASTIEN-FROISSART', 0, ''),
(1454, '10', 'SEGUR', 13, ''),
(1455, '12', 'TRINITE-D\'ESTIENNE D\'ORVES', 0, ''),
(1456, '4', 'CITE', 14, ''),
(1457, '13', 'VARENNE', 0, ''),
(1458, '12', 'SAINT-GEORGES', 0, ''),
(1459, '12', 'ASSEMBLEE NATIONALE', 0, ''),
(1460, '7bis', 'BUTTES-CHAUMONT', 4, ''),
(1461, '3bis', 'PELLEPORT', 3, ''),
(1462, '4', 'GARE DU NORD', 6, ''),
(1463, '5', 'GARE DU NORD', 10, ''),
(1464, '3', 'SAINT-LAZARE', 10, ''),
(1466, '12', 'SAINT-LAZARE', 0, ''),
(1467, '13', 'SAINT-LAZARE', 0, ''),
(1468, '14', 'SAINT-LAZARE', 9, ''),
(1469, '4', 'GARE DE L\'EST', 7, ''),
(1470, '5', 'GARE DE L\'EST', 11, ''),
(1471, '7', 'GARE DE L\'EST', 0, ''),
(1472, '1', 'BASTILLE', 18, ''),
(1473, '5', 'BASTILLE', 17, ''),
(1474, '8', 'BASTILLE', 0, ''),
(1475, '1', 'FRANKLIN D. ROOSEVELT', 9, ''),
(1476, '9', 'FRANKLIN D. ROOSEVELT', 15, ''),
(1477, '9', 'MAIRIE DE MONTREUIL', 38, ''),
(1478, '1', 'NATION', 21, ''),
(1479, '2', 'NATION', 26, ''),
(1480, '6', 'NATION', 28, ''),
(1481, '9', 'NATION', 31, ''),
(1482, '2', 'BARBES-ROCHECHOUART', 14, ''),
(1483, '4', 'BARBES-ROCHECHOUART', 5, ''),
(1484, '13', 'CHATILLON-MONTROUGE', 0, ''),
(1485, '13', 'MAIRIE DE SAINT-OUEN', 0, ''),
(1486, '14', 'MAIRIE DE SAINT-OUEN', 13, ''),
(1487, '1', 'REUILLY-DIDEROT', 20, ''),
(1488, '8', 'REUILLY-DIDEROT', 0, ''),
(1489, '14', 'PONT CARDINET', 10, ''),
(1490, '13', 'MAIRIE DE CLICHY', 0, ''),
(1491, '4', 'MARCADET-POISSONNIERS', 3, ''),
(1492, '12', 'MARCADET-POISSONNIERS', 0, ''),
(1493, '7', 'PYRAMIDES', 0, ''),
(1494, '14', 'PYRAMIDES', 7, ''),
(1495, '9', 'MARCEL SEMBAT', 3, ''),
(1496, '1', 'GEORGE V', 8, ''),
(1497, '8', 'GRANDS BOULEVARDS', 0, ''),
(1498, '9', 'GRANDS BOULEVARDS', 22, ''),
(1499, '12', 'CONVENTION', 0, ''),
(1500, '2', 'VILLIERS', 7, ''),
(1501, '3', 'VILLIERS', 8, ''),
(1502, '2', 'PIGALLE', 11, ''),
(1503, '12', 'PIGALLE', 0, ''),
(1504, '9', 'PORTE DE SAINT-CLOUD', 4, ''),
(1505, '14', 'CLICHY SAINT-OUEN', 12, ''),
(1506, '2', 'ANVERS', 12, ''),
(1507, '6', 'BIR-HAKEIM', 6, ''),
(1508, '3bis', 'PORTE DES LILAS', 1, ''),
(1509, '11', 'PORTE DES LILAS', 0, ''),
(1510, '3', 'PONT DE LEVALLOIS-BECON', 1, ''),
(1511, '7', 'LE KREMLIN-BICETRE', 0, ''),
(1512, '12', 'JULES JOFFRIN', 0, ''),
(1513, '4', 'CHATEAU D\'EAU', 8, ''),
(1514, '4', 'DENFERT-ROCHEREAU', 23, ''),
(1515, '6', 'DENFERT-ROCHEREAU', 15, ''),
(1516, '12', 'CORENTIN CELTON', 0, ''),
(1517, '3', 'ARTS ET METIERS', 18, ''),
(1518, '11', 'ARTS ET METIERS', 0, ''),
(1519, '7', 'LES GOBELINS', 0, ''),
(1520, '3', 'ANATOLE FRANCE', 2, ''),
(1521, '2', 'TERNES', 4, ''),
(1522, '1', 'BERAULT', 24, ''),
(1523, '3', 'PORTE DE CHAMPERRET', 4, ''),
(1524, '6', 'PASSY', 5, ''),
(1525, '7', 'MAIRIE D\'IVRY', 0, ''),
(1526, '3', 'PARMENTIER', 21, ''),
(1527, '9', 'MARAICHERS', 33, ''),
(1528, '9', 'BILLANCOURT', 2, ''),
(1529, '13', 'GARIBALDI', 0, ''),
(1530, '11', 'JOURDAIN', 0, ''),
(1531, '12', 'LAMARCK-CAULAINCOURT', 0, ''),
(1532, '9', 'RANELAGH', 9, ''),
(1533, '7', 'VILLEJUIF-PAUL VAILLANT-COUTURIER', 0, ''),
(1534, '8', 'LIBERTE', 0, ''),
(1535, '10', 'JAVEL-ANDRE CITROEN', 9, ''),
(1536, '2', 'COURCELLES', 5, ''),
(1537, '2', 'FUNICULAIRE', 13, ''),
(1538, '9', 'MICHEL-ANGE-AUTEUIL', 7, ''),
(1539, '10', 'MICHEL-ANGE-AUTEUIL', 5, 'A'),
(1540, '7', 'PORTE D\'ITALIE', 0, ''),
(1541, '5', 'BREGUET-SABIN', 16, ''),
(1542, '12', 'NOTRE-DAME-DES-CHAMPS', 0, ''),
(1543, '13', 'MALAKOFF-RUE ETIENNE DOLET', 0, ''),
(1544, '9', 'MICHEL-ANGE-MOLITOR', 6, ''),
(1545, '10', 'MICHEL-ANGE-MOLITOR', 4, 'B'),
(1546, '6', 'SAINT-JACQUES', 16, ''),
(1547, '8', 'MICHEL BIZOT', 0, ''),
(1548, '8', 'LA TOUR-MAUBOURG', 0, ''),
(1549, '4', 'VAVIN', 21, ''),
(1550, '6', 'NATIONALE', 20, ''),
(1551, '7', 'MAISON BLANCHE', 0, ''),
(1552, '8', 'FELIX FAURE', 0, ''),
(1553, '7', 'CHATEAU-LANDON', 0, ''),
(1554, '7', 'SULLY-MORLAND', 0, ''),
(1555, '3', 'EUROPE', 9, ''),
(1556, '5', 'CAMPO-FORMIO', 21, ''),
(1557, '3bis', 'SAINT-FARGEAU', 2, ''),
(1558, '10', 'PORTE D\'AUTEUIL', 3, 'A'),
(1559, '4', 'BARBARA', 28, ''),
(1560, '4', 'BAGNEUX LUCIE AUBRAC', 29, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `creation` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `creation`, `nom`, `prenom`, `verified`) VALUES
(1, 'potate@captair.paris', '$2y$10$Lv76zGhAGk/I5GetxTYohOpf2DpZED5RrObQLpTzfFkKVByabKLyO', '2022-11-04 19:21:38', 'Tardieu', 'Maxime', 0),
(12, 'dd@gg.com', '$2y$10$nNO4Lxh/UbQimOwfQZ5ZA.bb7J4kDj6Z6vX/HKSw4JefmX7d9wgTG', '2022-11-05 00:29:53', 'Tardieu', 'Maxime', 0),
(13, 'ff@dd.com', '$2y$10$vc0qvlnX3NKcn6yKbmtGmenkIIOB.a0pWVjqcxC5US7uP.gogtjJO', '2022-11-05 00:31:21', 'Tardieu', 'Maxime', 0),
(14, 'll@jj.com', '$2y$10$o/lx7QBOEjE3ttC5sUUs0un5uiP2prOGfniYtlX95CwHbDvaNuHaS', '2022-11-05 00:31:55', 'Tardieu', 'Maxime', 0),
(15, 'kk@hgg.com', '$2y$10$sF1cNxqvekWGuEOVavGR1eZS7UO.1po15DU2gTbTuZIyq3WQN.3xC', '2022-11-05 00:32:20', 'd', 'd', 1),
(19, 'maxime.tardieu@gmail.com', '$2y$10$sMcTS3dm9J1hHNj7mhNPF..8ZaM2mXh68oYunhZ7PSDQlcOZ./sTi', '2022-11-05 01:03:18', 'Tardieu', 'Maxime', 1),
(21, 'hugodauger2@gmail.com', '$2y$10$.DT2RMXWQk3lrlyu6RI1L.tnPIzqLKY1UGM7GtWFFJvfSagXjpFIK', '2022-11-07 10:59:35', 'hugo', 'dauger', 0),
(24, 'mata61382@eleve.isep.fr', '$2y$10$ncYc7FqrjBQjKusftHc3peoDApDODaXxSaqEBY6a0bOLqbdfBWODK', '2022-11-08 10:27:17', 'Tardieu', 'Maxime', 1),
(31, 'contact@captair.paris', '$2y$10$RiIOQ7gZuWMv8kFTWKJz0erFtbUmqSBfFvkxiMXyKXP6ImHK6MmWC', '2022-11-08 12:02:54', 'Tardieu', 'Maxime', 1),
(33, 'smansteelyt@gmail.com', '$2y$10$kaxTPKah8V485/Ln.uaB/.8w.3UFpx7tFQwVZqIObWYmXySNRIwUG', '2022-11-08 12:06:18', 'Tardieu', 'Maxime', 0),
(34, 'alexjosephantoine@gmail.com', '$2y$10$F6USVTnJmx907awIurPWMOeuF0UAFV8lCckjnzvWTLh0zGkEp/k32', '2022-11-08 16:18:34', 'Tardieu', 'Maxime', 1),
(35, 'axeljosephantoine@gmail.com', '$2y$10$4.cEWXi2eFjGopxlg69KbuWFGEpoWXyHjcKFn1rPU92KEDcEo/avO', '2022-11-08 16:19:33', 'Tardieu', 'Maxime', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `metro_line`
--
ALTER TABLE `metro_line`
  ADD PRIMARY KEY (`id_sql`);

--
-- Indexes for table `onetimepasses`
--
ALTER TABLE `onetimepasses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `metro_line`
--
ALTER TABLE `metro_line`
  MODIFY `id_sql` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `onetimepasses`
--
ALTER TABLE `onetimepasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1561;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
