CREATE OR REPLACE VIEW
	`cv`.`vwJSON_ddl_links`
    AS
SELECT 

CONCAT('\"',`id`,'\"',':\"',`attr_id`,'\",') FROM `links`
order by `id`;