CREATE OR REPLACE
    ALGORITHM = UNDEFINED 
    DEFINER = `spb`@`%` 
    SQL SECURITY INVOKER
VIEW `cv`.`vwEmployerRoleResponsibility` AS
    SELECT 
        `cv`.`employers`.`id` AS `EMPLOYER_ID`,
        `cv`.`employers`.`employer` AS `EMPLOYER`,
        `cv`.`roles`.`id` AS `ROLE_ID`,
        `cv`.`roles`.`role` AS `ROLE`,
        `cv`.`responsibilities`.`id` AS `RESPONSIBILITY_ID`,
        `cv`.`responsibilities`.`responsibility` AS `RESPONSIBILITY`
    FROM
        (((`cv`.`employer_role_responsibilities`
        JOIN `cv`.`employers` ON ((`cv`.`employers`.`id` = `cv`.`employer_role_responsibilities`.`employer_id`)))
        JOIN `cv`.`roles` ON ((`cv`.`employer_role_responsibilities`.`role_id` = `cv`.`roles`.`id`)))
        JOIN `cv`.`responsibilities` ON ((`cv`.`employer_role_responsibilities`.`responsibility_id` = `cv`.`responsibilities`.`id`)))
    ORDER BY `cv`.`employers`.`id` , `cv`.`roles`.`id` , `cv`.`responsibilities`.`id`