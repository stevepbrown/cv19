select `E`.`id` `E_id`,
		`ER`.`id` `ER_id`,
        `ER`.`role_id` `ER_role_id`
		`ERR`.`id`
FROM
`employers` `E` INNER  JOIN `employer_role` `ER`
INNER JOIN `employer_role_responsibilities`  `ERR` ON  `ER`.`id` =  `ERR`.`employer_role_id`
INNER JOIN `responsibilities` `RP` ON `ERR`.`responsibility_id` = `RP`.`id`



