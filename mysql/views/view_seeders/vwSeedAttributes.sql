CREATE OR REPLACE
    ALGORITHM = UNDEFINED 
    DEFINER = `spb`@`%` 
    SQL SECURITY DEFINER
VIEW `vwSeedAttributes` AS
    SELECT 'Attributes' AS `TABLE`,
        CONCAT('\'id\'=>\'',
                `attributes`.`id`,
                '\',',
                '\'attribute\'=>\'',
                `attributes`.`attribute`,
                '\',',
                '\'attribute_datatype_id\'=>\'',
                `attributes`.`attribute_datatype_id`,
                '\',',
                '\'description\'=>\'',
                `attributes`.`description`,
                '\',',
                '\'created_at\'=>\'',
                NOW(),
                '\'],') AS `SEEDER`
    FROM
        `attributes`