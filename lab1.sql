-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 11:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab1`
--

-- --------------------------------------------------------

--
-- Table structure for table `autorius`
--

CREATE TABLE `autorius` (
  `id_Autorius` int(11) NOT NULL,
  `Vardas` varchar(255) NOT NULL,
  `Pavarde` varchar(255) NOT NULL,
  `Gimimo_data` varchar(255) NOT NULL,
  `Issilavinimas` varchar(255) DEFAULT NULL,
  `Kilmes_salis` varchar(255) NOT NULL,
  `Pasiekimai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autorius`
--

INSERT INTO `autorius` (`id_Autorius`, `Vardas`, `Pavarde`, `Gimimo_data`, `Issilavinimas`, `Kilmes_salis`, `Pasiekimai`) VALUES
(1, 'Marius', 'White', '1998-02-23', 'pedagogas', 'JAV', '\"New York Times\" bestseller'),
(2, 'Tomas', 'Jerry', '1968-03-20', 'pedagogas', 'JAV', '\"New York Times\" bestseller'),
(3, 'Martynas', 'Maraitis', '1968-03-20', 'fotografas', 'Lietuva', NULL),
(4, 'Martynas', 'White', '1998-02-23', 'prozininkas', 'JAV', 'Rašytojų sąjungos premija'),
(5, 'Tomas', 'Pranaitis', '1965-05-21', 'pedagogas', 'Lietuva', 'Rašytojų sąjungos premija'),
(6, 'Tom', 'White', '1968-03-20', 'fotografas', 'JAV', '\"New York Times\" bestseller'),
(7, 'Ignas', 'Maraitis', '1989-06-22', 'filosofas', 'Lietuva', NULL),
(8, 'Rokas', 'Vaitkus', '1998-02-23', 'fotografas', 'Lietuva', NULL),
(9, 'Agnė', 'Gilytė', '1968-05-12', 'pedagogė', 'Lietuva', NULL),
(10, 'Steve', 'King', '1965-05-21', 'prozininkas', 'Italija', '\"New York Times\" bestseller'),
(11, 'Tomas', 'Pavardaitis', '1989-06-22', 'filosofas', 'Lietuva', 'Astrid Lindgren premija'),
(12, 'Tomas', 'King', '1968-03-20', 'prozininkas', 'JAV', NULL),
(13, 'Ignas', 'Valaitis', '1989-06-22', 'pedagogas', 'Lietuva', 'Astrid Lindgren premija'),
(14, 'Marius', 'Grigaliunas', '1998-02-23', 'pedagogas', 'JAV', 'Astrid Lindgren premija'),
(15, 'Steve', 'King', '1968-03-20', 'pedagogas', 'Italija', '\"New York Times\" bestseller'),
(16, 'Mike', 'King', '1989-06-22', 'prozininkas', 'Lietuva', '\"New York Times\" bestseller'),
(17, 'Ignas', 'King', '1968-03-20', 'pedagogas', 'Lietuva', 'Astrid Lindgren premija'),
(18, 'Martynas', 'Grigaliūnas', '1968-05-12', 'filosofas', 'Italija', NULL),
(19, 'Vilius', 'White', '1998-02-23', 'prozininkas', 'JAV', NULL),
(20, 'Rokas', 'King', '1999-02-15', 'prozininkas', 'JAV', '\"New York Times\" bestseller');

-- --------------------------------------------------------

--
-- Table structure for table `darbuotojas`
--

CREATE TABLE `darbuotojas` (
  `id_Darbuotojas` int(11) NOT NULL,
  `Vardas` varchar(255) NOT NULL,
  `Pavarde` varchar(255) NOT NULL,
  `Pareigos` varchar(255) NOT NULL,
  `fk_Parduotuveid_Parduotuve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `darbuotojas`
--

