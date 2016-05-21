<?php
$cheap_books = $builder->table('books')->where('price', '<', 2000);

printf("count : %s\n", $cheap_books->count('price'));
printf("max : %s\n", $cheap_books->max('price'));
printf("min : %s\n", $cheap_books->min('price'));
printf("sum : %s\n", $cheap_books->sum('price'));
printf("avg : %0.2f\n", $cheap_books->avg('price'));

//print_r($cheap_books->skip(10)->take(10)->get());
//
//$builder->table('books')->chunk(100, function($books) {
//    echo count($books);
//    foreach ($books as $book) {
//        echo $book['name'] . "\n";
//    }
//});

