CREATE OR REPLACE VIEW
	`cv`.`vwJSON_ddl_keywords`
    AS
SELECT 

CONCAT('\"',`id`,'\"',':\"',`text`,'\",') FROM cv.keywords
order by `id`;
