ALTER TABLE  `mod_resume` DROP PRIMARY KEY  

ALTER TABLE  `mod_resume` ADD  `id` BIGINT NOT NULL AUTO_INCREMENT FIRST ,
ADD PRIMARY KEY (  `id` )

ALTER TABLE  `mod_exp` CHANGE  `account`  `account` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL

ALTER TABLE  `mod_resume` ADD  `about_att` VARCHAR( 255 ) NULL

ALTER TABLE  `mod_school` ADD  `type_id` INT( 10 )  ;
ALTER TABLE  `mod_exp` ADD  `type_id` INT( 10 )     