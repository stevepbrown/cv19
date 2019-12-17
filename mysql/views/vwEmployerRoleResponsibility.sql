CREATE OR REPLACE
    ALGORITHM = UNDEFINED 
    DEFINER = 'spb'
    SQL SECURITY INVOKER
VIEW `vwEmployerRoleResponsibility` AS
    SELECT 
        `employers`.`id` AS `EMPLOYER_ID`,
        `employers`.`employer` AS `EMPLOYER`,
        `roles`.`id` AS `ROLE_ID`,
        `roles`.`role` AS `ROLE`,
        `responsibilities`.`id` AS `RESPONSIBILITY_ID`,
        `responsibilities`.`responsibility` AS `RESPONSIBILITY`
    FROM
   
        `employers` 
        INNER JOIN `employer_roles` ON `employers`.`id` = `employer_roles`.`employer_id`
        INNER JOIN `roles` ON `employer_roles`.`role_id` = `roles`.`id`
        INNER JOIN `role_responsibilities` ON `roles`.`id` = `role_responsibilities`.`role_id`
        INNER JOIN `responsibilities` ON `role_responsibilities`.`responsibility_id` = `responsibilities`.`id`
        

    ORDER BY `employers`.`id` , `roles`.`id` , `responsibilities`.`id`