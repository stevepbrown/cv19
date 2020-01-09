
CREATE OR REPLACE
    ALGORITHM = UNDEFINED 
    DEFINER = `spb`@`%` 
    SQL SECURITY DEFINER
VIEW `cv`.`vwSeedUsers`AS
    SELECT 
        'Users' AS `TABLE`,
        CONCAT('[',
                '\'id\'=>\'',
                 `users`.`id`,
                '\',',
'\'role_id\'=>\'',
     `users`.`role_id`,
       '\',',
                 '\',',
 	'\'name\'=>\'', 
 `users`.`name`,
       '\',',
                    '\',',
 	'\'email\'=>\'',
     `users`.`email`,
       '\',',
                    '\',',
 	'\'avatar\'=>\'',
     `users`.`avatar`,
       '\',',
                    '\',',
 	'\'email_verified_a\'=>\'',
     `users`.`email_verified_at`,
       '\',',
                    '\',',
 	'\'password\'=>\'',
     `users`.`password`,
       '\',',
                    '\',',
 	'\'remember_token\'=>\'',
     `users`.`remember_token`,
       '\',',
      '\'created_at\'=>\'',
                 NOW(),
                 '\''
                '],') AS `SEEDER`
    FROM
        `users`;
        
        


