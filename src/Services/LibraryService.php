<?php
require_once __DIR__ . '/../Entities/Book.php';
require_once __DIR__ . '/../Repositories/AuthorRepository.php';
class LibraryService 
{
    public function bookData($title,$author,$Stock,$Price)
    {
        $RepoAuthor = new AuthorRepository();
        $RepoBook = new BookRepository();

        $idAuthor = $RepoAuthor->chekcAuthor($author);
        $newbook = new Book($idAuthor, $Price, $title, $Stock);
        if (!$RepoBook->BookExsist($title))
            return $RepoBook->AddBook($newbook);
        else
            return 0;
    }
}