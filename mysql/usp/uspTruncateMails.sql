CREATE PROCEDURE `truncateMails` ()
BEGIN

TRUNCATE TABLE `email_batch_statuses`;
TRUNCATE TABLE `email_logs`


END