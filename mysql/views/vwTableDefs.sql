CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `spb`@`%` 
    SQL SECURITY DEFINER
VIEW `vwTableDefs` AS
    SELECT 
        `information_schema`.`TABLES`.`TABLE_NAME` AS `SYS_TABLE_NAME`,
        `APP`.`id` AS `APP_TABLE_ID`,
        `APP`.`table_name` AS `APP_TABLE_NAME`,
        `information_schema`.`TABLES`.`TABLE_TYPE` AS `TABLE_TYPE`,
        `information_schema`.`TABLES`.`TABLE_ROWS` AS `TABLE_ROWS`,
        `information_schema`.`TABLES`.`VERSION` AS `VERSION`,
        `information_schema`.`TABLES`.`AUTO_INCREMENT` AS `AUTO_INCREMENT`,
        `information_schema`.`TABLES`.`CREATE_TIME` AS `SYS_CREATE_TIME`,
        `information_schema`.`TABLES`.`UPDATE_TIME` AS `SYS_UPDATE_TIME`,
        `information_schema`.`TABLES`.`TABLE_COMMENT` AS `TABLE_COMMENT`
    FROM
        (`information_schema`.`TABLES`
        LEFT JOIN (SELECT 
            CAST(`cv`.`app_tables`.`id` AS CHAR CHARSET UTF8) AS `id`,
                CAST(`cv`.`app_tables`.`table_name` AS CHAR CHARSET UTF8) AS `table_name`
        FROM
            `cv`.`app_tables`) `APP` ON ((`APP`.`table_name` = `information_schema`.`TABLES`.`TABLE_NAME`)))
    WHERE
        ((`information_schema`.`TABLES`.`TABLE_SCHEMA` = 'cv')
            AND (`information_schema`.`TABLES`.`TABLE_TYPE` = 'BASE TABLE'))