CREATE OR REPLACE VIEW `cv`.`vwSeedResponsibilities` AS 

SELECT CONCAT(

"[",
"\'id\'=>\'",`id`,"\',",
"\'responsibility\'=>\'",`responsibility`,"\',",
"\'created_at\'=>\'",NOW(),"\'",
"],"

) `SEEDER`

 FROM `cv`.`responsibilities`;