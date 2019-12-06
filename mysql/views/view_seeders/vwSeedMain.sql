CREATE OR REPLACE VIEW  `cv`.`vwSeedMain` AS

SELECT `UNIFIED`.`*` FROM 

(SELECT * FROM `vwSeedAppTables`
UNION
SELECT  * FROM `vwSeedAttributeDataTypes`
UNION
SELECT * FROM `vwSeedAttributes`
UNION
SELECT * FROM `vwSeedEmployerRoles`
UNION
SELECT * FROM `vwSeedEmployers`
UNION
SELECT * FROM `vwSeedInstitutions`
UNION
SELECT * FROM `vwSeedModules`
UNION
SELECT * FROM `vwSeedQualifications`
UNION
SELECT * FROM `vwSeedResponsibilities`
UNION
SELECT * FROM `vwSeedRoleResponsibilities`
UNION
SELECT * FROM `vwSeedRoles`
UNION
SELECT * FROM `vwSeedSkills`) `UNIFIED`

ORDER BY `UNIFIED`.`TABLE` ASC;


