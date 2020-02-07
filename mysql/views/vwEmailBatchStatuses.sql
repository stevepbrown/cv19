CREATE OR REPLACE VIEW `cv`.`vwEmailBatchStatuses` AS

SELECT `B`.`batch_id`,
`B`.`count_accepted`,		
`B`.`count_rejected`,
`B`.`created_at` `run_on`,
`INVOKED_COUNT`.`counter` AS `count_invoked`,
`FAILED_COUNT`.`counter` AS `count_failed`,
`BOUNCED_COUNT`.`counter` AS `count_bounced`


FROM `cv`.`email_batch_statuses` `B`
LEFT JOIN 


(SELECT `batch_id` AS `invoked_batch_id`,COUNT(*) `counter` FROM `cv`.`vwEmailStatus`
WHERE `invoked` = 'Y'
GROUP BY `batch_id` ) `INVOKED_COUNT`

ON `INVOKED_COUNT`.`invoked_batch_id` = `B`.`batch_id`

LEFT JOIN

(SELECT `batch_id` AS  `failed_batch_id`,COUNT(*) `counter` FROM `cv`.`vwEmailStatus`
WHERE `failed` = 'Y'
GROUP BY `batch_id` ) `FAILED_COUNT`

ON `FAILED_COUNT`.`failed_batch_id` = `B`.`batch_id`

LEFT JOIN 

(SELECT `batch_id` AS 'bounced_batch_id',COUNT(*) `counter` FROM `cv`.`vwEmailStatus`
WHERE `bounced` = 'Y'
GROUP BY `batch_id` ) `BOUNCED_COUNT`

ON   `BOUNCED_COUNT`.`bounced_batch_id` = `B`.`batch_id`


ORDER BY `B`.`created_at` DESC;