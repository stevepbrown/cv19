CREATE OR REPLACE VIEW `cv`.`vwTableColumnDefs` AS
    SELECT 
 
        `COLUMNS`.`TABLE_NAME`,
        `COLUMNS`.`COLUMN_NAME`,
        `COLUMNS`.`DATA_TYPE`,
        `COLUMNS`.`COLUMN_TYPE`,
		 `COLUMNS`.`NUMERIC_PRECISION`,
		 `COLUMNS`.`NUMERIC_SCALE`,
        `COLUMNS`.`COLUMN_KEY`
    FROM
        `information_schema`.`COLUMNS`
    WHERE
        `TABLE_SCHEMA` = 'cv'
    ORDER BY `TABLE_NAME` ASC , `COLUMN_KEY` DESC , `ORDINAL_POSITION` ASC;