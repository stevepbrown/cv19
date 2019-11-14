CREATE OR REPLACE VIEW `cv`.`vwSkillChildren` AS
    SELECT 
        `id`, `skill`
    FROM
        `cv`.`skills`
    WHERE
        `parent_skill_id` IS NOT NULL;