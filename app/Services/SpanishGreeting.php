<?php

namespace App\Services;

use App\Interfaces\GreetingInterface;

class SpanishGreeting implements GreetingInterface
{
    public function greet(string $name): string
    {
        return "¡Hola, {$name}! ¡Bienvenido/a!";
    }

    public function getLanguage(): string
    {
        return 'Español';
    }

    public function goodbye(string $name): string
    {
        return "¡Adiós, {$name}! ¡Que tengas un buen día!";
    }
}
