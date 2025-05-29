-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 05:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landingpage`
--

-- --------------------------------------------------------

--
-- Table structure for table `firstform`
--

CREATE TABLE `firstform` (
  `id` int(11) NOT NULL,
  `coverImg` varchar(255) NOT NULL,
  `mainTitle` varchar(255) NOT NULL,
  `subTitle` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `providing` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `firstform`
--

INSERT INTO `firstform` (`id`, `coverImg`, `mainTitle`, `subTitle`, `about`, `phone`, `location`, `providing`) VALUES
(1, 'https://media-cldnry.s-nbcnews.com/image/upload/newscms/2023_06/3594089/230208-skin-care-acne-bd-2x1.jpg', 'Best Skin Care Products', '13 best skin care products for acne-prone skin, according to dermatologists', 'Though we usually associate acne with the more annoying parts of our teenage years, the issue has become increasingly more common in adults. And it’s an even bigger issue among women: Up to 22% of women in the U.S. suffer from adult acne compared to just 3% of men, according to a 2014 study in The Journal of Clinical and Aesthetic Dermatology.', '410-689-8663', 'Skopje', 1),
(2, 'https://images.unsplash.com/photo-1621808752171-531c30903889?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80', 'Car Dealership', 'The Biggest Sail of the Year', 'Welcome to Guaranteed Automotive and Transmission Service, your head pick for master vehicle fix close and around Lafayette, IN. Our very educated ASE-Certified auto mechanics really have an enthusiasm for playing out a wide range of vehicle fix administrations, huge or little.', '+1  630 531 9862', 'Chicago IL ', 1),
(3, 'https://images.unsplash.com/photo-1621808752171-531c30903889?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80', 'Car Dealership', 'The Biggest Sail of the Year', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eligendi officia aperiam! Dolorum quia neque distinctio, magni praesentium dolores provident, et quis tempora sunt hic maiores nam atque sit architecto optio obcaecati aut ducimus vel dolorem ullam ad perferendis. Illo minus aperiam accusamus ipsa. Sit provident quisquam voluptates nulla quam!', '+1  630 531 9862', 'Chicago IL ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `secondform`
--

CREATE TABLE `secondform` (
  `id` int(11) NOT NULL,
  `descImg` varchar(255) NOT NULL,
  `descText` text NOT NULL,
  `descImg2` varchar(255) NOT NULL,
  `descText2` text NOT NULL,
  `descImg3` varchar(255) NOT NULL,
  `descText3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `secondform`
--

INSERT INTO `secondform` (`id`, `descImg`, `descText`, `descImg2`, `descText2`, `descImg3`, `descText3`) VALUES
(1, 'https://static.independent.co.uk/2023/07/06/17/best%20skincare%20for%20acne%20copy.jpg', 'Support cell regeneration and softer skin with soothing Northern Truffle and reparative Ceramides', 'https://static.independent.co.uk/2023/07/06/17/best%20skincare%20for%20acne%20copy.jpg', 'Enriched with radiance-boosting actives that replenish hydration to counteract dryness and irritation, this soothing skin cream is perfect who hold a healthy, hydrated complexion as the ultimate skin goal.', 'https://cms.eliza.co.uk/wp-content/uploads/2023/02/SEI_145180643.jpg?w=1024', 'Enriched with radiance-boosting actives that replenish hydration to counteract dryness and irritation, this soothing skin cream is perfect who hold a healthy, hydrated complexion as the ultimate skin goal.'),
(2, 'https://mediaassets.pca.org/pages/pca/images/content/img_9(3).jpg', 'Porsche revealed the 992-generation 911 GT3 R race car on Saturday to replace the 991.2-gen GT3 R, and it will compete at the top-level of production-based GT3-class sports car racing following the demise of the GTLM class and the mid-engined 911 RSR.', 'https://mediaassets.pca.org/pages/pca/images/content/img_9(3).jpg', 'Porsche revealed the 992-generation 911 GT3 R race car on Saturday to replace the 991.2-gen GT3 R, and it will compete at the top-level of production-based GT3-class sports car racing following the demise of the GTLM class and the mid-engined 911 RSR.', 'https://mediaassets.pca.org/pages/pca/images/content/img_9(3).jpg', 'Porsche revealed the 992-generation 911 GT3 R race car on Saturday to replace the 991.2-gen GT3 R, and it will compete at the top-level of production-based GT3-class sports car racing following the demise of the GTLM class and the mid-engined 911 RSR.'),
(3, 'https://mediaassets.pca.org/pages/pca/images/content/img_9(3).jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eligendi officia aperiam! Dolorum quia neque distinctio, magni praesentium dolores provident, et quis tempora sunt hic maiores nam atque sit architecto optio obcaecati aut ducimus vel dolorem ullam ad perferendis. Illo minus aperiam accusamus ipsa. Sit provident quisquam voluptates nulla quam!', 'https://mediaassets.pca.org/pages/pca/images/content/img_9(3).jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eligendi officia aperiam! Dolorum quia neque distinctio, magni praesentium dolores provident, et quis tempora sunt hic maiores nam atque sit architecto optio obcaecati aut ducimus vel dolorem ullam ad perferendis. Illo minus aperiam accusamus ipsa. Sit provident quisquam voluptates nulla quam!', 'https://mediaassets.pca.org/pages/pca/images/content/img_9(3).jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eligendi officia aperiam! Dolorum quia neque distinctio, magni praesentium dolores provident, et quis tempora sunt hic maiores nam atque sit architecto optio obcaecati aut ducimus vel dolorem ullam ad perferendis. Illo minus aperiam accusamus ipsa. Sit provident quisquam voluptates nulla quam!');

-- --------------------------------------------------------

--
-- Table structure for table `thirdform`
--

CREATE TABLE `thirdform` (
  `id` int(11) NOT NULL,
  `descContact` text NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thirdform`
--

INSERT INTO `thirdform` (`id`, `descContact`, `linkedin`, `facebook`, `twitter`, `google`) VALUES
(1, 'Now thankfully, it’s a different story. Walking through your local Boots or Superdrug has pretty much turned into a Charlie and The Chocolate Factory experience, with thousands upon thousands of brightly candy-coloured beauty products available for you to pick up and take home', 'www.linkedin.com', 'www.facebook.com', 'www.twitter.com', 'www.google.com'),
(2, 'The GT3 R’s looks can be credited not just to the wind tunnel, but the head of Style Porsche, Grant Larson. Responsible for many of the most iconic Porsches of the past two-and-a-half decades, he designed the carbon-fiber-bodied race car, making sure it adhered to the Porsche 911’s rich design heritage while being aerodynamically efficient.', 'https://www.linkedin.com/', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.google.com/'),
(3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eligendi officia aperiam! Dolorum quia neque distinctio, magni praesentium dolores provident, et quis tempora sunt hic maiores nam atque sit architecto optio obcaecati aut ducimus vel dolorem ullam ad perferendis. Illo minus aperiam accusamus ipsa. Sit provident quisquam voluptates nulla quam!', 'https://www.linkedin.com/', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.google.com/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `firstform`
--
ALTER TABLE `firstform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secondform`
--
ALTER TABLE `secondform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thirdform`
--
ALTER TABLE `thirdform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `firstform`
--
ALTER TABLE `firstform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `secondform`
--
ALTER TABLE `secondform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thirdform`
--
ALTER TABLE `thirdform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