INSERT INTO `darbuotojas` (`id_Darbuotojas`, `Vardas`, `Pavarde`, `Pareigos`, `fk_Parduotuveid_Parduotuve`) VALUES
(1, 'Genny', 'Shakshaft', 'konsultantas', 3),
(2, 'Daloris', 'Denkin', 'konsultantas', 1),
(3, 'Westley', 'Buckett', 'salės darbuotojas', 2),
(4, 'Courtney', 'Gilson', 'salės darbuotojas', 4),
(5, 'Desiree', 'Ragbourn', 'salės darbuotojas', 7),
(6, 'Tiphanie', 'Tole', 'salės darbuotojas', 6),
(7, 'Abdel', 'Healeas', 'salės darbuotojas', 5),
(8, 'Lauren', 'Symson', 'konsultantas', 8),
(9, 'Neddie', 'Springtorpe', 'salės darbuotojas', 9),
(10, 'Janeva', 'Avann', 'salės darbuotojas', 10),
(11, 'Ulysses', 'Mash', 'konsultantas', 11),
(12, 'Marlene', 'Snar', 'salės darbuotojas', 14),
(13, 'Jude', 'Isacq', 'salės darbuotojas', 13),
(14, 'Gonzalo', 'Hefferan', 'salės darbuotojas', 12),
(15, 'Silvain', 'Shilito', 'salės darbuotojas', 15),
(16, 'Norton', 'Huddle', 'salės darbuotojas', 18),
(17, 'Munroe', 'Ingles', 'salės darbuotojas', 20),
(18, 'Noak', 'Schafer', 'salės darbuotojas', 19),
(19, 'Cariotta', 'Locket', 'salės darbuotojas', 16),
(20, 'Vladimir', 'Ouldcott', 'salės darbuotojas', 17);

-- --------------------------------------------------------

--
-- Table structure for table `formatas`
--

