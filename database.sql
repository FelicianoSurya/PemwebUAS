-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2021 pada 17.30
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fasilityID` bigint(20) UNSIGNED NOT NULL,
  `bookingDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `status` enum('waiting','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `fasilityID`, `bookingDate`, `startTime`, `endTime`, `userID`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-10-30', '10:00:00', '12:00:00', 2, 'waiting', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(2, 2, '2021-10-30', '10:00:00', '12:00:00', 3, 'waiting', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(3, 3, '2021-10-30', '10:00:00', '12:00:00', 4, 'approved', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(4, 4, '2021-10-29', '10:00:00', '12:00:00', 2, 'rejected', '2021-12-02 09:28:51', '2021-12-02 09:28:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilities`
--

CREATE TABLE `fasilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fasilityID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilityName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fasilities`
--

INSERT INTO `fasilities` (`id`, `fasilityID`, `fasilityName`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'F01', 'Adult Gymnastic', 'If you\'re over eighteen, adult gymnastics provides a new opportunity to try out an amazing sport. You can test yourself in a range of different activities. And by building your strength, flexibility and control, you\'ll see your performance improve in other sports too. Whether you\'re looking to take your first steps in gymnastics or get back into the sport, adult gymnastics makes it easy', 'AdultGymnastic.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(2, 'F02', 'Badminton Indoor', 'Badminton is a racquet sport played using racquets to hit a shuttlecock across a net. Although it may be played with larger teams, the most common forms of the game are singles (with one player per side) and doubles (with two players per side). Badminton is often played as a casual outdoor activity in a yard or on a beach; formal games are played on a rectangular indoor court. Points are scored by striking the shuttlecock with the racquet and landing it within the opposing side\'s half of the court.', 'BadmintonIndoor.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(3, 'F03', 'Ballet Room', 'A dance studio is a space in which dancers learn or rehearse. The term is typically used to describe a space that has either been built or equipped for the purpose. A dance studio normally includes a smooth floor covering or, if used for tap dancing, by a hardwood floor.', 'BalletRoom.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(4, 'F04', 'Blue Basket Court', 'A basketball court has symmetry; one half of the court is a mirror image of the other. The entire basketball court (see Figure 1) is 94 feet by 50 feet. On each half-court, painted lines show the free throw lane and circle, as well as the three-point arc, whose distance from the basket varies based on the level of hoops being played.', 'BlueBasketCourt.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(5, 'F05', 'Climb and Basket Court', 'Climb a basketball court has symmetry; one half of the court is a mirror image of the other. The entire basketball court (see Figure 1) is 94 feet by 50 feet. On each half-court, painted lines show the free throw lane and circle, as well as the three-point arc, whose distance from the basket varies based on the level of hoops being played.', 'ClimbandBasketCourt.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(6, 'F06', 'Green Hall', 'LDesigned by Arrow Architects and UAB Archinova, Green Hall 2 is a 8,566- square-metre office building that overlooks a beautiful green landscape set along the river in the heart of Vilnius. The building owner desired a new Class A building that was in harmony with nature.', 'GreenHall.png', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(7, 'F07', 'Indoor Court', 'Badminton is a racquet sport played using racquets to hit a shuttlecock across a net. Although it may be played with larger teams, the most common forms of the game are \"singles\" (with one player per side) and \"doubles\" (with two players per side). Badminton is often played as a casual outdoor activity in a yard or on a beach; formal games are played on a rectangular indoor court. Points are scored by striking the shuttlecock with the racquet and landing it within the opposing sides half of the court.', 'IndoorCourt.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(8, 'F08', 'Indoor Football', 'Indoor Soccer is a type of five-a-side football, a variation of Association Football. Around the world it is also called arena soccer, indoor football, minifootball, fast football, floorballor showball. The sport was developed in the United States and Canada to provide an option to play soccer during winter. Though the sport was derived from Association football, certain modifications were adopted to better suit playing indoors, including surrounding the play area by walls to keep the ball in play.', 'IndoorFootball.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(9, 'F09', 'Indoor Basketball Room', 'A basketball court has symmetry; one half of the court is a mirror image of the other. The entire basketball court (see Figure 1) is 94 feet by 50 feet. On each half-court, painted lines show the free throw lane and circle, as well as the three-point arc, whose distance from the basket varies based on the level of hoops being played.', 'indoorRoom.png', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(10, 'KG01', 'Kid Gymnastic', 'Kid Gymnastic programs are designed by Head Coach Victoria Karpenko to deliver the highest standards of Russian rhythmic gymnastics techniques developed over years of competing and training elite athletes around the world.', 'KidsGymnastic.png', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(11, 'LC01', 'Large Court Sport', 'A pitch or a sports ground is an outdoor playing area for various sports. The term pitch is most commonly used in British English, while the comparable term in American and Canadian English is playing field or sports field.', 'LargeCourtsSport.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(12, 'NI01', 'Number Indoor', 'Lapangan olah raga indoor adalah ruang aula  yang juga berfungsi sebagai lapangan olah raga berstandar internasional untuk dua cabang yakni buku tangkis (dua lapangan) dan bola basket. Lantai lapangan indoor ini dilapisi marmoleum, yang berfungsi mengurangi risiko cidera siswa pada saat berolah raga, selain juga memberi rasa nyaman saat beraktivitas di sana.', 'NumberIndoor.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(13, 'PG01', 'Purple Gymnastic', 'Gymnastics is a sport that includes physical exercises requiring balance, strength, flexibility, agility, coordination, and endurance. The movements involved in gymnastics contribute to the development of the arms, legs, shoulders, back, chest, and abdominal muscle groups. Gymnastics evolved from exercises used by the ancient Greeks that included skills for mounting and dismounting a horse, and from circus performance skills.', 'PurpleGymnastic.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(14, 'RB01', 'Red Blue Basket Courts', 'In basketball, the basketball court is the playing surface, consisting of a rectangular floor, with baskets at each end. Indoor basketball courts are almost always made of polished wood, usually maple, with 3.048 metres (10.00 ft)-high rims on each basket. Outdoor surfaces are generally made from standard paving materials such as concrete or asphalt.', 'RedBlueBasketCourts.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(15, 'RG01', 'Red Gymnastic', 'Gymnastics is a sport that includes physical exercises requiring balance, strength, flexibility, agility, coordination, and endurance. The movements involved in gymnastics contribute to the development of the arms, legs, shoulders, back, chest, and abdominal muscle groups. Gymnastics evolved from exercises used by the ancient Greeks that included skills for mounting and dismounting a horse, and from circus performance skills.', 'RedGymnastic.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(16, 'RC01', 'Running Court', 'An all-weather running track is a rubberized, artificial running surface for track and field athletics. It provides a consistent surface for competitors to test their athletic ability unencumbered by adverse weather conditions. Historically, various forms of dirt, Rocks, sand, and crushed cinders were used. Many examples of these varieties of track still exist worldwide.', 'RunningCourt.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(17, 'SSS01', 'Supper Soccer Stars Manhattan', 'Set in a fun, non-competitive environment, Super Soccer Stars offers the nation’s most popular children’s soccer program for kids ages 1 and up that introduces them to the fundamentals of soccer through creative programming and imaginative games. Backed by 20 years of experience, Super Soccer Stars offers a unique, age-specific curriculum that is crafted to improve soccer skills, build self-confidence, and develop socialization skills.', 'SuperSoccerStarsManhattan.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(18, 'SP01', 'Swimming Pool', 'A swimming pool, swimming bath, wading pool, paddling pool, or simply pool, is a structure designed to hold water to enable swimming or other leisure activities. Pools can be built into the ground (in-ground pools) or built above ground (as a freestanding construction or as part of a building or other larger structure), and may be found as a feature aboard ocean-liners and cruise ships. In-ground pools are most commonly constructed from materials such as concrete, natural stone, metal, plastic, or fiberglass, and can be of a custom size and shape or built to a standardized size, the largest of which is the Olympic-size swimming pool.', 'SwimmingPool1.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(19, 'SP02', 'Swimming Pool', 'A swimming pool, swimming bath, wading pool, paddling pool, or simply pool, is a structure designed to hold water to enable swimming or other leisure activities. Pools can be built into the ground (in-ground pools) or built above ground (as a freestanding construction or as part of a building or other larger structure), and may be found as a feature aboard ocean-liners and cruise ships. In-ground pools are most commonly constructed from materials such as concrete, natural stone, metal, plastic, or fiberglass, and can be of a custom size and shape or built to a standardized size, the largest of which is the Olympic-size swimming pool.', 'Swimmingpool2.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(20, 'TT01', 'Table Tennis Room', 'table tennis, also called (trademark) Ping-Pong, ball game similar in principle to lawn tennis and played on a flat table divided into two equal courts by a net fixed across its width at the middle. The object is to hit the ball so that it goes over the net and bounces on the opponent’s half of the table in such a way that the opponent cannot reach it or return it correctly. The lightweight hollow ball is propelled back and forth across the net by small rackets (bats, or paddles) held by the players. The game is popular all over the world. In most countries it is very highly organized as a competitive sport, especially in Europe and Asia, particularly in China and Japan.', 'tableTenisRoom.jpeg', '2021-12-02 09:28:51', '2021-12-02 09:28:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorite`
--

CREATE TABLE `favorite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fasilityID` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `favorite`
--

INSERT INTO `favorite` (`id`, `fasilityID`, `userID`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(2, 4, 3, '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(3, 6, 3, '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(4, 3, 4, '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(5, 2, 4, '2021-12-02 09:28:51', '2021-12-02 09:28:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_11_29_100514_create_fasilities_table', 1),
(4, '2021_11_29_100818_create_bookings_table', 1),
(5, '2021_11_30_020618_create_favorite_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin','management') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', '$2y$10$I5QBdp.NN3/PuDck.rMfT.koxgIDc8uQJMZVR39BSa3Mxa481bAhK', 'user.jpg', NULL, '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(2, 'John', 'john@user.com', 'user', '$2y$10$JKTUxuElnpoDwpDAsNnsDe9KDuzEdXspBrF/N.yllO8OKC4TAElBa', 'user.jpg', NULL, '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(3, 'Kevin', 'kevin@user.com', 'user', '$2y$10$xTjuRvUIfTUNmoxAKdOu1.zTrq39tlK7//wmIc9VGKF15nL2iyluK', 'laki.jpg', NULL, '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(4, 'Nina', 'nina@user.com', 'user', '$2y$10$csIwVrnvrbBDtPHAbp7IGePqlfv8yMRfrzhRXKcVR34r5EFgmPTCC', 'perempuan.jpg', NULL, '2021-12-02 09:28:51', '2021-12-02 09:28:51'),
(5, 'Fernando', 'nando@management.com', 'management', '$2y$10$vlvVRx4z0to9aa/234RSjOFdRiPCCFd2hQiloPejAn1/6JPtVfs8i', 'laki.jpg', NULL, '2021-12-02 09:28:51', '2021-12-02 09:28:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_fasilityid_foreign` (`fasilityID`),
  ADD KEY `bookings_userid_foreign` (`userID`);

--
-- Indeks untuk tabel `fasilities`
--
ALTER TABLE `fasilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fasilities_fasilityid_unique` (`fasilityID`);

--
-- Indeks untuk tabel `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_fasilityid_foreign` (`fasilityID`),
  ADD KEY `favorite_userid_foreign` (`userID`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `fasilities`
--
ALTER TABLE `fasilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_fasilityid_foreign` FOREIGN KEY (`fasilityID`) REFERENCES `fasilities` (`id`),
  ADD CONSTRAINT `bookings_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_fasilityid_foreign` FOREIGN KEY (`fasilityID`) REFERENCES `fasilities` (`id`),
  ADD CONSTRAINT `favorite_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
