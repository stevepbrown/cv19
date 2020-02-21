CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `spb`@`%` 
    SQL SECURITY DEFINER
VIEW `vwMissingApplicationTables` AS
    SELECT 
        `vwTableDefs`.`SYS_TABLE_NAME` AS `SYS_TABLE_NAME`,
        `vwTableDefs`.`APP_TABLE_ID` AS `APP_TABLE_ID`,
        `vwTableDefs`.`APP_TABLE_NAME` AS `APP_TABLE_NAME`,
        `vwTableDefs`.`TABLE_TYPE` AS `TABLE_TYPE`,
        `vwTableDefs`.`TABLE_ROWS` AS `TABLE_ROWS`,
        `vwTableDefs`.`VERSION` AS `VERSION`,
        `vwTableDefs`.`AUTO_INCREMENT` AS `AUTO_INCREMENT`,
        `vwTableDefs`.`SYS_CREATE_TIME` AS `SYS_CREATE_TIME`,
        `vwTableDefs`.`SYS_UPDATE_TIME` AS `SYS_UPDATE_TIME`,
        `vwTableDefs`.`TABLE_COMMENT` AS `TABLE_COMMENT`
    FROM
        `cv`.`vwTableDefs`
    WHERE
        (ISNULL(`vwTableDefs`.`APP_TABLE_NAME`)
            AND (`vwTableDefs`.`SYS_TABLE_NAME` NOT IN ('data_rows' , 'menu_items', 'failed_jobs')))
    ORDER BY `vwTableDefs`.`SYS_CREATE_TIME`