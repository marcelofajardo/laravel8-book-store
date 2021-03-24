-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 05:35 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'ทั่วไป', 'ความรู้ทั่วไป', 'globe', NULL, NULL),
(2, 'วิทยาศาสตร์และเทคโนโลยี', 'เทคโนโลยี', 'microchip', NULL, NULL),
(3, 'นิยายและวรรณกรรม', 'นิยาย / วรรณกรรม', 'journal-whills', NULL, NULL),
(4, 'กีฬา', 'กีฬา', 'volleyball-ball', NULL, NULL),
(5, 'หนังสือภาษาต่างประเทศ', 'หนังสือภาษาต่างประเทศ', 'book-open', NULL, NULL),
(6, 'หนังสือเด็ก', 'หนังสือเด็ก', 'baby', NULL, NULL),
(7, 'สังคมและประวัติศาสตร์', 'สังคมและประวัติศาสตร์', 'history', NULL, NULL),
(8, 'อาหารและสุขภาพ', 'อาหารและสุขภาพ', 'utensils', NULL, NULL);

-- --------------------------------------------------------


--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `remain` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `remain`, `image`, `category_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Dew\'s Notebook', 'สมุดจด', 10.00, 200, '1.jpg', 1, 1, NULL, NULL),
(2, 'คู่มือเขียนโปรแกรมด้วยภาษา C', 'หนังสือเล่มนี้เป็นฉบับปรับปรุงล่าสุดของคู่มือภาษา C ที่ใช้ในสถาบันการศึกษาหลายๆ แห่ง\r\nมานานกว่า 10 ปี รวมแล้วหลายหมื่นเล่ม ด้วยวิธีอธิบายและใช้ภาพประกอบที่เห็นขั้นตอนต่างๆ\r\nอย่างชัดเจน ทำตามได้จริง จึงใช้ได้ทั้งการสอนในชั้นเรียน และอ่านเพื่อศึกษาด้วยตัวเอง', 216.00, 100, '2.jpg', 2, 1, NULL, NULL),
(3, 'ABOUT \'JAY\' ด้วยรักและลองใจ', 'มันผิดหรือที่จะเลือกคนใหม่ที่ดีกว่า ทว่าคนที่เธอหวั่นไหวด้วยดันเป็นเพื่อนของแฟน และที่เซอร์ไพรส์ยิ่งกว่าคือพวกเขามีแผนการบางอย่างซ่อนอยู่', 206.00, 30, '3.jpg', 3, 1, NULL, NULL),
(4, 'ระบบปฏิบัติการ (Operating Systems)', 'อธิบายครบถ้วนทุกสาระ ทั้ภาคทฤษฎี และหลักปฏิบัติอย่างครบถ้วน', 179.00, 78, '4.jpg', 2, 1, NULL, NULL),
(5, 'ประวัติศาสตร์สแกนดิเนเวีย', 'จากแดนอารยธรรมไวกิ้ง สู่ต้นแบบรัฐสวัสดิการโลกร่วมสมัย สังคมเสรีประชาธิปไตยและกำเนิดบลูทูธ!', 261.00, 40, '5.jpg', 7, 1, NULL, NULL),
(6, 'หนูนิดไม่มีน้ำใจ', 'ชุดนิทานหนูนิด 9 เรื่อง 9 ความสนุก ออกใหม่ 3 เรื่อง 3 ความสนุก', 38.00, 100, '6.jpg', 6, 1, NULL, NULL),
(7, 'Magic Adventures 3 : Dark Ice +CD', 'Magic Adventures 3 : Dark Ice +CD', 142.00, 23, '7.jpg', 5, 1, NULL, NULL),
(8, 'GED : Science Exercise Book', 'GED : Science Exercise Book (P)', 627.00, 54, '8.jpg', 1, 1, NULL, NULL),
(9, 'Contemporary Asian Favourites', 'Contemporary Asian Favourites (P)', 114.00, 41, '9.jpg', 8, 1, NULL, NULL),
(10, 'รอยรักเทพบุตรทมิฬ', 'เรื่องราวสองหนุ่มสาวที่รัก ๆ เลิก ๆ อย่าง รวัณดา มรุเชษฐ์เทวัญ กับ ไอยเรศ ธวิกร จะวุ่นวายขนาดไหน จะลงเอยกันได้หรือไม่ โปรดติดตาม', 261.00, 50, '10.jpg', 3, 1, NULL, NULL),
(11, 'The Media of Mass Communication', 'Updated in its eleventh edition, The Media of Mass Communication engages readers in the pursuit of greater media literacy and provides accessible insight into the important issues that confront students as consumers and purveyors of mass media. Through exceptional coverage of contemporary media issues and trends, including the on-going transformations in mass media, this text balances the principles and foundations of media literacy with lively examples, streamlined coverage, and a robust media package.', 907.00, 12, '11.jpg', 2, 1, NULL, NULL),
(12, 'Animals of The World', 'Animals of The World', 247.00, 100, '12.jpg', 6, 1, NULL, NULL),
(13, 'Beauty of Buddhism', 'Beauty of Buddhism', 304.00, 30, '13.jpg', 7, 1, NULL, NULL),
(14, 'Thailand at Random', 'Thailand at Random', 617.00, 100, '14.jpg', 7, 1, NULL, NULL),
(15, 'ใครคือเจ้าของบ้าน ฉันหรือแมว', 'วิทยาศาสตร์แห่งแมว - เมื่อเจ้าเหมียวคิดจะครองโลก', 313.00, 70, '15.jpg', 2, 1, NULL, NULL),
(16, 'Principles of Accounts', 'Principles of Accounts (Revised Edition)', 1054.00, 20, '16.jpg', 5, 1, NULL, NULL),
(17, 'Personal Finance 11ED', 'Personal Finance 11ED', 950.00, 45, '17.jpg', 5, 1, NULL, NULL),
(18, 'การบริหารงานบำรุงรักษา', '\"การบริหารงานบำรุงรักษา\" เล่มนี้ เนื้อหาประกอบด้วย การบำรุงรักษา การจัดองค์กรบำรุงรักษา การวางแผนและการจัดทำตารางบำรุงรักษา การนำแผนงานไปใช้ให้เกิดความสำเร็จการทำงานบำรุงรักษาและควบคุม การควบคุมและการจัดการวัสดุในงานบำรุงรักษา การควบคุมคุณภาพในงานบำรุงรักษา การบริหารทรัพยากรมนุษย์ในงานบำรุงรักษา และระบบบริหารงานบำรุงรักษาด้วยคอมพิวเตอร์ พร้อมทั้งมีแบบฝึกหัดท้ายบท เพื่อประเมินผลการเรียนรู้และทบทวนความรู้ความเข้าใจ อีกทั้งมีรูปประกอบและแผนภูมิเพื่อให้ผู้อ่านได้เข้าใจยิ่งขึ้น หนังสือเล่มนี้สามารถใช้ประกอบการเรียนการสอน วิชาบริหารงานบำรุงรักษา (3111-2101) ประเภทวิชาอุตสาหกรรมมีเนื้อหาตรงตามหลักสูตรของสำนักงานคณะกรรมการการอาชีวศึกษา กระทรวงศึกษาธิการ', 69.00, 200, '18.jpg', 2, 1, NULL, NULL),
(19, 'ชิ้นส่วนเครื่องกล', 'หนังสือ \"ชิ้นส่วนเครื่องกล\" เล่มนี้ เป็นการศึกษาถึงหลักการทำงาน รูปทรง การประกอบ การติดตั้ง การคำนวณเบื้องต้น และการถอด-ประกอบ โดยเนื้อหาในเล่มเหมาะสำหรับนักศึกษาระดับชั้นประกาศนียบัตรวิชาชีพ (ปวช.) และระดับชั้นประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.) สาขาวิชาเครื่องกล สาขาวิชาเครื่องมือกลและซ่อมบำรุง สาขาวิชาเทคนิคการผลิต สาขาวิชาเทคนิคอุตสาหกรรม สาขาวิชาเทคนิคการหล่อ สาขาวิชาแมคคาทรอนิกส์ และผู้ที่สนใจในชิ้นส่วนเครื่องกล', 166.00, 100, '19.jpg', 2, 1, NULL, NULL),
(20, 'ขับได้ ซ่อมเป็น อย่างมือโปร', '    นี่คือหนังสือที่ผู้ขับขี่และช่างควรมีไว้ รวบรวมสาระที่เป็นประโยชน์ทางด้านรถยนต์ไว้มากมายเกินคุ้ม ให้ความรู้ทั้งทางทฤษฎีและปฏิบัติ โดยมีเนื้อหาประกอบด้วยอุปกรณ์จับยึด ปะเก็นและสารกันรั่ว ระบบวัดและเครื่องมือวัด เครื่องมือที่ใช้ในการทดสอบและปรับแต่งเครื่องยนต์ การปรับแต่งเครื่องยนต์ การวิเคราะห์ข้อขัดข้องของเครื่องยนต์เบนซิน ไฟเตือนที่แผงหน้าปัดรถยนต์ เครื่องยนต์ดีเซลควบคุมด้วยอิเล็กทรอนิกส์ การวิเคราะห์ข้อขัดข้องของเครื่องยนต์ดีเซล การตรวจและเปลี่ยนสายพานไทมิ่ง และการปรับตั้งระยะห่างวาล์ว โดยใช้คำอธิบายง่ายๆ พร้อมภาพประกอบชัดเจน ทำให้เข้าใจได้ง่ายขึ้น เหมาะสำหรับผู้ขับขี่ที่ต้องการซ่อมรถยนต์ด้วยตนเอง และช่างซ่อมรถยนต์ที่ต้องการพัฒนาฝีมือของตนเองให้สูงขึ้น ตลอดจนผู้ที่สนใจทั่วไป', 69.00, 30, '20.jpg', 2, 1, NULL, NULL),
(21, 'วิศวกรรมการป้องกันระบบไฟฟ้าแรงสูง 1', '    \"วิศวกรรมการป้องกันระบบไฟฟ้าแรงสูง\" เล่มนี้ กล่าวถึงพื้นฐานความรู้สำหรับวิศวะกรระบบป้องกัน ทั้งเรื่องที่เกี่ยวกับการผลิตไฟฟ้า ระบบส่งจ่ายกำลังไฟฟ้า ระบบการต่อลงดิน เสถียรภาพของระบบไฟฟ้า และหม้อแปลงไฟฟ้า ในเล่มได้อธิบายเนื้อหาโดยละเอียด เป็นลำดับขั้นตอน พร้อมตัวอย่างที่หลากหลาย เพื่อให้ทราบถึงปัญหาในระบบไฟฟ้ากำลัง และสามารถวิเคราะห์เพื่อหาแนวทางในการแก้ปัญหาขึ้นพื้นฐานของระบบไฟฟ้าได้', 297.00, 78, '21.jpg', 2, 1, NULL, NULL),
(22, 'ทิปเด็ด เคล็ดลับ PowerPoint 2010', 'หนังสือเล่มนี้ไม่ได้แนะนำเพียงวิธีการสร้างสไลด์ให้สวยงาม ดูง่าย เข้าใจได้เร็วเท่านั้น แต่ยังนำเสนอเคล็ด (ไม่) ลับสำหรับการบรรยายให้มีประสิทธิภาพ และดึงดูดใจผู้ฟังอีกด้วย ซึ่งเคล็ดลับเหล่านี้นอกจากจะได้จากการค้นคว้าผ่านตำราต่างประเทศแล้ว บางส่วนยังได้มาจากประสบการณ์ตรงของผู้เขียนเอง ดังนั้นจึงไม่แปลกอะไรถ้าเนื้อหาหลายๆ เรื่องในหนังสือเล่มนี้คุณผู้อ่านจะหาไม่พบจากที่ไหน เพราะบางอย่างก็เกิดจากประสบการณ์ดีๆ ที่ผู้เขียนตั้งใจนำมาเล่าสู่กันอ่าน', 69.00, 40, '22.jpg', 2, 1, NULL, NULL),
(23, 'วิศวกรรมการป้องกันระบบไฟฟ้าแรงสูง 2', '    ให้เนื้อหาที่สำคัญเกี่ยวกับ \"วิศวกรรมการป้องกันระบบไฟฟ้าแรงสูง\" เริ่มตั้งแต่ทำความรู้จักกับความรู้พื้นฐานการออกแบบระบบป้องกัน การป้องกันเครื่องกำเนิดไฟฟ้า การป้องกันหม้อแปลงไฟฟ้ากำลัง การป้องกันบัสบาร์ การป้องกันวงจรสายไฟฟ้า ระบบป้องกันการป้องกันระยะไกล ระบบการสับต่อวงจรสายส่งไฟฟ้ากลับโดยอัตโนมัติ ระบบการป้องกันคาปาซิเตอร์แบงก์ และการป้องกันสายส่งจำหน่ายไฟฟ้า อธิบายเนื้อหาเป็นลำดับขั้นตอน พร้อมตัวอย่างหลากหลาย เข้าใจง่าย', 297.00, 43, '23.jpg', 2, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
