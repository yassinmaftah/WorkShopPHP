<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Entities/Author.php';

class AuthorRepository
{
    public function chekcAuthor($name)
    {
        $id = null;
        $db = Database::GetConn();
        $sql = "SELECT id from authors WHERE `name` = ?";
        $stmt = $db->prapare($sql);
        $res = $stmt->excute([$name]);
        if (!$res)
        {
            $new = new Author($name);
            $id = $db::lastInsertId();
            return $id;
        }
        $id = $res->fetchcolumn();
    }
}