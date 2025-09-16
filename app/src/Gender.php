<?php

namespace App\src;

class Gender
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}