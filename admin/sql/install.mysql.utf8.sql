DROP TABLE IF EXISTS `#__office`;

CREATE TABLE `#__office` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`title` TINYTEXT NOT NULL,
	`address` TINYTEXT NOT NULL,
	`note` TINYTEXT,
	`phones` TINYTEXT NOT NULL,
	`email` TINYTEXT,
	`coords` TINYTEXT,
	`coord_x` TINYTEXT,
	`coord_y` TINYTEXT,
	`published` tinyint(4) NOT NULL,
	`catid`	    int(11)    NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

INSERT INTO `#__office` (`title`, `address`, `phones`, `published`) VALUES
('Office1', 'addr', '8437532', 1),
('Office2', 'addr2', '22222', 1),
('Office3', 'addr3', '3333', 0);
