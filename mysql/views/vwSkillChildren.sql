CREATE OR REPLACE VIEW `cv`.`vwSkillChildren` AS
    SELECT 
        `id`, `skill`,`parent_skill_id`
    FROM
        `cv`.`skills`
    WHERE
        `parent_skill_id` IS NOT NULL;