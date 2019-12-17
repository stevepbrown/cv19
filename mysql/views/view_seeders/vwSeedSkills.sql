CREATE OR REPLACE VIEW `cv`.`vwSeedSkills` AS 

SELECT 'Skills' AS `TABLE`, CONCAT(
"[",
"\'id\'=>\'",
`id`,
"\',",
"\'skill\'=>\'",
`skill`,
"\',",
"\'parent_skill_id\'=>",
 (SELECT IF(`parent_skill_id` IS NULL, "null,\'",(CONCAT("\'",`parent_skill_id`,"\',\'")))),
"created_at\'=>\'",NOW(),"\'",
"],"

) `SEEDER`
 FROM `cv`.`skills`;

