<?php

namespace App\Abstract;

use App\Interfaces\ShapeInterface;

abstract class Shape implements ShapeInterface
{
    protected string $name;
    protected string $color;

    public function __construct(string $name, string $color = 'white')
    {
        $this->name = $name;
        $this->color = $color;
    }

    abstract public function calculateArea(): float;

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getInfo(): string
    {
        return sprintf(
            "Forma: %s, Color: %s, Área: %.2f",
            $this->name,
            $this->color,
            $this->calculateArea()
        );
    }
}
