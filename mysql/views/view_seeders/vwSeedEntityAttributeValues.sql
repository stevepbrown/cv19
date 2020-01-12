CREATE OR REPLACE
    ALGORITHM = UNDEFINED 
    DEFINER = `spb`@`%` 
    SQL SECURITY DEFINER
VIEW `vwSeedEntityAttributeValues` AS
    SELECT 'Entity Attribute Value' AS `TABLE`,
        CONCAT('[',
        
				'\'id\'=>\'',
                `entity_attribute_value`.`id`,
                '\',',
                '\'entity_id\'=>\'',
                 `entity_attribute_value`.`entity_id`,
                 '\',',
                 '\'attribute_id\'=>\'',
                 `entity_attribute_value`.`attribute_id`,
                 '\',',
                 '\'app_table_id\'=>\'',
                 `entity_attribute_value`.`app_table_id`,
                 '\',',
                 '\'key\'=>\'',
                 `entity_attribute_value`.`key`,
                 '\',',
				'\'field\'=>\'',
                 -- `entity_attribute_value`.`field`,
                  '\',',
                  '\'value\'=>\'',
					`entity_attribute_value`.`value`,
                  '\',',
                 '\'created_at\'=>\'',
                NOW(),
                '\'],') AS `SEEDER`
    FROM
        `entity_attribute_value`