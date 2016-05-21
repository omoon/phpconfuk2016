<?php
$name = '%PHP%';
$price = 2000;
$limit = 10;

$sql = "
SELECT `name`, `price` 
FROM `books` 
WHERE `name` LIKE ? AND `price` > ?
ORDER BY `price` DESC 
LIMIT ?
";

$sth = $pdo->prepare($sql);
$sth->execute([$name, $price, $limit]);
print_r($sth->fetchAll());

$sql = "
SELECT `name`, `price` 
FROM `books` 
WHERE `name` LIKE :name
AND `price` > :price 
ORDER BY `price` DESC 
LIMIT :limit 
";

$sth = $pdo->prepare($sql);
$sth->bindParam(':name', $name);
$sth->bindParam(':price', $price);
$sth->bindParam(':limit', $limit, PDO::PARAM_INT);
$sth->execute();

print_r($sth->fetchAll());

$aa = $builder->table('books')
    ->where('name', 'like', $name)
    ->where('price', '>', $price)
    ->orderBy('price', 'desc')
    ->take($limit)
    ->select('name', 'price');

print_r($aa->get());

$cheap_books =
    $builder->table('books')
        ->where('price', '<', 3000);

$cheap_books->orderBy('name');
$cheap_books->orderBy('price');
$cheap_books->orderBy('price', 'desc');
$cheap_books->orderBy('price', 'desc')
    ->take(10)
    ->select();

$sql = "
UPDATE `books`
SET `name` = CONCAT('【安いよ！】', `name`)
WHERE `price` < 3000
";

//$cheap_books->update([
//    'name' => "CONCAT('【安いよ！】' , `name`)"
//]);

$cheap_books->update([
    'name' => $builder->raw(
        "CONCAT('【安いよ！】' , `name`)"
    )
]);

$cheap_books->count();
$cheap_books->max('price');
$cheap_books->min('price');
$cheap_books->average('price');
$cheap_books->sum('price');


$cheap_books->count();
$cheap_books->skip(10)->take(50);


$sql = "
SELECT `name`, `price` 
FROM `books` 
WHERE `name` LIKE '%PHP%' AND `price` >= 2000
ORDER BY `price` DESC 
LIMIT 10

DELETE FROM `books`
WHERE `name` LIKE '%PHP%'
ORDER BY `price` DESC
LIMIT 10

INSERT INTO books (NAME, price) VALUES()";
