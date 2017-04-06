DROP TABLE IF EXISTS `#__office`;

CREATE TABLE `#__office` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

INSERT INTO `#__office` (`title`) VALUES
('Office!'),
('Good bye office!');