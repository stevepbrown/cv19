CREATE OR REPLACE VIEW `cv`.`vwSkillRoot` AS

SELECT `id`, `skill` FROM `skills`
WHERE `parent_skill_id` IS NULL