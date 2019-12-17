CREATE OR REPLACE
    ALGORITHM = UNDEFINED 
    DEFINER = `spb`@`%` 
    SQL SECURITY DEFINER
VIEW `vwJobs` AS
    SELECT 
        LPAD(CONCAT(`Employers`.`id`,
                        `EmployerRoles`.`ER_ROLE_ID`,
                        `RoleResponsibilities`.`RR_RESP_ID`),
                5,
                0) AS `JOB_ID`,
        `Employers`.`id` AS `EMPLOYER_ID`,
        `Employers`.`employer` AS `EMPLOYER`,
        `Employers`.`description` AS `EMPLOYER_DESCRIPTION`,
        `EmployerRoles`.`ER_ROLE_ID` AS `ROLE_ID`,
        `EmployerRoles`.`ER_ROLE` AS `ROLE`,
        `EmployerRoles`.`ER_TENURE` AS `TENURE`,
        `RoleResponsibilities`.`RR_RESP_ID` AS `RESPONSIBILITY_ID`,
        `RoleResponsibilities`.`RR_RESP` AS `RESPONSIBILITY`,
		(SELECT convert(`LKUPACTIVE`.`value`,SIGNED)) `RESPONSIBILITY_IS_ACTIVE`,
        `EmployerRoles`.`ER_ID` AS `EMPLOYER_ROLES_PK`,
        `RoleResponsibilities`.`RR_ID` AS `ROLE_RESPONSIBILITIES_PK`,
        `RoleSort`.`value` AS `ROLE_SORT`
    FROM
        (((`cv`.`employers` `Employers`
        JOIN (SELECT 
            `cv`.`employer_roles`.`id` AS `ER_ID`,
                `cv`.`employer_roles`.`employer_id` AS `ER_EMPLOYER_ID`,
                `cv`.`employer_roles`.`role_id` AS `ER_ROLE_ID`,
                `cv`.`employer_roles`.`tenure` AS `ER_TENURE`,
                `cv`.`roles`.`role` AS `ER_ROLE`
        FROM
            (`cv`.`employer_roles`
        JOIN `cv`.`roles` ON ((`cv`.`employer_roles`.`role_id` = `cv`.`roles`.`id`)))) `EmployerRoles` ON ((`Employers`.`id` = `EmployerRoles`.`ER_EMPLOYER_ID`)))
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
                
                
          LEFT JOIN (SELECT `key`,`value` from `cv`.`entity_attribute_value` WHERE `attribute_id` = 1 AND `app_table_id` = 12) `LKUPACTIVE`
          ON `LKUPACTIVE`.`key` = `RoleResponsibilities`.`RR_ID`
    ORDER BY `RoleSort`.`value` DESC