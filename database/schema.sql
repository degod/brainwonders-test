--
-- Database: `brainwonders_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `num_students` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `school_name`, `contact_person`, `email`, `num_students`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Judas College', 'John Doe', 'john@doe.com', 213, 'active', '2025-06-21 19:38:40', '2025-06-21 19:38:40'),
(2, 'Bramah College', 'Bulk Lah', 'bulk@lah.com', 313, 'active', '2025-06-21 19:39:35', '2025-06-21 19:39:35'),
(3, 'Namjeh Institute', 'Kellogs Nek', 'kellogs@nek.net', 156, 'inactive', '2025-06-21 19:42:58', '2025-06-21 19:42:58'),
(4, 'Defo School of Tech', 'Ragnar Brollock', 'ragnar@mail.com', 240, 'active', '2025-06-21 19:46:11', '2025-06-21 19:46:11'),
(5, 'Bullock Tech Institute', 'Lahm Phil', 'lahm.p@mail.org', 452, 'active', '2025-06-21 19:50:09', '2025-06-21 19:50:09'),
(6, 'Plago College', 'Miranda Coz', 'm.coz@gmail.com', 298, 'active', '2025-06-21 19:50:55', '2025-06-21 19:52:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;