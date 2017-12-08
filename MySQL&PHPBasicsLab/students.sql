CREATE TABLE `students` (
	`id` MEDIUMINT NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NOT NULL,
	`phone` VARCHAR(25) NOT NULL,
	`home_address` VARCHAR(60) NOT NULL,
	`record_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_change_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`is_active` BIT NULL DEFAULT b'0',
	`motivation_letter` VARCHAR(255) NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='phpcourse';
SHOW TABLE STATUS FROM `phpcourse`;
SHOW FUNCTION STATUS WHERE `Db`='phpcourse';
SHOW PROCEDURE STATUS WHERE `Db`='phpcourse';
SHOW TRIGGERS FROM `phpcourse`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='phpcourse';
SHOW CREATE TABLE `phpcourse`.`students`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
ALTER TABLE `students`
	ADD COLUMN `notes` VARCHAR(255) NULL DEFAULT NULL AFTER `motivation_letter`;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='phpcourse';
SHOW TABLE STATUS FROM `phpcourse`;
SHOW FUNCTION STATUS WHERE `Db`='phpcourse';
SHOW PROCEDURE STATUS WHERE `Db`='phpcourse';
SHOW TRIGGERS FROM `phpcourse`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='phpcourse';
SHOW CREATE TABLE `phpcourse`.`students`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
ALTER TABLE `students`
	ALTER `home_address` DROP DEFAULT;
ALTER TABLE `students`
	CHANGE COLUMN `home_address` `home_address` VARCHAR(60) NULL AFTER `phone`;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='phpcourse';
SHOW TABLE STATUS FROM `phpcourse`;
SHOW FUNCTION STATUS WHERE `Db`='phpcourse';
SHOW PROCEDURE STATUS WHERE `Db`='phpcourse';
SHOW TRIGGERS FROM `phpcourse`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='phpcourse';
SHOW CREATE TABLE `phpcourse`.`students`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
INSERT INTO students (first_name, last_name, phone, home_address, motivation_letter, notes) VALUES("Bobkata", "Marsov", "0887234516", "Moskva 34", "Shte vi izbiq zdraveite na vsichki motivacionno pismo da zdraveite kak ste shte vi izkurtq da dobre chao ok dobijdane ne mi se pishe poveche ei umreltaci trugvate s pulni usti", "Da se narkotiziram");
/* Affected rows: 1  Found rows: 0  Warnings: 0  Duration for 1 query: 0,047 sec. */
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
INSERT INTO students (first_name, last_name, phone, home_address, motivation_letter, notes) VALUES("Marso", "Bobkov", "0884274221", "Moskva 34", "Shte vi izbiq zdraveite na vsichki motivacionno pismo da zdraveite kak ste shte vi izkurtq da dobre chao ok dobijdane ne mi se pishe poveche ei umreltaci trugvate s pulni usti", "Da se nashmurkam");
/* Affected rows: 1  Found rows: 0  Warnings: 0  Duration for 1 query: 0,047 sec. */
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
INSERT INTO students (first_name, last_name, phone) VALUES("Bangos", "Pechenov", "0923881232");
/* Affected rows: 1  Found rows: 0  Warnings: 0  Duration for 1 query: 0,031 sec. */
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
INSERT INTO students (first_name, last_name, phone) VALUES("Sanko", "Shibanov", "0923881232");
/* Affected rows: 1  Found rows: 0  Warnings: 0  Duration for 1 query: 0,047 sec. */
INSERT INTO students (first_name, last_name, phone) VALUES("Nemadanema", "Balukov", "0923881232");
/* Affected rows: 1  Found rows: 0  Warnings: 0  Duration for 1 query: 0,156 sec. */
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
UPDATE students 
SET phone = "359/88 1234 438"
WHERE id = 2;
/* Affected rows: 1  Found rows: 0  Warnings: 0  Duration for 1 query: 0,078 sec. */
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
ALTER TABLE `students`
	ALTER `phone` DROP DEFAULT;
ALTER TABLE `students`
	CHANGE COLUMN `phone` `phone` VARCHAR(25) NULL AFTER `last_name`;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='phpcourse';
SHOW TABLE STATUS FROM `phpcourse`;
SHOW FUNCTION STATUS WHERE `Db`='phpcourse';
SHOW PROCEDURE STATUS WHERE `Db`='phpcourse';
SHOW TRIGGERS FROM `phpcourse`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='phpcourse';
SHOW CREATE TABLE `phpcourse`.`students`;
/* Entering session "Unnamed" */
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
INSERT INTO students (first_name, last_name) VALUES("Kanabinol", "Thcov");
/* Affected rows: 1  Found rows: 0  Warnings: 0  Duration for 1 query: 0,047 sec. */
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
UPDATE students
SET home_address = "Goce Delchev 33"
WHERE phone IS NULL;
/* Affected rows: 1  Found rows: 0  Warnings: 0  Duration for 1 query: 0,047 sec. */
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
DELETE FROM students 
WHERE id = 2;
/* Affected rows: 1  Found rows: 0  Warnings: 0  Duration for 1 query: 0,046 sec. */
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
DELETE FROM students 
WHERE address IS NULL;
/* SQL Error (1054): Unknown column 'address' in 'where clause' */
/* Affected rows: 0  Found rows: 0  Warnings: 0  Duration for 0 of 1 query: 0,000 sec. */
DELETE FROM students 
WHERE home_address IS NULL;
/* Affected rows: 3  Found rows: 0  Warnings: 0  Duration for 1 query: 0,062 sec. */
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;
TRUNCATE students;
/* Affected rows: 0  Found rows: 0  Warnings: 0  Duration for 1 query: 0,125 sec. */
SELECT * FROM `phpcourse`.`students` LIMIT 1000;
SHOW CREATE TABLE `phpcourse`.`students`;