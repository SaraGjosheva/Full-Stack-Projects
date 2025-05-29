-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2020 at 04:32 PM
-- Server version: 10.3.22-MariaDB-1ubuntu1
-- PHP Version: 7.4.3

--
-- Database: `movies`
--

-- ---------------------------------------------------------------------------------

--
-- Creating database for movies industry
--

CREATE DATABASE IF NOT EXISTS `movies` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `movies`;

-- ----------------------------------------------------------------------------------------------

--
-- Table structure for 'movie' table
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
    `id` INT UNSIGNED NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `premiere_city` VARCHAR(50) NOT NULL,
    `genre` VARCHAR(50) NOT NULL,
    `country_of_origin` VARCHAR(50) NOT NULL,
    `production_company` VARCHAR(64) NOT NULL,
    `type` ENUM('Film', 'TV_Serie') NOT NULL,
    `director_payment` DECIMAL(10, 2) NOT NULL,
    `director_id` INT UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for `movie` table
--

INSERT INTO `movie` (`name`, `premiere_city`, `genre`, `country_of_origin`, `production_company`, `type`, `director_payment`, `director_id`) VALUES 
('Jurassic Park', 'New York', 'Action', 'USA', 'Universal Pictures', 'Film', 5000000.00, 1),
('Inception', 'Los Angeles', 'Sci-Fi', 'USA', 'Warner Bros.', 'Film', 7000000.00, 2),
('Pulp Fiction', 'London', 'Drama', 'UK', 'Miramax Films', 'Film', 6000000.00, 3),
('The Irishman', 'Chicago', 'Drama', 'USA', 'Netflix', 'Film', 8000000.00, 4),
('Avatar', 'San Francisco', 'Sci-Fi', 'USA', '20th Century Fox', 'Film', 10000000.00, 5),
('Gladiator', 'Rome', 'Action', 'Italy', 'DreamWorks', 'Film', 7500000.00, 6),
('The Lord of the Rings', 'Wellington', 'Fantasy', 'New Zealand', 'Film', 'New Line Cinema', 10000000.00, 7),
('Fight Club', 'Los Angeles', 'Thriller', 'USA', '20th Century Fox', 'Film', 8500000.00, 8),
('The Shining', 'Denver', 'Drama', 'USA', 'Warner Bros.', 'Film', 7000000.00, 9),
('Psycho', 'Los Angeles', 'Thriller', 'USA', 'Paramount Pictures', 'Film', 8000000.00, 10),
('Star Wars', 'San Francisco', 'Sci-Fi', 'USA', 'Lucasfilm', 'Film', 9000000.00, 11),
('The Godfather', 'New York', 'Drama', 'USA', 'Paramount Pictures', 'Film', 9500000.00, 12),
('Unforgiven', 'Dallas', 'Western', 'USA', 'Warner Bros.', 'Film', 8500000.00, 13),
('Jurassic Park 2', 'Los Angeles', 'Action', 'USA', 'Universal Pictures', 'Film', 6000000.00, 1),
('Jurassic Park 3', 'London', 'Action', 'USA', 'Universal Pictures', 'Film', 7000000.00, 1),
('Inception: Dream Again', 'Paris', 'Sci-Fi', 'USA', 'Warner Bros.', 'Film', 8000000.00, 2),
('Avatar: The Way of Water', 'Los Angeles', 'Sci-Fi', 'USA', '20th Century Fox', 'Film', 12000000.00, 5),
('The Godfather: Part II', 'New York', 'Drama', 'USA', 'Paramount Pictures', 'Film', 10500000.00, 12),
('The Godfather: Part III', 'Rome', 'Drama', 'USA', 'Paramount Pictures', 'Film', 11000000.00, 12),
('The Lord of the Rings: The Two Towers', 'Wellington', 'Fantasy', 'New Zealand', 'New Line Cinema', 'Film', 11000000.00, 7),
('The Lord of the Rings: The Return of the King', 'Wellington', 'Fantasy', 'New Zealand', 'New Line Cinema', 'Film', 11500000.00, 7),
('Lost', 'Honolulu', 'Drama', 'USA', 'ABC Studios', 'TV_Serie', 4000000.00, 14),
('Superwoman', 'Vancouver', 'Action', 'USA', 'Warner Bros.', 'TV_Serie', 4500000.00, 15),
('The Flash', 'Central City', 'Action', 'USA', 'DC Entertainment', 'TV_Serie', 5000000.00, 16),
('Supernatural', 'Vancouver', 'Fantasy', 'USA', 'Warner Bros.', 'TV_Serie', 5500000.00, 17),
('Arrow', 'Starling City', 'Action', 'USA', 'DC Entertainment', 'TV_Serie', 4800000.00, 18);

