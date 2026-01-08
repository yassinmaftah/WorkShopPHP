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

    public function BookExsist($title)
    {
        $db = Database::GetConn();
        $sql = "SELECT COUNT(*) FROM books WHERE title = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$title]);
        if ($stmt->fetchColumn() > 0)
            return 1;
        return 0;
    }

    public function getAllBooks()
    {
        $db = Database::GetConn();
        $sql = "SELECT books.*, authors.name 
                FROM books 
                LEFT JOIN authors ON books.author_id = authors.id";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }
}