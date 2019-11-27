CREATE OR REPLACE VIEW `cv`.`vwSkillParent` AS

SELECT  DISTINCT `id`,
		`skill`
        FROM `cv`.`skills` `C`
        WHERE `id` IN (SELECT `parent_skill_id` FROM `cv`.`skills`);
        
        
        