--
-- Table structure for 'film' table
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE `film` (
    `id` INT UNSIGNED NOT NULL,
    `earnings_first_week` DECIMAL(10, 2) DEFAULT NULL,
    `premiere_format` ENUM('2D', '3D') NOT NULL,
    `movie_id` INT UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for `film` table
--

INSERT INTO `film` (`earnings_first_week`, `premiere_format`, `movie_id`) VALUES
(102000000.00, '3D', 1), 
(85000000.00, '2D', 2), 
(92000000.00, '2D', 3), 
(90000000.00, '3D', 4), 
(70000000.00, '2D', 5), 
(88000000.00, '3D', 6), 
(65000000.00, '2D', 7), 
(65000000.00, '2D', 8), 
(55000000.00, '2D', 9),  
(120000000.00, '3D', 10), 
(100000000.00, '2D', 11), 
(85000000.00, '2D', 12),  
(120000000.00, '3D', 13), 
(85000000.00, '3D', 14),  
(98000000.00, '3D', 15),  
(99000000.00, '2D', 16),  
(72000000.00, '3D', 17),  
(91000000.00, '3D', 18),  
(85000000.00, '3D', 19),  
(110000000.00, '3D', 20), 
(115000000.00, '3D', 21);  

--
-- Table structure for 'tv_serie' table
--

DROP TABLE IF EXISTS `tv_serie`;
CREATE TABLE `tv_serie` (
    `id` INT UNSIGNED NOT NULL,
    `tv_channel` VARCHAR(200) NOT NULL,
    `number_of_episodes` SMALLINT UNSIGNED NOT NULL,
    `number_of_expected_seasons` TINYINT UNSIGNED NOT NULL,
    `movie_id` INT UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for `tv_serie` table
--

INSERT INTO `tv_serie` (`tv_channel`, `number_of_episodes`, `number_of_expected_seasons`, `movie_id`) VALUES
('ABC', 121, 6, 22),
('The CW', 126, 4, 23),
('The CW', 184, 9, 24),
('The CW', 327, 15, 25),
('The CW', 170, 8, 26);

--
-- Table structure for 'actor' table
--

DROP TABLE IF EXISTS `actor`;
CREATE TABLE `actor` (
    `id` INT UNSIGNED NOT NULL,
    `first_name` VARCHAR(50) NOT NULL,
    `last_name` VARCHAR(50) NOT NULL,
    `nickname` VARCHAR(50) DEFAULT NULL,
    `date_of_birth` DATE NOT NULL,
    `agent_code` VARCHAR(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for `actor` table
--

INSERT INTO `actor` (`first_name`, `last_name`, `nickname`, `date_of_birth`, `agent_code`) VALUES
('Leonardo', 'DiCaprio', 'Leo', '1974-11-11', 'AG001'),
('Samuel', 'Jackson', 'Sam', '1948-12-21', 'AG002'),
('Robert', 'De Niro', NULL, '1943-08-17', 'AG003'),
('Bruce', 'Willis', 'Bruno', '1955-03-19', 'AG004'),
('Kate', 'Winslet', 'Kate', '1975-10-05', 'AG005'),
('Russell', 'Crowe', NULL, '1964-04-07', 'AG006'),
('Elijah', 'Wood', 'Eli', '1981-01-28', 'AG007'),
('Brad', 'Pitt', 'Braddie', '1963-12-18', 'AG008'),
('Cate', 'Blanchett', 'Cate', '1969-05-14', 'AG009'),
('Edward', 'Norton', 'Ed', '1969-08-18', 'AG010'),
('Jack', 'Nicholson', 'Jackie', '1937-04-22', 'AG011'),
('Anthony', 'Perkins', NULL, '1932-04-04', 'AG012'),
('Harrison', 'Ford', 'Harry', '1942-07-13', 'AG013'),
('Marlon', 'Brando', NULL, '1924-04-03', 'AG014'),
('Clint', 'Eastwood', 'Clint', '1930-05-31', 'AG015'),
('Laura', 'Dern', NULL, '1967-02-10', 'AG016'), 
('Sam', 'Neill', NULL, '1947-09-14', 'AG017'),  
('Joseph', 'Gordon-Levitt', 'Joe', '1981-02-17', 'AG018'), 
('Ellen', 'Page', 'Elliot', '1987-02-21', 'AG019'), 
('Uma', 'Thurman', 'Umi', '1970-04-29', 'AG020'), 
('John', 'Travolta', NULL, '1954-02-18', 'AG021'), 
('Joe', 'Pesci', NULL, '1943-02-09', 'AG022'), 
('Al', 'Pacino', NULL, '1940-04-25', 'AG023'), 
('Zoe', 'Saldana', 'Zee', '1978-06-19', 'AG024'),
('Shelley', 'Duvall', NULL, '1949-07-07', 'AG025'),
('Carrie', 'Fisher', 'Carrie', '1956-10-21', 'AG026'), 
('Mark', 'Hamill', 'Mark', '1951-09-25', 'AG027'),
('Matthew', 'Fox', NULL, '1976-07-14', 'AG028'),
('Evangeline', 'Lilly', NULL, '1979-08-03', 'AG029'),
('Melissa', 'Benoist', NULL, '1988-10-04', 'AG030'),
('Chyler', 'Leigh', NULL, '1982-04-10', 'AG031'),
('Grant', 'Gustin', NULL, '1990-01-14', 'AG032'),
('Candice', 'Patton', NULL, '1987-06-24', 'AG033'),
('Jensen', 'Ackles', NULL, '1978-03-01', 'AG034'),
('Jared', 'Padalecki', NULL, '1982-07-19', 'AG035'),
('Stephen', 'Amell', NULL, '1981-05-08', 'AG036'),
('Katie', 'Cassidy', NULL, '1986-11-25', 'AG037');

--
-- Table structure for 'oscar_winner' table
--

DROP TABLE IF EXISTS `oscar_winner`;
CREATE TABLE `oscar_winner` (
    `id` INT UNSIGNED NOT NULL,
    `role` VARCHAR(30) NOT NULL,
    `year` YEAR(4) UNSIGNED NOT NULL,
    `actor_id` INT UNSIGNED NOT NULL,
    `movie_id` INT UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for `oscar_winner` table
--

INSERT INTO `oscar_winner` (`role`, `year`, `actor_id`, `movie_id`) VALUES 
('Lead Actor', 2016, 1, 2),
('Supporting Actor', 1995, 2, 3),
('Lead Actor', 1981, 3, 4),
('Lead Actor', 1999, 4, 1),
('Lead Actor', 2001, 6, 6), 
('Supporting Actor', 2003, 7, 7),
('Lead Actor', 2000, 8, 8),
('Lead Actor', 1980, 11, 9), 
('Lead Actor', 1961, 12, 10), 
('Lead Actor', 1977, 13, 11), 
('Lead Actor', 1973, 14, 12), 
('Lead Actor', 1993, 15, 13);

--
-- Table structure for 'director' table
--

DROP TABLE IF EXISTS `director`;
CREATE TABLE `director` (
    `id` INT UNSIGNED NOT NULL,
    `first_name` VARCHAR(50) NOT NULL,
    `last_name` VARCHAR(50) NOT NULL,
    `genre` VARCHAR(50) NOT NULL,
    `expertise` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for `director` table
--

INSERT INTO `director` (`first_name`, `last_name`, `genre`, `expertise`) VALUES
('Steven', 'Spielberg', 'Action', 'Blockbusters'),
('Christopher', 'Nolan', 'Sci-Fi', 'Mind-bending films'),
('Quentin', 'Tarantino', 'Drama', 'Nonlinear narratives'),
('Martin', 'Scorsese', 'Drama', 'Psychological films'),
('James', 'Cameron', 'Sci-Fi', 'High-budget epics'),
('Ridley', 'Scott', 'Action', 'Epic Films'),
('Peter', 'Jackson', 'Fantasy', 'High-budget Productions'),
('David', 'Fincher', 'Thriller', 'Psychological Thrillers'),
('Stanley', 'Kubrick', 'Drama', 'Cerebral films'),
('Alfred', 'Hitchcock', 'Thriller', 'Suspense films'),
('George', 'Lucas', 'Sci-Fi', 'Space epics'),
('Francis', 'Coppola', 'Drama', 'Epic narratives'),
('Clint', 'Eastwood', 'Western', 'Classic and modern films');

--
-- Table structure for 'critic' table
--

DROP TABLE IF EXISTS `critic`;
CREATE TABLE `critic` (
    `id` INT UNSIGNED NOT NULL,
    `first_name` VARCHAR(50) NOT NULL,
    `last_name` VARCHAR(50) NOT NULL,
    `username` VARCHAR(64) NOT NULL,
    `password` VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for `critic` table
--

INSERT INTO `critic` (`first_name`, `last_name`, `username`, `password`) VALUES
('Roger', 'Ebert', 'roger.ebert', 'password123'),
('Pauline', 'Kael', 'pauline.kael', 'securepass'),
('A.O.', 'Scott', 'a.o.scott', 'password567'),
('Peter', 'Travers', 'peter.travers', 'traverspass'),
('James', 'Berardinelli', 'james.berardinelli', 'password1234'),
('Manohla', 'Dargis', 'manohla.dargis', 'dargispass'),
('Richard', 'Roeper', 'richard.roeper', 'roepersecure'),
('Gene', 'Siskel', 'gene.siskel', 'siskelpass123'),
('Leonard', 'Maltin', 'leonard.maltin', 'maltinpass'),
('Bosley', 'Crowther', 'bosley.crowther', 'crowtherpass'),
('David', 'Edelstein', 'david.edelstein', 'edelsteinpass'),
('Kenneth', 'Turan', 'kenneth.turan', 'turanpass');

--
-- Table structure for 'sequel' table
--

DROP TABLE IF EXISTS `sequel`;
CREATE TABLE `sequel` (
    `id` INT UNSIGNED NOT NULL,
    `sequel_to` INT UNSIGNED NOT NULL,
    `movie_id` INT UNSIGNED NOT NULL,
    `part_number` TINYINT UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for `sequel` table
--

INSERT INTO `sequel` (`sequel_to`, `movie_id`, `part_number`) VALUES
(1, 14, 2), 
(14, 15, 3), 
(2, 16, 2), 
(5, 17, 2), 
(12, 18, 2), 
(18, 19, 3), 
(7, 20, 2), 
(20, 21, 3);

--
-- Table structure for 'movie_actor' pivot table
--

DROP TABLE IF EXISTS `movie_actor`;
CREATE TABLE `movie_actor` (
    `id` INT UNSIGNED NOT NULL,
    `movie_id` INT UNSIGNED NOT NULL,
    `actor_id` INT UNSIGNED NOT NULL,
    `payment` DECIMAL(10, 2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for `movie_actor` table
--

INSERT INTO `movie_actor` (`movie_id`, `actor_id`, `payment`) VALUES
(1, 1, 10000000.00), 
(2, 2, 12000000.00), 
(3, 3, 8000000.00), 
(4, 4, 9000000.00), 
(5, 5, 10000000.00),
(6, 6, 5000000.00), 
(7, 7, 6000000.00), 
(8, 8, 7500000.00), 
(7, 9, 7000000.00), 
(8, 10, 5000000.00),
(9, 11, 5000000.00), 
(10, 12, 4500000.00), 
(11, 13, 8000000.00), 
(12, 14, 10000000.00), 
(13, 15, 7500000.00),
(1, 16, 4000000.00), 
(1, 17, 4500000.00), 
(2, 18, 5000000.00),  
(2, 19, 3500000.00), 
(3, 20, 6000000.00), 
(3, 21, 7000000.00), 
(4, 22, 7500000.00), 
(4, 23, 8500000.00), 
(5, 24, 6500000.00),
(9, 25, 4000000.00),
(11, 26, 6000000.00), 
(11, 27, 5500000.00),
(22, 28, 7000000.00),  
(22, 29, 6000000.00), 
(23, 30, 6500000.00), 
(23, 31, 5500000.00), 
(24, 32, 7000000.00), 
(24, 33, 6000000.00), 
(25, 34, 7500000.00), 
(25, 35, 6000000.00),  
(26, 36, 7000000.00), 
(26, 37, 5000000.00);

--
-- Table structure for 'movie_critic' pivot table
--

DROP TABLE IF EXISTS `movie_critic`;
CREATE TABLE `movie_critic` (
    `id` INT UNSIGNED NOT NULL,
    `movie_id` INT UNSIGNED NOT NULL,
    `critic_id` INT UNSIGNED NOT NULL,
    `rating` DECIMAL(3, 2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for `movie_critic` table
--

INSERT INTO `movie_critic` (`movie_id`, `critic_id`, `rating`) VALUES
(1, 1, 8.5), 
(2, 2, 9.0),  
(3, 3, 7.8), 
(4, 4, 8.0), 
(6, 5, 8.7), 
(7, 6, 9.5),  
(8, 7, 8.2),  
(7, 8, 9.0),
(9, 9, 9.0), 
(10, 10, 8.5), 
(11, 11, 9.8), 
(12, 12, 9.5), 
(13, 11, 9.2);

--
-- Table structure for 'actor_critic' pivot table
--

DROP TABLE IF EXISTS `actor_critic`;
CREATE TABLE `actor_critic` (
    `id` INT UNSIGNED NOT NULL,
    `actor_id` INT UNSIGNED NOT NULL,
    `critic_id` INT UNSIGNED NOT NULL,
    `movie_id` INT UNSIGNED NOT NULL,
    `acting_grade` DECIMAL(3, 2) DEFAULT NULL,
    `expression_grade` DECIMAL(3, 2) DEFAULT NULL,
    `naturalness_grade` DECIMAL(3, 2) DEFAULT NULL,
    `devotion_grade` DECIMAL(3, 2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for `actor_critic` table
--

INSERT INTO `actor_critic` (`actor_id`, `critic_id`, `movie_id`, `acting_grade`, `expression_grade`, `naturalness_grade`, `devotion_grade`) VALUES
(1, 1, 1, 9.0, 8.5, 9.0, 9.0),  
(2, 2, 2, 8.5, 8.0, 8.5, 9.0), 
(3, 3, 3, 8.0, 7.8, 8.0, 8.0), 
(4, 4, 4, 8.2, 8.0, 8.3, 8.4),
(6, 5, 6, 9.2, 9.0, 9.5, 9.3), 
(7, 6, 7, 8.5, 8.3, 8.8, 9.0), 
(8, 7, 8, 9.0, 9.1, 9.2, 9.0), 
(9, 8, 7, 8.8, 8.5, 8.7, 8.9),
(11, 9, 9, 9.1, 9.0, 9.3, 9.4), 
(12, 10, 10, 8.7, 8.5, 8.8, 9.0), 
(13, 11, 11, 9.5, 9.6, 9.4, 9.8), 
(14, 12, 12, 9.7, 9.5, 9.8, 9.9),  
(15, 11, 13, 9.2, 9.0, 9.1, 9.3);

-- -------------------------------------------------------------------------------------------------------

--
-- Indexes for `movie` table 
--

ALTER TABLE `movie`
ADD PRIMARY KEY (`id`),
ADD KEY `md` (`director_id`);

--
-- Indexes for `film` table 
--

ALTER TABLE `film`
ADD PRIMARY KEY (`id`),
ADD KEY `fm` (`movie_id`);

--
-- Indexes for `tv_serie` table 
--

ALTER TABLE `tv_serie`
ADD PRIMARY KEY (`id`),
ADD KEY `sm` (`movie_id`);

--
-- Indexes for `actor` table 
--

ALTER TABLE `actor`
ADD PRIMARY KEY (`id`);

--
-- Indexes for `oscar_winner` table 
--

ALTER TABLE `oscar_winner`
ADD PRIMARY KEY (`id`),
ADD KEY `owa` (`actor_id`),
ADD KEY `owm` (`movie_id`);

--
-- Indexes for `director` table 
--

ALTER TABLE `director`
ADD PRIMARY KEY (`id`);


--
-- Indexes for `critic` table 
--

ALTER TABLE `critic`
ADD PRIMARY KEY (`id`);

--
-- Indexes for `sequel` table 
--

ALTER TABLE `sequel`
ADD PRIMARY KEY (`id`),
ADD KEY `ssm` (`sequel_to`),
ADD KEY `sm` (`movie_id`);

--
-- Indexes for `movie_actor` table 
--

ALTER TABLE `movie_actor`
ADD PRIMARY KEY (`id`),
ADD KEY `mam` (`movie_id`),
ADD KEY `maa` (`actor_id`);

--
-- Indexes for `movie_critic` table 
--

ALTER TABLE `movie_critic`
ADD PRIMARY KEY (`id`),
ADD KEY `mcm` (`movie_id`),
ADD KEY `mcc` (`critic_id`);

--
-- Indexes for `actor_critic` table 
--

ALTER TABLE `actor_critic`
ADD PRIMARY KEY (`id`),
ADD KEY `aca` (`actor_id`),
ADD KEY `acc` (`critic_id`),
ADD KEY `acm` (`movie_id`);

-- -------------------------------------------------------------------------------------------------------

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--

ALTER TABLE `movie`
MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 26;

--
-- AUTO_INCREMENT for table `film`
--

ALTER TABLE `film`
MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 21;

--
-- AUTO_INCREMENT for table `tv_serie`
--

ALTER TABLE `tv_serie`
MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `actor`
--

ALTER TABLE `actor`
MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 37;

--
-- AUTO_INCREMENT for table `oscar_winner`
--

ALTER TABLE `oscar_winner`
MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 12;

--
-- AUTO_INCREMENT for table `director`
--

ALTER TABLE `director`
MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 13;

--
-- AUTO_INCREMENT for table `critic`
--

ALTER TABLE `critic`
MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 12;

--
-- AUTO_INCREMENT for table `sequel`
--

ALTER TABLE `sequel`
MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 8;

--
-- AUTO_INCREMENT for table `movie_actor`
--

ALTER TABLE `movie_actor`
MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 37;

--
-- AUTO_INCREMENT for table `movie_critic`
--

ALTER TABLE `movie_critic`
MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 13;

--
-- AUTO_INCREMENT for table `actor_critic`
--

ALTER TABLE `actor_critic`
MODIFY `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 13;

-- 
-- Constraints for the tables:
--

--
-- Constraints for `movie` table
--

ALTER TABLE `movie`
ADD CONSTRAINT `md` FOREIGN KEY (`director_id`) REFERENCES `director`(`id`);

--
-- Constraints for `film` table
--

ALTER TABLE `film`
ADD CONSTRAINT `fm` FOREIGN KEY (`movie_id`) REFERENCES `movie`(`id`);

--
-- Constraints for `tv_serie` table
--

ALTER TABLE `tv_serie`
ADD CONSTRAINT `sm` FOREIGN KEY (`movie_id`) REFERENCES `movie`(`id`);

--
-- Constraints for `oscar_winner` table
--

ALTER TABLE `oscar_winner`
ADD CONSTRAINT `owa` FOREIGN KEY (`actor_id`) REFERENCES `actor`(`id`),
ADD CONSTRAINT `owm` FOREIGN KEY (`movie_id`) REFERENCES `movie`(`id`);

--
-- Constraints for `sequel` table
--

ALTER TABLE `sequel`
ADD CONSTRAINT `ssm` FOREIGN KEY (`sequel_to`) REFERENCES `movie`(`id`),
ADD CONSTRAINT `sm` FOREIGN KEY (`movie_id`) REFERENCES `movie`(`id`);

--
-- Constraints for `movie_actor` table
--

ALTER TABLE `movie_actor`
ADD CONSTRAINT `mam` FOREIGN KEY (`movie_id`) REFERENCES `movie`(`id`),
ADD CONSTRAINT `maa` FOREIGN KEY (`actor_id`) REFERENCES `actor`(`id`);

--
-- Constraints for `movie_critic` table
--

ALTER TABLE `movie_critic`
ADD CONSTRAINT `mcm` FOREIGN KEY (`movie_id`) REFERENCES `movie`(`id`),
ADD CONSTRAINT `mcc` FOREIGN KEY (`critic_id`) REFERENCES `critic`(`id`);

--
-- Constraints for `actor_critic` table
--

ALTER TABLE `actor_critic`
ADD CONSTRAINT `aca` FOREIGN KEY (`actor_id`) REFERENCES `actor`(`id`),
ADD CONSTRAINT `acc` FOREIGN KEY (`critic_id`) REFERENCES `critic`(`id`),
ADD CONSTRAINT `acm` FOREIGN KEY (`movie_id`) REFERENCES `movie`(`id`);
COMMIT;


