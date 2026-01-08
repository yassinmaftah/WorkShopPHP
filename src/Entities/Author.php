<?php

class Author
{
    private int $id;
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function getID(): int {return $this->id ;}
    public function getName(): string {return $this->name ;}
    public function setName($name): void {$this->name = $name ;}
    public function setid($id): void {$this->id = $id ;}
}