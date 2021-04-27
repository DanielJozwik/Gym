-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Czas generowania: 11 Kwi 2021, 15:26
-- Wersja serwera: 8.0.22
-- Wersja PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gym`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `activities`
--

CREATE TABLE `activities` (
  `id_activities` int NOT NULL,
  `id_customer` int NOT NULL,
  `id_trainer` int NOT NULL,
  `activity_type` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accept` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `activities`
--

INSERT INTO `activities` (`id_activities`, `id_customer`, `id_trainer`, `activity_type`, `date`, `accept`) VALUES
(1, 2, 1, 'Trening siłowy', '2021-01-08 15:10:38', 1),
(2, 1, 2, 'Trening interwałowy', '2021-01-01 15:10:38', 1),
(5, 3, 2, 'Trening interwałowy', '2021-01-18 11:11:00', 1),
(7, 3, 2, 'Trening interwałowy', '2021-01-11 12:30:00', 0),
(13, 4, 2, 'Trening interwałowy', '2021-01-14 12:00:00', 1),
(15, 4, 16, 'Trening rehabilitacyjny', '2021-01-15 12:00:00', 0),
(22, 17, 16, 'Trening cardio', '2021-01-16 12:00:00', 1),
(23, 15, 16, 'Trening cardio', '2021-01-25 13:00:00', 1),
(24, 4, 5, 'Trening indywidualny', '2021-01-18 11:00:00', 0),
(25, 17, 16, 'Trening cardio', '2021-01-18 12:12:00', 0),
(26, 15, 5, 'Trening indywidualny', '2021-01-28 15:40:00', 0),
(27, 15, 2, 'Trening siłowy', '2021-01-13 14:54:00', 0),
(28, 15, 2, 'Trening siłowy', '2021-01-07 10:47:00', 0),
(30, 15, 2, 'Trening siłowy', '2021-01-01 11:16:00', 0),
(32, 3, 2, 'Trening indywidualny', '2021-02-28 11:00:00', 0),
(33, 3, 2, 'Trening siłowy', '1999-01-02 12:03:00', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `activity_types`
--

CREATE TABLE `activity_types` (
  `type_id` int NOT NULL,
  `type` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `activity_types`
--

INSERT INTO `activity_types` (`type_id`, `type`) VALUES
(1, 'Trening siłowy'),
(2, 'Trening interwałowy'),
(4, 'Trening cardio'),
(5, 'Trening indywidualny'),
(6, 'Trening rehabilitacyjny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gym_ticket`
--

CREATE TABLE `gym_ticket` (
  `id_gym_ticket` int NOT NULL,
  `customer_id` int NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `gym_ticket`
--

INSERT INTO `gym_ticket` (`id_gym_ticket`, `customer_id`, `type_name`, `price`, `start_date`, `end_date`) VALUES
(1, 1, 'Tygodniowy', 34, '2021-01-12', '2021-01-19'),
(2, 1, 'Tygodniowy', 33, '2021-01-01', '2021-01-08'),
(8, 1, 'Miesięczny', 70, '2021-01-10', '2021-02-09'),
(12, 3, 'Miesięczny', 70, '2021-01-11', '2021-02-10'),
(15, 4, 'Tygodniowy', 34, '2021-01-17', '2021-01-24'),
(16, 15, 'Miesięczny', 70, '2021-01-18', '2021-02-17'),
(17, 17, 'Tygodniowy', 34, '2021-01-21', '2021-01-28'),
(18, 15, '*PROMOCJA* Roczny', 888, '2021-01-21', '2022-01-21'),
(19, 15, 'Kwartalny', 234, '2021-01-21', '2021-04-21'),
(20, 4, 'Tygodniowy', 34, '2021-01-22', '2021-01-29'),
(21, 4, 'Miesięczny', 70, '2021-01-22', '2021-02-21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(64) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `image`, `id_user`) VALUES
(3, 'Otwarcie siłowni', 'Nasza siłownia jest ponownie otwarta.\r\nZapraszamy pierwsze wejście gratis.', '2020-12-12', 'news.jpg', 4),
(4, 'Przeceny na nasze produkty', 'Uwaga!!!\r\nPrzecena na białko 50 %.\r\nWszystkie karnety przecenione o 20%.', '2020-04-02', 'news.jpg', 1),
(5, 'Zamknięcie', 'Zamykamy siłke :(', '2020-01-08', 'news.jpg', 1),
(6, 'Start siłowni', 'W dniu dzisiejszym zaczynamy naszą działalność', '2020-01-08', 'news.jpg', 15),
(15, 'Test posta ze zdjęciem', 'To jest post z unikalnym (dodanym) zdjęciem', '2021-01-11', '15.jpg', 4),
(18, 'Tylko admin!', 'Tylko konto z uprawnieniem admina widzi edycje/usuwanie posta', '2021-01-13', 'news.jpg', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ticket_types`
--

CREATE TABLE `ticket_types` (
  `id_ticket_type` int NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `days` int NOT NULL,
  `price` int NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `ticket_types`
--

INSERT INTO `ticket_types` (`id_ticket_type`, `type_name`, `days`, `price`, `active`) VALUES
(1, 'Tygodniowy', 7, 34, 1),
(2, 'Miesięczny', 30, 70, 1),
(3, 'Kwartalny', 90, 234, 1),
(6, '*PROMOCJA* Roczny', 365, 888, 1),
(7, 'Ferie z siłownią', 14, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainers_content`
--

CREATE TABLE `trainers_content` (
  `trainer_id` int NOT NULL,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trainers_content`
--

INSERT INTO `trainers_content` (`trainer_id`, `title`, `content`) VALUES
(2, 'Trener personalny', 'Trener personalny i instruktor sportu ze specjalizacją kulturystyka. Instruktor odnowy biologicznej i fizjoterapeuta. Dodatkowo ukończył szkolenia z zakresu nowoczesnego żywienia i suplementacji w sporcie. Interesuje się sportami walki, motoryzacją i muzyką. Dwukrotny wicemistrz Polski juniorów w kick-boxingu. Charakteryzuje się kompleksowym i indywidualnym podejściem do Klienta.'),
(5, 'Terapeuta Manualny, Trener Personalny i Motywacyjny', 'Certyfikowany Trener Personalny Centrum Kształcenia Kadr Sportowych, absolwent Akademii Wychowania Fizycznego w Warszawie, absolwent Śląskiego Uniwersytetu Medycznego, instruktor kulturystyki AWF, specjalista ds. zdrowia i jakości życia. Na co dzień zainteresowany funkcjonowaniem człowieka od strony biologicznej, psychologicznej i społecznej. Jego pasja jest piłka nożna, zawodnik klubu Grom Miedźno . Potrafi przekazywać wiedzę i dostosowywać się do osobowości drugiej osoby. Naucza wzorców ruchowych i prawidłowej techniki ćwiczeń sprawiając, że trening jest skuteczny i bezpieczny, a cele możliwe do zrealizowania.'),
(6, 'Trener Personalny, Masażysta', 'Trener personalny ze specjalizacją żywienie oraz pracą z dziećmi, organizator, współprowadzący i uczestnik szkoleń z zakresu: kulturystyki, dietetyki, stretchingu, suplementacji, żywienia w sporcie. Dodatkowo certyfikowany europejski masażysta. Największą zaletą Karola jest wyspecjalizowany program pracy z dziećmi. Trenując indywidualnie pod okiem specjalisty dziecko jest pod stałą kontrolą, dzięki czemu na bieżąco koryguje i eliminuje błędy, a to kolejny krok w kierunku sukcesu. Dodatkowo trener potrafi dziecko zachęcić i zmotywować do ćwiczeń, prowadząc ciekawe i urozmaicone zajęcia, co niestety rzadko udaje się nauczycielom Wf-u.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `avatar` varchar(32) NOT NULL,
  `age` int NOT NULL,
  `telephone` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `status`, `name`, `surname`, `avatar`, `age`, `telephone`) VALUES
(1, 'andrzej', 'a8393058e7f0735a5578a6f288c388dc', 'admin', 'Andrzej', 'Kowalski', 'default-avatar.jpg', 31, '565543343'),
(2, 'marcin', '1fe0379c19742d6eb001bde96a7cc096', 'trener', 'Marcin', 'Dajman', '2.jpg', 36, '123456789'),
(3, 'krystian', '27294f44189e223c59d4aece93e0cd0f', 'klient', 'Krystian', 'Ochman', '3.jpg', 25, '567786454'),
(4, 'daniel', '956c204b0e078724c9410e4be86a383c', 'admin', 'Daniel', 'Jeleń', '4.jpg', 40, '678897564'),
(5, 'apoloniusz', '9c9d91a4eed3140e7a0809c19a55c48f', 'trener', 'zsnıuolodɐ', 'ʞoıʍźóɾ', '5.jpg', 20, '666666666'),
(6, 'karol', '0a3c1631cbe3d8867fc28774b37ab679', 'trener', 'Karol', 'Wojtyś', '6.jpg', 55, '213773210'),
(15, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin', 'Adminowski', 'default-avatar.jpg', 501, '123456789'),
(16, 'trener', 'f7ed5efb47e05188fa795865d64c7954', 'trener', 'Trenerowski', 'Trener', 'default-avatar.jpg', 40, '987654321'),
(17, 'klient', 'de3f7eb864993cb4b3a3187f3847810b', 'klient', 'Klient', 'Klientowski', '17.jpg', 30, '000000000');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id_activities`),
  ADD KEY `cutomer_id` (`id_customer`),
  ADD KEY `trainer_id` (`id_trainer`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeksy dla tabeli `activity_types`
--
ALTER TABLE `activity_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indeksy dla tabeli `gym_ticket`
--
ALTER TABLE `gym_ticket`
  ADD PRIMARY KEY (`id_gym_ticket`),
  ADD KEY `gym_ticket_fk0` (`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indeksy dla tabeli `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ticket_types`
--
ALTER TABLE `ticket_types`
  ADD PRIMARY KEY (`id_ticket_type`),
  ADD KEY `type_name` (`type_name`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `activities`
--
ALTER TABLE `activities`
  MODIFY `id_activities` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `activity_types`
--
ALTER TABLE `activity_types`
  MODIFY `type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `gym_ticket`
--
ALTER TABLE `gym_ticket`
  MODIFY `id_gym_ticket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT dla tabeli `ticket_types`
--
ALTER TABLE `ticket_types`
  MODIFY `id_ticket_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
