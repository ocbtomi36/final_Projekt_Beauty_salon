CREATE USER 'newBeutySalon'@'%' IDENTIFIED VIA mysql_native_password USING '***';
GRANT USAGE ON *.* TO 'newBeutySalon'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `newBeutySalon`;
GRANT ALL PRIVILEGES ON `newBeutySalon`.* TO 'newBeutySalon'@'%';

CREATE TABLE `newbeutysalon`.`user` (`iduser` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(35) NOT NULL ,
 `first_name2nd` VARCHAR(35) NULL , `last_name` VARCHAR(35) NOT NULL , `last_name2nd` VARCHAR(35) NULL , 
 `id_card_number` VARCHAR(35) NOT NULL , `gender` INT NOT NULL , `date_of_birth` DATETIME NOT NULL , 
 `username` INT(24) NULL , `password` INT(24) NULL , `user_role` INT NOT NULL , PRIMARY KEY (`iduser`), 
 UNIQUE (`id_card_number`)) ENGINE = InnoDB;

 INSERT INTO `user` (`iduser`, `first_name`, `first_name2nd`, `last_name`, `last_name2nd`, `id_card_number`, `gender`,
  `date_of_birth`, `username`, `password`, `user_role`) VALUES (NULL, 'Elek', NULL, 'Teszt', NULL, '123456NK', '1', '2013-01-01 12:05:19', NULL, NULL, '1');

 INSERT INTO `user` (`iduser`, `first_name`, `first_name2nd`, `last_name`, `last_name2nd`, `id_card_number`, `gender`,
  `date_of_birth`, `username`, `password`, `user_role`) VALUES (NULL, 'Max', NULL, 'Mustermann', NULL, '223456NK', '1', '2013-01-01 12:05:19', NULL, NULL, '1');
ALTER TABLE `user` ADD `phone_number` VARCHAR(10) NOT NULL ; 
ALTER TABLE `user` CHANGE `username` `username` VARCHAR(24) NULL DEFAULT NULL; 
ALTER TABLE `user` CHANGE `password` `password` VARCHAR(24) NULL DEFAULT NULL; 
INSERT INTO `user` (`iduser`, `first_name`, `first_name2nd`, `last_name`, `last_name2nd`,
 `id_card_number`, `gender`, `date_of_birth`, `username`, `password`, `user_role`, 
 `phone_number`) VALUES (NULL, 'Monica', 'Moni', 'Mustermann', 'Muster', '345621NN', '2', '2023-09-05 21:11:17.000000', 'musti', 'mustika', '2', '123456789'); 
 INSERT INTO `user` (`iduser`, `first_name`, `first_name2nd`, `last_name`, `last_name2nd`, `id_card_number`, `gender`, `date_of_birth`, `username`, `password`, `user_role`, `phone_number`) 
 VALUES (NULL, 'Tom', NULL, 'Kiss', NULL, '222666NK', '1', '2023-09-08 11:54:12.000000', 'ocbtomika', 'haligalika', '2', '2222333311');
ALTER TABLE `user` CHANGE `gender` `gender` VARCHAR(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `user` CHANGE `user_role` `user_role` VARCHAR(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
