CREATE OR REPLACE VIEW `cv`.`vwSkillParents` AS
    SELECT 
        `id`, `skill`
    FROM
        `cv`.`skills`
    WHERE
        `parent_skill_id` IS NULL;

