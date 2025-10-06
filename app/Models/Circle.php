<?php

namespace App\Models;

use App\Abstract\Shape;

class Circle extends Shape
{
    private float $radius;

    public function __construct(float $radius, string $color = 'red')
    {
        parent::__construct('Círculo', $color);
        $this->radius = $radius;
    }

    public function calculateArea(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function getCircumference(): float
    {
        return 2 * pi() * $this->radius;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function getDiameter(): float
    {
        return 2 * $this->radius;
    }

    public function getInfo(): string
    {
        return sprintf(
            "%s - Radio: %.2f, Diámetro: %.2f, Circunferencia: %.2f",
            parent::getInfo(),
            $this->radius,
            $this->getDiameter(),
            $this->getCircumference()
        );
    }
}
