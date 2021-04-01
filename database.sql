create schema if not exists comments_db collate utf8_general_ci;
use comments_db;

CREATE TABLE `comment` (
                           `id` int(100) NOT NULL,
                           `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                           `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                           `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                           `Img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `comment`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `comment`
    MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;
