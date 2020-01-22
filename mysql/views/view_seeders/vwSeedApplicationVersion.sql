SHOW ERRORS;
CREATE OR REPLACE
    ALGORITHM = UNDEFINED 
    DEFINER = `spb`@`%` 
    SQL SECURITY DEFINER
VIEW `vwSeedApplicationVersion` AS
    SELECT 
        'Application Version' AS `TABLE`,
                
               CONCAT(
               
                "\[",
                "\'",
                v.id,"\'",
                "\'",v.version,"\'", 
                "\'",v.name,"\'",
                IF(!ISNULL(v.name),),
                "\'",v.commit_SHA,"\'", 
                IF(!ISNULL(v.commit_SHA),),
                "\'",v.commit_tag,"\'",
                IF(!ISNULL(v.commit_tag),),
                "\'",v.description,"\'",
                IF(!ISNULL(v.description),),
                "\'",v.created_at,"\'",
                 "\]"
                 ) AS `SEEDER`          
    FROM
        `app_version` v