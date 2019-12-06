CREATE OR REPLACE VIEW `cv`.`vwEAV` AS


SELECT  
	`EAV`.`entity_description` `DESCRIPTION`,
	`EAV`.`id` `EAV_ID`,
     `EAV`.`entity_id` `ENTITY_ID`,
     `EAV`.`attribute_id` `ATTRIBUTE_ID`,       
     `A`.`attribute` `ATTRIBUTE`,                  
    `EAV`.`app_table_id` `TABLE_ID`,
    `T`.`table_name` `TABLE`,
   	`EAV`.`key` `FK`,
     `EAV`.`value` `VALUE`

   
FROM `cv`.`entity_attribute_value` `EAV`
	LEFT JOIN `attributes` A ON `A`.`id` = `EAV`.`ATTRIBUTE_ID`
	LEFT JOIN `cv`.`attribute_datatypes` `D` ON `D`.`id` = `A`.`attribute_datatype_id`
	LEFT JOIN `app_tables` `T` ON `EAV`.`app_table_id` = `T`.`id`
   	
