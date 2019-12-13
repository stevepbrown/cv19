
CREATE OR REPLACE VIEW 	`cv`.`vwSkills` AS
SELECT 
		(SELECT(ifnull(`PARENT`.`parent_skill_id`,0))) `PARENT_ANTECEDENT_ID`,
		`PARENT`.`id` `ID`,
		`PARENT`.`skill` `SKILL`,
		(SELECT ifnull(`PARENT_CHILD_COUNT`.`count`,0)) `PCHILDCOUNT`,
         `status`.`active` `IS_ACTIVE`,       
        `CHILDREN`.`id` `CHILD_ID`,
        `CHILDREN`.`skill` `CHILD_SKILL`,
        `child_status`.`active` `C_IS_ACTIVE`,
        -- (SELECT ifnull(`CHILDREN`.`parent_skill_id`,0) `CHILD_ANTECEDENT_ID`,
        (SELECT ifnull(`CHILD_CHILD_COUNT`.`count`,0) )`CCHILDCOUNT` 


FROM cv.skills AS `PARENT`
LEFT JOIN cv.skills AS `CHILDREN` 
ON `PARENT`.`id` = `CHILDREN`.`parent_skill_id`
LEFT JOIN
(SELECT `parent_skill_id` `id` , COUNT(*) `count` FROM `cv`.`skills`  GROUP BY `parent_skill_id`) AS `PARENT_CHILD_COUNT`
ON  `PARENT`.`id` = `PARENT_CHILD_COUNT`.`id`
LEFT JOIN
(SELECT `parent_skill_id` `id` , COUNT(*) `count` FROM `cv`.`skills`  GROUP BY `parent_skill_id`) AS `CHILD_CHILD_COUNT`
ON  `CHILDREN`.`id` = `CHILD_CHILD_COUNT`.`id`

LEFT JOIN (SELECT `key`,CONVERT(`value`,SIGNED) AS `active` FROM `entity_attribute_value` WHERE `app_table_id` = 13 AND `attribute_id` = 1) `status`
ON  `status`.`key` = `PARENT`.`ID`

LEFT JOIN (SELECT `key`,CONVERT(`value`,SIGNED) AS `active` FROM `entity_attribute_value` WHERE `app_table_id` = 13 AND `attribute_id` = 1) `child_status`
ON  `child_status`.`key` = `CHILDREN`.`id`
ORDER BY `ID`,`CHILD_ID`