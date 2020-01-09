CREATE OR REPLACE VIEW `cv`.`vwSeedApplicationVersion`
AS


 SELECT 'Application Version' AS `TABLE`,CONCAT(
"[",
"\'id\'=>\'",`id`,"\',", 
"\'version\'=>\'",`version`,"\',",
"\'name\'=>\'",`name`,"\',",
"\'commit_SHA\'=>\'",`commit_SHA`,"\',",
"\'commit_tag\'=>\'",`commit_tag`,"\',", 
"\'description\'=>\'",`description`,"\',", 
"\created_at'\'=>\'",`created_at`,"\',", 
"],"

) `SEEDER`

FROM `cv`.`application_version`