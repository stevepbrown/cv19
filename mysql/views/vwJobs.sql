CREATE OR REPLACE
    ALGORITHM = UNDEFINED 
    DEFINER = `spb`@`%` 
    SQL SECURITY DEFINER
VIEW `cv`.`vwJobs` AS
    SELECT 
        LPAD(CONCAT(`Employers`.`id`,
                        `EmployerRoles`.`ER_ROLE_ID`,
                        `RoleResponsibilities`.`RR_RESP_ID`),
                5,
                0) AS `job_id`,
        `Employers`.`id` AS `employer_id`,
        `Employers`.`employer` AS `employer`,
        `Employers`.`description` AS `employer_description`,
        `EmployerRoles`.`ER_ROLE_ID` AS `role_id`,
        `EmployerRoles`.`ER_ROLE` AS `role`,
        `EmployerRoles`.`ER_TENURE` AS `tenure`,
        `RoleResponsibilities`.`RR_RESP_ID` AS `responsibility_id`,
        `RoleResponsibilities`.`RR_RESP` AS `responsibility`,
        (SELECT CAST(`LKUPACTIVE`.`value` AS SIGNED)) AS `role_responsibility_is_active`,
        `EmployerRoles`.`ER_ID` AS `employer_roles_pk`,
        `RoleResponsibilities`.`RR_ID` AS `role_responsibilities_pk`,
        `RoleSort`.`value` AS `role_sort`
    FROM
        ((((`cv`.`employers` `Employers`
        JOIN (SELECT 
            `cv`.`employer_roles`.`id` AS `ER_ID`,
                `cv`.`employer_roles`.`employer_id` AS `ER_EMPLOYER_ID`,
                `cv`.`employer_roles`.`role_id` AS `ER_ROLE_ID`,
                `cv`.`employer_roles`.`tenure` AS `ER_TENURE`,
                `cv`.`job_roles`.`role` AS `ER_ROLE`
        FROM
            (`cv`.`employer_roles`
        JOIN `cv`.`job_roles` ON ((`cv`.`employer_roles`.`role_id` = `cv`.`job_roles`.`id`)))) `EmployerRoles` ON ((`Employers`.`id` = `EmployerRoles`.`ER_EMPLOYER_ID`)))
        JOIN (SELECT 
            `cv`.`role_responsibilities`.`id` AS `RR_ID`,
                `cv`.`role_responsibilities`.`role_id` AS `RR_ROLE_ID`,
                `cv`.`role_responsibilities`.`responsibility_id` AS `RR_RESP_ID`,
                `cv`.`responsibilities`.`responsibility` AS `RR_RESP`
        FROM
            (`cv`.`role_responsibilities`
        JOIN `cv`.`responsibilities` ON ((`cv`.`role_responsibilities`.`responsibility_id` = `cv`.`responsibilities`.`id`)))) `RoleResponsibilities` ON ((`EmployerRoles`.`ER_ROLE_ID` = `RoleResponsibilities`.`RR_ROLE_ID`)))
        LEFT JOIN (SELECT 
            `cv`.`entity_attribute_value`.`key` AS `key`,
                `cv`.`entity_attribute_value`.`value` AS `value`
        FROM
            ((`cv`.`entity_attribute_value`
        JOIN `cv`.`attributes` ON ((`cv`.`entity_attribute_value`.`attribute_id` = `cv`.`attributes`.`id`)))
        JOIN `cv`.`app_tables` ON ((`cv`.`entity_attribute_value`.`app_table_id` = `cv`.`app_tables`.`id`)))
        WHERE
            ((`cv`.`app_tables`.`table_name` = 'employer_roles')
                AND (`cv`.`attributes`.`attribute` = 'sort index'))) `RoleSort` ON ((`EmployerRoles`.`ER_ID` = `RoleSort`.`key`)))
        LEFT JOIN (SELECT 
            `cv`.`entity_attribute_value`.`key` AS `key`,
                `cv`.`entity_attribute_value`.`value` AS `value`
        FROM
            `cv`.`entity_attribute_value`
        WHERE
            ((`cv`.`entity_attribute_value`.`attribute_id` = 1)
                AND (`cv`.`entity_attribute_value`.`app_table_id` = 12))) `LKUPACTIVE` ON ((`LKUPACTIVE`.`key` = `RoleResponsibilities`.`RR_ID`)))
    ORDER BY `RoleSort`.`value` DESC