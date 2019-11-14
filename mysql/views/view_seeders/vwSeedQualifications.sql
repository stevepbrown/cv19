CREATE OR REPLACE VIEW `cv`.`vwSeedQualifications` AS

SELECT CONCAT(
"[",
"\'id\'=>\'",`id`,"\',",
"\'qualification\'=>\'",`qualification`,"\',",
"\'institution_id\'=>\'",`institution_id`,"\',",
"\'year_attained\'=>\'",`year_attained`,"\',",
"\'created_at\'=>\'",NOW(),"\'",
"],"

) `SEEDER`

FROM `cv`.`qualifications`
