-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 6 月 23 日 11:27
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_L05_15w`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `like_table`
--

CREATE TABLE `like_table` (
  `like_id` int(12) NOT NULL,
  `thema_id` int(12) NOT NULL,
  `img_id` int(12) NOT NULL,
  `contributor_id` int(12) NOT NULL,
  `valuer_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `like_table`
--

INSERT INTO `like_table` (`like_id`, `thema_id`, `img_id`, `contributor_id`, `valuer_id`, `created_at`) VALUES
(1, 2, 3, 4, 5, '2021-06-22 19:58:19'),
(2, 7, 3, 11, 1, '2021-06-22 20:20:18'),
(6, 7, 3, 11, 1, '2021-06-22 20:29:16'),
(7, 7, 7, 6, 1, '2021-06-22 20:29:23'),
(8, 9, 9, 6, 1, '2021-06-22 20:37:14'),
(10, 7, 5, 9, 1, '2021-06-22 20:45:07'),
(11, 7, 7, 6, 1, '2021-06-22 20:45:16'),
(12, 7, 1, 6, 1, '2021-06-22 20:45:19'),
(13, 7, 5, 9, 1, '2021-06-22 20:47:49'),
(14, 7, 3, 11, 1, '2021-06-22 20:54:04'),
(15, 8, 4, 9, 1, '2021-06-22 20:54:46'),
(16, 8, 8, 6, 1, '2021-06-22 20:54:52'),
(17, 9, 12, 5, 1, '2021-06-22 20:55:06'),
(18, 9, 9, 6, 1, '2021-06-22 20:55:29'),
(19, 9, 6, 9, 1, '2021-06-22 20:55:35'),
(20, 9, 12, 5, 1, '2021-06-22 20:56:18');

-- --------------------------------------------------------

--
-- テーブルの構造 `photo_table`
--

