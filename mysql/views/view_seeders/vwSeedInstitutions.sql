CREATE OR REPLACE VIEW `cv`.`vwSeedInstitutions` AS

SELECT 'Institutions' AS `TABLE`,CONCAT (

	"["
    "\'id\'=>\'",`id`,"\',",
    "\'institution\'=>\'",`institution`,"\',",
    "\'created_at\'=>\'",now(),"\'",
    "],"
) `SEEDER`
FROM `cv`.`institutions`;
