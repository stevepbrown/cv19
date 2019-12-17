CREATE OR REPLACE VIEW `cv`.`vwSeedAttributeDataTypes`

AS

SELECT 'AttributeDataTypes' AS `TABLE`,CONCAT (

"[",
"\'id\'=>\'",id,"\',",
"\'type\'=>\'",`type`,"\',",
"\'created_at\'=>\'",NOW(),"\'"
"],"


) `SEEDER`

FROM `attribute_datatypes`



