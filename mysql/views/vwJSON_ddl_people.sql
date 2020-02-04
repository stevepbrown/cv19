CREATE OR REPLACE VIEW
	`cv`.`vwJSON_ddl_people`
    AS
SELECT 

CONCAT('\"',`id`,'\"',':\"',
`given_name`,
" ",
`family_name`,
'\",') FROM cv.people
order by `id`;
