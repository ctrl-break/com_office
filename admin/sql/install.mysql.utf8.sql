DROP TABLE IF EXISTS `#__office`;

CREATE TABLE `#__office` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`title` TINYTEXT NOT NULL,
	`postcode` INT(8),
	`address` TINYTEXT NOT NULL,
	`note` TINYTEXT,
	`phones` TINYTEXT NOT NULL,
	`email` TINYTEXT,
	`coords` TINYTEXT,
	`coord_x` TINYTEXT,
	`coord_y` TINYTEXT,
	`published` tinyint(4) NOT NULL,
	`catid`	    int(11)    NOT NULL DEFAULT '0',
	`params`   VARCHAR(1024) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
