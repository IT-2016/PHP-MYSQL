/* Création de la table */
CREATE TABLE IF NOT EXISTS `table_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `check` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

$id = 1;
$message = "Chose à faire";
$checks = true;
/* Create data */
INSERT INTO `todo`.`table_todo` (`id`, `message`, `check`) 
VALUES (NULL, $message, $checks);
/* Read all data */
SELECT * 
FROM  `todo`.`table_todo`;
/* Read select data */
SELECT * 
FROM  `todo`.`table_todo` 
WHERE  `id` = $id;
/* Update data */
UPDATE  `todo`.`table_todo` 
SET  `message` =  $message, `check` = $checks 
WHERE  `table_todo`.`id` = $id;
/* Delete data */
DELETE 
FROM `todo`.`table_todo`
WHERE `table_todo`.`id` = $id;
