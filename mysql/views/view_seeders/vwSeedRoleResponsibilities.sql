CREATE OR REPLACE VIEW `cv`.`vwSeedRoleResponsibilities` AS


SELECT 
    CONCAT('[',
            '\'role_id\'=>\'',
            `role_id`,
            '\',',
            '\'responsibility_id\'=>\'',
            `responsibility_id`,
            '\',',
            '\'created_at\'=>\'',
            NOW(),
            '\'',
            '],') `SEEDER`
FROM
    `cv`.`role_responsibilities`;




