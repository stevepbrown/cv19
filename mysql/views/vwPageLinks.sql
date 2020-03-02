CREATE OR REPLACE VIEW `cv`.`vwPageLinks` AS


SELECT

`page_props`.`page_id` `PAGE_ID`,
`page_props`.`name` `PAGE_NAME`,
`links`.`attr_id` `LINK_HTML_ID`,
`links`.`link_type` `LINK_TYPE`,
`links`.`href` `LINK_URL`,
`links`.`rel` `LINK_REL`





FROM `cv`.`page_props`

JOIN `cv`.`link_pages` ON `link_pages`.`page_props_page_id` =   `page_props`.`id` 
JOIN `cv`.`links` ON `links`.`id` = `link_pages`.`link_id` 

ORDER BY  `PAGE_ID`





 