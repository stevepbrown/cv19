CREATE OR REPLACE VIEW 
`cv`.`vwEmailStatus` AS

SELECT
`LOGS`.`id` , 
`OGN`.`id` `organisation_id`,
`OGN`.`name` `organisation_name`,
`P`.`id` `person_id`,
CONCAT(`P`.`family_name`,', ',`P`.`given_name`) `person_name`,
`P`.`email` `person_email`,
`PTEMP`.`email_templates_id` `template_id`,
`TEMPLATE`.`name` `template_name`,
-- (SELECT CASE `EAV`.`value` WHEN 1 THEN 'Y' WHEN 0 THEN 'N' ELSE NULL END) `person_template_active`,
`LOGS`.`batch_id` `batch_id`,
 (SELECT  CASE (`LOGS`.`invoked`) WHEN 1 THEN 'Y' WHEN 0 THEN 'N' ELSE NULL END) `invoked`,
 `LOGS`.`invoked_when` `invoked_when`,
 (SELECT  CASE (`LOGS`.`failed`) WHEN 1 THEN 'Y' WHEN 0 THEN 'N' ELSE NULL END) `failed`,
 (SELECT  CASE (`LOGS`.`bounced`)  WHEN 1 THEN 'Y' WHEN 0 THEN 'N' ELSE NULL END) `bounced`,
`LOGS`.`created_at`
 

FROM `people` `P`

LEFT JOIN `organisations` `OGN` ON `OGN`.`id` = `P`.`organisation_id`
LEFT JOIN  `email_person_templates` `PTEMP` ON `PTEMP`.`people_id` = `P`.`id`
LEFT JOIN  `email_logs` `LOGS` ON ((`LOGS`.`person_id` = `P`.`id`) AND (`LOGS`.`template_id` = `PTEMP`.`email_templates_id`))
LEFT JOIN `email_templates` `TEMPLATE` ON `TEMPLATE`.`id` = `PTEMP`.`email_templates_id`
LEFT JOIN 

(SELECT * FROM `entity_attribute_value`
WHERE `attribute_id` = 1 AND `app_table_id` = 23) 
 `EAV` ON `EAV`.`key` =  `PTEMP`.`id`

ORDER BY `OGN`.`name`,`P`.`family_name`,`P`.`given_name`





