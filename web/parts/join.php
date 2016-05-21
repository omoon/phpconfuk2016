<?php

$sql = <<<SQL
SELECT
  `books`.`name` AS `book_name`,
  `books`.`price`,
  `authors`.`name` AS `author_name`,
  `authors`.`age`
FROM `books` LEFT JOIN `authors`
    ON `books`.`author_id` = `authors`.`id`
WHERE `books`.`price` >= ? 
SQL;

// PDO
$sth = $pdo->prepare($sql);
$sth->execute([5000]);
$results = $sth->fetchAll();
print_r($results);

$results = $builder->table('books')
    ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
    ->where('books.price', '>=', 5000)
    ->select(
        'books.name as book_name',
        'books.price',
        'authors.name as author_name',
        'authors.age'
    )
    ->get();
print_r($results);

