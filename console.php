<?php
require_once __DIR__ . '/src/Repositories/BookRepository.php';
require_once __DIR__ . '/src/Entities/Book.php';

$repo = new BookRepository();

//$author_id,$price,$title,$stock = 0
// $newBook = new Book(1, 99, "New Week", 4);

// if ($repo->AddBook($newBook))
//     echo "Book Added<br>";

if (isset($_POST['Sub']))
{
    $nameAuthor = $__POST['author'];
    $title = $__POST['title'];
    $Stock = $__POST['Stock'];
    $Price = $__POST['Price'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Shop</title>
</head>
<body>
    <form method="POST">
        <h1>Add Book </h1>
        <label for="TEXT">Entre Title: </label>
        <input type="text" name="title">
        <br><br>
        <label for="TEXT">author Name:  </label>
        <input type="text" name="author">
        <br><br>
        <label for="number">Stock :  </label>
        <input type="number" name="Stock">
        <br><br>
        <label for="number">Price :  </label>
        <input type="number" name="Price">

        <br>
        <button type="submit" name="Sub" >Add</button>
    </form>
</body>
</html>
