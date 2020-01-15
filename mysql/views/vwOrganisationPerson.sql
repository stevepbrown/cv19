CREATE OR REPLACE VIEW `cv`.`vwOrganisationPerson` AS

SELECT `O`.`id`,
    `O`.`name` `organisation`,
    concat(`P`.`family_name`,', ',`P`.`given_name`) `name`

FROM `cv`.`organisations` `O`
LEFT JOIN `people` `P` ON `P`.`organisation_id` = `O`.`id`
order by `organisation`,`name`
;
