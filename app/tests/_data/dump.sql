/* Replace this file with actual dump of your database */
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
);