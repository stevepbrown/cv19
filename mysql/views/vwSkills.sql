CREATE OR REPLACE VIEW 	`cv`.`vwSkills` AS

SELECT 
`S`.`id`,
`S`.`skill`,
`S`.`parent_skill_id`,
ISNULL(`S`.`parent_skill_id`) AS `IS_ROOT`,
!ISNULL(`S`.`parent_skill_id`) AS `IS_CHILD`,
!ISNULL(`PARENTS`.`parent_skill_id`) AS  `IS_PARENT`

FROM `cv`.`skills` `S`
LEFT JOIN (SELECT `parent_skill_id`,count(`parent_skill_id`) AS `CHILD_COUNT` FROM `cv`.`skills` `PSKILLS` GROUP BY `PSKILLS`.`parent_skill_id` HAVING `CHILD_COUNT` > 0 ORDER BY `parent_skill_id` ) `PARENTS`
ON  `S`.`id` =  `PARENTS`.`parent_skill_id`
ORDER BY `S`.`parent_skill_id`;

