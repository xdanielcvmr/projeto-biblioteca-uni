<?php

namespace App\src;

class Book
{
    public string $title;
    public string $author;
    public int $year;

    public function __construct(string $title, string $author, int $year)
    {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }
}