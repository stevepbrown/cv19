CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `spb`@`%` 
    SQL SECURITY DEFINER
VIEW `vwPageLinks` AS
    SELECT 
        `page_props`.`id` AS `PAGE_PROPS_ID`,
        `page_props`.`page_id` AS `PAGE_PROPS_PAGE_ID`,
        `page_props`.`name` AS `PAGE_NAME`,
        `links`.`attr_id` AS `LINK_HTML_ID`,
        `links`.`link_type` AS `LINK_TYPE`,
        `links`.`href` AS `LINK_URL`,
        `links`.`rel` AS `LINK_REL`
    FROM
        ((`page_props`
        JOIN `link_pages` ON ((`link_pages`.`page_props_id` = `page_props`.`id`)))
        JOIN `links` ON ((`links`.`id` = `link_pages`.`link_id`)))
    ORDER BY `page_props`.`page_id`