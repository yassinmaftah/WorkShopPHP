<?php

class Book 
{
    private int $id;
    private int $author_id;
    private float $price;
    private int $stock;
    private string $title;

    public function __construct($author_id,$price,$title,$stock = 0)
    {
        $this->author_id = $author_id;
        $this->price = $price;
        $this->title = $title;
        $this->stock = $stock;
    }

    public function getauthor_id() {return $this->author_id ;}
    public function getprice() {return $this->price ;}
    public function getstock() {return $this->stock ;}
    public function gettitle() {return $this->title ;}
}

/*
author_id	int	YES	MUL		
id	int	NO	PRI		auto_increment
price	decimal(10,2)	NO			
stock	int	NO		0	
title	varchar(255)	NO			
*/