CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picture_link` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `download_link` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `github_link` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `purchase_button_text` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` bigint UNSIGNED NOT NULL,
  `download_num` bigint UNSIGNED NOT NULL DEFAULT '0',
  `purchase_num` bigint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `products`
  ADD UNIQUE KEY `name` (`name`);

ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;


CREATE TABLE `about` (
  `id` tinyint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo_link` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telegram` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `skype` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);


CREATE TABLE `blog` (
  `id` bigint UNSIGNED NOT NULL,
  `header` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preview` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `html` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `blog`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;


CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `data` `data` JSON NOT NULL,
  `price` bigint UNSIGNED NOT NULL,
  `file_link` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `orders`
  ADD UNIQUE KEY `name` (`name`);
ALTER TABLE `orders` 
  ADD CONSTRAINT `product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) 
  ON DELETE CASCADE ON UPDATE NO ACTION;