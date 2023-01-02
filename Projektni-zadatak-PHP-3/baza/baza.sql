-- MySQL dump 10.13  Distrib 5.7.34, for osx11.0 (x86_64)
--
-- Host: localhost    Database: NTP
-- ------------------------------------------------------
-- Server version	5.7.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) DEFAULT NULL,
  `prezime` varchar(45) DEFAULT NULL,
  `drzava` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `naslov` varchar(255) DEFAULT NULL,
  `poruka` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Jurica','Stanko','8','jstanko@tvz.hr','Naslov','hhh'),(2,'Jurica','Stanko','16','jstanko@tvz.hr','Naslov','Poruka'),(3,'Ja','Sam','332','jstanko@tvz.hr','Naslov','Veliki tekst poruke'),(4,'Ja','Sam','332','jstanko@tvz.hr','Naslov','Veliki tekst poruke'),(5,'Ja','Sam','332','jstanko@tvz.hr','Naslov','Veliki tekst poruke'),(6,'Ja','Sam','266','stanko64@icloud.com','Naslov','Neki tekst'),(7,'ovo','je','158','test@test.hr','test','test'),(8,'Jurica','Stanko','332','stanko64@icloud.com','Ovo je naslov','Šaljem testnu poruku'),(9,'Jurica','Stanko','332','stanko64@icloud.com','Ovo je naslov','Šaljem testnu poruku'),(10,'Bok','Korisnik','158','test@test.hr','naslov','tekst'),(11,'Bok','Korisnik','158','test@test.hr','naslov','tekst'),(12,'Video','Video','266','test@video.hr','Naslov','Poruka za video');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=254 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'AF','AFGHANISTAN','Afghanistan','AFG',4,93),(2,'AL','ALBANIA','Albania','ALB',8,355),(3,'DZ','ALGERIA','Algeria','DZA',12,213),(4,'AS','AMERICAN SAMOA','American Samoa','ASM',16,1684),(5,'AD','ANDORRA','Andorra','AND',20,376),(6,'AO','ANGOLA','Angola','AGO',24,244),(7,'AI','ANGUILLA','Anguilla','AIA',660,1264),(8,'AQ','ANTARCTICA','Antarctica','ATA',NULL,672),(9,'AG','ANTIGUA AND BARBUDA','Antigua and Barbuda','ATG',28,1268),(10,'AR','ARGENTINA','Argentina','ARG',32,54),(11,'AM','ARMENIA','Armenia','ARM',51,374),(12,'AW','ARUBA','Aruba','ABW',533,297),(13,'AU','AUSTRALIA','Australia','AUS',36,61),(14,'AT','AUSTRIA','Austria','AUT',40,43),(15,'AZ','AZERBAIJAN','Azerbaijan','AZE',31,994),(16,'BS','BAHAMAS','Bahamas','BHS',44,1242),(17,'BH','BAHRAIN','Bahrain','BHR',48,973),(18,'BD','BANGLADESH','Bangladesh','BGD',50,880),(19,'BB','BARBADOS','Barbados','BRB',52,1246),(20,'BY','BELARUS','Belarus','BLR',112,375),(21,'BE','BELGIUM','Belgium','BEL',56,32),(22,'BZ','BELIZE','Belize','BLZ',84,501),(23,'BJ','BENIN','Benin','BEN',204,229),(24,'BM','BERMUDA','Bermuda','BMU',60,1441),(25,'BT','BHUTAN','Bhutan','BTN',64,975),(26,'BO','BOLIVIA','Bolivia','BOL',68,591),(27,'BA','BOSNIA AND HERZEGOVINA','Bosnia and Herzegovina','BIH',70,387),(28,'BW','BOTSWANA','Botswana','BWA',72,267),(29,'BV','BOUVET ISLAND','Bouvet Island','BVT',NULL,47),(30,'BR','BRAZIL','Brazil','BRA',76,55),(31,'IO','BRITISH INDIAN OCEAN TERRITORY','British Indian Ocean Territory','IOT',NULL,246),(32,'BN','BRUNEI DARUSSALAM','Brunei Darussalam','BRN',96,673),(33,'BG','BULGARIA','Bulgaria','BGR',100,359),(34,'BF','BURKINA FASO','Burkina Faso','BFA',854,226),(35,'BI','BURUNDI','Burundi','BDI',108,257),(36,'KH','CAMBODIA','Cambodia','KHM',116,855),(37,'CM','CAMEROON','Cameroon','CMR',120,237),(38,'CA','CANADA','Canada','CAN',124,1),(39,'CV','CAPE VERDE','Cape Verde','CPV',132,238),(40,'KY','CAYMAN ISLANDS','Cayman Islands','CYM',136,1345),(41,'CF','CENTRAL AFRICAN REPUBLIC','Central African Republic','CAF',140,236),(42,'TD','CHAD','Chad','TCD',148,235),(43,'CL','CHILE','Chile','CHL',152,56),(44,'CN','CHINA','China','CHN',156,86),(45,'CX','CHRISTMAS ISLAND','Christmas Island','CXR',NULL,61),(46,'CC','COCOS (KEELING) ISLANDS','Cocos (Keeling) Islands','CCK',NULL,672),(47,'CO','COLOMBIA','Colombia','COL',170,57),(48,'KM','COMOROS','Comoros','COM',174,269),(49,'CG','CONGO','Congo','COG',178,242),(50,'CD','CONGO, THE DEMOCRATIC REPUBLIC OF THE','Congo, the Democratic Republic of the','COD',180,243),(51,'CK','COOK ISLANDS','Cook Islands','COK',184,682),(52,'CR','COSTA RICA','Costa Rica','CRI',188,506),(53,'CI','COTE D\'IVOIRE','Cote D\'Ivoire','CIV',384,225),(54,'HR','CROATIA','Croatia','HRV',191,385),(55,'CU','CUBA','Cuba','CUB',192,53),(56,'CY','CYPRUS','Cyprus','CYP',196,357),(57,'CZ','CZECH REPUBLIC','Czech Republic','CZE',203,420),(58,'DK','DENMARK','Denmark','DNK',208,45),(59,'DJ','DJIBOUTI','Djibouti','DJI',262,253),(60,'DM','DOMINICA','Dominica','DMA',212,1767),(61,'DO','DOMINICAN REPUBLIC','Dominican Republic','DOM',214,1809),(62,'EC','ECUADOR','Ecuador','ECU',218,593),(63,'EG','EGYPT','Egypt','EGY',818,20),(64,'SV','EL SALVADOR','El Salvador','SLV',222,503),(65,'GQ','EQUATORIAL GUINEA','Equatorial Guinea','GNQ',226,240),(66,'ER','ERITREA','Eritrea','ERI',232,291),(67,'EE','ESTONIA','Estonia','EST',233,372),(68,'ET','ETHIOPIA','Ethiopia','ETH',231,251),(69,'FK','FALKLAND ISLANDS (MALVINAS)','Falkland Islands (Malvinas)','FLK',238,500),(70,'FO','FAROE ISLANDS','Faroe Islands','FRO',234,298),(71,'FJ','FIJI','Fiji','FJI',242,679),(72,'FI','FINLAND','Finland','FIN',246,358),(73,'FR','FRANCE','France','FRA',250,33),(74,'GF','FRENCH GUIANA','French Guiana','GUF',254,594),(75,'PF','FRENCH POLYNESIA','French Polynesia','PYF',258,689),(76,'TF','FRENCH SOUTHERN TERRITORIES','French Southern Territories','ATF',NULL,262),(77,'GA','GABON','Gabon','GAB',266,241),(78,'GM','GAMBIA','Gambia','GMB',270,220),(79,'GE','GEORGIA','Georgia','GEO',268,995),(80,'DE','GERMANY','Germany','DEU',276,49),(81,'GH','GHANA','Ghana','GHA',288,233),(82,'GI','GIBRALTAR','Gibraltar','GIB',292,350),(83,'GR','GREECE','Greece','GRC',300,30),(84,'GL','GREENLAND','Greenland','GRL',304,299),(85,'GD','GRENADA','Grenada','GRD',308,1473),(86,'GP','GUADELOUPE','Guadeloupe','GLP',312,590),(87,'GU','GUAM','Guam','GUM',316,1671),(88,'GT','GUATEMALA','Guatemala','GTM',320,502),(89,'GN','GUINEA','Guinea','GIN',324,224),(90,'GW','GUINEA-BISSAU','Guinea-Bissau','GNB',624,245),(91,'GY','GUYANA','Guyana','GUY',328,592),(92,'HT','HAITI','Haiti','HTI',332,509),(93,'HM','HEARD ISLAND AND MCDONALD ISLANDS','Heard Island and Mcdonald Islands','HMD',NULL,0),(94,'VA','HOLY SEE (VATICAN CITY STATE)','Holy See (Vatican City State)','VAT',336,39),(95,'HN','HONDURAS','Honduras','HND',340,504),(96,'HK','HONG KONG','Hong Kong','HKG',344,852),(97,'HU','HUNGARY','Hungary','HUN',348,36),(98,'IS','ICELAND','Iceland','ISL',352,354),(99,'IN','INDIA','India','IND',356,91),(100,'ID','INDONESIA','Indonesia','IDN',360,62),(101,'IR','IRAN, ISLAMIC REPUBLIC OF','Iran, Islamic Republic of','IRN',364,98),(102,'IQ','IRAQ','Iraq','IRQ',368,964),(103,'IE','IRELAND','Ireland','IRL',372,353),(104,'IL','ISRAEL','Israel','ISR',376,972),(105,'IT','ITALY','Italy','ITA',380,39),(106,'JM','JAMAICA','Jamaica','JAM',388,1876),(107,'JP','JAPAN','Japan','JPN',392,81),(108,'JO','JORDAN','Jordan','JOR',400,962),(109,'KZ','KAZAKHSTAN','Kazakhstan','KAZ',398,7),(110,'KE','KENYA','Kenya','KEN',404,254),(111,'KI','KIRIBATI','Kiribati','KIR',296,686),(112,'KP','KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF','Korea, Democratic People\'s Republic of','PRK',408,850),(113,'KR','KOREA, REPUBLIC OF','Korea, Republic of','KOR',410,82),(114,'KW','KUWAIT','Kuwait','KWT',414,965),(115,'KG','KYRGYZSTAN','Kyrgyzstan','KGZ',417,996),(116,'LA','LAO PEOPLE\'S DEMOCRATIC REPUBLIC','Lao People\'s Democratic Republic','LAO',418,856),(117,'LV','LATVIA','Latvia','LVA',428,371),(118,'LB','LEBANON','Lebanon','LBN',422,961),(119,'LS','LESOTHO','Lesotho','LSO',426,266),(120,'LR','LIBERIA','Liberia','LBR',430,231),(121,'LY','LIBYAN ARAB JAMAHIRIYA','Libyan Arab Jamahiriya','LBY',434,218),(122,'LI','LIECHTENSTEIN','Liechtenstein','LIE',438,423),(123,'LT','LITHUANIA','Lithuania','LTU',440,370),(124,'LU','LUXEMBOURG','Luxembourg','LUX',442,352),(125,'MO','MACAO','Macao','MAC',446,853),(126,'MK','MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','Macedonia, the Former Yugoslav Republic of','MKD',807,389),(127,'MG','MADAGASCAR','Madagascar','MDG',450,261),(128,'MW','MALAWI','Malawi','MWI',454,265),(129,'MY','MALAYSIA','Malaysia','MYS',458,60),(130,'MV','MALDIVES','Maldives','MDV',462,960),(131,'ML','MALI','Mali','MLI',466,223),(132,'MT','MALTA','Malta','MLT',470,356),(133,'MH','MARSHALL ISLANDS','Marshall Islands','MHL',584,692),(134,'MQ','MARTINIQUE','Martinique','MTQ',474,596),(135,'MR','MAURITANIA','Mauritania','MRT',478,222),(136,'MU','MAURITIUS','Mauritius','MUS',480,230),(137,'YT','MAYOTTE','Mayotte','MYT',NULL,269),(138,'MX','MEXICO','Mexico','MEX',484,52),(139,'FM','MICRONESIA, FEDERATED STATES OF','Micronesia, Federated States of','FSM',583,691),(140,'MD','MOLDOVA, REPUBLIC OF','Moldova, Republic of','MDA',498,373),(141,'MC','MONACO','Monaco','MCO',492,377),(142,'MN','MONGOLIA','Mongolia','MNG',496,976),(143,'MS','MONTSERRAT','Montserrat','MSR',500,1664),(144,'MA','MOROCCO','Morocco','MAR',504,212),(145,'MZ','MOZAMBIQUE','Mozambique','MOZ',508,258),(146,'MM','MYANMAR','Myanmar','MMR',104,95),(147,'NA','NAMIBIA','Namibia','NAM',516,264),(148,'NR','NAURU','Nauru','NRU',520,674),(149,'NP','NEPAL','Nepal','NPL',524,977),(150,'NL','NETHERLANDS','Netherlands','NLD',528,31),(151,'AN','NETHERLANDS ANTILLES','Netherlands Antilles','ANT',530,599),(152,'NC','NEW CALEDONIA','New Caledonia','NCL',540,687),(153,'NZ','NEW ZEALAND','New Zealand','NZL',554,64),(154,'NI','NICARAGUA','Nicaragua','NIC',558,505),(155,'NE','NIGER','Niger','NER',562,227),(156,'NG','NIGERIA','Nigeria','NGA',566,234),(157,'NU','NIUE','Niue','NIU',570,683),(158,'NF','NORFOLK ISLAND','Norfolk Island','NFK',574,672),(159,'MP','NORTHERN MARIANA ISLANDS','Northern Mariana Islands','MNP',580,1670),(160,'NO','NORWAY','Norway','NOR',578,47),(161,'OM','OMAN','Oman','OMN',512,968),(162,'PK','PAKISTAN','Pakistan','PAK',586,92),(163,'PW','PALAU','Palau','PLW',585,680),(164,'PS','PALESTINIAN TERRITORY, OCCUPIED','Palestinian Territory, Occupied','PSE',NULL,970),(165,'PA','PANAMA','Panama','PAN',591,507),(166,'PG','PAPUA NEW GUINEA','Papua New Guinea','PNG',598,675),(167,'PY','PARAGUAY','Paraguay','PRY',600,595),(168,'PE','PERU','Peru','PER',604,51),(169,'PH','PHILIPPINES','Philippines','PHL',608,63),(170,'PN','PITCAIRN','Pitcairn','PCN',612,64),(171,'PL','POLAND','Poland','POL',616,48),(172,'PT','PORTUGAL','Portugal','PRT',620,351),(173,'PR','PUERTO RICO','Puerto Rico','PRI',630,1787),(174,'QA','QATAR','Qatar','QAT',634,974),(175,'RE','REUNION','Reunion','REU',638,262),(176,'RO','ROMANIA','Romania','ROU',642,40),(177,'RU','RUSSIAN FEDERATION','Russian Federation','RUS',643,7),(178,'RW','RWANDA','Rwanda','RWA',646,250),(179,'SH','SAINT HELENA','Saint Helena','SHN',654,290),(180,'KN','SAINT KITTS AND NEVIS','Saint Kitts and Nevis','KNA',659,1869),(181,'LC','SAINT LUCIA','Saint Lucia','LCA',662,1758),(182,'PM','SAINT PIERRE AND MIQUELON','Saint Pierre and Miquelon','SPM',666,508),(183,'VC','SAINT VINCENT AND THE GRENADINES','Saint Vincent and the Grenadines','VCT',670,1784),(184,'WS','SAMOA','Samoa','WSM',882,684),(185,'SM','SAN MARINO','San Marino','SMR',674,378),(186,'ST','SAO TOME AND PRINCIPE','Sao Tome and Principe','STP',678,239),(187,'SA','SAUDI ARABIA','Saudi Arabia','SAU',682,966),(188,'SN','SENEGAL','Senegal','SEN',686,221),(190,'SC','SEYCHELLES','Seychelles','SYC',690,248),(191,'SL','SIERRA LEONE','Sierra Leone','SLE',694,232),(192,'SG','SINGAPORE','Singapore','SGP',702,65),(193,'SK','SLOVAKIA','Slovakia','SVK',703,421),(194,'SI','SLOVENIA','Slovenia','SVN',705,386),(195,'SB','SOLOMON ISLANDS','Solomon Islands','SLB',90,677),(196,'SO','SOMALIA','Somalia','SOM',706,252),(197,'ZA','SOUTH AFRICA','South Africa','ZAF',710,27),(198,'GS','SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS','South Georgia and the South Sandwich Islands','SGS',NULL,500),(199,'ES','SPAIN','Spain','ESP',724,34),(200,'LK','SRI LANKA','Sri Lanka','LKA',144,94),(201,'SD','SUDAN','Sudan','SDN',736,249),(202,'SR','SURINAME','Suriname','SUR',740,597),(203,'SJ','SVALBARD AND JAN MAYEN','Svalbard and Jan Mayen','SJM',744,47),(204,'SZ','SWAZILAND','Swaziland','SWZ',748,268),(205,'SE','SWEDEN','Sweden','SWE',752,46),(206,'CH','SWITZERLAND','Switzerland','CHE',756,41),(207,'SY','SYRIAN ARAB REPUBLIC','Syrian Arab Republic','SYR',760,963),(208,'TW','TAIWAN, PROVINCE OF CHINA','Taiwan, Province of China','TWN',158,886),(209,'TJ','TAJIKISTAN','Tajikistan','TJK',762,992),(210,'TZ','TANZANIA, UNITED REPUBLIC OF','Tanzania, United Republic of','TZA',834,255),(211,'TH','THAILAND','Thailand','THA',764,66),(212,'TL','TIMOR-LESTE','Timor-Leste','TLS',NULL,670),(213,'TG','TOGO','Togo','TGO',768,228),(214,'TK','TOKELAU','Tokelau','TKL',772,690),(215,'TO','TONGA','Tonga','TON',776,676),(216,'TT','TRINIDAD AND TOBAGO','Trinidad and Tobago','TTO',780,1868),(217,'TN','TUNISIA','Tunisia','TUN',788,216),(218,'TR','TURKEY','Turkey','TUR',792,90),(219,'TM','TURKMENISTAN','Turkmenistan','TKM',795,7370),(220,'TC','TURKS AND CAICOS ISLANDS','Turks and Caicos Islands','TCA',796,1649),(221,'TV','TUVALU','Tuvalu','TUV',798,688),(222,'UG','UGANDA','Uganda','UGA',800,256),(223,'UA','UKRAINE','Ukraine','UKR',804,380),(224,'AE','UNITED ARAB EMIRATES','United Arab Emirates','ARE',784,971),(225,'GB','UNITED KINGDOM','United Kingdom','GBR',826,44),(226,'US','UNITED STATES','United States','USA',840,1),(227,'UM','UNITED STATES MINOR OUTLYING ISLANDS','United States Minor Outlying Islands','UMI',NULL,1),(228,'UY','URUGUAY','Uruguay','URY',858,598),(229,'UZ','UZBEKISTAN','Uzbekistan','UZB',860,998),(230,'VU','VANUATU','Vanuatu','VUT',548,678),(231,'VE','VENEZUELA','Venezuela','VEN',862,58),(232,'VN','VIET NAM','Viet Nam','VNM',704,84),(233,'VG','VIRGIN ISLANDS, BRITISH','Virgin Islands, British','VGB',92,1284),(234,'VI','VIRGIN ISLANDS, U.S.','Virgin Islands, U.s.','VIR',850,1340),(235,'WF','WALLIS AND FUTUNA','Wallis and Futuna','WLF',876,681),(236,'EH','WESTERN SAHARA','Western Sahara','ESH',732,212),(237,'YE','YEMEN','Yemen','YEM',887,967),(238,'ZM','ZAMBIA','Zambia','ZMB',894,260),(239,'ZW','ZIMBABWE','Zimbabwe','ZWE',716,263),(240,'RS','SERBIA','Serbia','SRB',688,381),(241,'AP','ASIA PACIFIC REGION','Asia / Pacific Region','0',0,0),(242,'ME','MONTENEGRO','Montenegro','MNE',499,382),(243,'AX','ALAND ISLANDS','Aland Islands','ALA',248,358),(244,'BQ','BONAIRE, SINT EUSTATIUS AND SABA','Bonaire, Sint Eustatius and Saba','BES',535,599),(245,'CW','CURACAO','Curacao','CUW',531,599),(246,'GG','GUERNSEY','Guernsey','GGY',831,44),(247,'IM','ISLE OF MAN','Isle of Man','IMN',833,44),(248,'JE','JERSEY','Jersey','JEY',832,44),(249,'XK','KOSOVO','Kosovo','XKX',0,383),(250,'BL','SAINT BARTHELEMY','Saint Barthelemy','BLM',652,590),(251,'MF','SAINT MARTIN','Saint Martin','MAF',663,590),(252,'SX','SINT MAARTEN','Sint Maarten','SXM',534,1),(253,'SS','SOUTH SUDAN','South Sudan','SSD',728,211);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jela`
--

DROP TABLE IF EXISTS `jela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jela` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  `opis` text NOT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `datum` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `arhiva` enum('D','N') DEFAULT 'N',
  `odobreno` enum('D','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jela`
