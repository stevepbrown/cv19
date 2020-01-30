CREATE OR REPLACE VIEW
	`cv`.`vwKeywords` AS
    
    SELECT 	K.id `KEYW_ID`,
			K.`text` `KEYW_TEXT`,
            P.id `PPROP_ID`,
            P.name `PPROP_NAME`,
            P.meta_description `PPROP_META_DESC`
    
    FROM `keywords` `K`
	LEFT  JOIN `page_keywords` ON `K`.`id` = `page_keywords`.`keyword_id`
    LEFT JOIN `page_props` `P` ON  `P`.`id` = `page_keywords`.`page_props_id`
    
    UNION
    
    SELECT 	K.id `KEYW_ID`,
			K.`text` `KEYW_TEXT`,
            P.id `PPROP_ID`,
            P.name `PPROP_NAME`,
            P.meta_description `PPROP_META_DESC`
    
    FROM `keywords` `K`
	RIGHT  JOIN `page_keywords` ON `K`.`id` = `page_keywords`.`keyword_id`
    RIGHT JOIN `page_props` `P` ON  `P`.`id` = `page_keywords`.`page_props_id`