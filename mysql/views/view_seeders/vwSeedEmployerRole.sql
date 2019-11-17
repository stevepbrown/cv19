CREATE OR REPLACE VIEW `cv`.`vwSeedEmployerRole` AS


SELECT 
    CONCAT('[',
            '\'id\'=>\'',
            `id`,
            '\',',
            '\'employer_id\'=>\'',
            `employer_id`,
            '\',',
            '\'role_id\'=>\'',
            `role_id`,
            '\',',
            '\'created_at\'=>\'',
            NOW(),
            '\'',
            '],') `SEEDER`
FROM
    `cv`.`employer_role`;