CREATE TABLE `formatas` (
  `id_Formatas` int(11) NOT NULL,
  `Virselio_tipas` varchar(255) NOT NULL,
  `Virselio_spalva` varchar(255) NOT NULL,
  `Ismatavimai` varchar(255) NOT NULL,
  `Puslapiu_sk` int(11) NOT NULL,
  `Srifto_stilius` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formatas`
--

INSERT INTO `formatas` (`id_Formatas`, `Virselio_tipas`, `Virselio_spalva`, `Ismatavimai`, `Puslapiu_sk`, `Srifto_stilius`) VALUES
(1, 'kietas', 'įvairiaspalvė', '13.34 × 20.96 cm', 550, 'Caslon'),
(2, 'kietas', 'įvairiaspalvė', '13.34 × 20.96 cm', 456, 'Sabon'),
(3, 'kietas', 'įvairiaspalvė', '13.34 × 20.96 cm', 600, 'Baskerville'),
(4, 'minkštas', 'geltona', '12.70 × 20.32 cm', 456, 'Utopia'),
(5, 'minkštas', 'įvairiaspalvė', '13.34 × 20.96 cm', 456, 'Sabon'),
(6, 'kietas', 'violetinė', '13.34 × 20.96 cm', 600, 'Garamond'),
(7, 'kietas su aplanku', 'įvairiaspalvė', '13.34 × 20.96 cm', 600, 'Sabon'),
(8, 'kietas', 'įvairiaspalvė', '13.34 × 20.96 cm', 1000, 'Sabon'),
(9, 'minkštas', 'įvairiaspalvė', '13.34 × 20.96 cm', 550, 'Sabon'),
(10, 'kietas su aplanku', 'įvairiaspalvė', '13.34 × 20.96 cm', 250, 'Modelica'),
(11, 'kietas su aplanku', 'įvairiaspalvė', '13.34 × 20.96 cm', 456, 'Garamond'),
(12, 'kietas', 'įvairiaspalvė', '13.34 × 20.96 cm', 500, 'Utopia'),
(13, 'kietas su aplanku', 'raudona', '12.70 × 20.32 cm', 500, 'Sabon'),
(14, 'minkštas', 'mėlyna', '13.34 × 20.96 cm', 456, 'Modelica'),
(15, 'minkštas', 'raudona', '13.34 × 20.96 cm', 456, 'Modelica'),
(16, 'kietas su aplanku', 'įvairiaspalvė', '12.70 × 20.32 cm', 600, 'Sabon'),
(17, 'minkštas', 'raudona', '13.34 × 20.96 cm', 1000, 'Caslon'),
(18, 'minkštas', 'įvairiaspalvė', '13.34 × 20.96 cm', 456, 'Sabon'),
(19, 'kietas', 'įvairiaspalvė', '13.34 × 20.96 cm', 600, 'Sabon'),
(20, 'minkštas', 'įvairiaspalvė', '12.70 × 20.32 cm', 600, 'Caslon');

-- --------------------------------------------------------

--
-- Table structure for table `knyga`
--

CREATE TABLE `knyga` (
  `id_Knyga` int(11) NOT NULL,
  `Pavadinimas` varchar(255) NOT NULL,
  `Isleidimo_metai` int(11) NOT NULL,
  `Zanras` varchar(255) NOT NULL,
  `Kalba` varchar(255) NOT NULL,
  `Ivertinimas` double NOT NULL,
  `ISBN` int(11) NOT NULL,
  `Literaturos_rusis` varchar(255) NOT NULL,
  `Funkcinis_stilius` varchar(255) NOT NULL,
  `fk_Parduotuveid_Parduotuve` int(11) NOT NULL,
  `fk_Formatasid_Formatas` int(11) NOT NULL,
  `fk_Autoriusid_Autorius` int(11) NOT NULL,
  `fk_Serijaid_Serija` int(11) DEFAULT NULL,
  `fk_Leidyklaid_Leidykla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `knyga`
--

INSERT INTO `knyga` (`id_Knyga`, `Pavadinimas`, `Isleidimo_metai`, `Zanras`, `Kalba`, `Ivertinimas`, `ISBN`, `Literaturos_rusis`, `Funkcinis_stilius`, `fk_Parduotuveid_Parduotuve`, `fk_Formatasid_Formatas`, `fk_Autoriusid_Autorius`, `fk_Serijaid_Serija`, `fk_Leidyklaid_Leidykla`) VALUES
(1, 'Veidas', 2015, 'biografija', 'anglų', 2.51, 141373379, 'epika', 'meninė', 19, 19, 15, 18, 15),
(2, 'Rožė', 2019, 'fantastika', 'rusų', 7.73, 424670096, 'epika', 'meninė', 15, 5, 7, 7, 14),
(3, 'Kūryba', 2019, 'detektyvas', 'anglų', 9.51, 584518364, 'epika', 'grožinė', 16, 5, 8, 4, 2),
(4, 'Jūros', 2000, 'biografija', 'rusų', 8.65, 693636914, 'romanas', 'grožinė', 16, 16, 4, 18, 16),
(5, 'Žemė', 2010, 'drama', 'rusų', 5.91, 865266637, 'epas', 'grožinė', 6, 18, 12, 19, 2),
(6, 'Upės', 2015, 'siaubo', 'lietuvių', 1.91, 936520858, 'epas', 'grožinė', 18, 9, 14, 1, 8),
(7, 'Trylika', 2015, 'detektyvas', 'anglų', 9.03, 535363220, 'epas', 'mokomoji', 8, 6, 8, NULL, 13),
(8, 'Trylika', 2000, 'fantastika', 'lietuvių', 3.48, 620247145, 'romanas', 'grožinė', 14, 13, 17, 14, 16),
(9, 'Trylika', 2020, 'siaubo', 'lietuvių', 7.73, 863484292, 'romanas', 'meninė', 2, 19, 17, 5, 10),
(10, 'Veidas', 2015, 'biografija', 'rusų', 8.29, 911520472, 'lyrika', 'komiksai', 15, 14, 13, 20, 14),
(11, 'Veidas', 2020, 'detektyvas', 'rusų', 3.29, 211413040, 'epika', 'meninė', 7, 13, 16, 8, 9),
(12, 'Kūryba', 2010, 'detektyvas', 'anglų', 5.18, 23693786, 'lyrika', 'meninė', 15, 18, 9, 3, 7),
(13, 'Upės', 2000, 'siaubo', 'rusų', 6.19, 559040784, 'epas', 'mokomoji', 2, 12, 12, 9, 14),
(14, 'Upės', 2015, 'siaubo', 'rusų', 1.03, 782638891, 'romanas', 'grožinė', 18, 1, 7, 5, 9),
(15, 'Rožė', 2000, 'drama', 'anglų', 2.32, 365898986, 'lyrika', 'meninė', 17, 5, 15, NULL, 12),
(16, 'Rankos', 2020, 'detektyvas', 'rusų', 2.69, 559716065, 'epika', 'grožinė', 6, 9, 8, 7, 15),
(17, 'Veidas', 2016, 'fantastika', 'rusų', 6.29, 202368539, 'lyrika', 'meninė', 6, 10, 8, 19, 16),
(18, 'Aplinka', 2019, 'fantastika', 'lietuvių', 6.93, 37283192, 'romanas', 'komiksai', 7, 8, 9, 20, 16),
(19, 'Veidas', 2020, 'fantastika', 'rusų', 1.03, 785216472, 'epika', 'meninė', 4, 5, 14, 16, 12),
(20, 'Žemė', 2000, 'drama', 'anglų', 2.69, 450364831, 'romanas', 'komiksai', 14, 16, 4, 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `leidykla`
--

CREATE TABLE `leidykla` (
  `id_Leidykla` int(11) NOT NULL,
  `Pavadinimas` varchar(255) NOT NULL,
  `Adresas` varchar(255) NOT NULL,
  `Darbo_laikas` varchar(255) NOT NULL,
  `Kontaktinis_numeris` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leidykla`
--

INSERT INTO `leidykla` (`id_Leidykla`, `Pavadinimas`, `Adresas`, `Darbo_laikas`, `Kontaktinis_numeris`) VALUES
(1, 'Abigailė', 'Utena Smilities g. 18', 'I-V 07-18, VI-VII 10-16', 865446361),
(2, 'Diremta', 'Vilnius Šiaulių g. 40', 'I-V 07-18, VI-VII 10-17', 864952375),
(3, 'Diremta', 'Utena Smilties g. 18', 'I-V 07-18, VI-VII 10-17', 866852234),
(4, 'Agora', 'Vilnius Verkių g. 40', 'I-V 07-18, VI-VII 10-17', 866852234),
(5, 'Diremta', 'Utena Klaipėdos g. 18', 'I-V 07-18, VI-VII 10-16', 865446361),
(6, 'Aidai', 'Vilnius Centro g. 40', 'I-V 08-18, VI-VII 10-17', 865923455),
(7, 'Alma literra', 'Kaunas Jurbarko g. 30', 'I-V 07-18, VI-VII 10-17', 866852234),
(8, 'Green prints', 'Klaipėda Smilties g. 18', 'I-V 07-18, VI-VII 10-17', 865446361),
(9, 'Alma literra', 'Kaunas Partizanų g. 30', 'I-V 07-18, VI-VII 10-17', 864952374),
(10, 'Alma literra', 'Vilnius Vokiečiu g. 40', 'I-V 07-18, VI-VII 10-17', 864952374),
(11, 'Juoda leidykla', 'Klaipėda Turgaus g. 30', 'I-V 09-18', 865422731),
(12, 'Agora', 'Klaipėda Turgaus g. 18', 'I-V 07-18', 866852234),
(13, 'Green prints', 'Alytus Trakų g. 19', 'I-V 09-18, VI-VII 10-17', 865545755),
(14, 'Agora', 'Kaunas Varnių g. 40', 'I-V 07-18, VI-VII 10-17', 864952371),
(15, 'Green prints', 'Utena Gervių g. 18', 'I-V 07-18', 865923451),
(16, 'Abigailė', 'Kaunas Vilniaus g. 30', 'I-V 07-18', 86592345),
(17, 'Abigailė', 'Kaunas Laisvės al. 18', 'I-V 07-18, VI-VII 10-16', 86899565),
(18, 'Agora', 'Šiauliai Saulės g. 12', 'I-V 07-18, VI-VII 10-16', 86495237),
(19, 'Juoda leidykla', 'Kaunas Baltų pr. 30', 'I-V 07-18, VI-VII 10-17', 86542273),
(20, 'Abigailė', 'Utena Partizanų g. 18', 'I-V 07-18, VI-VII 10-16', 86554575);

-- --------------------------------------------------------

--
-- Table structure for table `parduotuve`
--

CREATE TABLE `parduotuve` (
  `id_Parduotuve` int(11) NOT NULL,
  `Pavadinimas` varchar(255) NOT NULL,
  `Tinklapis` varchar(255) NOT NULL,
  `Adresas` varchar(255) NOT NULL,
  `Telefono_numeris` int(11) NOT NULL,
  `Elektroninis_pastas` varchar(255) NOT NULL,
  `Darbo_laikas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parduotuve`
--

INSERT INTO `parduotuve` (`id_Parduotuve`, `Pavadinimas`, `Tinklapis`, `Adresas`, `Telefono_numeris`, `Elektroninis_pastas`, `Darbo_laikas`) VALUES
(1, 'Vaga', 'www.Pegasas.lt', 'Vilniaus Gervių g. 10', 2147483647, 'vaga@vaga.lt', 'I-V 09-19. VI-VII 10-17'),
(2, 'Obuolys', 'www.Obuolys.lt', 'Kaunas, Vilniaus g. 5', 2147483647, 'obuolys@obuolys.lt', 'I-V 09-18. VI-VII 10-16'),
(3, 'Knygos', 'www.Knygos.lt', 'Klaipėda, Užupio g. 10', 2147483647, 'obuolys@obuolys.lt', 'I-V 09-19. VI-VII 10-17'),
(4, 'Books', 'www.Books.lt', 'Vilnius, Trakų g. 11', 2147483647, 'books@obuolys.lt', 'I-V 09-19. VI-VII 10-17'),
(5, 'Pegasas', 'www.Pegasas.lt', 'Klaipėda, Jūros g. 15', 2147483647, 'pegasas@pegasas.lt', 'I-V 09-18. VI-VII 10-16'),
(6, 'Pegasas', 'www.Pegasas.lt', 'Panevėžys, Jūrų g. 18', 906749506, 'pegasas@pegasas.lt', 'I-V 09-18. VI-VII 10-16'),
(7, 'Knyga', 'www.Knyga.lt', 'Vilnius, Verkių g. 1', 2147483647, 'Knyga@pegalas.lt', 'I-V 09-18. VI-VII 11-14'),
(8, 'Vaga', 'www.Vaga.lt', 'Elektrėnai Elektros g. 20', 2147483647, 'Vaga@vaga.lt', 'I-V 09-19. VI-VII 10-17'),
(9, 'Obuolys', 'www.Obuolys.lt', 'Panevėžys, Mūrų g. 18', 2147483647, 'obuolys@obuolys.lt', 'I-V 09-18. VI-VII 10-16'),
(10, 'Knygynas', 'www.Knygynas.lt', 'Vilnius, Namų g. 13', 2147483647, 'knygynass@obuolys.lt', 'I-V 09-18. VI-VII 10-16'),
(11, 'Knygynas', 'www.Knygynas.lt', 'Ukmergė, Šalių g. 20', 2147483647, 'knygynas@obuolys.lt', 'I-V 09-19. VI-VII 10-17'),
(12, 'Obuolys', 'www.Obuolys.lt', 'Vilnius, Kauno g. 18', 2147483647, 'obuolys@obuolys.lt', 'I-V 09-18. VI-VII 11-14'),
(13, 'Obuolys', 'www.Obuolys.lt', 'Jurbarkas, Centro g. 10', 2147483647, 'obuolys@obuolys.lt', 'I-V 09-18. VI-VII 11-14'),
(14, 'Knygynas', 'www.Knygynas.lt', 'Utena, Verkių g. 11', 355374072, 'Knygynas@obuolys.lt', 'I-V 09-19. VI-VII 10-17'),
(15, 'Vaga', 'www.Vaga.lt', 'Tauragė Milų g. 12', 2147483647, 'vaga@vaga.lt', 'I-V 09-19. VI-VII 10-17'),
(16, 'Pegasas', 'www.Pegasas.lt', 'Klapėda, Jūrų g. 13', 699617596, 'pegasas@pegasas.lt', 'I-V 09-18. VI-VII 11-14'),
(17, 'Pegasas', 'www.Pegasas.lt', 'Trakai, Vilniaus g.', 2147483647, 'pegasas@pegasas.lt', 'I-V 09-18. VI-VII 10-16'),
(18, 'Obuolys', 'www.Obuolys.lt', 'Vilnius, Sausio g. 11', 2147483647, 'obuolys@obuolys.lt', 'I-V 09-18. VI-VII 10-16'),
(19, 'Vaga', 'www.Vaga.lt', 'Kretinga, Šiaulių g. 13', 2147483647, 'vaga@vaga.lt', 'I-V 09-18. VI-VII 11-14'),
(20, 'Obuolys', 'www.Obuolys.lt', 'Šiauliai, Saulės g. 18', 2147483647, 'obuolys@obuolys.lt', 'I-V 09-18. VI-VII 10-16');

-- --------------------------------------------------------

--
-- Table structure for table `pirkejas`
--

CREATE TABLE `pirkejas` (
  `id_Pirkejas` int(11) NOT NULL,
  `Vardas` varchar(255) NOT NULL,
  `Pavarde` varchar(255) NOT NULL,
  `Adresas` varchar(255) NOT NULL,
  `Banko_saskaita` varchar(255) NOT NULL,
  `Telefono_numeris` int(11) DEFAULT NULL,
  `El_pastas` varchar(255) NOT NULL,
  `Gimimo_data` varchar(255) NOT NULL,
  `fk_Darbuotojasid_Darbuotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pirkejas`
--

INSERT INTO `pirkejas` (`id_Pirkejas`, `Vardas`, `Pavarde`, `Adresas`, `Banko_saskaita`, `Telefono_numeris`, `El_pastas`, `Gimimo_data`, `fk_Darbuotojasid_Darbuotojas`) VALUES
(1, 'Freddie', 'Mattek', '758 Trailsway Center', 'LV8987930019128', 755059142, 'fmattek0@miitbeian.gov.cn', '1968-03-20', 12),
(2, 'Elana', 'Hulke', '18321 Crescent Oaks Point', 'LT8958528967409', 880383153, 'ehulke1@clickbank.net', '1963-12-13', 2),
(3, 'Brendin', 'Winfindale', '270 Sugar Terrace', 'SW893558475348', 940117711, 'bwinfindale2@wikipedia.org', '1968-03-20', 13),
(4, 'Helene', 'Bullcock', '87 Service Way', 'SW879305210031', 258733476, 'hbullcock3@usa.gov', '1963-12-13', 4),
(5, 'Hedwig', 'Paridge', '22 Hintze Hill', 'UK8451826443711', 779455393, 'hparidge4@tiny.cc', '2000-02-20', 5),
(6, 'Ezri', 'Ryce', '464 Daystar Center', 'LT8794686150884', 543288938, 'eryce5@fc2.com', '1995-08-21', 6),
(7, 'Nataniel', 'Wylam', '9126 Drewry Terrace', 'LT8952701340764', 442143369, 'nwylam6@craigslist.org', '1968-02-19', 7),
(8, 'Daisy', 'Gadsdon', '6761 Hansons Court', 'LT4641354007365', 160132693, 'dgadsdon7@princeton.edu', '1963-12-13', 20),
(9, 'Teodor', 'Delgardo', '900 Glendale Way', 'LT8926109126414', 154310435, 'tdelgardo8@sciencedirect.com', '1988-03-20', 9),
(10, 'Sander', 'Courtney', '41877 Dawn Crossing', 'LT7837049737185', 970101500, 'scourtney9@home.pl', '1968-03-20', 10),
(11, 'Ichabod', 'Tombleson', '91519 Mockingbird Street', 'LV8793145609394', 626000985, 'itomblesona@jugem.jp', '1968-02-19', 11),
(12, 'Agace', 'Djekic', '6 8th Circle', 'FN784401363387', 804275120, 'adjekicb@behance.net', '1988-03-20', 1),
(13, 'Daniel', 'Ondrasek', '8336 Fairview Junction', 'RU376595806988', 100123923, 'dondrasekc@ed.gov', '1995-08-21', 3),
(14, 'Berti', 'Toomey', '11088 Corscot Point', 'LT8790417907621', 155138954, 'btoomeyd@nih.gov', '1963-12-13', 14),
(15, 'Flossie', 'Shurey', '202 Stuart Terrace', 'LT8965399212749', 599349861, 'fshureye@geocities.com', '1996-05-20', 15),
(16, 'Noell', 'Lamborn', '1760 Lyons Center', 'LV8798046702013', 782260546, 'nlambornf@japanpost.jp', '1996-05-20', 16),
(17, 'Anatollo', 'Silverson', '78 Bayside Avenue', 'LT8652647310343', 552032056, 'asilversong@google.pl', '1968-02-19', 17),
(18, 'Dareen', 'Archbald', '60903 Kensington Court', 'LT5469254209511', 393693227, 'darchbaldh@e-recht24.de', '1968-02-19', 18),
(19, 'Doris', 'Lapere', '365 Main Place', 'LT8964163960007', 595864037, 'dlaperei@nsw.gov.au', '1996-05-20', 19),
(20, 'Donalt', 'Raffon', '5 Rowland Circle', 'LV8958269153249', 344672008, 'draffonj@odnoklassniki.ru', '1968-02-19', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pirkimas`
--

CREATE TABLE `pirkimas` (
  `Kiekis` int(11) NOT NULL,
  `Pristatymas` varchar(255) NOT NULL,
  `Grazinimas` varchar(255) NOT NULL,
  `id_Pirkimas` int(11) NOT NULL,
  `fk_Pirkejasid_Pirkejas` int(11) NOT NULL,
  `fk_Parduotuveid_Parduotuve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pirkimas`
--

INSERT INTO `pirkimas` (`Kiekis`, `Pristatymas`, `Grazinimas`, `id_Pirkimas`, `fk_Pirkejasid_Pirkejas`, `fk_Parduotuveid_Parduotuve`) VALUES
(4, 'atsiėmimas parduotuvėje', 'per mėnesį', 1, 3, 16),
(5, 'pristatymas į namus', 'grąžinimas negalimas', 2, 14, 8),
(3, 'atsiėmimas parduotuvėje', 'grąžinimas negalimas', 3, 4, 3),
(1, 'paštomatas', 'grąžinimas negalimas', 4, 15, 15),
(1, 'paštomatas', 'grąžinimas negalimas', 5, 4, 2),
(4, 'paštomatas', 'per mėnesį', 6, 16, 8),
(2, 'atsiėmimas parduotuvėje', 'grąžinimas negalimas', 7, 2, 6),
(1, 'pristatymas į namus', 'per 2 savaites', 8, 17, 7),
(3, 'paštomatas', 'per 2 savaites', 9, 19, 18),
(2, 'paštomatas', 'per 2 savaites', 10, 20, 2),
(5, 'atsiėmimas parduotuvėje', 'per mėnesį', 11, 17, 1),
(5, 'atsiėmimas parduotuvėje', 'per mėnesį', 12, 17, 10),
(5, 'paštomatas', 'per mėnesį', 13, 7, 9),
(5, 'pristatymas į namus', 'per 2 savaites', 14, 19, 19),
(1, 'pristatymas į namus', 'grąžinimas negalimas', 15, 12, 15),
(1, 'atsiėmimas parduotuvėje', 'per mėnesį', 16, 3, 6),
(5, 'pristatymas į namus', 'per 2 savaites', 17, 3, 14),
(4, 'paštomatas', 'per 2 savaites', 18, 18, 4),
(1, 'pristatymas į namus', 'grąžinimas negalimas', 19, 8, 19),
(2, 'pristatymas į namus', 'per mėnesį', 20, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `saskaita`
--

CREATE TABLE `saskaita` (
  `Nr` int(11) NOT NULL,
  `Data` varchar(255) NOT NULL,
  `Suma` double NOT NULL,
  `Banko_saskaita` varchar(255) NOT NULL,
  `fk_Pirkimasid_Pirkimas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saskaita`
--

INSERT INTO `saskaita` (`Nr`, `Data`, `Suma`, `Banko_saskaita`, `fk_Pirkimasid_Pirkimas`) VALUES
(1, '2021-01-23', 24, 'LT856098331448', 14),
(2, '2021-01-13', 22, 'LT258233582344', 10),
(3, '2021-01-23', 30, 'LT520445082240', 8),
(4, '2021-01-23', 94, 'LT524725815853', 4),
(5, '2021-01-13', 69, 'LT2253534747445', 19),
(6, '2021-01-13', 15, 'LT547921951481', 3),
(7, '2021-02-11', 30, 'LT259705824517', 15),
(8, '2021-01-23', 49, 'LT857972322597', 15),
(9, '2021-01-13', 73, 'LT854251638603', 19),
(10, '2021-01-13', 72, 'LT822109944501', 8),
(11, '2021-01-13', 30, 'LT4481175757535', 20),
(12, '2021-02-11', 18, 'LV817125969261', 5),
(13, '2021-02-11', 26, 'RU26547433358', 9),
(14, '2021-01-13', 9, 'LT783532093359', 13),
(15, '2021-01-23', 83, 'LT553595848993', 10),
(16, '2021-02-11', 85, 'LT124235341847', 5),
(17, '2021-02-11', 78, 'LT41865164283', 18),
(18, '2021-01-23', 25, 'LV85796221795', 13),
(19, '2021-01-23', 83, 'LT222869479735', 18),
(20, '2021-02-11', 58, 'LT225289082239', 16);

-- --------------------------------------------------------

--
-- Table structure for table `serija`
--

CREATE TABLE `serija` (
  `id_Serija` int(11) NOT NULL,
  `Pavadinimas` varchar(255) NOT NULL,
  `Versijos_kodas` int(11) NOT NULL,
  `Daliu_skaicius` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serija`
--

INSERT INTO `serija` (`id_Serija`, `Pavadinimas`, `Versijos_kodas`, `Daliu_skaicius`) VALUES
(1, 'Žvaigždės', 7, 2),
(2, 'Dovana', 6, 5),
(3, 'Saulė', 4, 4),
(4, 'Merkurijus', 6, 2),
(5, 'Pasaulis', 6, 2),
(6, 'Mėnulio saga', 2, 4),
(7, 'Brolija', 7, 1),
(8, 'Planeta', 5, 4),
(9, 'Brolija', 2, 3),
(10, 'Domino', 8, 3),
(11, 'Brolija', 2, 5),
(12, 'Dangus', 7, 2),
(13, 'Penkiolika', 2, 4),
(14, 'Jupiteris', 1, 5),
(15, 'Anime', 2, 5),
(16, 'Upės', 4, 2),
(17, 'Šalys', 8, 4),
(18, 'Akys', 4, 5),
(19, 'Knygos', 2, 3),
(20, 'Kriminalai', 6, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autorius`
--
ALTER TABLE `autorius`
  ADD PRIMARY KEY (`id_Autorius`);

--
-- Indexes for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  ADD PRIMARY KEY (`id_Darbuotojas`),
  ADD KEY `dirba` (`fk_Parduotuveid_Parduotuve`);

--
-- Indexes for table `formatas`
--
ALTER TABLE `formatas`
  ADD PRIMARY KEY (`id_Formatas`);

--
-- Indexes for table `knyga`
--
ALTER TABLE `knyga`
  ADD PRIMARY KEY (`id_Knyga`),
  ADD KEY `laikoma` (`fk_Parduotuveid_Parduotuve`),
  ADD KEY `turi` (`fk_Formatasid_Formatas`),
  ADD KEY `parase` (`fk_Autoriusid_Autorius`),
  ADD KEY `priklauso` (`fk_Serijaid_Serija`),
  ADD KEY `isleidzia` (`fk_Leidyklaid_Leidykla`);

--
-- Indexes for table `leidykla`
--
ALTER TABLE `leidykla`
  ADD PRIMARY KEY (`id_Leidykla`);

--
-- Indexes for table `parduotuve`
--
ALTER TABLE `parduotuve`
  ADD PRIMARY KEY (`id_Parduotuve`);

--
-- Indexes for table `pirkejas`
--
ALTER TABLE `pirkejas`
  ADD PRIMARY KEY (`id_Pirkejas`),
  ADD KEY `aptarnauja` (`fk_Darbuotojasid_Darbuotojas`);

--
-- Indexes for table `pirkimas`
--
ALTER TABLE `pirkimas`
  ADD PRIMARY KEY (`id_Pirkimas`),
  ADD KEY `atlieka` (`fk_Pirkejasid_Pirkejas`),
  ADD KEY `gaunamas_is` (`fk_Parduotuveid_Parduotuve`);

--
-- Indexes for table `saskaita`
--
ALTER TABLE `saskaita`
  ADD PRIMARY KEY (`Nr`),
  ADD KEY `israsoma` (`fk_Pirkimasid_Pirkimas`);

--
-- Indexes for table `serija`
--
ALTER TABLE `serija`
  ADD PRIMARY KEY (`id_Serija`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `darbuotojas`
--
ALTER TABLE `darbuotojas`
  ADD CONSTRAINT `dirba` FOREIGN KEY (`fk_Parduotuveid_Parduotuve`) REFERENCES `parduotuve` (`id_Parduotuve`);

--
-- Constraints for table `knyga`
--
ALTER TABLE `knyga`
  ADD CONSTRAINT `isleidzia` FOREIGN KEY (`fk_Leidyklaid_Leidykla`) REFERENCES `leidykla` (`id_Leidykla`),
  ADD CONSTRAINT `laikoma` FOREIGN KEY (`fk_Parduotuveid_Parduotuve`) REFERENCES `parduotuve` (`id_Parduotuve`),
  ADD CONSTRAINT `parase` FOREIGN KEY (`fk_Autoriusid_Autorius`) REFERENCES `autorius` (`id_Autorius`),
  ADD CONSTRAINT `priklauso` FOREIGN KEY (`fk_Serijaid_Serija`) REFERENCES `serija` (`id_Serija`),
  ADD CONSTRAINT `turi` FOREIGN KEY (`fk_Formatasid_Formatas`) REFERENCES `formatas` (`id_Formatas`);

--
-- Constraints for table `pirkejas`
--
ALTER TABLE `pirkejas`
  ADD CONSTRAINT `aptarnauja` FOREIGN KEY (`fk_Darbuotojasid_Darbuotojas`) REFERENCES `darbuotojas` (`id_Darbuotojas`);

--
-- Constraints for table `pirkimas`
--
ALTER TABLE `pirkimas`
  ADD CONSTRAINT `atlieka` FOREIGN KEY (`fk_Pirkejasid_Pirkejas`) REFERENCES `pirkejas` (`id_Pirkejas`),
  ADD CONSTRAINT `gaunamas_is` FOREIGN KEY (`fk_Parduotuveid_Parduotuve`) REFERENCES `parduotuve` (`id_Parduotuve`);

--
-- Constraints for table `saskaita`
--
ALTER TABLE `saskaita`
  ADD CONSTRAINT `israsoma` FOREIGN KEY (`fk_Pirkimasid_Pirkimas`) REFERENCES `pirkimas` (`id_Pirkimas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
