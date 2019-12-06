CREATE OR REPLACE VIEW `cv`.`vwSeedResponsibilities` AS 

SELECT 'Responsibilities' AS `TABLE`,CONCAT(

"[",
"\'id\'=>\'",`id`,"\',",
"\'responsibility\'=>\'",`responsibility`,"\',",
"\'created_at\'=>\'",NOW(),"\'",
"],"

) `SEEDER`

 FROM `cv`.`responsibilities`;