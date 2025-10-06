<?php

namespace App\Models;

use App\Abstract\Shape;

class Rectangle extends Shape
{
    private float $width;
    private float $height;

    public function __construct(float $width, float $height, string $color = 'blue')
    {
        parent::__construct('Rectángulo', $color);
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea(): float
    {
        return $this->width * $this->height;
    }

    public function getPerimeter(): float
    {
        return 2 * ($this->width + $this->height);
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getInfo(): string
    {
        return sprintf(
            "%s - Ancho: %.2f, Alto: %.2f, Perímetro: %.2f",
            parent::getInfo(),
            $this->width,
            $this->height,
            $this->getPerimeter()
        );
    }
}
