CREATE OR REPLACE VIEW `cv`.`vwSeedRoles` AS
    SELECT 'Job Roles' AS `TABLE`,
        CONCAT('[',
                '\'id\'=>\'',
                `id`,
                '\',',
                '\'role\'=>\'',
                `role`,
                '\',',
                '\'created_at\'=>\'',
                NOW(),
                '\'',
                '],') `SEEDER`
    FROM
        `cv`.`job_roles`