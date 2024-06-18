SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

CREATE TABLE `catatan_khusus` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `siswa_id` INT NOT NULL,
    `catatan_text` text NOT NULL,
    `guru_id` INT NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE `catatan_perkembangan` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `siswa_id` INT NOT NULL,
    `wali_kelas_id` INT NOT NULL,
    `catatan_text` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE `curhat` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `curhat_text` text NOT NULL,
    `response_text` text NOT NULL,
    `siswa_id` INT NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE `guru` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nama` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO
    `guru` (`id`, `nama`)
VALUES ('1', 'saleh'),
    ('2', 'fajar');

CREATE TABLE `ide` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `ide_text` text NOT NULL,
    `response_text` text NOT NULL,
    `siswa_id` INT NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE `kelas` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nama` varchar(100) NOT NULL,
    `wali_kelas_id` INT NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE `pivot_guru_kelas` (
    `id_pivot` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_guru` INT NOT NULL,
    `id_kelas` INT NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE `rating_guru` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `siswa_id` INT NOT NULL,
    `guru_id` INT NOT NULL,
    `rating` int(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE `siswa` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nama` varchar(100) NOT NULL,
    `nis` varchar(100) NOT NULL,
    `nisn` varchar(100) NOT NULL,
    `alamat` varchar(100) NOT NULL,
    `tgl_lahir` date NOT NULL,
    `id_kelas` INT NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE `users` (
    `id` varchar(15) NOT NULL,
    `username` varchar(50) NOT NULL,
    `password` varchar(100) NOT NULL,
    `role` enum('guru', 'admin') NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO
    `users` (
        `id`,
        `username`,
        `password`,
        `role`
    )
VALUES ('3', 'ibrahim', '3', 'guru'),
    ('4', 'anty', '4', 'admin');

ALTER TABLE `catatan_khusus` ADD UNIQUE KEY `guru_id` (`guru_id`);

ALTER TABLE `catatan_perkembangan`
ADD UNIQUE KEY `wali_kelas_id` (`wali_kelas_id`);

ALTER TABLE `pivot_guru_kelas`

ALTER TABLE `rating_guru`
ADD UNIQUE KEY `siswa_id` (`siswa_id`),
ADD UNIQUE KEY `guru_id` (`guru_id`);

ALTER TABLE `users` ADD PRIMARY KEY (`id`);

ALTER TABLE `catatan_khusus`
ADD CONSTRAINT `catatan_khusus` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `catatan_khusus_guru` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `catatan_perkembangan`
ADD CONSTRAINT `catatan_perkembangan` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `curhat`
ADD CONSTRAINT `curhat` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `ide`
ADD CONSTRAINT `ide` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `kelas`
ADD CONSTRAINT `fk` FOREIGN KEY (`wali_kelas_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pivot_guru_kelas`
ADD CONSTRAINT `guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `rating_guru`
ADD CONSTRAINT `rating_guru` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `rating_guru_guru` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `siswa`
ADD CONSTRAINT `pk` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;