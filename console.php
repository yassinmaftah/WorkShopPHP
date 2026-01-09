<?php
require_once __DIR__ . '/src/Repositories/BookRepository.php';
require_once __DIR__ .  '/src/Entities/Book.php';
require_once __DIR__ . '/src/Services/LibraryService.php';

$repo = new BookRepository();

//$author_id,$price,$title,$stock = 0
// $newBook = new Book(1, 99, "New Week", 4);

// if ($repo->AddBook($newBook))
//     echo "Book Added<br>";

if (isset($_POST['Sub']))
{
    $nameAuthor = $_POST['author'];
    $title = $_POST['title'];
    $Stock = $_POST['Stock'];
    $Price = $_POST['Price'];

    $library = new LibraryService();

    if (!$library->bookData($title,$nameAuthor,$Stock,$Price))
        echo "Title is Duplicated<br>";
    else
        echo "Book Added!";
}

$books = $repo->getAllBooks();

// print_r($books);

if (isset($_POST['btn']))
{
    $title = $_POST['choiceBook'];
    $Book = $repo->find_book_by_title($title);
    // if ($book)
    //     print_r($book);
    // else
    //     echo "We don't Book with this Name<br>";
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
        <input type="text" name="title" require>
        <br><br>
        <label for="TEXT">author Name:  </label>
        <input type="text" name="author" require>
        <br><br>
        <label for="number">Stock :  </label>
        <input type="number" name="Stock" require>
        <br><br>
        <label for="number">Price :  </label>
        <input type="number" name="Price" require>

        <br>
        <button type="submit" name="Sub" >Add</button>
    </form>


    <h1>All Books: </h1>

    <table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $book['id']; ?></td>
                <td><?= $book['title']; ?></td>
                <td><?= $book['author_name']; ?></td> 
                <td><?= $book['price']; ?> €</td>
                <td><?= $book['stock']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    
    <br><br>
    <form method="post">
        <label for="TEXT">Entre book name: </label>
        <input type="text" name="choiceBook">

        <button type="submit" name="btn" >Send</button>
        <br><br>
        <?php echo "Title : " . ($Book['title'])  ?>
        <br>
        <?php echo "Author name : " . ($Book['author_name'])  ?>
    </form>
</body>
</html>
