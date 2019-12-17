CREATE OR REPLACE VIEW `cv`.`vwSeedEmployers`
AS

SELECT 'Employers' AS `TABLE`,

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