--

LOCK TABLES `jela` WRITE;
/*!40000 ALTER TABLE `jela` DISABLE KEYS */;
INSERT INTO `jela` VALUES (60,'Test','test by administrator123',NULL,'2022-12-30 17:38:25','N','D'),(61,'Test jelo by korisnik','Test jelo by korisnik',NULL,'2022-12-30 19:17:44','N','N'),(62,'Test jelo by korisnik','Test jelo by korisnik',NULL,'2022-12-30 19:17:47','N','N'),(63,'Test jelo by korisnik','Test jelo by korisnik',NULL,'2023-01-02 19:39:05','D','D'),(65,'Test dugackog teksta','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',NULL,'2022-12-30 22:18:21','N','D'),(69,'Jelo admin','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,'2023-01-02 19:46:39','D','D'),(70,'test','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,'2023-01-02 19:48:38','N','N');
/*!40000 ALTER TABLE `jela` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `drzava` varchar(45) DEFAULT NULL,
  `passwordHash` varchar(200) DEFAULT NULL,
  `ulica` varchar(45) DEFAULT NULL,
  `kucBroj` int(11) DEFAULT NULL,
  `datRodenja` date DEFAULT NULL,
  `korIme` varchar(45) DEFAULT NULL,
  `korPrava` enum('K','E','A') DEFAULT NULL,
  `arhiva` enum('D','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnici`
--

LOCK TABLES `korisnici` WRITE;
/*!40000 ALTER TABLE `korisnici` DISABLE KEYS */;
INSERT INTO `korisnici` VALUES (4,'Jurica','Stanko','jstanko@tvz.hr','191','$2y$10$Su.fz0b3dbbam90LFFx4wO3LTSDZE3RYPgOAxKyInM5DtuYfhqX1e','Deliceva',5,'1999-05-14','jstanko99','A','D'),(5,'Jurica','Stanko','jstanko@tvz.hr','332','$2y$10$H6eIiZFBCUVwp7Q/0D3PkeIMZ1qQqBfzPi2KV8rZPnUXgE5.fNOJC','Deliceva',6,'0999-05-16','jstanko','A','N'),(8,'Jurica','Stanko','jstanko4@tvz.hr','266','$2y$10$Yn9AFc.YI9sbNGysTMO/zeMDnq7Ds/zCxv.mYAAzb6As3sDTQN9/O','vrbik',8,'1999-05-16','jstanko7248','A','N'),(9,'Jurica','Stanko','korisnik@korisnik.hr','332','$2y$10$1fC2bhZsFJei6xjkYjH75ew7MYamgsv4iTLh4siy2pVZx15PZrmnS','Vrbik',8,'1999-06-16','korisnik','K','N'),(10,'Jurica','Stanko','editor@editor.hr','332','$2y$10$9MddwNhQRKCFKfm0DRLyX.esGWpEIS5PH4AfI8gQDNxGKC6BxO.su','Vrbik',8,'1999-05-16','editor','E','N'),(11,'Jurica','Stanko','administrator@administrator.hr','332','$2y$10$1JGc4fXd21BABFYgkulyVu8LR8CvHQeMilP2xIGWPYH3p0SKV0pVO','Vrbik',8,'1999-05-16','administrator','A','N'),(12,'Testni','Korisnik','jstanko44@tvz.hr','266','$2y$10$swSBgL0Zs6iAReBuJ16z.uejolmT8F4AXcQod1sci78q04obQfTLG','Ulica',55,'1999-11-11','jstanko745','E','N'),(16,'Testni','Korisnik','test@test.hr','266','$2y$10$ZYkSsLdM4sLnHRaQEWiFe.ek/2hCEcSRN/oRuZR/TaOe741YOWdwO','deliceva',5,'1999-12-12','jstanko623','K','N'),(17,'testni','korisnik','test@video.hr','8','$2y$10$NegRA3iVvmRwYFeK7zRiUuR1RGivLVLRmOG89P51QgIz7nJ1Z6FgO','Ulica',123,'1999-11-11','jstanko320','K','N'),(18,'Testni','Video','test@video.com','266','$2y$10$oECTtXZmcEFolE1sJu1wdupZj3Ykva2FV.OaMS6W7twizKT/mYBIO','Ulica',123,'1999-11-11','jstanko2','K','N'),(19,'Testni','Korisnik','test@video.hr','4','$2y$10$4BNaUgO.idN7sHvkC57S.eu2JaxyrCl6xhbx5XoDd1MqB56yy2mqK','Ulica',123,'1999-11-11','jstanko623','K','N');
/*!40000 ALTER TABLE `korisnici` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slike`
--

DROP TABLE IF EXISTS `slike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slike` (
  `idSlike` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) NOT NULL,
  `idJela` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSlike`),
  KEY `id_idx` (`idJela`),
  CONSTRAINT `id` FOREIGN KEY (`idJela`) REFERENCES `jela` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slike`
--

LOCK TABLES `slike` WRITE;
/*!40000 ALTER TABLE `slike` DISABLE KEYS */;
INSERT INTO `slike` VALUES (53,'58-356-pic1.jpg',NULL),(54,'58-600-pic2.jpg',NULL),(55,'59-476-pic1.jpg',NULL),(56,'59-7-pic2.jpg',NULL),(57,'60-244-pic1.jpg',60),(58,'60-390-pic2.jpg',60),(59,'61-9-pic1.jpg',61),(60,'61-690-pic2.jpg',61),(61,'62-174-pic1.jpg',62),(62,'62-159-pic2.jpg',62),(63,'63-253-pic1.jpg',63),(64,'63-241-pic2.jpg',63),(65,'64-324-pic1.jpg',NULL),(66,'64-299-pic2.jpg',NULL),(67,'65-856-pic3.jpg',65),(68,'65-748-pic4.jpg',65),(69,'65-63-pic5.jpg',65),(70,'65-113-pic6.jpg',65),(71,'65-448-pic7.jpg',65),(72,'66-41-pic1.jpg',NULL),(73,'66-631-pic2.jpg',NULL),(74,'66-623-pic3.jpg',NULL),(75,'66-309-pic4.jpg',NULL),(76,'66-902-pic5.jpg',NULL),(77,'66-391-pic1.jpg',NULL),(78,'66-357-pic2.jpg',NULL),(79,'66-445-pic3.jpg',NULL),(80,'67-155-pic1.jpg',NULL),(81,'67-854-pic2.jpg',NULL),(82,'67-982-pic3.jpg',NULL),(83,'68-671-pic1.jpg',NULL),(84,'68-284-pic2.jpg',NULL),(85,'68-165-pic3.jpg',NULL),(86,'69-300-pic1.jpg',69),(87,'69-260-pic2.jpg',69),(88,'71-537-pic1.jpg',NULL),(89,'71-848-pic2.jpg',NULL),(90,'71-757-pic3.jpg',NULL);
/*!40000 ALTER TABLE `slike` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-02 21:43:44
