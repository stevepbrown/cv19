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
        (((`employer_role_responsibilities`
        JOIN `employers` ON ((`employers`.`id` = `employer_role_responsibilities`.`employer_id`)))
        JOIN `roles` ON ((`employer_role_responsibilities`.`role_id` = `roles`.`id`)))
        JOIN `responsibilities` ON ((`employer_role_responsibilities`.`responsibility_id` = `responsibilities`.`id`)))
    ORDER BY `employers`.`id` , `roles`.`id` , `responsibilities`.`id`