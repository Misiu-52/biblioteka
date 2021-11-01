-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Lis 2021, 13:31
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `2021_2b1_biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunki`
--

CREATE TABLE `gatunki` (
  `lp` int(3) NOT NULL,
  `gat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `gatunki`
--

INSERT INTO `gatunki` (`lp`, `gat`) VALUES
(1, 'Biografia'),
(2, 'Historia'),
(3, 'Kucharska');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `id` int(4) NOT NULL,
  `tyt_pol` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `tyt_org` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `autor` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `gatunek` int(2) NOT NULL,
  `wydawnictwo` int(2) NOT NULL,
  `opis` text COLLATE utf8mb4_polish_ci NOT NULL,
  `okladka` int(3) NOT NULL,
  `cena` decimal(8,2) NOT NULL,
  `datawyd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`id`, `tyt_pol`, `tyt_org`, `autor`, `gatunek`, `wydawnictwo`, `opis`, `okladka`, `cena`, `datawyd`) VALUES
(1, 'Niezniszczalny', 'Niezniszczalny', 'Gutowski Cezary, Marciniak Aldona', 1, 1, '„Temat na scenariusz”, „Jeśli wróci, będzie z tego piękny film” – pisali i mówili kibice oraz dziennikarze, gdy kilka miesięcy temu pojawiły się informacje, że Robert Kubica ma szanse, po ośmiu latach przerwy, znów ścigać się w Formule 1. W tym niezwykłym – dla każdego, kto zna losy zdolnego kierowcy – wydarzeniu słusznie dostrzegali potencjał na pasjonującą hollywoodzką story. A przecież Polak pierwsze fragmenty świetnego filmowego scenariusza „pisał” już od lat. Jest w nim wszystko, co kochają widzowie pod każdą szerokością geograficzną: dziecięca pasja, młodzieńcze lata wyrzeczeń, rozłąka z rodziną, wielkie sukcesy i bolesne porażki, dramatyczne wypadki, walka o życie, zdrowie, powrót do wyczynowego sportu… Kariera Roberta jest pełna momentów, w których dokonywał wręcz niewyobrażalnego – pokazujących nie tylko, jakim jest sportowcem, ale przede wszystkim, jakim człowiekiem.', 1, '39.00', '2019-02-27'),
(2, 'Mark Webber. Moja Formuła 1', 'Aussie Grit: My Formula One Journey', 'Webber Mark', 1, 2, '\"Jakim, k***a, cudem zamierzasz dostać się z Queanbe­yan do F1?\" – pytali go wszyscy, gdy opowiadał o swoich planach na przyszłość. Kiedy jako 11-latek wspinał się na drzewa, by stamtąd obserwować Grand Prix Australii, nie marzył nawet, że 15 lat później stanie na starcie tego wyścigu i zdobędzie pierwsze punkty w Formule 1.\r\n\r\nMarka Webbera od zawsze interesowało tylko jedno: ściganie. Nie wewnętrzne gierki i strategie. Zawsze chciał po prostu jechać jak najszybciej i dotrzeć do mety przed innymi. Właśnie dlatego po dołączeniu do Red Bull Racing stracił całą miłość do F1...\r\n\r\nTa książka jest taka jak on: szczera, bezkompromisowa, prawdziwa. To opowieść o pracy kierowcy wyścigowego, samotności w kokpicie, ciągłej presji, maksymalnym skupieniu. To spojrzenie za kulisy padoku F1. Wreszcie – to szansa poznania prawdziwego oblicza gwiazd tego sportu: aroganckiego Sebastiana Vettela, bezwzględnego Michaela Schumachera, \"cholernie twardego\" Roberta Kubicy.\r\n\r\nJeśli zawsze marzyłeś o wniknięciu w fascynujący i bezwzględny świat Formuły 1, to dzięki autobiografii Webbera znajdziesz się w jego środku. Zapnij dobrze pasy, to będzie długi wyścig z wieloma ostrymi zakrętami.\r\n\r\n\"Porywająca historia Marka Webbera udowadnia, że wyścigi to nie tylko rywalizacja kolorowych samochodów, w której zawsze zwyciężają najlepsi. Australijczyk szczerze i bezkompromisowo, jak to ma w zwyczaju, opisuje fascynujące kulisy drapieżnego świata Formuły 1. Radzę zaplanować strategię czytania bez ani jednego pit stopu!\"\r\nMikołaj Sokół, dziennikarz i komentator F1\r\n\r\n\"Gdy tylko Mark Webber ogłosił odejście na emeryturę, każdy prawdziwy fan Formuły 1 czekał jego autobiografię. Czekał, wiedząc, że nie znajdzie w niej zbędnych ozdobników i PR-owego bełkotu, lecz tyle prawdy o F1, ile można zawrzeć, nie narażając się na konsekwencje prawne. \"Rzadko w padoku F1 spotyka się tak szczerą osobę\" – powiedział mi o Webberze Robert Kubica. Ta lektura tylko to potwierdza.\"\r\nCezary Gutowski, dziennikarz motoryzacyjny', 1, '44.39', '2016-10-12'),
(3, 'Ted Bundy. Bestia obok mnie.', 'The Stranger Beside Me', 'Rule Ann', 1, 2, 'Pierwsze polskie wydanie klasyki true crime!\r\n\r\nPrzerażająca do szpiku kości i zaskakująco intymna legendarna już książka Ann Rule to opowieść kobiety, która zdaje sobie sprawę, że chłopak z dyżurki obok, jej przyjaciel, wrażliwy pracownik telefonu zaufania, to potwór w ludzkiej skórze.\r\n\r\nKażdej przewróconej stronie towarzyszy zimny dreszcz, bo czy tak naprawdę znamy naszych bliskich? \r\n\r\nTed Bundy był jednym z najokrutniejszych amerykańskich seryjnych morderców, który przyznał się do zabicia przynajmniej trzydziestu sześciu młodych kobiet na terenie całego kraju. Skazano go na śmierć za trzy zabójstwa.\r\n\r\nKorzystając z prywatnej korespondencji z Bundym, prowadzonej aż do jego egzekucji, Rule kreśli fascynującą opowieść rozpiętą między osobistą perspektywą a zawodowym profesjonalizmem dziennikarki będącej na tropie seryjnego mordercy, charyzmatycznego i inteligentnego człowieka, którego miała za przyjaciela.\r\n\r\nOto jego historia: historia podwójnego życia, magnetycznej mocy, bezwzględnego przymusu i bezbronnych ofiar bestii. Spisana skrupulatnie przez kobietę, która myślała, że zna Teda Bundy’ego, dopóki nie zaczęła łączyć wszystkich dowodów i wyłonił się z nich przerażający obraz…\r\n\r\n\"Gdyby tę historię wymyślił powieściopisarz, uznano by ją za zbyt nieprawdopodobną. Ann Rule chciała opisać serię niewyjaśnionych brutalnych zabójstw młodych, atrakcyjnych kobiet, a okazało się, że sprawcą morderstw jest jej sympatyczny przyjaciel. Jako autorka dostała jedną na sto milionów szansę od losu i potrafiła ją godnie wykorzystać bez uciekania się do tanich efektów. Niesamowita literatura faktu. Klasyka gatunku.\"\r\nMarcin Meller\r\n\r\n\"W tę historię trudno uwierzyć, ale wydarzyła się naprawdę. Dwójka zagubionych życiowo osób, niespodziewana przyjaźń i wreszcie koszmar, gdy wychodzi na jaw, że on - Ted Bundy - to jeden z najgroźniejszych seryjnych zabójców w historii. Pasjonująca, zaskakująca i przerażająca książka.\"\r\nWojciech Chmielarz', 2, '35.09', '2021-07-28'),
(4, 'Mussolini. Butny faszysta', 'Mussolini. Butny faszysta', 'Hagg Goran', 2, 3, 'Wnikliwe studium opętania władzą, rzucające nowe światło na postać włoskiego dyktatora.\r\n\r\nWizerunek Mussoliniego i Hitlera, a także stworzonych przez nich reżimów zlał się ze sobą do tego stopnia, że twórca faszyzmu zniknął w cieniu Führera, uznany za jego nieudane wcielenie albo wręcz komiczną kopię. Tymczasem to właśnie władza Mussoliniego miała o wiele bardziej totalny charakter, a stworzony przez niego system był całkowicie zależny od jednego, owładniętego manią wielkości dyktatora. \r\nMożna sobie wyobrazić ideologię nazistowską, jej zbrodnie i rytuały bez Hitlera. Komunistyczny terror istniał zarówno przed, jak i po Stalinie. Trudno jednak wyobrazić sobie faszyzm bez Mussoliniego – twórcy mitologii, stanowiącego jednocześnie jej ucieleśnienie.\r\nZbrodniarze, którzy znajdowali się w bliskim otoczeniu Hitlera – Göring, Goebbels, Himmler, i wielu innych – mieli własny charakter, ściśle określony zakres władzy, a czasem nawet cieszyli się osobistymi sukcesami. Stalin przeprowadzał kolejne czystki na szczytach władzy i niszczył prawdziwych albo urojonych rywali, ale w dniu jego śmierci nadal żył Beria i wielu mu podobnych. Tymczasem całe otoczenie Mussoliniego stanowiło jedynie blade tło dla dyktatora, który sprawował pełnię władzy i bez namysłu wprowadzał w życie najmroczniejsze wizje, jakie podsuwała mu wyobraźnia. Mussolini sam obsadzał najwyższe stanowiska w państwie i wymieniał urzędników na każdym szczeblu, mógł wedle uznania zmieniać konstytucję i dla kaprysu wywoływał wojny, okupione hekatombą ofiar. \r\n„Mussolini” Görana Hägga to wnikliwe studium opętania władzą, rzucające nowe światło na postać włoskiego dyktatora. ', 2, '43.99', '2015-08-11'),
(28, 'Krzysztof Krawczyk. Życie jak wino', 'Krzysztof Krawczyk. Życie jak wino', 'Krawczyk Krzysztof , Kosmala Andrzej', 1, 3, '\"Życie jak wino\" – uzupełniona, oficjalna (auto)biografia Krzysztofa Krawczyka, opowieść na dwa głosy: artysty oraz jego menedżera – Andrzeja Kosmali.\r\n\r\nCałe życie wielkiego piosenkarza aż po jego ostatnie dni. Tylko w tej książce przeczytacie o niespotykanej męskiej przyjaźni, dowiecie się, jak wyglądały kulisy sławy i barwne życie Krzysztofa Krawczyka, a także zapoznacie się z anegdotami i wcześniej nieznanymi faktami. Całość dopełniona wypowiedziami współpracowników artysty i jego najbliższych przyjaciół. Wielką gratką dla fanów artysty będzie bogaty materiał ilustracyjny – zdjęcia z prywatnego archiwum Artysty.\r\n\r\n\"Kończę Drugi Rozdział, ten ostatni, książki \"Życie jak wino\". W tej odsłonie towarzyszyłeś mi duchem, przywoływałeś pamięć, prowadziłeś pióro w mojej dłoni. I zaprosiłeś do wspomnień swoich najbliższych Przyjaciół i Współpracowników.\r\n\r\nTy już wypiłeś wino swego życia. Ja dopijam swoje i zastanawiam się, kiedy skosztuję jego ostatni haust. Ty, wędrując po winnicy niebiańskiej, raczysz się nektarem z jej owoców. Czy to drugie życie też jest jak wino? Choć w wieczystej rzeczywistości zapewne smakuje inaczej. A Ty, wznosząc kielich wina, nucisz naszą piosenkę:\r\n\r\nŻycie jest za krótkie, żeby pić marne wino,\r\n\r\nŻycie jest za krótkie, by miłości dać zginąć,\r\n\r\nŻycie jest za krótkie, żeby się nie spieszyć,\r\n\r\nŻycie jest za krótkie, by się nim nie cieszyć!\"\r\n\r\nANDRZEJ KOSMALA (maj, 2021)', 1, '45.00', '2021-08-11'),
(30, 'C.k. kuchnia', 'C.k. kuchnia', 'Makłowicz Robert', 1, 3, '„C.k. kuchnia” to nie tylko książka kucharska, lecz również opowieść o czasach, gdy Europa Środkowa stanowiła jedność pod berłem Habsburgów. Amatorzy kulinariów odnajdą na jej łamach 84 przepisy z tamtych czasów i tamtych ziem, od Adriatyku po Karpaty. Przepisy reprezentatywne dla dzisiejszych kuchni narodowych - węgierskiej, czeskiej, rumuńskiej, austriackiej, bośniackiej, słowackiej czy też północnowłoskiej - kiedyś zwanych po prostu c.k. kuchnią. Ci wszyscy, którzy nad gotowanie przedkładają historię, też nie powinni być zawiedzeni. Każdą kuchenną receptę poprzedzają bowiem krótkie historie, których bohaterami są monarchowie, arcyksiążęta, sławni wodzowie i herosi oręża, a także zwykli obywatele naddunajskiej monarchii. Niektóre z owych historii rzeczywiście miały miejsce, niektóre zrodziła jedynie wyobraźnia autora, choć trzeba z całą sumiennością zaznaczyć, że została ona zapłodniona przez lekturę memuarów i gazet sprzed pierwszej wojny światowej. Najpochlebniejsi recenzenci przyrównują styl autora do niezpomnianej frazy Jaroslava Haška, przed czym autor się broni, a powoduje nim nie tylko wrodzone głębokie poczucie skromności, lecz również pamięć o ochotniczej służbie Haška w Armii Czerwonej w charakterze politruka. „C.k. kuchnię” niezrównanie ozdobił akwarelami Andrzej Zaręba, artysta od lat współpracujący z Robertem Makłowiczem i dzielący z nim gorące uczucia do Austro-Węgier.', 1, '35.00', '2015-09-04'),
(46, 'dasddasd', 'sadasdasdasdasd', 'ddsadsadsa', 3, 5, 'asdsadsad', 1, '12.00', '2021-10-07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `idoc` int(11) NOT NULL,
  `idks` int(11) NOT NULL,
  `tresc` text NOT NULL,
  `idus` int(3) NOT NULL,
  `datadod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`idoc`, `idks`, `tresc`, `idus`, `datadod`) VALUES
(1, 30, 'xDD', 1, '2021-10-24 18:24:58'),
(16, 30, 'sad', 2, '2021-10-26 21:19:46'),
(21, 30, 'x', 3, '2021-10-28 01:25:27'),
(23, 30, 'testowanie', 1, '2021-10-31 09:23:12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `okladka`
--

CREATE TABLE `okladka` (
  `idokl` int(3) NOT NULL,
  `okl` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `okladka`
--

INSERT INTO `okladka` (`idokl`, `okl`) VALUES
(1, 'Miękka'),
(2, 'Twarda'),
(3, 'Zintegrowana');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `iduser` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `admin` int(1) NOT NULL,
  `kol_pdst` varchar(8) COLLATE utf8_polish_ci DEFAULT NULL,
  `kol_ciem` varchar(8) COLLATE utf8_polish_ci DEFAULT NULL,
  `kol_jas` varchar(8) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`iduser`, `user`, `pass`, `admin`, `kol_pdst`, `kol_ciem`, `kol_jas`) VALUES
(1, 'adam', 'qwerty', 1, '#88a271', '#387002', '#99d066'),
(2, 'marek', 'asdfg', 0, '', '', ''),
(3, 'anna', 'zxcvb', 0, '', '', ''),
(4, 'andrzej', 'asdfg', 0, '', '', ''),
(5, 'justyna', 'yuiop', 0, '', '', ''),
(6, 'kasia', 'hjkkl', 0, '', '', ''),
(7, 'beata', 'fgthj', 0, '', '', ''),
(8, 'jakub', 'ertyu', 0, '', '', ''),
(9, 'janusz', 'cvbnm', 0, '', '', ''),
(10, 'roman', 'dfghj', 0, '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyd`
--

CREATE TABLE `wyd` (
  `idwyd` int(3) NOT NULL,
  `wyd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wyd`
--

INSERT INTO `wyd` (`idwyd`, `wyd`) VALUES
(1, 'Ringier Axel Springer Polska Sp. z o.o'),
(2, 'Wydawnictwo SQN'),
(3, 'Prószyński Media'),
(4, 'Wysoki Zamek'),
(5, 'Świat Książki');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `gatunki`
--
ALTER TABLE `gatunki`
  ADD PRIMARY KEY (`lp`);

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wydawnictwo` (`wydawnictwo`),
  ADD KEY `gatunek` (`gatunek`),
  ADD KEY `okladka` (`okladka`);

--
-- Indeksy dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`idoc`),
  ADD KEY `idus` (`idus`);

--
-- Indeksy dla tabeli `okladka`
--
ALTER TABLE `okladka`
  ADD PRIMARY KEY (`idokl`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `user` (`user`);

--
-- Indeksy dla tabeli `wyd`
--
ALTER TABLE `wyd`
  ADD PRIMARY KEY (`idwyd`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `gatunki`
--
ALTER TABLE `gatunki`
  MODIFY `lp` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `idoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT dla tabeli `okladka`
--
ALTER TABLE `okladka`
  MODIFY `idokl` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `wyd`
--
ALTER TABLE `wyd`
  MODIFY `idwyd` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD CONSTRAINT `ksiazki_ibfk_1` FOREIGN KEY (`wydawnictwo`) REFERENCES `wyd` (`idwyd`),
  ADD CONSTRAINT `ksiazki_ibfk_2` FOREIGN KEY (`gatunek`) REFERENCES `gatunki` (`lp`),
  ADD CONSTRAINT `ksiazki_ibfk_3` FOREIGN KEY (`okladka`) REFERENCES `okladka` (`idokl`);

--
-- Ograniczenia dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD CONSTRAINT `ss` FOREIGN KEY (`idus`) REFERENCES `uzytkownicy` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
