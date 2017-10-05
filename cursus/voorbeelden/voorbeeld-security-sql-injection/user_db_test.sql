		CREATE DATABASE `user_db_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
		USE `user_db_test`;
		
		CREATE TABLE IF NOT EXISTS `users` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
		  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
		
		
		INSERT INTO `users` (`id`, `username`, `password`) VALUES
		(1, 'gebruiker01', 'paswoord01'),
		(2, 'gebruiker02', 'paswoord02');
