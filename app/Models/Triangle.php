<?php

namespace App\Models;

use App\Abstract\Shape;

class Triangle extends Shape
{
    private float $base;
    private float $height;
    private float $sideA;
    private float $sideB;
    private float $sideC;

    public function __construct(float $base, float $height, float $sideA = 0, float $sideB = 0, float $sideC = 0, string $color = 'green')
    {
        parent::__construct('Triángulo', $color);
        $this->base = $base;
        $this->height = $height;
        $this->sideA = $sideA ?: $base;
        $this->sideB = $sideB ?: sqrt(pow($base/2, 2) + pow($height, 2));
        $this->sideC = $sideC ?: $this->sideB;
    }

    public function calculateArea(): float
    {
        return ($this->base * $this->height) / 2;
    }

    public function getPerimeter(): float
    {
        return $this->sideA + $this->sideB + $this->sideC;
    }

    public function getBase(): float
    {
        return $this->base;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getInfo(): string
    {
        return sprintf(
            "%s - Base: %.2f, Altura: %.2f, Perímetro: %.2f",
            parent::getInfo(),
            $this->base,
            $this->height,
            $this->getPerimeter()
        );
    }
}
