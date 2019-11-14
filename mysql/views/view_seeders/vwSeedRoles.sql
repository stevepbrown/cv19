CREATE OR REPLACE VIEW `cv`.`vwSeedRoles`
AS

SELECT CONCAT(
"[",
"\'id\'=>\'",`id`,"\',",
"\'role\'=>\'",`role`,"\',",
"\'employer_id\'=>\'",`employer_id`,"\',",
"\'created_at\'=>\'",NOW(),"\'",
"],"

) `SEEDER`

FROM `cv`.`roles`