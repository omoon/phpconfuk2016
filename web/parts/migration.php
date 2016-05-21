<?php
use Illuminate\Database\Schema\Blueprint;
use Omoon\PhpConFukuoka16\Model\Author;
use Omoon\PhpConFukuoka16\Model\Book;

$builder->getSchemaBuilder()->dropIfExists('books');
$builder->getSchemaBuilder()->dropIfExists('authors');

$builder->getSchemaBuilder()->create('books', function (Blueprint $table) {
$table->increments('id');
$table->string('name');
$table->integer('author_id', false, true);
$table->integer('price', false, true);
$table->timestamps();
});

$builder->getSchemaBuilder()->create('authors', function (Blueprint $table) {
$table->increments('id');
$table->string('name');
$table->integer('age', false, true);
$table->timestamps();
});

for ($i = 1; $i <= 10; $i++) {
    $author = new Author();
    $author->name = '著者名' . $i;
    $author->age = rand(18, 80);
    $author->save();
}

$data = [
    ['name' => 'Laravel リファレンス', 'price' => 3800, 'author_id' => rand(1, 10)],
    ['name' => 'PHPエンジニア養成読本', 'price' => 4500, 'author_id' => rand(1, 10)],
    ['name' => 'パーフェクトPHP', 'price' => 2000, 'author_id' => rand(1, 10)],
    ['name' => "t' OR 't' = 't", 'price' => 10000, 'author_id' => rand(1, 10)],
];
foreach ($data as $datum) {
    Book::create($datum);
}
//delete 
$builder->table('books')->where('id', '>', 4)->delete();
