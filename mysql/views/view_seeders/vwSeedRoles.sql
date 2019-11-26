CREATE OR REPLACE VIEW `cv`.`vwSeedRoles` AS
    SELECT 
        CONCAT('[',
                '\'id\'=>\'',
                `id`,
                '\',',
                '\'role\'=>\'',
                `role`,
                  '\'tenure\'=>\'',
                `tenure`,
                '\',',
                '\'created_at\'=>\'',
                NOW(),
                '\'',
                '],') `SEEDER`
    FROM
        `cv`.`roles`