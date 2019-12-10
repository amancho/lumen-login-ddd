<?php

namespace App\Users\Domain;

class UserPassword
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = md5($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value();
    }
}