-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 11:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sivir`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `username` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL,
  `video_src` varchar(500) NOT NULL,
  `video_id` varchar(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `thumbnail` varchar(5000) NOT NULL,
  `author` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`username`, `type`, `video_src`, `video_id`, `title`, `description`, `thumbnail`, `author`, `created_at`) VALUES
('admin_sivir', 'vimeo', 'https://vimeo.com/149726227', '149726227', 'Huawei • Mate 8', 'null', 'http://localhost/sivir/public/img/vimeo.jpg', ' ', '2020-06-23 16:38:24'),
('admin_sivir', 'vimeo', 'https://vimeo.com/19785139', '19785139', 'Reebok EasyTone (game)', 'sound: Balthazar', 'http://localhost/sivir/public/img/vimeo.jpg', '', '2020-06-23 13:22:41'),
('admin_sivir', 'vimeo', 'https://vimeo.com/431587212', '431587212', 'Small wooden cars - Different ways to mount wheels', 'null', 'http://localhost/sivir/public/img/vimeo.jpg', '', '2020-06-23 09:39:40'),
('admin_sivir', 'instagram', 'https://www.instagram.com/p/CBv_GHzq3ZD', 'CBv_GHzq3ZD', 'E.V.O.L.U.C.I.O.N\n.\n.\n.\n.\n.\n.\n.\n#evolucion #evolution #dog #slowmotion #friend #bestfriend #bf #sena #labrador #animal #running #video #senatequeremos #digievolucion #digievolution #blackdog', 'E.V.O.L.U.C.I.O.N\n.\n.\n.\n.\n.\n.\n.\n#evolucion #evolution #dog #slowmotion #friend #bestfriend #bf #sena #labrador #animal #running #video #senatequeremos #digievolucion #digievolution #blackdog', 'https://instagram.fias1-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/105971104_1910100325787339_4794241909068005108_n.jpg?_nc_ht=instagram.fias1-1.fna.fbcdn.net&_nc_cat=111&_nc_ohc=yfoMqKhkGY8AX_e_NIR&oh=7320b65f50ebd5d086a06dca27ac311c&oe=5EF396A0', ' ', '2020-06-22 21:00:45'),
('admin_sivir', 'instagram', 'https://www.instagram.com/p/CBv_U8YnSVb', 'CBv_U8YnSVb', '#SkiesAndHorizons #photographer #naturephotography #naturelover #tree #rock #forest #woods #birdssounds #tennesseelife #outdoors', '#SkiesAndHorizons #photographer #naturephotography #naturelover #tree #rock #forest #woods #birdssounds #tennesseelife #outdoors', 'https://instagram.fias1-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c0.90.720.720a/s640x640/104290934_353222632307614_1664151122896532426_n.jpg?_nc_ht=instagram.fias1-1.fna.fbcdn.net&amp;_nc_cat=110&amp;_nc_ohc=dIklUvgZJx4AX_RHolZ&amp;oh=541eadb8b2d111a680e2a8e0b8a50eff&amp;oe=5EF33F61', ' ', '2020-06-22 21:00:45'),
('admin_sivir', 'instagram', 'https://www.instagram.com/p/CBwAeDOIi2u', 'CBwAeDOIi2u', '#resina #resin #artedellaresina #creazioni #flower #natura', '#resina #resin #artedellaresina #creazioni #flower #natura', 'https://instagram.fias1-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/104433025_272814480473137_3858221621942126459_n.jpg?_nc_ht=instagram.fias1-1.fna.fbcdn.net&_nc_cat=101&_nc_ohc=YDYAzX_OsTkAX-THpDH&oh=1ea7a3ba19302ac5a7928a33064cd824&oe=5EF3AEF3', ' ', '2020-06-22 21:00:45'),
('admin_sivir', 'instagram', 'https://www.instagram.com/p/CByKCWZDc5J', 'CByKCWZDc5J', 'Ещё немного фактов: 🔴Самый высокий прыжок был зафиксирован в 1993г, ищейкой Стег, в возрасте 18 месяцев. Она взяла высоту 3м72см😱. «Будем стараться, будем...» #Лайка_Лора#лайка#собака#собакалайка#животные#смешныеживотные#прыжок#краснодар#собакалетит#кавказ#смех#юмор#люблюживотных#собакакошка#лайк#тренд#тикток#инстраграм#лапы#хвосты#уши#мода#мило#шкода#радость#любовь#dog#doglife#doglovers#doglove', 'Ещё немного фактов: 🔴Самый высокий прыжок был зафиксирован в 1993г, ищейкой Стег, в возрасте 18 месяцев. Она взяла высоту 3м72см😱. «Будем стараться, будем...» #Лайка_Лора#лайка#собака#собакалайка#животные#смешныеживотные#прыжок#краснодар#собакалетит#кавказ#смех#юмор#люблюживотных#собакакошка#лайк#тренд#тикток#инстраграм#лапы#хвосты#уши#мода#мило#шкода#радость#любовь#dog#doglife#doglovers#doglove', 'https://instagram.fias1-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/104968280_1378434185665090_775923528709390999_n.jpg?_nc_ht=instagram.fias1-1.fna.fbcdn.net&_nc_cat=110&_nc_ohc=TrkCyLk2K-AAX9Tkont&oh=d5012030324709b87020e3bf9090287c&oe=5EF47D25', ' ', '2020-06-23 16:27:52'),
('admin_sivir', 'instagram', 'https://www.instagram.com/p/CByMX_sjCg9', 'CByMX_sjCg9', 'На Xiaomi Mi 9Tустановлена ! ⠀\n✳️ Текстурное покрытие ⠀\n♻️ Глянцевая Пленка ⠀\n❎ Не увеличивает габариты ⠀\n❇️ Не трескается. ⠀\n🔷BRONOSKINS это инновационное полиуретановая броня, которая состоит из 4 слоев : \n1 Самовосстановливающийся слой ✅ \n2 Противоударный слой ✅\n3 Силиконовая основа ✅\n4 Оптический клеевой слой ✅\n🔥🔥🔥🔥⠀\n💎BRONOSKINS делает вещи👌🏻⠀ ********************************\n👉@bronoskins_bishkek\n👉@bronoskins_bishkek\n✴️Телефоны, Часы, Ноутбуки и др.\n✅ Гарантия 365 дней 📲Более подробная информация по ссылке вниз👇 в WhatsApp\nWa.me/996222492989\n\nОстались вопросы? Пишите, мы подскажем!Для всей подробной информации звоните:\n☎0222492989 или 0777492989\nлибо пишите в Директ💌\nᅠᅠᅠᅠᅠᅠᅠᅠ\n📍Киевская с Шопоковой ( ГУМ ЧЫНАР)\n\n#ЧынараГум#Гум#bronoskins#защитная#пленка#для всех моделей #телефон#AirPods#ноутбуков#часы#бишкек#текстура#samsung#honor#huawei#xiaomi#redmi#apple#iphone#sony#canon#lg#applewatch#Гумчынар#Гум#Цумайчурок#Цум#Кыргызстан#бишкек#ps4', 'На Xiaomi Mi 9Tустановлена ! ⠀\n✳️ Текстурное покрытие ⠀\n♻️ Глянцевая Пленка ⠀\n❎ Не увеличивает габариты ⠀\n❇️ Не трескается. ⠀\n🔷BRONOSKINS это инновационное полиуретановая броня, которая состоит из 4 слоев : \n1 Самовосстановливающийся слой ✅ \n2 Противоударный слой ✅\n3 Силиконовая основа ✅\n4 Оптический клеевой слой ✅\n🔥🔥🔥🔥⠀\n💎BRONOSKINS делает вещи👌🏻⠀ ********************************\n👉@bronoskins_bishkek\n👉@bronoskins_bishkek\n✴️Телефоны, Часы, Ноутбуки и др.\n✅ Гарантия 365 дней 📲Более подробная информация по ссылке вниз👇 в WhatsApp\nWa.me/996222492989\n\nОстались вопросы? Пишите, мы подскажем!Для всей подробной информации звоните:\n☎0222492989 или 0777492989\nлибо пишите в Директ💌\nᅠᅠᅠᅠᅠᅠᅠᅠ\n📍Киевская с Шопоковой ( ГУМ ЧЫНАР)\n\n#ЧынараГум#Гум#bronoskins#защитная#пленка#для всех моделей #телефон#AirPods#ноутбуков#часы#бишкек#текстура#samsung#honor#huawei#xiaomi#redmi#apple#iphone#sony#canon#lg#applewatch#Гумчынар#Гум#Цумайчурок#Цум#Кыргызстан#бишкек#ps4', 'https://instagram.fias1-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c0.90.720.720a/s640x640/105943697_143224774016346_4575477735480016242_n.jpg?_nc_ht=instagram.fias1-1.fna.fbcdn.net&_nc_cat=106&_nc_ohc=SSDF5xF_JWUAX8L0vgN&oh=e4af22ac321c338c1db36c093fbc907b&oe=5EF45F41', ' ', '2020-06-23 16:38:29'),
('admin_sivir', 'youtube', 'https://www.youtube.com/embed/7kx67NnuSd0', '7kx67NnuSd0', 'Volvo Trucks - Look Who’s Driving feat. 4-year-old Sophie (Live Test)', 'A full-size truck. A little girl with a remote control. A gravel pit filled with obstacles. Is our toughest truck tough enough to survive Sophie? Find out, share and ...', 'https://i.ytimg.com/vi/7kx67NnuSd0/mqdefault.jpg', 'Volvo Trucks', '2020-06-23 21:07:19'),
('admin_sivir', 'youtube', 'https://www.youtube.com/embed/NT1HGnotQWc', 'NT1HGnotQWc', '', '\'Tiger King\' Joe Exotic \'s Barbary lion has become friends with Abby, the tiny wiener puppy dog at G.W. Zoo. The Netflix show \' Tiger King \' is now one of the ...', 'https://i.ytimg.com/vi/NT1HGnotQWc/mqdefault.jpg', 'Love Nature', '2020-06-22 21:00:45'),
('admin_sivir', 'youtube', 'https://www.youtube.com/embed/qZGpmWrVSaU', 'qZGpmWrVSaU', 'The Huawei Ban: Explained!', 'Huawei flagships without Google or Android? This is everything you need to know. Fingers crossed Huawei can resolve things. For the sake of competition.', 'https://i.ytimg.com/vi/qZGpmWrVSaU/mqdefault.jpg', 'Marques Brownlee', '2020-06-23 16:38:14'),
('admin_sivir', 'youtube', 'https://www.youtube.com/embed/tfdxcOevhQA', 'tfdxcOevhQA', 'OnePlus 8 (Pro): How to enable the Developer Options? for USB Debugging etc.', 'With this video, I want to show you, how you can activate the developer options at the One Plus 8 and 8 Pro. I will show you also, how you can disable it after.', 'https://i.ytimg.com/vi/tfdxcOevhQA/mqdefault.jpg', 'phonesandmore', '2020-06-22 21:02:41'),
('admin_sivir', 'youtube', 'https://www.youtube.com/embed/wjixtWYjfi4', 'wjixtWYjfi4', 'Audi Lovers - Rockstar HD', 'if you like the videos be sure to subscribe! Special thanks to Auditography and Vossen!', 'https://i.ytimg.com/vi/wjixtWYjfi4/mqdefault.jpg', 'CarAddicts', '2020-06-23 12:12:18'),
('admin_sivir', 'youtube', 'https://www.youtube.com/embed/zNl00mOSnJI', 'zNl00mOSnJI', 'DJ Snake, J. Balvin, Tyga - Loco Contigo', 'STREAM ', 'https://i.ytimg.com/vi/zNl00mOSnJI/mqdefault.jpg', 'DJSnakeVEVO', '2020-06-22 21:01:56'),
('iulian', 'vimeo', 'https://vimeo.com/11441736', '11441736', 'My Inventions', 'SHORT FILM\n\nWritten and Directed by Robert Holbrook\n\nNikola Tesla was one of the greatest inventors who ever lived.  His technological achievements transformed a planet of isolated communities into a world where electricity and wireless communication is taken for granted.\n\nThis is the story of a brilliant, charismatic and eccentric Serbian immigrant who rose to the height of celebrity, and then was tragically undone by the machinations of self-serving millionaires and rival inventors.\n\n\nThis short film is a quality, low budget project that benefits from the skills of over a hundred talented volunteer cast and crew members who all believe in furthering the awareness and recognition of the largely forgotten NIKOLA TESLA.\n\nThis film was made with a budget of $25,000, a volunteer cast and crew, some help from local equipment houses and suppliers, the Director\'s Guild of Canada and a lot of love and dedication.', 'http://localhost/sivir/public/img/vimeo.jpg', ' ', '2020-06-23 18:18:59'),
('iulian', 'vimeo', 'https://vimeo.com/44558698', '44558698', 'Model S Customer Delivery Event', 'Tesla Motors\' Model S, the first car to be built from the ground up as a premium electric sedan, was delivered to its first customers at a special event at the Tesla Factory in Fremont on June 22.', 'http://localhost/sivir/public/img/vimeo.jpg', ' ', '2020-06-23 18:19:03'),
('iulian', 'instagram', 'https://www.instagram.com/p/CByXzWwD3vm', 'CByXzWwD3vm', 'Tesla Y protection day. #tesla #teslahawaii #teslahawaiiclub #paintprotectionfilm #autotrimhawaii #ceramictint', 'Tesla Y protection day. #tesla #teslahawaii #teslahawaiiclub #paintprotectionfilm #autotrimhawaii #ceramictint', 'https://instagram.fias1-1.fna.fbcdn.net/v/t51.2885-15/e35/c157.0.405.405a/104709472_266937044382023_7631777348613984271_n.jpg?_nc_ht=instagram.fias1-1.fna.fbcdn.net&_nc_cat=111&_nc_ohc=xbIUDTWsGq0AX-vN505&oh=2964ec5fd4ca934d4d5cb2b3df5aa12b&oe=5EF4E871', ' ', '2020-06-23 18:17:29'),
('iulian', 'youtube', 'https://www.youtube.com/embed/GUxs-tKXp8Q', 'GUxs-tKXp8Q', 'Funny Tema ride on Sportbike Pocket bike Cross bike Unboxing Surprise toys for kids', 'Funny Tema from T-Play Unboxing and Assembling Surprise toys Power Wheels bike. Kid ride on Sportbike, Cross bike and Pocket bike mini Moto.', 'https://i.ytimg.com/vi/GUxs-tKXp8Q/mqdefault.jpg', 'Artem Plays Toys', '2020-06-23 18:54:14'),
('iulian', 'youtube', 'https://www.youtube.com/embed/kTvXz4qbT9k', 'kTvXz4qbT9k', 'TESLA ASMR EXPERIENCE 🚘🔌', 'Today let\'s test this TESLA model X for all the triggers and tingles we can take :) Welcoming - 0 (typing) Models Overview on Tablet - 02:00 (looking at 3 models ...', 'https://i.ytimg.com/vi/kTvXz4qbT9k/mqdefault.jpg', 'Gentle Whispering ASMR', '2020-06-23 18:17:43'),
('iulian', 'youtube', 'https://www.youtube.com/embed/Lv8w0Z92X1o', 'Lv8w0Z92X1o', 'Balloon Vs Bike Silencer - Super Big Size Balloon Create', 'music - Tobu ', 'https://i.ytimg.com/vi/Lv8w0Z92X1o/mqdefault.jpg', 'DILRAJ SINGH', '2020-06-23 18:54:17'),
('iulian', 'youtube', 'https://www.youtube.com/embed/PxzV9nBmVKM', 'PxzV9nBmVKM', 'Audi RS 4 Avant Facelift (2020): Test - Kombi - Info', 'Understatement hin oder her: Ein Audi-RS-Modell soll sich von den zahmen Serienbrüdern auf den ersten Blick deutlich unterscheiden. So bekommt auch das ...', 'https://i.ytimg.com/vi/PxzV9nBmVKM/mqdefault.jpg', 'AUTO BILD', '2020-06-23 18:30:33'),
('iulian_danut', 'instagram', 'https://www.instagram.com/p/CByZdknhmMD', 'CByZdknhmMD', 'OnePlus8 #oneplus8 #oneplus8series', 'OnePlus8 #oneplus8 #oneplus8series', 'https://instagram.fias1-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/104476262_316788709320744_5768559608576933489_n.jpg?_nc_ht=instagram.fias1-1.fna.fbcdn.net&_nc_cat=100&_nc_ohc=PmcPhYJDMTQAX-kvE3b&oh=c0c5404216fe153cf6d119ea6d86bcb0&oe=5EF4ED2B', ' ', '2020-06-23 20:44:37'),
('iulian_danut', 'youtube', 'https://www.youtube.com/embed/1aqI7EnfbVM', '1aqI7EnfbVM', 'ASUS ZenBook Pro Duo - The laptop of tomorrow | ASUS', 'Take your creativity and productivity to the next level with the groundbreaking ASUS ZenBook Pro Duo. Designed to give you the ultimate edge in workflow ...', 'https://i.ytimg.com/vi/1aqI7EnfbVM/mqdefault.jpg', 'ASUS', '2020-06-23 20:15:35'),
('iulian_danut', 'youtube', 'https://www.youtube.com/embed/bIV6E8XTdD8', 'bIV6E8XTdD8', 'Introducing ZenFone 6 | ASUS', 'Beyond your imagination. Why choose ordinary, when there\'s ZenFone 6? #ZenFone6 #DefyOrdinary - Latest Flagship Qualcomm® Snapdragon™ 855 Mobile ...', 'https://i.ytimg.com/vi/bIV6E8XTdD8/mqdefault.jpg', 'ASUS', '2020-06-23 20:15:49'),
('iulian_danut', 'youtube', 'https://www.youtube.com/embed/LTDuGU38-70', 'LTDuGU38-70', 'OnePlus 8 Pro Review: Finally a Flagship!', 'OnePlus finally made a flagship phone flagship features and a flagship price. OnePlus 8 Pro: https://www.oneplus.com OnePlus 8 Pro skins: ...', 'https://i.ytimg.com/vi/LTDuGU38-70/mqdefault.jpg', 'Marques Brownlee', '2020-06-23 20:44:32'),
('iulian_danut', 'youtube', 'https://www.youtube.com/embed/qiZtQzDmYsU', 'qiZtQzDmYsU', 'ASUS Zenbook Pro Duo | The laptop of tomorrow', 'Take your creativity to the next level with the groundbreaking ASUS ZenBook Pro Duo! Designed to give you the ultimate edge in workflow efficiency, the unique ...', 'https://i.ytimg.com/vi/qiZtQzDmYsU/mqdefault.jpg', 'ASUS Nordic', '2020-06-23 20:15:54'),
('user10', 'vimeo', 'https://vimeo.com/66476281', '66476281', 'Day in a life - Craig Harper DOCUMENTARY EXCLUSIVE', 'Scotty Cummings gives you the first ever exclusive look into Scottish Drift Legend Craig Harper\'s life.', 'http://localhost/sivir/public/img/vimeo.jpg', '', '2020-06-22 21:05:11'),
('user10', 'youtube', 'https://www.youtube.com/embed/dJs4YILrLok', 'dJs4YILrLok', 'Lamborghini Aventador и НОВАЯ Tesla Model S Performance: ГОНКА!', 'carwow #Tesla #Lamborghini Янни ВЕРНУЛСЯ, и не просто так, а за рулём своего Aventador S Roadster! Под капотом у него 6,5-литровый...', 'https://i.ytimg.com/vi/dJs4YILrLok/mqdefault.jpg', 'carwow Русская версия', '2020-06-22 21:31:50'),
('user10', 'youtube', 'https://www.youtube.com/embed/eavpfAuG9GI', 'eavpfAuG9GI', 'VW Golf', 'Verbrauch komb: 4,1 l/100km Verbrauch innerorts: 4,6 l/100km Verbrauch außerorts: 3,8 l/100km CO2 Emmision komb.: 109,0 g/km CO2-Effizienz: A Hersteller: ...', 'https://i.ytimg.com/vi/eavpfAuG9GI/mqdefault.jpg', 'AVP AUTOLAND Showroom', '2020-06-22 21:47:25'),
('user10', 'youtube', 'https://www.youtube.com/embed/oqvvNiIjaSM', 'oqvvNiIjaSM', 'NEW! 740HP 2020 AUDI RS7-R SPORTBACK - MOST BEAUTIFUL RS7 EVER? ABT Sporstline beast in detail', 'About a month ago we showed you the world premiere of the brand new 2020/21 Audi RS7-R Sportback from ABT Sportsline. That time it was a special car for ...', 'https://i.ytimg.com/vi/oqvvNiIjaSM/mqdefault.jpg', 'Auditography', '2020-06-22 21:33:09'),
('user10', 'youtube', 'https://www.youtube.com/embed/v82aCWlZQtk', 'v82aCWlZQtk', 'Tesla Model Y: 10 Facts You Probably Didn', 'The Tesla Model Y is the result of nearly 17 years of automotive innovation. This practical crossover is the most technologically advanced vehicle ever built by ...', 'https://i.ytimg.com/vi/v82aCWlZQtk/mqdefault.jpg', 'Electric Future', '2020-06-22 21:30:25'),
('user10', 'youtube', 'https://www.youtube.com/embed/X25rXMzJD34', 'X25rXMzJD34', 'Am tractat rulota cu Tesla Model X', 'Am tractat rulota cu Tesla Model X.', 'https://i.ytimg.com/vi/X25rXMzJD34/mqdefault.jpg', 'RoTesla', '2020-06-22 21:23:45'),
('user10', 'youtube', 'https://www.youtube.com/embed/Xm_RvrS67VU', 'Xm_RvrS67VU', 'Audi RS6 v Mercedes CLS 63 AMG Shooting Brake: Super Wagons. - /CHRIS HARRIS ON CARS', 'The last RS6 was blunter than Larry David, this one is said to be better. Can it handle Merc\'s gorgeous low-rider, the CLS \' Brake?', 'https://i.ytimg.com/vi/Xm_RvrS67VU/mqdefault.jpg', 'THE DRIVE', '2020-06-22 21:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE `searches` (
  `username` varchar(250) NOT NULL,
  `keyword` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `searches`
--

INSERT INTO `searches` (`username`, `keyword`) VALUES
('admin_sivir', 'bike'),
('admin_sivir', 'Mug'),
('admin_sivir', 'plane'),
('admin_sivir', 'Tesla'),
('admin_sivir', 'water'),
('admin_sivir', 'bike'),
('admin_sivir', 'bike'),
('admin_sivir', 'mug'),
('admin_sivir', 'mug'),
('admin_sivir', 'dog'),
('admin_sivir', 'truck'),
('admin_sivir', 'plate'),
('admin_sivir', 'truck'),
('admin_sivir', 'pen'),
('admin_sivir', 'dog'),
('admin_sivir', 'dog'),
('admin_sivir', 'dog'),
('admin_sivir', 'dog'),
('admin_sivir', 'huawei'),
('iulian', 'tesla'),
('iulian', 'audi'),
('iulian', 'bike'),
('iulian', 'bike'),
('iulian', 'Oneplus'),
('iulian', 'OnePlus 8 Series - Beautiful to Behold'),
('iulian', 'dog'),
('iulian', 'Dog'),
('iulian', 'asus'),
('admin_sivir', 'mbiasab gsiudgonsd nodsnjodsgogdsn lgdsjognsglkds ngosd'),
('admin_sivir', 'gd ghdfhsdgsdoigs mgeoliing oewilkmgdsklm gdlksgm sd'),
('admin_sivir', 'mouse'),
('admin_sivir', 'mouse'),
('admin_sivir', 'dog'),
('admin_sivir', 'Tesla'),
('admin_sivir', 'truck'),
('admin_sivir', 'truck'),
('admin_sivir', 'gjasi gosign sdsgklsdm goiewgm ew'),
('admin_sivir', 'truck'),
('admin_sivir', 'bike'),
('admin_sivir', 'bike');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `admin`) VALUES
(1, 'admin_sivir', 'admin@sivir.com', '21232f297a57a5a743894a0e4a801fc3', '2020-06-15 09:13:37', '2020-06-15 09:13:37', 2),
(116, 'user22', 'user22@gmail.com', '87dc1e131a1369fdf8f1c824a6a62dff', '2020-06-22 08:28:49', '2020-06-22 08:28:49', 0),
(117, 'user11', 'user11@gmail.com', '03aa1a0b0375b0461c1b8f35b234e67a', '2020-06-22 08:32:02', '2020-06-22 08:32:02', 0),
(118, 'iulian', 'basaiulian99@gmail.com', 'b0b841d938eb014400284a704c786c85', '2020-06-23 18:15:39', '2020-06-23 18:15:39', 0),
(119, 'Iulian_danut', 'basai@gmail.com', 'b0b841d938eb014400284a704c786c85', '2020-06-23 20:06:22', '2020-06-23 20:06:22', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`username`,`video_src`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
