CREATE OR REPLACE
    ALGORITHM = UNDEFINED 
    DEFINER = `spb` 
    SQL SECURITY DEFINER
VIEW `vwSkills` AS
    SELECT 
        `skills`.`parent_skill_id` AS `pid`,
        (SELECT 
                `skills`.`skill`
            FROM
                `skills`
            WHERE
                (`skills`.`id` = `pid`)) AS `pskill`,
        `skills`.`id` AS `cid`,
        `skills`.`skill` AS `cskill`
    FROM
        `skills`
    WHERE
        (`skills`.`parent_skill_id` <> 0)
    ORDER BY `skills`.`parent_skill_id` , `skills`.`id`