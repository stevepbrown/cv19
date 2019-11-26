CREATE OR REPLACE VIEW `cv`.`vwSeedEmployerRoles` AS


SELECT 
    CONCAT('[',
            '\'employer_id\'=>\'',
            `employer_id`,
            '\',',
            '\'role_id\'=>\'',
            `role_id`,
            '\',',
            '\'tenure\'=>\'',
            `tenure`,
             '\',',
            '\'created_at\'=>\'',
            NOW(),
            '\'',
            '],') `SEEDER`
FROM
    `cv`.`employer_roles`;




