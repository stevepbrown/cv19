CREATE OR REPLACE VIEW `cv`.`vwSeedAttributeDataTypes`

AS

SELECT CONCAT (

"[",
"\'id\'=>\'",id,"\',",
"\'type\'=>\'",`type`,"\',",
"\'created_at\'=>\'",NOW(),"\'"
"],"


) `SEEDER`

FROM `attribute_datatypes`



