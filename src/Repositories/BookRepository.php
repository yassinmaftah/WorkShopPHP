<?php

require_once __DIR__ . '/../Core/Database.php';

class BookRepository 
{
    public function AddBook(Book $book)
    {
        $db = Database::GetConn();
        $author_id = $book->getauthor_id();
        $price = $book->getprice();
        $stock = $book->getstock();
        $title = $book->gettitle();

        $sql = "INSERT INTO books (title,price,stock,author_id)
                VALUE (?,?,?,?)";
        $stmt = $db->prepare($sql);
        if ($stmt->execute([$title,$price,$stock,$author_id]))
            return 1;
        return 0; 
    }
}