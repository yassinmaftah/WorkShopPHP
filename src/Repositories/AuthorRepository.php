<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Entities/Author.php';

class AuthorRepository
{
    public function chekcAuthor($name)
    {
        $db = Database::GetConn();
        $sql = "SELECT id from authors WHERE `name` = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$name]);

        $id = $stmt->fetchColumn();
        if ($id)
            return $id;
        $sqlInsert = "INSERT INTO authors (name) VALUES (?)";
        $stmtInsert = $db->prepare($sqlInsert);
        $stmtInsert->execute([$name]);
        return $db->lastInsertId();
    }
}