CREATE OR REPLACE VIEW `cv`.`vwSeedEmployers`
AS

SELECT 

CONCAT(
"[",
"\'id\'=>\'",`id`,"\',",
"\'employer\'=>'",`employer`,"\',",
"\'description\'=>'",`description`,"\',",
 "\'created_at\'=>'",NOW(),"\'"
"],"
)
`SEEDER`
FROM 

`cv`.`employers`