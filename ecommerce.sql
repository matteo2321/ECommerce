-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 08, 2023 alle 13:20
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id` int(32) NOT NULL,
  `data` date NOT NULL,
  `IdUtente` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `id` int(32) NOT NULL,
  `nome` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'LapTop'),
(2, 'Smartphone'),
(3, 'Periferiche Pc');

-- --------------------------------------------------------

--
-- Struttura della tabella `commento`
--

CREATE TABLE `commento` (
  `id` int(32) NOT NULL,
  `text` varchar(256) NOT NULL,
  `stelle` int(1) NOT NULL,
  `IdUtente` int(32) NOT NULL,
  `IdProdotto` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `contiene`
--

CREATE TABLE `contiene` (
  `id` int(32) NOT NULL,
  `IdCarrello` int(32) NOT NULL,
  `IdProdotto` int(32) NOT NULL,
  `quantita` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `foto`
--

CREATE TABLE `foto` (
  `id` int(32) NOT NULL,
  `path` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `foto`
--

INSERT INTO `foto` (`id`, `path`) VALUES
(1, 'imm\\lenovo_thinkbook_16.jpg'),
(2, 'imm\\Apple iPhone 14 (128 GB).jpg'),
(3, 'imm\\Logitech G203 LIGHTSYNC.jpg'),
(4, 'imm\\Logitech MX Keys.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `id` int(32) NOT NULL,
  `data` date NOT NULL,
  `prezzo` int(32) NOT NULL,
  `IdCarrello` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id` int(32) NOT NULL,
  `titolo` varchar(256) NOT NULL,
  `descrizione` text NOT NULL,
  `venditore` varchar(256) NOT NULL,
  `quantita` varchar(256) NOT NULL,
  `prezzo` int(32) NOT NULL,
  `IdCategoria` int(32) NOT NULL,
  `IdFoto` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`id`, `titolo`, `descrizione`, `venditore`, `quantita`, `prezzo`, `IdCategoria`, `IdFoto`) VALUES
