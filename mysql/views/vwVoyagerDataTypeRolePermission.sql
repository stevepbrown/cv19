CREATE OR REPLACE  VIEW `cv`.`vwVoyagerDataTypeRolePermission` AS

SELECT `DT`.`id` `DATATYPE_ID`,
		`DT`.`name` `DATATYPE_NAME`,
        `DT`.`slug` `DATATYPE_SLUG`,
        `permitted`.`ROLE_ID`,
        `permitted`.`ROLE_NAME`,
          `permitted`.`PERMISSION_ID`,
        `permitted`.`PERMISSION_KEY`,
        `permitted`.`PERMISSION_TABLE_NAME`
  
FROM `data_types` `DT`

LEFT JOIN 

(SELECT `R`.`id` `ROLE_ID`,
		`R`.`name` `ROLE_NAME`,
		`R`.`display_name` `ROLE_DISPLAY_NAME`,
        `P`.`id` `PERMISSION_ID`,
        `P`.`key` `PERMISSION_KEY`,
        `P`.`table_name` `PERMISSION_TABLE_NAME`
        

FROM `permission_role` `PR`

INNER JOIN `roles` `R`
INNER JOIN `permissions` `P`) AS `permitted` ON `permitted`.`PERMISSION_TABLE_NAME` =  `DT`.`name`


UNION


SELECT `DT`.`id` `DATATYPE_ID`,
		`DT`.`name` `DATATYPE_NAME`,
        `DT`.`slug` `DATATYPE_SLUG`,
        `permitted`.`ROLE_ID`,
        `permitted`.`ROLE_NAME`,
          `permitted`.`PERMISSION_ID`,
        `permitted`.`PERMISSION_KEY`,
        `permitted`.`PERMISSION_TABLE_NAME`
  
FROM `data_types` `DT`

RIGHT JOIN 

(SELECT `R`.`id` `ROLE_ID`,
		`R`.`name` `ROLE_NAME`,
		`R`.`display_name` `ROLE_DISPLAY_NAME`,
        `P`.`id` `PERMISSION_ID`,
        `P`.`key` `PERMISSION_KEY`,
        `P`.`table_name` `PERMISSION_TABLE_NAME`
        

FROM `permission_role` `PR`

INNER JOIN `roles` `R`
INNER JOIN `permissions` `P`) AS `permitted` ON `permitted`.`PERMISSION_TABLE_NAME` =  `DT`.`name`
