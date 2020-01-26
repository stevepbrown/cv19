CREATE OR REPLACE VIEW `cv`.`vwAttributesSkills` AS

SELECT `skills`.`id`,
		`skills`.`skill`,
        `EAV_ACTIVE`.`value` AS `active`,
        `EAV_SUPPRESS_PRINT`.`value` AS `suppress_print`
FROM `cv`.`skills`

LEFT JOIN 

(SELECT `key`,`value`
FROM `entity_attribute_value`
WHERE attribute_id = 1
AND app_table_id = 13) AS `EAV_ACTIVE`

ON `EAV_ACTIVE`.`key` = `skills`.`id`

LEFT JOIN 

(SELECT `key`,`value`
FROM `entity_attribute_value`
WHERE attribute_id = 3
AND app_table_id = 13) AS `EAV_SUPPRESS_PRINT`

ON `EAV_SUPPRESS_PRINT`.`key` = `skills`.`id` 
