CREATE OR REPLACE VIEW `cv`.`vwSeedAppTables` AS

SELECT 'AppTables' AS `TABLE`,CONCAT(
"[",
"\'id\'=>\'",`id`,"\',",
"\'table_name\'=>\'",`table_name`,"\',",
"\'description\'=>",(SELECT IF(`description` IS NULL, "null,",(CONCAT("\'",`description`,"\',")))),
"\'created_at\'=>\'",now(),"\'",
"],"

) `SEEDER`

FROM `cv`.`app_tables`