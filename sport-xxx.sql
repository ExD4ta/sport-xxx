-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 11, 2024 alle 16:43
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport-xxx`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articolo`
--

CREATE TABLE `articolo` (
  `nome` varchar(255) NOT NULL,
  `id_articolo` varchar(255) NOT NULL,
  `quantita` int(11) NOT NULL,
  `costo` float NOT NULL,
  `sport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `articolo`
--

INSERT INTO `articolo` (`nome`, `id_articolo`, `quantita`, `costo`, `sport`) VALUES
('palle', '1', 3, 44.99, 'misto'),
('giubbotto termico', '10', 2, 60, 'snowboard'),
('scalda collo', '11', 4, 14.99, 'snowboard'),
('cera', '12', 2, 6.99, 'snowboard'),
('io quando', '2', 91, 2499.99, 'misto'),
('scarponi', '3', 3, 99, 'snowboard'),
('tavola da snowboard', '4', 4, 299.49, 'snowboard'),
('differenziale', '5', 0, 580, 'drifting'),
('gomme 17 pollici', '6', 0, 300, 'drifting'),
('paracadute', '7', 2, 120, 'paracadutismo'),
('guanti', '8', 3, 20.99, 'snowboard'),
('occhiali snowboard', '9', 5, 10.99, 'snowboard');

-- --------------------------------------------------------

--
-- Struttura della tabella `carello`
--

CREATE TABLE `carello` (
  `prodotto` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `utente` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `evento`
--

CREATE TABLE `evento` (
  `id_evento` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_inizio` date NOT NULL,
  `data_fine` date NOT NULL,
  `sport` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `evento`
--

INSERT INTO `evento` (`id_evento`, `descrizione`, `nome`, `data_inizio`, `data_fine`, `sport`, `indirizzo`) VALUES
('1', 'alla', 'alla', '2024-05-01', '2024-05-16', 'misto', 'io quando'),
('2', 'n', 'n', '2024-05-13', '2024-05-30', 'drifting', 'a'),
('3', '6', '6', '2014-05-09', '2024-05-09', 'snowboard', '6');

-- --------------------------------------------------------

--
-- Struttura della tabella `insegnati`
--

CREATE TABLE `insegnati` (
  `nome` varchar(255) NOT NULL,
  `codice_fiscale` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `sport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `insegnati`
--

INSERT INTO `insegnati` (`nome`, `codice_fiscale`, `cognome`, `descrizione`, `sport`) VALUES
('Andrea', 'BLTNDR02P44A662D', 'Beltramelli', 'ti insegna a fare gwagwa banene', 'misto'),
('Io', 'QNDIOX80A01D325J', 'Quando ', 'io... quando...', 'misto'),
('Edoardo', 'SRTDRD24E11D325X', 'Sartori', 'ti insegna a fare le daily', 'snowboard');

-- --------------------------------------------------------

--
-- Struttura della tabella `negozio`
--

CREATE TABLE `negozio` (
  `num_telefonico` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE `news` (
  `titolo` varchar(255) NOT NULL,
  `testo` varchar(4096) NOT NULL,
  `ora` time NOT NULL,
  `data` date NOT NULL,
  `sport` varchar(255) NOT NULL,
  `n_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `news`
--

INSERT INTO `news` (`titolo`, `testo`, `ora`, `data`, `sport`, `n_like`) VALUES
('l’incredibile record di velocita\' viene battuto da un americano', 'Mitchell E. Covington questo e\' il nome dell\'americano che ieri ha battuto il precedente record posseduto da Antti Luhtanen per la maggiore velocita\' raggiunta durante un lancio col paracadute.\r\nCovington si e\' lanciato da 40.125 metri raggiungendo così la sorprendente velocita\' di 1.423 km/h il record precedente era 1.357 chilometri orari, Covington al atterraggio e stato subito informato della riuscita della sua impresa, e poco dopo a un\'intervista informa ai giornalisti che non vuole fermarsi qui infatti ora vuole puntare a un altro record: raggiungere la maggiore profondita\' durante un\'immersione e di starsi gia\' allenando per batterlo ma ce la fara\', solo il tempo potra\' dircelo.per l’occasione abbiamo intervistato il 26enne fillandese  Antti Luhtanen il precedente possesore del record che innanzitutto si congratula con Mitchell e poi lo sfida apertamente perche\' punta a riprenderselo.\r\n', '15:22:13', '2023-03-15', 'paracadutismo', 0),
('il nuovo libro di Paolo Boyko e\' tutto cio\' che devi sapere su questo incredibile sito', '“Io quando” e\' il titolo del nuovo libro del fondatore di extreme sports, si il sito da cui state leggendo questa notizia. Il libro racconta di come Paolo e Nicolo\' hanno avuto l’idea di creare questo sito concentrandosi principalmente di come Paolo ha lavorato e come da un semplice negozio on-line si sia trasformato in un vero e proprio impero commerciale che permette agli appassionati di incontrarsi e condividere le proprie passioni. Paolo oltre ad aver scontato l’acquisto del libro su questo sito in occasione del lancio ha anche sputato su ogni prima pagina per omaggiare tutti coloro che lo leggeranno.', '07:22:50', '2019-11-14', 'misto', 0),
('una nuova pista per sport invernali apre a Alessandria', 'la nuova pista promessa agli abitanti di Alessandria Ormai tre anni fa e\' finalmente stata ultimata.\r\nl’azienda creata Abelino Lombardo, \"snowscraper\" nel lontano 2007 che prometteva di portare piste per sport invernali in paesi dove la neve non c’e\' mai ha ultimato la pista per la prima citta\' egiziana Alessandria, a un\'intervista fatta da sky sport Lombardo afferma che ora i  5,2 milioni di abitanti potranno godersi una nuova esperienza a tutto tondo dotata anche di funivia, molti scettici non credono in questo progetto ripete ancora Lombardo per poi dire che gia\' nel primo giorno di attivita\' la pista ha ricavato un totale di 7000000 £E che corrispondono a 135000€ e si dice molto felice di questi risultati, ma molti si chiedono se durera\' o chiudera\' anche perche\' e\' solamente il secondo progetto di questo tipo che propongono quindi molti aspettano di vedere i veri risultati.\r\n', '23:23:40', '2022-02-02', 'snowboard', 0),
('una perdita per tutti gli amanti dello sport estremo, ci lascia all\'eta\' di 32 anni Whitley Haverhoek', 'Whitley Haverhoek era un incredibile atleta che si metteva alla prova costantemente, sapeva cio\' che faceva e\' ne andava fiera, queste sono le parole della madre Rosalinda Theeuwes al giornale locale di Eindhoven citta\' natale di Whitley che ha ricevuto la notizia della sua scomparsa ieri alle 19:45 per un grave incidente durante la sua ultima performance. una grande atleta si spegne oggi, che spingeva tutti a dare il meglio di se\'.', '18:43:25', '2024-04-23', 'snowboard', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `noleggio`
--

CREATE TABLE `noleggio` (
  `costo_noleggio` float NOT NULL,
  `datafine` varchar(255) NOT NULL,
  `negozio` varchar(255) NOT NULL,
  `id_articolo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `sport`
--

CREATE TABLE `sport` (
  `nome_sport` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `sport`
--

INSERT INTO `sport` (`nome_sport`, `descrizione`) VALUES
('drifting', 'portare la propria auto di traverso'),
('misto', 'attrezzi misti'),
('paracadutismo', 'lanciarsi da una altura notevole'),
('snowboard', 'sport simile allo scii');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articolo`
--
ALTER TABLE `articolo`
  ADD PRIMARY KEY (`id_articolo`),
  ADD KEY `appartiene` (`sport`);

--
-- Indici per le tabelle `carello`
--
ALTER TABLE `carello`
  ADD KEY `possiede` (`cliente`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`utente`,`password`);

--
-- Indici per le tabelle `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `comprende` (`sport`);

--
-- Indici per le tabelle `insegnati`
--
ALTER TABLE `insegnati`
  ADD PRIMARY KEY (`codice_fiscale`),
  ADD KEY `insegnano` (`sport`);

--
-- Indici per le tabelle `negozio`
--
ALTER TABLE `negozio`
  ADD PRIMARY KEY (`num_telefonico`);

--
-- Indici per le tabelle `news`
--
ALTER TABLE `news`
  ADD KEY `fa parte` (`sport`);

--
-- Indici per le tabelle `noleggio`
--
ALTER TABLE `noleggio`
  ADD KEY `viene` (`id_articolo`),
  ADD KEY `dispone` (`negozio`);

--
-- Indici per le tabelle `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`nome_sport`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `articolo`
--
ALTER TABLE `articolo`
  ADD CONSTRAINT `appartiene` FOREIGN KEY (`sport`) REFERENCES `sport` (`nome_sport`);

--
-- Limiti per la tabella `carello`
--
ALTER TABLE `carello`
  ADD CONSTRAINT `possiede` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`utente`);

--
-- Limiti per la tabella `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `comprende` FOREIGN KEY (`sport`) REFERENCES `sport` (`nome_sport`);

--
-- Limiti per la tabella `insegnati`
--
ALTER TABLE `insegnati`
  ADD CONSTRAINT `insegnano` FOREIGN KEY (`sport`) REFERENCES `sport` (`nome_sport`);

--
-- Limiti per la tabella `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fa parte` FOREIGN KEY (`sport`) REFERENCES `sport` (`nome_sport`);

--
-- Limiti per la tabella `noleggio`
--
ALTER TABLE `noleggio`
  ADD CONSTRAINT `dispone` FOREIGN KEY (`negozio`) REFERENCES `negozio` (`num_telefonico`),
  ADD CONSTRAINT `viene` FOREIGN KEY (`id_articolo`) REFERENCES `articolo` (`id_articolo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
