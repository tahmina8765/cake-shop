

DROP TABLE IF EXISTS `video_chat_project`.`agents`;
DROP TABLE IF EXISTS `video_chat_project`.`chats`;
DROP TABLE IF EXISTS `video_chat_project`.`expertises`;


CREATE TABLE `video_chat_project`.`agents` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`designation` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `video_chat_project`.`chats` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`keywords` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`reason` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`agent_id` int(10) UNSIGNED DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `video_chat_project`.`expertises` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

