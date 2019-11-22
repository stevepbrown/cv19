CREATE OR REPLACE VIEW `cv`.`vwSeedAttributes` AS


SELECT CONCAT (

"\'id\'=>\'",id,"\',",
"\'attribute\'=>\'",`attribute`,"\',",
"\'attribute_datatype_id\'=>\'",`attribute_datatype_id`,"\',",
"\'description\'=>\'",`description`,"\',",
"\'created_at\'=>\'",NOW(),"\'"
"],"


) `SEEDER`

FROM `attributes`



