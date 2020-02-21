CREATE OR REPLACE VIEW `cv`.`vwMissingApplicationTables` AS


SELECT * FROM cv.vwTableDefs
where `APP_TABLE_NAME` is null
AND  SYS_TABLE_NAME not in (

'data_rows',
'menu_items',
'failed_jobs'

)
order by `SYS_CREATE_TIME` asc;