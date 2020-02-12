CREATE VIEW `cv`.`vwPageProps`

AS


select 

`P`.`id`,
`P`.`page_id`,
`P`.`name`,
`P`.`meta_description`,
`P`.`slug`,
`P`.`title`,
`P`.`favicon_id`,
L.id `LINK_ID`,
L.attr_id `LINK_ATTR_ID`,
L.link_type `LINK_TYPE`,
L.href `LINK_HREF`,
L.rel `LINK_REL`,
L.media `LINK_MEDIA`

 from `page_props` AS P

LEFT JOIN `link_pages` AS LP
ON LP.page_props_page_id = P.id

LEFT JOIN  `links` AS L
ON LP.link_id = L.id;

