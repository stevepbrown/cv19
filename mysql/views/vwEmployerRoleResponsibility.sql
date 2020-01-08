CREATE OR REPLACE
    ALGORITHM = UNDEFINED 
    DEFINER = 'spb'
    SQL SECURITY INVOKER
VIEW `vwEmployerRoleResponsibility` AS
    SELECT 
        `employers`.`id` AS `EMPLOYER_ID`,
        `employers`.`employer` AS `EMPLOYER`,
        `job_roles`.`id` AS `ROLE_ID`,
        `job_roles`.`role` AS `ROLE`,
        `responsibilities`.`id` AS `RESPONSIBILITY_ID`,
        `responsibilities`.`responsibility` AS `RESPONSIBILITY`,
        `Active`.`value` AS `ACTIVE`
    FROM
   
        `employers` 
        INNER JOIN `employer_roles` ON `employers`.`id` = `employer_roles`.`employer_id`
        INNER JOIN `job_roles` ON `employer_roles`.`role_id` = `job_roles`.`id`
        INNER JOIN `role_responsibilities` ON `job_roles`.`id` = `role_responsibilities`.`role_id`
        INNER JOIN `responsibilities` ON `role_responsibilities`.`responsibility_id` = `responsibilities`.`id`
        LEFT JOIN (SELECT `key`,`value` FROM  `entity_attribute_value`
					WHERE `attribute_id` = 1
                    AND `app_table_id` = 12) AS `Active` ON `Active`.`key` = `role_responsibilities`.`id`
        

    ORDER BY `employers`.`id` , `job_roles`.`id` , `responsibilities`.`id`