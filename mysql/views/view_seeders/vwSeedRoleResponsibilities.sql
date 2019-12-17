CREATE OR REPLACE VIEW `cv`.`vwSeedRoleResponsibilities` AS


SELECT 'RoleResponsibilities' AS `TABLE`,
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




