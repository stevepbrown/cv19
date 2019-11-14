CREATE OR REPLACE VIEW `cv`.`vwSeedEmployerRoleResponsibilities`

AS

SELECT CONCAT (

"[",
"\'id\'=>\'",id,"\',",
"\'responsibility_id\'=>\'",`responsibility_id`,"\',",
"\'role_id\'=>\'",`role_id`,"\',",
"\'employer_id\'=>\'",`employer_id`,"\',",
"\'created_at\'=>\'",NOW(),"\'"
"],"


) `SEEDER`

FROM `cv`.`employer_role_responsibilities`



