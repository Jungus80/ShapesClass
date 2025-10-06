<?php

namespace App\Http\Controllers;

use App\Models\Rectangle;
use App\Models\Triangle;
use App\Models\Circle;
use App\Services\SpanishGreeting;
use App\Services\EnglishGreeting;
use Illuminate\Http\Request;

class ShapeController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->input('language', 'es');
        $name = $request->input('name', 'Usuario');
        
        // Create greeting based on language
        $greeter = $language === 'en' ? new EnglishGreeting() : new SpanishGreeting();
        $greeting = $greeter->greet($name);
        
        // Create example shapes
        $rectangle = new Rectangle(10, 5, 'blue');
        $triangle = new Triangle(8, 6, 8, 5, 5, 'green');
        $circle = new Circle(7, 'red');
        
        $shapes = [
            [
                'type' => 'rectangle',
                'object' => $rectangle,
                'width' => $rectangle->getWidth(),
                'height' => $rectangle->getHeight(),
                'area' => $rectangle->calculateArea(),
                'perimeter' => $rectangle->getPerimeter(),
                'info' => $rectangle->getInfo()
            ],
            [
                'type' => 'triangle',
                'object' => $triangle,
                'base' => $triangle->getBase(),
                'height' => $triangle->getHeight(),
                'area' => $triangle->calculateArea(),
                'perimeter' => $triangle->getPerimeter(),
                'info' => $triangle->getInfo()
            ],
            [
                'type' => 'circle',
                'object' => $circle,
                'radius' => $circle->getRadius(),
                'diameter' => $circle->getDiameter(),
                'area' => $circle->calculateArea(),
                'circumference' => $circle->getCircumference(),
                'info' => $circle->getInfo()
            ]
        ];
        
        return view('shapes.index', compact('shapes', 'greeting', 'language', 'name'));
    }
    
    public function calculate(Request $request)
    {
        $type = $request->input('type');
        $language = $request->input('language', 'es');
        $name = $request->input('name', 'Usuario');
        
        $shape = null;
        
        switch ($type) {
            case 'rectangle':
                $width = floatval($request->input('width', 10));
                $height = floatval($request->input('height', 5));
                $shape = new Rectangle($width, $height);
                break;
            case 'triangle':
                $base = floatval($request->input('base', 8));
                $height = floatval($request->input('height', 6));
                $shape = new Triangle($base, $height);
                break;
            case 'circle':
                $radius = floatval($request->input('radius', 7));
                $shape = new Circle($radius);
                break;
        }
        
        if ($shape) {
            return response()->json([
                'success' => true,
                'info' => $shape->getInfo(),
                'area' => $shape->calculateArea()
            ]);
        }
        
        return response()->json(['success' => false, 'message' => 'Invalid shape type']);
    }
}
