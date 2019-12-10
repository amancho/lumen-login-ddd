<?php

namespace App\Users\Domain;

class UserId
{

    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function random(): string
    {
        return uniqid();
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