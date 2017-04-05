DROP TABLE IF EXISTS `#__office`;

CREATE TABLE `#__office` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`title` TINYTEXT NOT NULL,
	`address` TINYTEXT NOT NULL,
	`note` TINYTEXT,
	`phones` TINYTEXT NOT NULL,
	`email` TINYTEXT,
	`coord_x` FLOAT (10,10),
	`coord_y` FLOAT (10,10),

	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
