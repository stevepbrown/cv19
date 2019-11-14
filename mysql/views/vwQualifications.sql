CREATE OR REPLACE VIEW `cv`.`vwQualifications` AS
SELECT

`I`.`id` `INSTITUTION_ID`,
`I`.`institution` `INSTITUTION`,
`Q`.`id` `QUALIFICATION_ID`,
`Q`.`qualification` `QUALIFICATION`,
`M`.`id` `MODULE_ID`,
`M`.`module` `MODULE`

FROM `cv`.`institutions` `I` 
INNER JOIN `cv`.`qualifications` `Q` ON `Q`.`institution_id` = `I`.`id`
INNER JOIN `cv`.`modules` `M` ON `M`.`qualification_id` = `Q`.`id`