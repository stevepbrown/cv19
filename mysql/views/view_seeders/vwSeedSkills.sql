CREATE OR REPLACE VIEW `cv`.`vwSeedSkills` AS 



SELECT CONCAT(
"[",
"\'id\'=>\'",`id`,"\',",
"\'skill\'=>\'",`skill`,"\',",
 IF((ISNULL(`parent_skill_id`)),  (CONCAT("\'parent_skill_id\'=>",null,",")),(CONCAT("\'parent_skill_id\'=>\'",`parent_skill_id`,"\',"))),
"\'created_at\'=>\'",NOW(),"\'",
"],"
) `SEEDER`
FROM `cv`.`skills`



