SELECT `name`, `price`
FROM `books`
WHERE `name` LIKE '%PHP%'
ORDER BY `price` DESC
LIMIT 10
