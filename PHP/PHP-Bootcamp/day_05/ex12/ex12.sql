SELECT `first_name`, `last_name`
FROM user_card
WHERE `first_name` LIKE '%-%' OR `last_name` LIKE '%-%'
ORDER BY `first_name` ASC, `last_name` ASC;