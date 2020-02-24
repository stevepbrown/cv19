CREATE OR REPLACE VIEW `cv`.`vwPageKeywords`

AS

SELECT `P`.`id` `PAGE_PROP_ID`, `name` `PAGE`, `K`.`id` `KEYWORD_ID`,`K`.`text` `KEYWORD`FROM cv.page_props `P`
INNER JOIN `page_keywords` `PAGK`
ON `P`.`id` = `PAGK`.`page_props_id`
RIGHT JOIN `keywords` `K` 
ON `PAGK`.`keyword_id` = `K`.`id`;