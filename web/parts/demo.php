<?php
$sql = <<<SQL
SELECT name, price
 FROM books 
WHERE
price > 2000
and name LIKE '%PHP%'
 ORDER BY price DESC 
LIMIT 10
SQL;

$builder->table('books')
    ->where('price', '>', 2000)
    ->where('name', 'like', '%PHP%')
    ->orderBy('price')
    ->take(10);




