CREATE OR REPLACE VIEW `cv`.`vwVoyagerUserRolesPermissions`
AS

SELECT 

		U.id `USER_ID`,
        U.`name` `USER_NAME`,
        `ROL`.`id` `ROLE_ID`,
		`ROL`.`name` `ROLE_NAME`,
        `ROL`.`display_name` `ROLE_DISPLAY_NAME`,
        `PERM`.`id` `PERM_ID`,
        `PERM`.`key` `PERM_KEY`,
        `PERM`.`table_name`    `PERM_TABLE_NAME`

FROM `roles` `ROL`

LEFT JOIN `user_roles` `UROL`
ON ROL.id = `UROL`.role_id

LEFT JOIN `users` `U` ON
`U`.id = UROL.user_id

LEFT JOIN `permission_role` `PROL`
ON PROL.role_id = ROL.id

LEFT JOIN `permissions` `PERM`
ON `PERM`.`id` = `PROL`.`permission_id` 



