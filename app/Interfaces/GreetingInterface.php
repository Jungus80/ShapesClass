<?php

namespace App\Interfaces;

interface GreetingInterface
{
    public function greet(string $name): string;
    public function getLanguage(): string;
}