(2, 'ThinkBook 16 Gen 4', 'Il notebook ThinkBook 16 di quarta generazione offre ancora di più. Maggiore potenza, grazie al processore Intel® Core™ di dodicesima generazione. Anche maggiore spazio sullo schermo: quello da 40,64 cm (16\") è il più grande della linea ThinkBook, con una risoluzione fino a 2,5K e opzioni di grafica avanzata. La connettività wireless è stata aggiornata rispetto alle versioni precedenti e nuove funzionalità e nuovi sensori smart ti aiutano a garantire la produttività e a proteggere i tuoi dati aziendali.', 'Lenovo', '30', 1039, 1, 1),
(3, 'Apple iPhone 14 (128 GB)', 'Display Super Retina XDR da 6,1\"\r\nUna batteria che dura tutto il giorno e ti dà fino a 20 ore di riproduzione video\r\nCeramic Shield e resistenza all’acqua per una robustezza all’avanguardia nel settore\r\nChip A15 Bionic con GPU 5-core per prestazioni fulminee. Reti cellulari 5G ultrarapide\r\nSistema di fotocamere evoluto per scatti più belli con ogni tipo di luce\r\nModalità Azione per riprese stabili e senza sbalzi\r\nModalità Cinema: ora con Dolby Vision 4K fino a 30 fps\r\nFunzioni di sicurezza: SOS emergenze via satellite e Rilevamento incidenti\r\niOS 16: ancora più modi per comunicare e condividere, e per rendere il tuo iPhone sempre più tuo', 'Apple', '10', 829, 2, 2),
(4, 'Logitech G203 LIGHTSYNC', 'Sensore da 8; 000 DPI che risponde con precisione a tutti i movimenti: personalizza le impostazioni in base alla sensibilità che desideri con il software per gaming logitech g hub e scegli fra 5 livelli DPI passando facilmente dall\'uno all\'altro\r\nColori LIGHTSYNC RGB: goditi colori vivi e brillanti grazie al nostro sistema LIGHTSYNC RGB, che offre effetti personalizzabili su ~16,8 milioni di colori; installa il software logitech g hub per scegliere tra i colori e le animazioni preimpostati o creare i tuoi\r\nDesign classico testato dai giocatori: gioca in tutto comfort e con controllo totale; l\'intuitivo layout a 6 pulsanti e la classica forma da gaming definiscono un design confortevole, collaudato nel tempo e amato dai giocatori, ciascun pulsante può essere personalizzato con il software logitech g hub per semplificare le operazioni\r\nTensionamento meccanico dei pulsanti con molla in metallo: I pulsanti primari sono meccanici e presentano tensionamento con resistenti molle in metallo per garantire affidabilità, prestazioni e maneggevolezza ottime\r\nIl Brand di Accessori Gaming più venduto al mondo: sulla base dei dati di vendita aggregati indipendenti (FEB \'19 - FEB\'20) di tastiere, mouse, cuffie gaming per PC in unità', 'Logitech', '5', 25, 3, 3),
(5, 'Logitech MX Keys', 'Fluida, Naturale, Precisa : Digitazione perfetta PerfectStroke, tasti concavi si adattano ‎alla forma delle dita e i bordi arrotondati dal feedback soddisfacente ovunque vengono toccati\r\nComfort e Stabilità : Digita con sicurezza sulla tastiera piatta e sottile per ‎stabilità, precisione e resistenza. La stabilità riduce il rumore e sentirai, senza però udire, ‎ogni pressione di tasto\r\nIlluminazione Intelligente, Ancora Più Smart: I tasti si illuminano nel momento in ‎cui le mani si avvicinano. La retroilluminazione si regola in automatico adattandosi alle ‎condizioni di luce\r\nLa tastiera wireless MX Keys Segue il mouse con il supporto Flow da un computer ‎all\'altro, digita su più dispositivi in un solo flusso di lavoro. Trasferisci file e immagini su ‎computer Mac/Windows\r\nTastiera Multi-Device & Multi-OS: Connetti con Bluetooth o Unifying ‎USB 3 dispositivi e passa da uno all\'altro con la pressione di un pulsante. ‎Compatibile con Windows, macOS, Linux, iOS, Android\r\nRicaricabile Tramite USB-C: MX Keys funziona fino a 10 giorni con una ricarica completa ‎‎– o fino a 5 mesi con retroilluminazione disattivata.\r\nProva la Tastiera Logitech CRAFT con Pulsante Girevole: Per il controllo creativo e accesso a ‎funzioni specifiche per contesto. Personalizza i profili per le tue app preferite', 'Logitech', '25', 89, 3, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(32) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `cognome` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `indirizzo` varchar(256) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKUtente` (`IdUtente`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `commento`
--
ALTER TABLE `commento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKUtente2` (`IdUtente`),
  ADD KEY `FKProdotto` (`IdProdotto`);

--
-- Indici per le tabelle `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKCarrello2` (`IdCarrello`),
  ADD KEY `FKProdotto2` (`IdProdotto`);

--
-- Indici per le tabelle `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKCarrello` (`IdCarrello`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKFoto` (`IdFoto`),
  ADD KEY `FKCategoria` (`IdCategoria`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `commento`
--
ALTER TABLE `commento`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `contiene`
--
ALTER TABLE `contiene`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `FKUtente` FOREIGN KEY (`IdUtente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `commento`
--
ALTER TABLE `commento`
  ADD CONSTRAINT `FKProdotto` FOREIGN KEY (`IdProdotto`) REFERENCES `prodotto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKUtente2` FOREIGN KEY (`IdUtente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `FKCarrello2` FOREIGN KEY (`IdCarrello`) REFERENCES `carrello` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKProdotto2` FOREIGN KEY (`IdProdotto`) REFERENCES `prodotto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `FKCarrello` FOREIGN KEY (`IdCarrello`) REFERENCES `carrello` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `FKCategoria` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKFoto` FOREIGN KEY (`IdFoto`) REFERENCES `foto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
