<?php

namespace App\Services;

use App\Interfaces\GreetingInterface;

class EnglishGreeting implements GreetingInterface
{
    public function greet(string $name): string
    {
        return "Hello, {$name}! Welcome!";
    }

    public function getLanguage(): string
    {
        return 'English';
    }

    public function goodbye(string $name): string
    {
        return "Goodbye, {$name}! Have a nice day!";
    }
}
