CREATE OR REPLACE VIEW `cv`.`vwSeedModules` AS
SELECT CONCAT(
"[",
"\'id\'=>\'",`id`,"\',",
"\'module\'=>\'",`module`,"\',",
"\'qualification_id\'=>\'",`qualification_id`,"\',",
"\'grade\'=>\'",`grade`,"\',",
"\'created_at\'=>\'",now(),"\'",
"],"

) `SEEDER`
FROM `cv`.`modules` 