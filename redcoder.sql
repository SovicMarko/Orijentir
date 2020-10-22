-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2019 at 09:50 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redcoder`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

DROP TABLE IF EXISTS `kategorija`;
CREATE TABLE IF NOT EXISTS `kategorija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id`, `naziv`) VALUES
(1, 'Politika'),
(2, 'Ekonomija'),
(3, 'Drustvo'),
(4, 'Kultura'),
(5, 'Nauka'),
(6, 'Filozofija'),
(7, 'Istorija'),
(14, 'Tehnologija');

-- --------------------------------------------------------

--
-- Table structure for table `klijent`
--

DROP TABLE IF EXISTS `klijent`;
CREATE TABLE IF NOT EXISTS `klijent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sifra` varchar(20) NOT NULL,
  `uloga` enum('admin','klijent') NOT NULL,
  `slika` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klijent`
--

INSERT INTO `klijent` (`id`, `ime`, `prezime`, `email`, `sifra`, `uloga`, `slika`) VALUES
(1, 'Marko', 'Sovic', 'proba@ja', 'proba123', 'admin', '5cef9a8b1ea1a2.36775140.png'),
(17, 'Petar', 'Petrovic', 'sdf@gmail.com', '123123', 'klijent', ''),
(18, 'Predrag', 'Sarac', 'sare@gmail.com', 'jasamsarac', 'klijent', ''),
(19, 'Martin', 'Pavlovic', 'martin@martin.inc', '123', 'klijent', ''),
(20, 'Novi', 'Korisnik', 'novi@email.com', '123', 'klijent', '5cefa379560ee6.91838964.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_objave` int(11) NOT NULL,
  `id_autora` int(11) NOT NULL,
  `tekst` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_objave`, `id_autora`, `tekst`) VALUES
(13, 49, 18, 'Novi komentar'),
(14, 51, 1, 'Proba komentara'),
(15, 51, 18, 'neki komentar'),
(16, 51, 20, 'Jos jedan komentar'),
(11, 49, 1, 'A brate'),
(12, 49, 18, 'asdasd'),
(9, 49, 1, 'asdasd'),
(10, 52, 1, 'neki komentar'),
(18, 51, 20, 'Proba');

-- --------------------------------------------------------

--
-- Table structure for table `objava`
--

DROP TABLE IF EXISTS `objava`;
CREATE TABLE IF NOT EXISTS `objava` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) NOT NULL,
  `tekst` longtext NOT NULL,
  `slika` varchar(30) NOT NULL,
  `istaknuto` tinyint(1) NOT NULL,
  `id_kategorije` int(11) NOT NULL,
  `id_podkategorije` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objava`
--

INSERT INTO `objava` (`id`, `naslov`, `tekst`, `slika`, `istaknuto`, `id_kategorije`, `id_podkategorije`) VALUES
(49, 'Turska, Francuska, Rusijaâ€¦ upozorenja i pregovori o Siriji!', 'Ako Turska kaÅ¾e da cÌe ucÌi u Siriju, tako cÌe i biti. Planiramo da Å¡to pre uÄ‘emo u podruÄje istoÄno od reke Eufrat.â€, rekao je turski ministar spoljnih poslova Mevlut ÄŒavuÅ¡oglu novinarima.\r\n\r\nAko Francuzi ostaju da doprinesu buducÌnosti Sirije, to je u redu, ali ako to Äine kako bi zaÅ¡titili YPG, to nikome necÌe doneti nikakvu koristâ€, dodao je on.\r\n\r\nKoliki je broj francuskih trupa u Siriji, nije poznato. ZvaniÄni Pariz tvrdi da je rasporedio oko 200 pripadnika specijalnih jedinica, ali mnogi smatraju da je ta cifra znaÄajno umanjena.\r\n\r\nFrancuske trupe rasporeÄ‘ene su na devet vojnih lokacija u Siriji, a prisutne su i u gradu Manbij, na koji turska sprema ofanzivu. Na severu Sirije prisutne su i britanske trupe, ali nema pouzdanih informacija o njihovom broju.\r\n\r\nU sredu, turska drÅ¾avna novinska agencija Anadolu objavila je poverljive detalje o taÄnim lokacijama francuskih vojnika uSiriji, tvrdecÌi da je polovina od devet punktova zaÅ¡ticÌena od strane ameriÄkih vojnika i da cÌe stoga biti ranjivi nakon povlaÄenja Amerikanaca.\r\n\r\nRusija je upozorila Tursku da ne ulazi u Siriju nakon povlaÄenja ameriÄkih vojnika. Rusko Ministarstvo spoljnih poslova saopÅ¡tilo je u Äetvrtak da sever zemlje treba vratiti pod okrilje sirijske vlade.\r\n\r\nSirijske trupe upuÄ‡ene su prema gradu Manbij na severu, u koordinaciji sa kurdskim snagama, ali sirijska vojska joÅ¡ nije dobila dozvolu da uÄ‘e u grad. ÄŒini se da je ovaj potez namenjen da izmami veÄ‡e angaÅ¾ovanje evropskih saveznika.5\r\n\r\nTurska je uputila delegaciju u Moskvu na razgovore o nastaloj situaciji.', '5ceb21ed2477f8.68742642.jpg', 1, 1, 0),
(50, 'KrÄenje amazonske praÅ¡ume dostiglo najveÄ‡u stopu u deceniji!', 'KrÄenje amazonske praÅ¡ume u Brazilu dostiglo je najvecÌu stopu u ovoj deceniju, prema zvaniÄnim podacima.\r\n\r\nOko 7.900 kvadratnih kilometara najvecÌe svetske praÅ¡ume uniÅ¡teno je u periodu od avgusta 2017. do jula 2018. godine.\r\n\r\nMinistar za zaÅ¡titu Å¾ivotne sredine Edson Duarte saopÅ¡tio je da se radi o ilegalnoj seÄi drveta bez dozvole za rad.\r\n\r\nTokom predizborne kampanje ove godine, novoizabrani predsednik Å½air Bolsonaro zabrinuo je javnost najavama da Ä‡e dodatno oslabiti uticaj agencija za zaÅ¡titu Å¾ivotne sredine.\r\n\r\nNova ministarka poljoprivrede, Tereza â€‹â€‹Kristina Diaz, takoÄ‘e promoviÅ¡e popuÅ¡tanje kontrole nad agrotoksinima, zaÅ¡titom prirode i zemljiÅ¡tem autohtonog stanovniÅ¡tva.\r\n\r\nBrazilska federalna vlada je pokrenula mere za suzbijanje krÄenja praÅ¡ume 2004. godine. U toj godini je uniÅ¡ten deo praÅ¡ume veliÄine Haitija â€“ viÅ¡e od 27.000 km2.\r\n\r\nSatelitske podatke o krÄenju amazonske praÅ¡ume moÅ¾ete pogledati na ovom linku.', '5cefa1190d0575.29990557.jpg', 1, 3, 13),
(51, 'Miroslav KrleÅ¾a â€“ Varijacije na temu o umjetniÄkom stvaranju', 'ÄŒovjek u paleolitu doÅ¾ivio je nesumnjivo Å¾ivi pogled krave i on ga je umjetniÄki izrazio, a nije ga samo odrazio. U ovome, Äini se, leÅ¾i Äitav problem. Govoriti da je umjetnost â€žsubjektivni odraz objektivne stvarnostiâ€, znaÄi govoriti potpuno prazno, idealistiÄki, kao Husserl ili Rehmke. Gledati u Ð¾kÐ¾ krave na paleolitski, na kretski, na asirski ili na egipatski naÄin i vidjeti njen pogled tako kako ga je ugledao Chagall, nije jedno te isto.<br><br>\r\n\r\nSve civilizacije Å¾ive od plagijata. Prepisivanje homerskih epiteta u vezi sa volookom Herom predstavlja najtipiÄniji sluÄaj knjiÅ¾evne manire, a manira ne samo da nema nikakve veze s darom opaÅ¾anja, nego, obratno od toga, ona mu trajno smanjuje budnost i, uspavljujuÄ‡i ga, ona ga obmanjuje i, na kraju, ona nije ni izraz ni odraz, ona je majmunska grimasa i sigurna smrt svakog dojma.<br><br>\r\n\r\n<i>Ljepote pretvaraju se u politiku</i><br><br>\r\n\r\nBezbrojno mnogo savrÅ¡enih poetskih ljepota pretvorilo se u politiku, to jest u negaciju upravo one poezije, koja ih je rodila. To nas uÄi historija mnogobrojnih religija, a naroÄito historija evanÄ‘eoske ljubavi, koja je postala velikom evropskom politikom i na kraju puta, od neohelenistiÄkog stila do romaniÄke freske, od renesansnog slikarstva do Berninija, od Piera della Francesca do sadrenih kipova Djevice Lurdske i beuronske Å¡kole, otputovala u nepovrat ukusa.<br><br>\r\n\r\n<i>Raspon izmeÄ‘u misli i oblika</i><br><br> \r\n\r\nSve se likovne umjetnosti razvijaju u kobnom rasponu izmeÄ‘u misli i oblika, to jest u raskolu kakav zjapi izmeÄ‘u takozvane idealne zamisli i nezgrapnog ostvarenja u materiji. Upravo u tom fatalnom titranju i trajnim oscilacijama izmedu osnovne zamisli i ostvarenja leÅ¾i zagonetka ove plemenite igre, koja sama po sebi, osim toga Å¡to je igra, nema nikakve druge svrhe, a ipak je do danas svi druÅ¡tveni sistemi koriste za apologiju svojih praktiÄnih ciljeva.<br><br>\r\n\r\n<i>O ljudskim elementima</i><br><br>\r\n\r\nNisu samo formalni problemi Ð¾ kojima treba voditi raÄuna kad se piÅ¡u prikazi iz oblasti lijepih umjetnosti. RijeÄ je prije svega Ð¾ â€žljudskomâ€, Å¡to se objavljuje u umjetnosti. Bez toga neposrednog i iskrenog neÄeg Å¡to se zove â€žljudskoâ€, umjetnost bila bi besmislena igrarija â€žÄistih slikarskih vrijednostiâ€, tog novovjekog estetskog alfabeta, Äije hijeroglife umije da cita samo snobovska masa suvremenih aleksandrinskih moljaca.<br><br>\r\n\r\nBlesava i blagoglagoljiva pisanja Ð¾kÐ¾ umjetnosti kreÄ‡e se u okviru konvencionalnog brbljanja Ð¾ pomodnim kljuÄevima danaÅ¡njeg jalovog ukusa. Taj je kao muha. Na historijskim cestama umjetnosti nema leÅ¡a ni balege, gdje ti strvinari ne bi bili okupali svoja rila. Ono Å¡to su veliki majstori namrli kasnijim pokoljenjima to su ljudska svjedoÄanstva, a nisu feljtoni. Komentari su oduvijek zaostajali za djelom, veoma Äesto i onda, kad su se tog nezahvalnog posla primali umjetnici sami, a pogotovo, kad su se tom rabotom stali baviti profesionalni bukvojedi, kojima je jedina hrana hartija, uprljana Å¡tamparskim mastilom. Moljci umjetnosti kao takve roje se od poÄetka Ð¾kÐ¾ grobova umjetniÄkih svjedoÄanstava. Na odru talenata to su crvi, ostavljajuÄ‡i iza sebe crvotoÄine bez ikakvog smisla i svrhe.<br><br>\r\n\r\n<i>NajviÅ¡i usponi</i><br><br> \r\n\r\nNi jedan umjetnik ne stvara s istim potencijalom i s istim zanosom podjednako ustrajno. Svaki stvaralac ima svoje sretne dane, a i tada Äesto puta samo po nekoliko trenutaka svojih najviÅ¡ih uspona, koji ostaju kao najvaÅ¾niji datumi u Å¾ivotu jednog artista. Ne traju nadahnuÄ‡a kao navinuti satovi, da uvijek podjednako idu u kucaju. A kad se govori Ð¾ profilu jednog umjetnika, ne treba u njegovom stvaralaÄkom kalendaru zaboraviti njegove najviÅ¡e uspone!<br><br>\r\n\r\n<i>VeliÄina artistiÄke pojave</i><br><br>\r\n\r\nVeliÄina neke artistiÄke pojave Äesto je upravo u tome Å¡to se ona dramatski odvojila od svoje vlastite sredine, njenih moralnih i estetskih konvencija, Å¡to se sama oslobodila svojih vlastitih uzora, Å¡to je postala odmetnikom i bezboÅ¾nim negatorom svih konjunkturnih bogova i polubogova epohe. Obratno od uobiÄajenog pravila, veliÄinu jednog umjetnika ne treba mjeriti po tome Å¡to predstavlja tipiÄnost jedne sredine, nego po tome Å¡to je atipiÄan, Å¡to odudara, a ne Å¡to se podudara sa konvencijama i glupoÅ¡Ä‡u vlastitog vremena.<br><br>\r\n\r\n<i>Uloga temperamenta</i><br><br> \r\n\r\nIma umjetnika, kojima su prsti mrtvaÄki hladni, a drugi njuÅ¡kaju po tuÄ‘im izmetinama kao psi. Jedni su slijepo Äulni, uÅ¾ivajuÄ‡i u toplom Å¾enskom mesu, a drugi su zaljubljeni u otrovne zvijezde. OdreÄ‘ujuÄ‡i kvalitetu pojedinog umjetnika, mnogo je pouzdanije govoriti Ð¾ temperamentu Äovjeka, nego Ð¾ Äitavom nizu sporednih pojava, viÅ¡e-manje tehniÄke naravi. Boja, kolorizam, impast, gusto, tanko, prozirno, mesnato, kadaveriÄno, racionalnoproraÄunano, naivno ili rafinirano, mjeseÄarski ludo i tako dalje, sve to i mnogobrojne ostale nijanse kako se objavljuje jedna stvaralaÄka liÄnost, sve su to tjelesnom graÄ‘om umjetnika uslovljeni modaliteti, koji se javljaju kao sjenke pojedinih karaktera.<br><br>\r\n\r\n<i>AranÅ¾man</i><br><br>\r\n\r\nNaÄin kako se aranÅ¾iraju stvari u rijeÄima, u poeziji, u slikarstvu ili kiparstvu veoma je vaÅ¾an. Mnogo izvanrednih umjetniÄkih zamisli bilo je veÄ‡ upropaÅ¡teno aranÅ¾manom. Biti stvaralac ili aranÅ¾er, to su dvije sposobnosti, dva odvojena svojstva. Ta se svojstva nadopunjuju, ali ako je aranÅ¾ersko svojstvo razvijeno na Å¡tetu iskrenosti, takvo proÅ¾imanje svrÅ¡ava ruÅ¾no i neÄisto: s prevarom. Da bi Äovjek dao zapletenim odnosima pravu ocjenu, trebalo bi poznavati materiju. Treba voditi raÄuna i Ð¾ tome kako se u okviru nepregledne mase umjetniÄkih fakata Äesto radi Ð¾ prevari. Nigdje se tako ne vara kao u umjetnosti, a niÅ¡ta tako ne obmanjuje kao aranÅ¾man. AranÅ¾mani, kao opasni inspiratori prevare, falsifikata, konjunkturne zarade i bolesnih ambicija, traju vjekovima.<br><br>\r\n\r\n<i>Preocjenjivanje vrijednosti</i><br><br>\r\n\r\nU historiji umjetnosti dolazi do periodiÄkih razbistrenja, do revizija zabluda, do takozvanog preocjenjivanja krivih vrijednosti. Ta su sita i reÅ¡eta Äesto vezana Ð¾ razne konjunkture, koje isto tako stoje pod znakom pitanja. Sve teÄe, Ñ€Ð°k i u historiji umjetnosti niÅ¡ta ne stoji na istome mjestu. Å½ivimo u munjevitom preocjenjivanju vrijednosti. Pred naÅ¡im se oÄima ne ruÅ¡e samo pojmovi Ð¾ ustaljenim intelektualnim vrijednostima, nego Äitavi nauÄni sustavi, a tempo rasula gluposti i novih saznanja postaje sve strasniji. Sve Å¡to se smatralo remek-djelom u okviru jednog odreÄ‘enog vremenskog perioda, Äesto nije izdrÅ¾alo ocjene veÄ‡ slijedeÄ‡eg pokoljenja, a koliki su talenti zavladali Äitavim razdobljima tek poslije svoje smrti. Posmrtni putokazi, kojima mrtve pjesniÄke ruke usmjeruju nepoznata pokoljenja na izlete u neotkrivene Ljepote, nerazmjerno su vaÅ¾niji od sivoga prosjeka, koji se osipa kao pijesak u pustinji duha.<br><br>\r\n\r\n<i>Doktrine i teorije</i><br><br>\r\n\r\nÐžkÐ¾ umjetniÄkih perioda kruÅ¾e doktrine i teorije kao koluti Ð¾kÐ¾ Saturna, otrovnim svojim isparivanjem zamagljujuÄ‡i, a isto tako veoma Äesto i osvjetljujuÄ‡i mraÄne predjele ljudskih misli prozirnim snopovima zvjezdane rasvjete. Bez doktrina i bez teorija nema i nije bilo umjetnosti; likovne i poetske teorije, koliko god to izgledalo na prvi pogled bizarno, nisu manje vaÅ¾ne od samih umjetniÄkih djela.<br><br>\r\n\r\nMnoga remek-djela smatrana su atentatima protiv dobrog ukusa, a kasnije se pokazalo, da su to bili nezaboravni datumi u kalendaru lijepih vjeÅ¡tina. Ono Å¡to je od suvremenika bilo ocijenjeno kao ruÅ¡ilaÄka rabota ljepote i ukusa, Å¡to se smatralo ugroÅ¾avanjem estetskih naÄela, postalo je pokoljenjima koja dolaze â€” credo.<br><br>\r\n\r\nPokoljenja koja dolaze govore Ð¾ sebi uvijek poviÅ¡enim tonom, a taj ton smatra se obiÄno da je pravo mladosti, koja Äesto ima pravo samo zato, jer se tako smatra da ga ima, premda ni to nije pravilo za sva vremena. Poslije mnogobrojnih pokoljenja â€žkoja su dolazilaâ€, doÅ¡la su i druga, koja su ih stavila u ropotarnicu, i tako kroz vjekove uvijek pristiÅ¾u oni koji dolaze i odlaze oni koji su doÅ¡li, i uvijek se tako pokoljenja pokapaju uzajamno i ustrajno kroz pokoljenja, a da to zapravo s estetskim vrijednostima nema baÅ¡ savrÅ¡eno nikakve veze. Toj grobarskoj raboti, kao Å¡to nas iskustvo uÄi, nema kraja, a ipak koliko li je pokoljenja, od onih koja su glasno i presumptuozno stigla, nestalo u nepovratu da bi ih preÅ¾ivjela ona, koja su bila pokopana, kao na odlasku. U tome vrtlogu stojimo mi s naÅ¡om panoramom, i Ð¾ tome treba misliti trajno, ÄuvajuÄ‡i se oprezno naivnog Äudenja krivim vrijednostima, a naroÄito raspinjanja. Krivovjerci u umjetnosti, neustraÅ¡ivi propovjednici novoobretih estetskih fanatizama, Äesto puta su mnogo manje invenciozni od onih idola, koje su oborili svojim slijepim i jednostranim poricanjem, a, obratno opet, prokletnici, spaljeni na lomaci, ostaju pred historijom kao luÄonoÅ¡e. Nije se jedamput desilo u historiji, da su dogmatici propovijedali umorstvo najdivnijih nadahnuÄ‡a, kao i obratno, da su veliki pjesnici okrutno podavili masu krivovjernih poetskih laÅ¾i, kao maÄiÄ‡e.<br><br>\r\n\r\n<i>Nepriznati genije i furije</i><br><br>\r\n\r\nTamo, gdje van Gogh govori Ð¾ crvenocrnoj tjeskobi, Ð¾ stablu raskoljenu munjom, Ð¾ suncu, koje se raÄ‘a nad zlatnim Å¾itnim poljem, Ð¾ jednom priviÄ‘enju fantastiÄnog, a opet sasvim obiÄnog krajolika, gdje brazde teku do dna slike spram jednog zida i ljubiÄastih obrisa neke uzvisine u daljini, u tom zaÄaranom kraju, gdje bjelina sunca, okruÅ¾ena Å¾utom aureolom, svijetli nad Äamotinjom izgubljena putnika, tamo je reÄeno sve Ð¾ ovim pitanjima, Ð¾ kojima je potrebno progovoriti poetski, jer je takvo slikarstvo â€” zaista poezija sama.<br><br>\r\n\r\nDa bi ljudi osjetili oÄaj, pravi pravcati vangoghovski, upravo getsemanski oÄaj, kada se u agoniji jedne civilizacije pjesnici tipa vangoghovskog krvavo znoje pred posljednjim pitanjima, za to nije potrebno da se patetiÄno slika drama u baÅ¡ti getsemanskoj. Poderane cipele i smrad bijedne mansarde dostojna su scena za tu evropsku suvremenu golgotsku tragediju, ni po Äemu manje krvavu od one biblijske, koja u likovnoj umjetnosti kao ovjekovjeÄeni prizor traje veÄ‡ Äitav milenij, te od ducentista do beuronskih mazala nema pokoljenja koje se nije okuÅ¡alo golgotskom temom.<br><br>\r\n\r\n<i>Slikarstvo nije izolirana pojava</i><br><br>\r\n\r\nNikada pravi, veliki, autentiÄni slikari nisu svoju vjeÅ¡tinu zamiÅ¡ljali kao druÅ¡tveno izoliranu pojavu. Dobro slikarstvo javlja se uvijek uporedo sa visokim stepenom muzike i proze, nesumnjivih znakova Å¾ivotno povoljnih prilika, i kada je rijeÄ Ð¾ moralnim samoÄ‡ama â€žnepriznatih genija koje progone furijeâ€, ne treba zaboraviti da se velika imena u umjetnosti gotovo pravilno javljaju u rojevima. PrikazujuÄ‡i umjetniÄke probleme, valja trajno voditi brigu Ð¾ takozvanim niÅ¾im spratovima Å¾ivotnih uslova, sa Äitavom gradnjom socijalnih, ekonomskih i ideoloÅ¡kih pojava u okviru pojedinog vremena, u kome se umjetnost raÄ‘a, pali ili gasi kao Å¡to se gase krijesovi po ritmiÄkom zakonu sjene i svjetlosti. Giotto, Cimabue, Holbein ili van Dyck stvarali su u druÅ¡tvenim prilikama, koje su se dizale kao skele Ð¾kÐ¾ izgradnje jedne civilizacije u nastajanju i gdje je, po van Goghu, svaki pojedinac bio â€žkameni blokâ€, neka vrsta â€žestetskog monolitaâ€, od koga se dizala monumentalna zgrada jednog druÅ¡tvenog perioda, na koji Ä‡e joÅ¡ pokoljenja gledati s udivljenjem. Van Gogh je precizno znao da se â€žtakvo druÅ¡tveno obeliskno stanje neÄ‡e ostvariti joÅ¡ dugoâ€, tako dugo, ,,dok ga ne sagrade socijalistiâ€. Van Gogh nije sumnjao da Ä‡e do socijalistiÄkog ostvarenja u umjetnosti, uprkos svemu, jednoga dana ipak doÄ‡i.<br><br>\r\n\r\n<i>Estetika Druge internacionale, ili: PolitiÄka tendencija umjetnosti</i><br><br>\r\n\r\nOd Spenglera do Goebbelsa nacionalni socijalizam, faÅ¡izam i svi derivati sliÄnih pokreta uznastojali su da ozdrave, da izlijeÄe i da obnove prokletu â€žizopaÄenuâ€ umjetnost, i da je vrate na estetske izvore najsublimnijeg filistarskog ideala dosadnog i banalnog Å¾anr-slikarstva. PuÄkotribunska demagogija, sa poznatom i banalnom parolom, da svrha posveÄ‡uje sredstvo, odigrala je kod toga pokuÅ¡aja svoju bijednu ulogu: pod krinkom estetske diskusije radilo se zapravo Ð¾ fiziÄkom uniÅ¡tavanju politiÄkih protivnika. Per analogiam to se zbiva i danas: graÄ‘anske i negraÄ‘anske, burÅ¾ujske i proleterske klasnosvijesne kontaminacije, po zakonu uzajamnog stapanja u bezobliÄnu melasu jedne estetike, koja je veÄ‡ davno izgubila svaku vezu s poezijom ili s pojmom slobode umjetniÄkog stvaranja. U tom pogledu Crkva, koliko god je estetski konzervativna i marijalurdski raspoloÅ¾ena, ipak je elastiÄnija: ona podnosi konverzije Matissea, Coctaua i Dalija, upravo tako kao i Claudela, s indiferentnoÅ¡Ä‡u iskusne kurtizane, kojoj je jedino stalo do oporuke svojih ljubavnika.<br><br>\r\n\r\nPoslije kratkog kaotiÄnog, programatski neodreÄ‘enog, anarhoindividualistiÄkog i imaginistiÄkog perioda u prvoj fazi lenjinske diktature, poslije zbrkanih previranja u teorijskim oblastima, doÅ¡lo je do stezanja pojmova, do takozvane kristalizacije artistiÄkih programa, koja se naÅ¾alost, po zakonu tromosti, vraÄ‡ala pod okrilje propagandistiÄkih direktiva Druge internacionale, koja estetski nije zaista bila baÅ¡ naroÄito invenciozna, bez obzira na to Å¡to je upravo u oblasti politiÄki tendencioznog umjetniÄkog stvaranja mogla imati na tisuÄ‡e ingenioznih socijalnotendencioznih uzora.<br><br>\r\n\r\nPoslije genijalne ostavÅ¡tine jednog Daumiera, u vrijeme kada su Å¡ansonijeri po evropskim politiÄkim kabaretima imali nerazmjerno vise fantazije i duha od uvodniÄara socijalnodemokratske Å¡tampe, kada su jedan Steinlen ili jedan Forain u svojim slobodnim varijacijama tendencioznog, upravo propagandistiÄkog slikarstva joÅ¡ uvijek bili slobodno poetski i bogato stvaralaÄki raspoloÅ¾eni, sveukupna likovna propaganda Druge internacionale kretala se u sjeni Å¾anr-slikarstva Ã  la Piloty, koje se kasnije, u poodmaklom periodu ruske estetike, veÄ‡ Ð¾ÐºÐ¾ 1925â€”26, stalo pretvarati u varijantu Å¾danovizma, to jest danaÅ¡nje gerasimovÅ¡tine.<br><br>\r\n\r\nDok je joÅ¡ u ranijem periodu drugointernacionalne socijaldemokratske propagande jedna KÃ¤the Kollwitzova stvarala po izboru vlastitog ukusa i spontane politiÄke inspiracije, estetski teoreticari, takozvani mislioci tipa Georga von Lukacsa, kasnije RÃ©vaia ili Abuscha, ili pjesnici tipa Brechta ili Bechera zaputili su se u tom pogledu komformistiÄkom stazom, pod teÅ¾inom estetskih fraza politiÄke naravi vise nego knjiÅ¾evne. Oba pamfleta Vlaminckova protivu Picassa i picassizma, onaj iz 1943 i posljednji iz 1957, pisana su po temperamentnom Äovjeku, kome je dosadila zakulisna mehanika guggenheimovskog mehanizma, a te dvije pobune, ta dva aspekta antipicassovÅ¡tine, jedan Vlaminckov, a drugi Å½danova i Gerasimova, ipak i usprkos svemu â€” si duo faciunt idem, non est idem.<br><br>\r\n\r\n<i>GerasimovÅ¡tina</i><br><br>\r\n\r\nU okviru tih sudara davno se veÄ‡ ne radi Ð¾ umjetnosti, nego Ð¾ krvi i Ð¾ zlatu; Ð¾ kapitalistiÄkom zulumu s jedne, Ð° Ð¾ strogo discipliniranoj politici in musicis et in artibus â€” s druge strane. Ogromna koliÄina zapadnoevropske naslikane Robe, u koju su uloÅ¾eni milijuni, upravo, milijarde, djeluje u plaÄ‡enoj kapitalistiÄkoj Å¡tampi po vlastitim milijarderskim zakonima, a Å¾anr-slikarstvo tipa Å¾danovljevske gerasimovÅ¡tine danas ili tipa rosenberggoebbelsovske likovne propagande juÄer isto je tako plaÄ‡ena roba, koja je, pretvorivÅ¡i se u ordimiranu frazu kadaveriÄne, jezuitske, vojniÄke discipline, isto tako davno prestala biti neposrednim ljudskim svjedoÄanstvom socijalne ili moralne istine. Pro foro externo oba se krila bore za punu slobodu umjetniÄkog stvaranja na rijeÄima, ratujuÄ‡i zapravo pod barjacima najvulgarnijih fraza kakve su od poÄetka smrtna opasnost za svaku pjesniÄku slobodu.<br><br>\r\n\r\nGerasimovÅ¡tina nije iskljuÄivo Å¾danovljevski specifikum. GerasimovÅ¡tina je likovni ideal svih oficijelnih slikarstava Zapadne Evrope, bez obzira na to da li su rojalistiÄka ili republikanska, jer upravo svi zapadnoevropski kraljevski dvorovi kultiviraju gerasimovÅ¡tinu kao svoj salonski ideal, tj. kao ideal revolucionarnog, kolhoznog socijalistiÄkorealistiÄkog slikarstva. GerasimovÅ¡tina prema tome ne predstavlja ni estetsku ni idejnu negaciju ove tipiÄno burÅ¾ujske i kapitalistiÄke mode iz druge polovine XIX stoljeÄ‡a, poÅ¡to ona sama po sebi i nije drugo nego facsimile upravo te iste graÄ‘anske site i dosadne mode.<br><br>\r\n\r\nNe treba kod razmatranja ove problematike ni jednog trenutka smetnuti s uma da smo okruÅ¾eni masom staromodnih estetskih konvencija, koje uÅ¾ivaju plebiscitarno odobravanje kompaktnih demokratskih veÄ‡ina desne i lijeve socijalne hemisfere. MarÅ¡al Joffre, na primjer, bio je uvjeren, da je horacevernetovsko slikanje bitaka umjetniÄki nedostiÅ¾ivi â€žnon plus ultraâ€, a i marÅ¡al Hindenburg vjerovao je u gerasimovÅ¡tinu, uÄestvujuÄ‡i kod izrade velike kompozicije Bitka kod Tannenberga svojim savjetima kao likovni vatrogasac od glave do pete. Å½ivimo u periodu likovnog ukusa kada je gerasimovÅ¡tina joÅ¡ uvijek neprikosnoveni kanon i ideal kapitalistiÄkih i proleterskih pokoljenja podjednako, poÅ¡to Raskol ukusa nije joÅ¡ razdvojio ova dva socijalno raskoljena medija! Da su evropski slikari, u traganju za novim tehnikama, doputovali na kraju do papiers collÃ©a, teÅ¡ko Ä‡e biti objasniti likovno konzervativnim idealistima iz kompaktne demokratske veÄ‡ine, na Äelu sa Joffreom, Hindenburgom, Horaceom Vernetom i Gerasimovom. (Å to se tiÄe rafinmana u ukusu, velike krojaÄke firme i danas vladaju modom i ukusom mondenog svijeta po bizarnim i hirovitim obratima, koji se mijenjaju sezonski, a pokraj toga kreÄ‡u se sive i bezliÄne milijarde ÄovjeÄanstva viÅ¡e-manje u prnjama, odjevene potpuno nezavisno od estetskih pomodnih ideala.)<br><br>\r\n\r\nHoÄ‡e li se govoriti Ð¾ tim pitanjima zaista iznad meteÅ¾a, valja trajno imati na umu bilateralni pregled sveukupnog stanja zbrke, ne zaboravljajuÄ‡i ni trenutka da se radi Ð¾ procesu koji traje veÄ‡ viÅ¡e od pedeset godina, a koji po elementima koji ga uslovljuju i po naÄinu kako se objavljuje u ratovima i u revolucijama, u opÄ‡oj babilonskoj guÅ¾vi rasula graÄ‘anskog tipa suvremene civilizacije, prelazi okvire estetske raspre.<br><br>\r\n\r\n<i>RaÅ¡ÄovjeÄenje</i><br><br>\r\n\r\nOd Busonijevih teorija Ð¾ â€žÄŒistoj Muziciâ€, Ð¾ znaÄenju apsolutnog zvuka, Ð¾ sonornim masama â€žzvuka kao takvogâ€, radi se viÅ¡e Ð¾ glasnoj, viÅ¡e zapravo Ð¾ politiÄki strateÅ¡koj diskusiji, nego Ð¾ razmatranju neposrednog i izvornog stvaralaÄkog umjetniÄkog procesa. Kao Å¡to je Busoni pretvorio sonornu masu u neku vrstu idola ili poluboÅ¾anstva, u pojavu â€žÄŒistog Zvuka kao takvogâ€, â€žZvuka po sebiâ€, tako je i Kandinski odvojio Boju i GrafiÄku Liniju od bilo kakvog ljudskog sadrÅ¾aja, pretvorivÅ¡i ih u Äisti fantom, koji postoji nezavisno od bilo Äega Å¡to je ljudsko.<br><br>\r\n\r\nEvropska lirika na prijelazu iz devetnaestog u dvadeseto stoljeÄ‡e izolirala se od politiÄke i moraine stvarnosti melankoliÄnim i pasivnim lirskim solipsizmom, postavivÅ¡i pitanje idejnog ili neidejnog u umjetniÄkom stvaranju kao kanon. Bez obzira na to Å¡to su Chopin, HÃ¤ndel, Bach ili Beethoven bili idejno odreÄ‘eni umjetnici, Å¡to se i muzika za posljednjih pedesetak godina sve viÅ¡e spiritualizira i oduhovljujuÄ‡i se tendenciozno postaje sve desnija, Å¡to u povijesti likovnih umjetnosti i knjiÅ¾evnosti zapravo nema ni jednog velikog imena koje ne bi bilo idejno tendenciozno, pitanja lijeve ili desne orijentacije spadaju u Äistu retoriku. Desno orijentirani artisti Äesto su formalno nerazmjerno ljeviji nego Å¡to su lijevi, a lijevi su Äesto formalno desniji od onih koje poriÄu in artibus.<br><br>\r\n\r\nPostavlja se u okviru ove zbrke osnovno pitanje: moÅ¾e li se umjetniÄko stvaranje kao takvo odvojiti od ljudskog pamÄ‡enja, od svijesti, od nagona, od uspomena, od Å¾elja ili od fantazije, elemenata vezanih iskljuÄivo na objavljenje ljudskog biÄ‡a? MoÅ¾e. DogaÄ‘alo se to u raznim periodima od aleksandrinizma do ikonoklastiÄkih bojeva u Bizantiji, kada je metafiziÄki pojam Pneume, kao â€žÄista i idealnaâ€ apstrakcija ,,po sebiâ€, kroz nekoliko generacija u estetskim diskusijama poprimio stvaran oblik negacije svake likovne ljudske pojave kao takve. Sve je postalo arabeska na perzijskom Ä‡ilimu, a taj kult apstraktnih forama proÅ¡irio se preko Äitavog civiliziranog svijeta kao uzor ljepote stoljeÄ‡ima.<br><br>\r\n\r\nU danaÅ¡njim maglama javlja se Äitava vrsta komponenata podjednako mutnih i nejasnih, ali po manifestaciju ÄovjeÄnosti i ljudskih elemenata u umjetnosti podjednako kobnih. Dok je literatura od romantizma pa preko naturalizma sve do velikih imperijalistiÄkih ratova igrala ulogu predvodnika, danas, u okviru ovih estetskopolitiÄkih diskusija, koje se odvijaju u sjeni rasula ustaljenih konzervativnih shema, svedena je na sjenku od sjenke. Mjesto da predvodi, ona se povodi, pretvorivÅ¡i se iz proroka u apologeta unosne Robe, koja svojim ogromnim koliÄinama preplavljuje suvremenu civilizaciju, kao reklama te iste Robe ili kao politiÄka ideologija ili socioloÅ¡ka parola, koja poriÄe besmisao umjetnosti kao Robe, a to propovijeda dosadnim i dÃ©modÃ© formulama, potpuno nepodesnim za bilo kakvu, pak i najminimalniju estetsku formulaciju onih tendencija, koje nastoji umjetniÄki izraziti. U okviru tog procesa u ljudsku svijest prodiru novi elementi novih perspektiva: nuklearnih i interplanetarnih. Uslijed sve veÄ‡e uloge strojeva, lopta postaje sve manja a Äovjek kao takav, Äovjek ovih ratova i ovih revolucija, ostaje nezapaÅ¾en, nepoznat, neviÄ‘en, neopisan, artistiÄki neostvaren.<br><br>\r\n\r\nÅ½ivot protjeÄe pokraj estetskih formula. Ogromne povorke milijunskih masa jalovo nestalih neprirodnom smrÄ‡u prelaze preko dasaka scene, koja je prazna i koja je veÄ‡ davno prestala da bude â€žÅ¾ivot Äovjekaâ€. Teorije koje propovijedaju tendenciju u poeziji i u likovnim oblastima, u vrtlogu revolucija, ratova i kriza, ne umiju da otkriju i pronaÄ‘u pravu pjesniÄku rijeÄ zato, jer im je izraziti estetski ideal: ostvarenje ljepote po principu lehÃ¢rske operete ili srednjovjekovnog zaglupljivanja parolama oduhovljenja i teorijama Ð¾ posljednjim stvarima.', '5ceb2555151bc4.93111283.jpg', 1, 4, 0),
(61, 'Neka proba', 'Nesto, neki tekst', '5cef33d733e291.13327125.png', 1, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `omiljeno`
--

DROP TABLE IF EXISTS `omiljeno`;
CREATE TABLE IF NOT EXISTS `omiljeno` (
  `id_objave` int(11) NOT NULL,
  `id_klijenta` int(11) NOT NULL,
  PRIMARY KEY (`id_objave`,`id_klijenta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `omiljeno`
--

INSERT INTO `omiljeno` (`id_objave`, `id_klijenta`) VALUES
(49, 18),
(50, 18),
(51, 1),
(51, 20);

-- --------------------------------------------------------

--
-- Table structure for table `podkategorija`
--

DROP TABLE IF EXISTS `podkategorija`;
CREATE TABLE IF NOT EXISTS `podkategorija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) CHARACTER SET dec8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `podkategorija`
--

INSERT INTO `podkategorija` (`id`, `naziv`) VALUES
(13, 'Vesti'),
(14, 'Analize i Kritike'),
(15, 'Intervju'),
(16, 'Teorija'),
(17, 'StruÄni radovi'),
(18, 'Zanimljivosti');

-- --------------------------------------------------------

--
-- Table structure for table `reklama`
--

DROP TABLE IF EXISTS `reklama`;
CREATE TABLE IF NOT EXISTS `reklama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) NOT NULL,
  `slika` varchar(30) NOT NULL,
  `pozicija` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reklama`
--

INSERT INTO `reklama` (`id`, `naziv`, `slika`, `pozicija`) VALUES
(8, 'AMS velika', '5cec8aa01c78d4.65845288.png', 1),
(6, 'AMS', '5cec81b87cdbc1.67503347.png', 3),
(13, 'Lidl', '5cef9f08b29713.21155233.png', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
