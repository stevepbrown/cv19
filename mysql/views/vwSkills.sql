CREATE OR REPLACE VIEW 	`cv`.`vWSkills` AS

SELECT 
`S`.`id`,
`S`.`skill`,
ISNULL(`S`.`parent_skill_id`) AS `IS_ROOT`,
!ISNULL(`S`.`parent_skill_id`) AS `IS_CHILD`,
!ISNULL((SELECT `id` FROM `vwSkillParent` WHERE `vwSkillParent`.`id` = `S`.`id`)) `IS_PARENT`

FROM `cv`.`skills` `S`

 