CREATE TABLE `photo_table` (
  `photo_id` int(12) NOT NULL,
  `thema_id` int(12) NOT NULL,
  `contributor_id` int(12) NOT NULL,
  `posted_at` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_coment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `come_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `photo_table`
--

INSERT INTO `photo_table` (`photo_id`, `thema_id`, `contributor_id`, `posted_at`, `posted_coment`, `come_updated_at`) VALUES
(1, 7, 6, 'photoup/20210621183608c3eaa0210060269e6ca3bbea7b490eda.png', 'aa', '2021-06-22 01:36:08'),
(2, 8, 11, 'photoup/202106220458596dbf7fac38a532e862171df62ef48755.jpg', '芝とボール', '2021-06-22 11:58:59'),
(3, 7, 11, 'photoup/20210622045956f04c04fe88310ba45232219c9ab4d961.jpeg', 'ピッツァ派', '2021-06-22 11:59:56'),
(4, 8, 9, 'photoup/20210622050226c12b2f66eb24d4a7b8d59e0ec6fdd284.jpeg', '松山さん', '2021-06-22 12:02:26'),
(5, 7, 9, 'photoup/20210622050247aa24a7999c0b534756a34e76521d7314.jpg', 'ピザピザピザ', '2021-06-22 12:02:47'),
(6, 9, 9, 'photoup/20210622050515541356cd251320aa819999d2a2211458.jpeg', '海です。', '2021-06-22 12:05:15'),
(7, 7, 6, 'photoup/20210622050701b48d2a13aa0b663aeb3e3f58d90d6a7d.jpeg', 'ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピザ！ピ', '2021-06-22 12:07:01'),
(8, 8, 6, 'photoup/2021062205074936b0fe12768b4714cc30094120be151d.jpg', 'ゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフゴルフ', '2021-06-22 12:07:49'),
(9, 9, 6, 'photoup/202106220508195d1f4f9bae1f0d88fcb96bab1b5b982e.jpeg', '海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海海', '2021-06-22 12:08:19'),
(10, 7, 5, 'photoup/20210622050936f030426b7cac8fb36b494acbcccdad06.jpeg', 'チーズピザ！！', '2021-06-22 12:09:36'),
(11, 8, 5, 'photoup/20210622051043530430512566be991295605bfb5d123b.jpeg', '芝', '2021-06-22 12:10:43'),
(12, 9, 5, 'photoup/2021062205112516185b5d11d0a37d3c9b8e191b60944a.jpeg', '青い海', '2021-06-22 12:11:25');

-- --------------------------------------------------------

--
-- テーブルの構造 `thema_table`
--

CREATE TABLE `thema_table` (
  `thema_id` int(12) NOT NULL,
  `thema_user_id` int(12) NOT NULL,
  `thema_icon` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgthema` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thema_about` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thema_up_str` date NOT NULL,
  `thema_up_end` date NOT NULL,
  `thema_val_str` date NOT NULL,
  `thema_val_end` date NOT NULL,
  `win_img` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val_count` int(12) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `thema_table`
--

INSERT INTO `thema_table` (`thema_id`, `thema_user_id`, `thema_icon`, `imgthema`, `thema_about`, `thema_up_str`, `thema_up_end`, `thema_val_str`, `thema_val_end`, `win_img`, `val_count`, `created_at`) VALUES
(1, 3, NULL, '山', '山の写真', '2021-04-20', '2021-04-20', '2021-04-20', '2021-04-20', NULL, NULL, '2021-06-21 02:28:17'),
(3, 10, 'thema_icon_img/202106202040391b86155678e8887e9fe32df3cd66ade6.png', 'no', 'の', '2021-06-21', '2021-06-22', '2021-06-23', '2021-06-24', NULL, NULL, '2021-06-21 03:40:39'),
(4, 9, 'thema_icon_img/20210620204510c55a6acdae7bb75db34b1fcba553e0ff.png', '山', '山田', '2021-06-21', '2021-06-22', '2021-06-24', '2021-06-26', NULL, NULL, '2021-06-21 03:45:10'),
(5, 10, 'thema_icon_img/202106202108055668f1e64a9927da9ae7250bb78da5b9.png', '山', 'そこに山があるから', '2021-06-21', '2021-06-22', '2021-06-24', '2021-06-26', NULL, NULL, '2021-06-21 04:08:05'),
(6, 10, 'thema_icon_img/20210620211143d5b4f3ca6d25292df485beea6760ed87.png', '奥', '奥を連想させる写真', '2021-06-21', '2021-06-22', '2021-06-24', '2021-06-26', NULL, NULL, '2021-06-21 04:11:43'),
(7, 6, 'thema_icon_img/20210621153216efb240d4d0a12fde9cfe70a7d498a31e.jpeg', 'ピザ', 'ピザのことピッツァっていう派', '2021-06-21', '2021-06-25', '2021-06-27', '2021-06-30', NULL, NULL, '2021-06-21 22:32:16'),
(8, 11, 'thema_icon_img/20210622045822d123199a029f0932d7839dee68059b10.png', 'ゴルフ', 'ゴルフしたくなる写真', '2021-06-23', '2021-06-27', '2021-06-30', '2021-07-15', NULL, NULL, '2021-06-22 11:58:22'),
(9, 9, 'thema_icon_img/20210622050443d7cd810641d26591e486fa75d1ceac12.jpeg', '海', 'きれいな海', '2021-06-27', '2021-06-29', '2021-07-06', '2021-07-02', NULL, NULL, '2021-06-22 12:04:43'),
(10, 11, 'thema_icon_img/20210623104712d786be725940a0df772a0799855bf8f9.jpeg', 'ピザピザ', 'っq', '2021-06-23', '2021-06-26', '2021-06-27', '2021-06-30', NULL, NULL, '2021-06-23 17:47:12');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usericon` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(4) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `email`, `password`, `profile`, `usericon`, `level`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '吉田', '0', '13', '', 'NULL', 1, 0, 0, '2021-06-15 02:08:17', '2021-06-15 02:08:17'),
(2, '管理者', '0', '13', '', 'NULL', 1, 0, 0, '2021-06-15 02:51:01', '2021-06-15 02:51:01'),
(3, 'ワイン買う', '0', '456', '', 'NULL', 1, 0, 0, '2021-06-15 02:52:06', '2021-06-15 02:52:06'),
(4, '山田', '0', '一二三', '', 'NULL', 1, 0, 0, '2021-06-15 22:04:11', '2021-06-15 22:04:11'),
(5, '浜田', '0', '41', '', 'NULL', 1, 0, 0, '2021-06-19 14:23:26', '2021-06-19 14:23:26'),
(6, '松本', '0', '54', '', 'NULL', 1, 0, 0, '2021-06-19 14:25:29', '2021-06-19 14:25:29'),
(9, '22', '22@we', '22', '22', '20210619203646d41d8cd98f00b204e9800998ecf8427e.', 1, 0, 0, '2021-06-20 03:36:46', '2021-06-20 03:36:46'),
(10, '11', '22@we11', '11', '11', 'upload/202106192120014e1e5048eedbf345b36ee17eea109b2d.png', 1, 0, 0, '2021-06-20 04:20:01', '2021-06-20 04:20:01'),
(11, 'ゴルフ', 'golf@exampl.com', '1234', 'よろしくね！！！！！', 'upload/20210622034913a3f65cb8aa99f1250ba87fd91947c924.png', 1, 0, 0, '2021-06-22 10:49:13', '2021-06-23 11:21:25');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`like_id`);

--
-- テーブルのインデックス `photo_table`
--
ALTER TABLE `photo_table`
  ADD PRIMARY KEY (`photo_id`);

--
-- テーブルのインデックス `thema_table`
--
ALTER TABLE `thema_table`
  ADD PRIMARY KEY (`thema_id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `like_table`
--
ALTER TABLE `like_table`
  MODIFY `like_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- テーブルの AUTO_INCREMENT `photo_table`
--
ALTER TABLE `photo_table`
  MODIFY `photo_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `thema_table`
--
ALTER TABLE `thema_table`
  MODIFY `thema_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
