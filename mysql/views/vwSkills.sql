
CREATE OR REPLACE VIEW 	`cv`.`vwSkills` AS
SELECT 
		(SELECT(ifnull(`PARENT`.`parent_skill_id`,0))) `PARENT_ANTECEDENT_ID`,
		`PARENT`.`id` `ID`,
		`PARENT`.`skill` `SKILL`,
                (SELECT ifnull(`PARENT_CHILD_COUNT`.`count`,0)) `PCHILDCOUNT`,
        `CHILDREN`.`id` `CHILD_ID`,
        `CHILDREN`.`skill` `CHILD_SKILL`,
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

ORDER BY `ID`,`CHILD_ID`