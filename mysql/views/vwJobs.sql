CREATE OR REPLACE VIEW `cv`.`vwJobs`
AS
SELECT

 --  NEED TO CODE EAV RESP ACTIVE AND ROLE SORT INDEX
 
LPAD(CONCAT(`Employers`.`id`,`Roles`.`role_id`,`Responsibilities`.`id`),5,'0')`ID`,
`Employers`.`id` `EMPLOYER_ID`,
`Employers`.`employer` `EMPLOYER`,
`Roles`.`role_id` `ROLE_ID`,
`Roles`.`role` `ROLE`,
-- `ROLE_SORT_INDEX`
`Responsibilities`.`id` `RESPONSIBILITY_ID`,
`Responsibilities`.`responsibility` `RESPONSIBILITY`
-- `RESPONSIBILITY_ACTIVE`

FROM `cv`.`employers` `Employers`

INNER JOIN 
  

(SELECT `employer_roles`.`employer_id`,`employer_roles`.`role_id`,`roles`.`role` FROM `cv`.`employer_roles` 
INNER JOIN `cv`.`roles`
ON `employer_roles`.`role_id` = `roles`.`id`) AS `Roles`

ON `Employers`.`id` = `Roles`.`employer_id`

INNER JOIN  
 
 
(SELECT `role_responsibilities`.`id`,`role_responsibilities`.`role_id`,`role_responsibilities`.`responsibility_id`,`responsibilities`.`responsibility` FROM `cv`.`role_responsibilities`
 INNER JOIN `cv`.`responsibilities`
 ON  `role_responsibilities`.`responsibility_id` = `responsibilities`.`id`) `Responsibilities`
 
 ON `Roles`.`role_id` =  `Responsibilities`.`role_id`

,
(SELECT DISTINCT `entity_attribute_value`.`attribute_id`,`attributes`.`attribute`
 FROM `cv`.`entity_attribute_value`
 INNER JOIN `cv`.`attributes`
 ON `entity_attribute_value`.`attribute_id` = `attributes`.`id`
 ) AS `LKUP_ATTRIBUTE`
 ,

 (SELECT DISTINCT `entity_attribute_value`.`app_table_id`,`app_tables`.`table_name` 
 FROM `cv`.`entity_attribute_value`
 INNER JOIN `cv`.`app_tables`
 ON `entity_attribute_value`.`app_table_id` = `app_tables`.`id` ) AS `LKUP_APP_TABLE`
 




